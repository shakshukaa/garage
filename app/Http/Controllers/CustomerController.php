<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(15);
        return view('customers', [
            'customers' => $customers
        ]);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customerEdit', [
           'customer' => $customer
        ]);
    }

    public function saveEdit($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->fill($request->all());
        $customer->save();

        return view('customerEdit', [
           'customer' => $customer
        ]);
    }

    public function delete($id)
    {
        Customer::find($id)->delete();

        $customers = Customer::paginate(15);

        return redirect()->route('customers', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        return view('customerCreate');
    }

    public function saveCreate(Request $request)
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();

        return view('customerEdit', [
            'customer' => $customer
        ]);
    }
}
