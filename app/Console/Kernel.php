<?php

namespace App\Console;

use App\Models\Entry;
use App\Models\Orphan;
use App\Models\Person;
use App\Models\Sponsor;
use App\Models\Type;
use App\Notifications\OrphanPublish;
use App\Notifications\PaidPublished;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected  function updateData($new, $person)
    {
        $person->update([
            'education' =>  $new
        ]);
    }
    protected  function select($person)
    {
        if ($person->education == 'امي') {
            $this->updateData('أول', $person);
        } elseif ($person->education == 'أول') {
            $this->updateData('ثاني', $person);
        } elseif ($person->education == 'ثاني') {
            $this->updateData('ثالث', $person);
        } elseif ($person->education == 'رابع') {
            $this->updateData('خامس', $person);
        } elseif ($person->education == 'خامس') {
            $this->updateData('سادس', $person);
        } elseif ($person->education == 'سادس') {
            $this->updateData('سابع', $person);
        } elseif ($person->education == 'سابع') {
            $this->updateData('ثامن', $person);
        } elseif ($person->education == 'ثامن') {
            $this->updateData('تاسع', $person);
        } elseif ($person->education == 'تاسع') {
            $this->updateData('عاشر', $person);
        } elseif ($person->education == 'عاشر') {
            $this->updateData('حادي عشر', $person);
        } elseif ($person->education == 'حادي عشر') {
            $this->updateData('بكلوريا', $person);
        } else {
            $this->updateData('جامعي', $person);
        }
    }
    protected function check($person)
    {
        if ($person->category == 'الأب' || $person->category == 'الأم') {
            return false;
        }
        return true;
    }
    protected function schedule(Schedule $schedule)
    {
        //TODO::send every year for indrement education
        $people = Person::all();
        $schedule->call(function () use ($people) {
            foreach ($people as $person) {
                if ($this->check($person)) {
                    $this->select($person);
                }
            }
        })->yearly();
        //TODO::convert statuses
        $schedule->call(function () {
            $query = Entry::whereDate('finshed_date', date('y-m-d'))->get();
            foreach ($query as $q) {
                if ($q->status->status === 'نشطين') {
                    $status = DB::table('statuses')->where('status', '=', 'غير نشطين')->first();
                    $q->status_id = $status->id;
                    $q->save();
                }
            }
        })->daily();

        //TODO::send Notification To Sponsor for paids every year


        $schedule->call(function () {
            $orphans = DB::table('orphans')
                ->where('type_id', DB::table('types')->where('type', 'سنوية')->first()->id)
                ->whereMonth('begin_date', today()->month)->whereDay('begin_date', today()->day)->get();
            foreach ($orphans as $orphan) {
                $sponsor = Sponsor::findOrFail($orphan->sponsor_id);
                Notification::send(Sponsor::findOrFail($orphan->sponsor_id)->user, new PaidPublished($orphan, $sponsor));
            }
        })->yearly();


        //TODO::send Notification To Sponsor for paids every month


        $schedule->call(function () {
            $orphans = DB::table('orphans')->where('type_id', DB::table('types')->where('type', 'شهرية')->first()->id)
                ->whereMonth('begin_date', today()->month)->whereDay('begin_date', today()->day)->get();
            foreach ($orphans as $orphan) {
                $sponsor = Sponsor::findOrFail($orphan->sponsor_id);
                Notification::send(Sponsor::findOrFail($orphan->sponsor_id)->user, new PaidPublished($orphan, $sponsor));
            }
        })->monthly();
        //TODO::translate from orphans to entry person when finsh date orphan
        $schedule->call(function () {
            $orphans = Orphan::where('end_date', date('y-m-d'))
                ->where('is_finsh', false)
                ->get();
            foreach ($orphans as $orphan) {
                $sponsor = Sponsor::findOrFail($orphan->sponsor_id);
                Notification::send(Sponsor::findOrFail($orphan->sponsor_id)->user, new OrphanPublish($orphan, $sponsor));
                DB::table('people')->where('id', $orphan->person_id)
                    ->where('orphan', true)
                    ->update(['orphan' => false]);
                $orphan->is_finsh = true;
                $orphan->save();
            }
        })->daily();
        //TODO::covert entry family to orphan
        $schedule->call(function () {
            foreach (Entry::all() as $entry) {
                $count = DB::table('people')->where('entry_id', $entry->id)
                    ->where('orphan', true)
                    ->where('status', 'existing')
                    ->count();
                if ($count === $entry->family_num) {
                    $entry->all_orphan = true;
                    $entry->save();
                }
            }
        })->daily();
    }



    /**
     * Register the commands for the application.R TUI[]
     * 789

     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
