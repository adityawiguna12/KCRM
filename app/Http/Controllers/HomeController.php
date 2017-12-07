<?php

namespace App\Http\Controllers;
use App\User;
use App\Project;
use App\Payment;
use App\Contract;
use App\Ticket;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        if (Auth::user()->status == 1) {
            $user = User::count();
            $project = Project::count();
            $company = Company::count();
            $ticket = Ticket::count();
        } else {
            $user = User::where('id', $id)->count();
            $project = Project::where('user_id', $id)->count();
            $company = Company::where('user_id', $id)->count();
            $ticket = Ticket::where('user_id', $id)->count();
        }
        
        return view('index', ['user' => $user, 'project' => $project, 'company' => $company, 'ticket' => $ticket]);
    }
}
