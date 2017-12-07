<?php

namespace App\Http\Controllers;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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
            $company = Company::with('user')->get();
        }else{
            $company = Company::where('user_id', Auth::user()->id)->get();
        }

        return view('company.index', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('status', 0)->get();
        return view('company.create', ['user' => $user]);
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
            'owner' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
            ]);

        Company::create([
            'id' => date('YmdHis'),
            'user_id' => $request->owner,
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'phone' => $request->phone
            ]);

        return redirect()->route('company.index');
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
        $user = User::where('status', 0)->get();
        $company = Company::find($id);
        return view('company.update', ['company' => $company, 'user' => $user]);
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
            'owner' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
            ]);
        
        Company::find($id)->update([
            'user_id' => $request->owner,
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'phone' => $request->phone
            ]);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('company.index');
    }
}
