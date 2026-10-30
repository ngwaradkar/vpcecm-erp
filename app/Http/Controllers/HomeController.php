<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $user;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function dashboard()
    {
        $d = [];
        if (Qs::userIsTeamSAT()) {
            $d['users'] = $this->user->getAll();
        }

        $d['rankers'] = DB::table('rankers_placements')->where('record_type', 'Academic Ranker')->take(5)->get();
        $d['mous_count'] = DB::table('institutional_mous')->count();
        $d['activities_count'] = DB::table('extension_activities')->count();
        $d['books_count'] = DB::table('books')->count();

        return view('pages.support_team.dashboard', $d);
    }

    public function governance()
    {
        $data['committees'] = DB::table('governance_committees')->get()->groupBy('board_name');
        return view('pages.institutional.governance', $data);
    }

    public function mous()
    {
        $data['mous'] = DB::table('institutional_mous')->get();
        return view('pages.institutional.mous', $data);
    }

    public function extension()
    {
        $data['activities'] = DB::table('extension_activities')->get();
        return view('pages.institutional.extension', $data);
    }

    public function achievements()
    {
        $data['rankers'] = DB::table('rankers_placements')->get()->groupBy('record_type');
        return view('pages.institutional.achievements', $data);
    }

    public function library()
    {
        $data['books'] = DB::table('books')->get();
        return view('pages.institutional.library', $data);
    }
}
