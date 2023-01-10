<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer as CustomerModel;

class Customer extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $customers = CustomerModel::all();
        return view('dashboard.customer.index', ['customers' => $customers]);
    }

    public function create()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        return view('dashboard.customer.create');
    }

    public function store(Request $request)
    {
        $pre = "/^0/";
        $rpltxt = "62";
        $request->phone = preg_replace($pre, $rpltxt, $request->phone);
        
        $request->validate([
            'name' => 'required|max:64',
            'email' => 'required|max:64|unique:Customer,CustomerEmail',
            'phone' => 'required|numeric|max_digits:16|unique:Customer,CustomerPhone',
            'gender' => 'required|in:Male,Female',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);

        $data = [
            'CustomerName' => $request->name,
            'CustomerEmail' => $request->email,
            'CustomerPhone' => $request->phone,
            'CustomerGender' => $request->gender,
            'CustomerPass' => $request->password,
            'CustomerStatus' => 'active',
            ];
            
        CustomerModel::create($data);

        return redirect('/dashboard/customer')->with('status', $request->name.' has been added!');

    }

    public function show($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $customers = CustomerModel::find($id);
        return view('dashboard.customer.show', ['customers' => $customers]);
    }

    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $customers = CustomerModel::find($id);
        return view('dashboard.customer.edit',['customers' => $customers]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | max:64',
            'email' => 'required | max:64 ',
            'phone' => 'required | max_digits:16',
            'gender' => 'required | in:Male,Female',
        ]);
    
        $data = CustomerModel::find($id);

            $data->CustomerName = $request->name;
            $data->CustomerEmail = $request->email;
            $data->CustomerPhone = $request->phone;
            $data->CustomerGender = $request->gender;

            $data->save();
    
        return redirect('/dashboard/customer')->with('status', $request->name.' has been update!');
    
        }
    
    public function active($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $customers = CustomerModel::find($id);
        $customers->CustomerStatus = 'active';
        $customers->save();

        return redirect('/dashboard/customer')->with('status', $customers->CustomerName.' has been activated!');
    }

    public function deactive($id)
    {
        if(!Session::get('Login') || (Session::get('LoginRole') != 'Master' && Session::get('LoginRole') != 'Customer'))
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        $customers = CustomerModel::find($id);
        $customers->CustomerStatus = 'deactive';
        $customers->save();
        return redirect('/dashboard/customer')->with('status', $customers->CustomerName.' has been deactivated!');
    }

    public function destroy($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        $customers = CustomerModel::find($id);
        CustomerModel::destroy($id);
        
        return redirect('/dashboard/customer')->with('status', $customers->CustomerName.' has been deleted!');
    }
}
