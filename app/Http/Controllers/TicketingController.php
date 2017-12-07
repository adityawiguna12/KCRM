<?php

namespace App\Http\Controllers;
use App\Ticket;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketingController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status == 1) {
            $ticket = Ticket::orderBy('tingkat', 'asc')->orderBy('status', 0)->get();
        } else {
            $ticket = Ticket::where('user_id', Auth::user()->id)->get();
        }

        return view('ticketing.index', ['ticket' => $ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::where('user_id', Auth::user()->id)->get();
        return view('ticketing.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'project' => 'required',
            'level' => 'required',
            'problem' => 'required',
            ]);

        Ticket::create([
            'id' => date('YmdHis'),
            'project_id' => $request->project,
            'user_id' => $id,
            'keluhan' => $request->problem,
            'tingkat' => $request->level,
            'status' => 0
            ]);

        return redirect()->route('ticketing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $ticket = Ticket::find($id);
        $project = Project::all();
        return view('ticketing.update', ['ticket' => $ticket, 'project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->status == 1) {

            Ticket::find($id)->update([
                'tingkat' => $request->level,
                'status' => $request->status
                ]);

        } else {

            $this->validate($request, [
                'project' => 'required',
                'problem' => 'required',
                'level' => 'required',
                ]);

            Ticket::find($id)->update([
                'project_id' => $request->project,
                'keluhan' => $request->problem,
                'tingkat' => $request->level,
                ]);

        }

        return redirect()->route('ticketing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect()->back();
    }
}
