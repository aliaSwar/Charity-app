<?php

namespace App\Console;

use App\Models\Person;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        if ($person->category == 'father' || $person->category == 'mother') {
            return false;
        }
        return true;
    }
    protected function schedule(Schedule $schedule)
    {
        $people = Person::all();
        $schedule->call(function () use ($people) {
            foreach ($people as $person) {
                if ($this->check($person)) {
                    $this->select($person);
                }
            }
        })->yearly();

        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
