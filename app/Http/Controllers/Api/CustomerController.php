<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customer = Customer::get();
        
        $data = [
            'message' => 'Success',
            'data' => $customer
        ];
        return response()->json($data);
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
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $customer = new Customer($request->all());
        $customer->save();
        $data = [
            'message' => 'Success',
            'data' => $customer
        ];
        return response()->json($data);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::select('name', 'phone_number', 'email')->findOrFail($id);

        $data = [
            'message' => 'Success',
            'data' => $customer
        ];
        return response()->json($data);    
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
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        $data = [
            'message' => 'Success',
            'data' => $customer
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        $data = [
            'message' => 'Success',
            'data' => $customer
        ];

        return response()->json($data);
    }
}
