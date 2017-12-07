<?php

namespace App\Http\Controllers;
use App\Contract;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminorclient')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status == 1) {
            $contract = Contract::with('project')->get();
        } else {
            $contract = Contract::where('user_id', Auth::user()->id)->get();
        }
        
        return view('kontrak.index', ['contract' => $contract]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        $user = User::where('status', 0)->get();
        return view('kontrak.create', ['project' => $project, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'project' => 'required',
            'method' => 'required',
            'start' =>'required',
            'expired' => 'required'
            ]);

        Contract::create([
                'id' => date('YmdHis'),
                'user_id' => $request->user,
                'project_id' => $request->project,
                'method' => $request->method,
                'start' => $request->start,
                'expired' => $request->expired
            ]);

        return redirect()->route('contract.index');
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
        $project = Project::all();
        $user = User::where('status', 0)->get();
        $contract = Contract::find($id);
        return view('kontrak.update',['contract' => $contract, 'project' => $project, 'user' => $user]);
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
        $this->validate($request, [
            'user' => 'required',
            'project' => 'required',
            'method' => 'required',
            'start' =>'required',
            'expired' => 'required'
            ]);
        
        Contract::find($id)->update([
                'user_id' => $request->user,
                'project_id' => $request->project,
                'method' => $request->method,
                'start' => $request->start,
                'expired' => $request->expired
            ]);

        return redirect()->route('contract.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contract::destroy($id);
        return redirect()->back();
    }
}
