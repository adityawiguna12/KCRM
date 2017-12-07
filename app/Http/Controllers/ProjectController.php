<?php

namespace App\Http\Controllers;
use App\Project;
use App\User;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
            $project = Project::with('Payment')->get();
        } else {
            $project = Project::where('user_id', Auth::user()->id)->get();
        }
        

        return view('project.index', ['project' => $project]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('status', 0)->get();
        return view('project.create', ['user' => $user]);
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
            'client' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
            'name' => 'required',
            'description' => 'required',
            'method' => 'required',
            'git' => 'required',
            'transaksi' => 'required',
            'lunas' => 'required'
            ]);


        Project::create([
            'id' => date('YmdHis'),
            'user_id' => $request->client,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
            'name' => $request->name,
            'description' => $request->description,
            'git' => $request->git,
            'payment_id' => date('YmdHis')
            ]);


        Payment::create([
            'id' => date('YmdHis'),
            'method' => $request->method,
            'transaksi' => $request->transaksi,
            'lunas' => $request->lunas
            ]);

        return redirect()->route('project.index');
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
        $project = Project::find($id);
        $user = User::where('status', 0)->get();
        return view('project.update', ['project' => $project, 'user' => $user]);
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
            'client' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
            'name' => 'required',
            'description' => 'required']);
        
        Project::find($id)->update([
            'user_id' => $request->client,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
            'name' => $request->name,
            'description' => $request->description,
            'git' => $request->git,
        ]);

        Payment::find($id)->update([
                'method' => $request->method,
                'transaksi' => $request->transaksi,
                'lunas' => $request->lunas
            ]);

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        Payment::destroy($id);
        return back();
    }
}
