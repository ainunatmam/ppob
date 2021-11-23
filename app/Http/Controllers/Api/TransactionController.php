<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $transaction = Transaction::with('customer','product.category')->get();

     $data = [
        'message' => 'Success',
        'data' => $transaction
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
            'product_id' => 'required',
            'customer_id' => 'required',
            'tujuan' => 'required',
        ]);

        $product = Product::with('category:id,title,admin_fee')->findOrFail($request->product_id);
        $sisa_deposit = $product->deposit - $product->price;
        if ($sisa_deposit < 0) {
            
            $data = [
                'message' => 'Transaksi Gagal Dikarenakan Saldo Tidak Mencukupi Atau Pesanan Tidak Valid'
            ];

            return response()->json($data);

        }

        $total = $product->price+$product->category->admin_fee;

        $tax = $total*0.10;

        $transaction = new Transaction;
        $transaction->product_id = $request->product_id;
        $transaction->customer_id = $request->customer_id;
        $transaction->tujuan = $request->tujuan;
        $transaction->amount = $product->price;
        $transaction->deposit_left = $sisa_deposit;
        $transaction->tax = $tax;
        $transaction->total = $total+$tax;
        $transaction->save();

        $transaction->invoice = 'INV-'.$transaction->id;
        $transaction->save();

        $product->deposit = $sisa_deposit;
        $product->save();

        $data = [
            'message' => 'Succes',
            'data' => $transaction
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
        $transaction = Transaction::with('customer', 'product.category')->findOrFail($id);

        $data = [
            'message' => 'Succes',
            'data' => $transaction
        ];

        return response()->json($data);
    }

    public function get_transaction()
    {
        $transaction = Transaction::with('customer', 'product.category')->get();

        $data = [
            'message' => 'successs',
            'data' => $transaction
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
