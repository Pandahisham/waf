<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Supplier;
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
    public function supplier()
    {
        if(auth()->user())
        {
            $suppliers=Supplier::all();


            return view('supplier_list')->with('suppliers',$suppliers);

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
            'identification' => $request['identification'],
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'category' => $request['category'],
            'term' => $request['term'],
        ]);
        echo "<script>alert('Customer Added');</script>";
        return back();
    }
    public function addSupplier(Request $request)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        Supplier::create([
            'identification' => $request['identification'],
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'category' => $request['category'],
            'term' => $request['term'],
        ]);
        echo "<script>alert('Supplier Added');</script>";
        return back();
    }
    public function deleteCustomer(Customer $customer)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $customer->delete();
        echo "<script>alert('Customer Deleted');</script>";
        return back();
    }
    public function deleteSupplier(Supplier $supplier)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $supplier->delete();
        echo "<script>alert('Supplier Deleted');</script>";
        return back();
    }
    public function updateCustomer(Customer $customer)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        return view('customer_form')->with('customer',$customer);
    }
    public function updateSupplier(Supplier $supplier)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        return view('supplier_form')->with('supplier',$supplier);
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
            echo "<script>alert('Customer Information Updated');</script>";
        return back();
    }
        public function updateSupplierInformation(Request $request)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        $supplier=Supplier::where('id',$request['supplier_id'])->first();
            $supplier->name=$request['name'];
            $supplier->address=$request['address'];
            $supplier->phone=$request['phone'];
            $supplier->email=$request['email'];
            $supplier->category=$request['category'];
            $supplier->term=$request['term'];
            $supplier->save();
            echo "<script>alert('Supplier Information Updated');</script>";
        return back();
    }
}
