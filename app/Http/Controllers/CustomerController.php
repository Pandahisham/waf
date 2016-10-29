<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        if(auth()->user())
        {
            $customers=Customer::all();


            return view('customer_list')->with('customers',$customers);

        }
        else
            return view('welcome');
    }
    public function addCustomer(Request $request)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        Customer::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'category' => $request['category'],
            'term' => $request['term'],
        ]);
        return back();
    }
    public function deleteCustomer(Customer $customer)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $customer->delete();
        return back();
    }
    public function updateCustomer(Customer $customer)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        return view('customer_form')->with('customer',$customer);
    }
    public function updateCustomerInformation(Request $request)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        $customer=Customer::where('id',$request['customer_id'])->first();
            $customer->name=$request['name'];
            $customer->address=$request['address'];
            $customer->phone=$request['phone'];
            $customer->email=$request['email'];
            $customer->category=$request['category'];
            $customer->term=$request['term'];
            $customer->save();
        return back();
    }
}
