<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Mdical_entry;
use App\Models\Orphan;
use App\Models\Sponsor;
use App\Models\Status;
use App\Notifications\OrphanPublish;
use App\Notifications\PaidPublished;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class IndexController extends BaseController
{
    public function index()
    {

        $count_entry = Cache::remember('entries', 60 + 60 + 24, function () {
            return Entry::count();
        });
        $count_mdical =  Cache::remember('mdicals', 60 + 60 + 24, function () {
            return Mdical_entry::count();
        });
        if (is_null(Status::where('status', 'قيد الانتظار')) or Status::where('status', 'مرفوضين')) {
            return view('index', [
                'count_entry'  =>  $count_entry,
                'count_mdical' => $count_mdical,
            ]);
        }
        $waiter = Status::where('status', 'قيد الانتظار')->first()->entries()->count();

        $injecter = Status::where('status', 'مرفوضين')->first()->entries()->count();
        return view('index', [
            'count_entry'  =>  $count_entry,
            'count_mdical' => $count_mdical,
            'waiter'       => $waiter,
            'injecter'     =>  $injecter
        ]);
    }
}
