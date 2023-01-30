<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin as AdminModel;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
    
            $admins = AdminModel::all();
            return view('dashboard.admin.index', ['admins' => $admins]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
            
            return view('dashboard.admin.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
    
            $request->validate([
                'name' => 'required|max:64',
                'email' => 'required|max:64|unique:Admin,AdminEmail',
                'password' => 'required',
            ]);

            $data = [
                'AdminName' => $request->name,
                'AdminEmail' => $request->email,
                'AdminPass' => $request->password,
                ];

            AdminModel::create($data);

            return redirect('/dashboard/admin')->with('status', $request->name.' has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
    
            $admins = AdminModel::find($id);
            return view('dashboard.admin.show', ['admins' => $admins]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
                $admins = AdminModel::find($id);
                return view('dashboard.admin.edit', ['admins' => $admins]);
        }
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
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
            
            $request->validate([
                'name' => 'required|max:64',
                'email' => 'required|max:64|unique:Admin,AdminEmail',
                'password' => 'required',
            ]);

            $data = AdminModel::find($id);
            $data->AdminName = $request->name;
            $data->AdminEmail = $request->email;
            $data->AdminPass = $request->password;

            $data->save();

            return redirect('/dashboard/admin')->with('status', $request->name.' has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
            {
                return redirect('/login/master')->with('status', 'You have to login first!');
            }
    
            $admins = AdminModel::find($id);
            AdminModel::destroy($id);

            return redirect('/dashboard/admin')->with('status', $admins->AdminName.' has been deleted!');

        }
    }
}
