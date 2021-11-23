<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('title', 'ASC')->get();
        $data = [
            'message' => 'Success',
            'data' => $category
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
            'title' => 'required',
            'admin_fee' => 'required|numeric',
        ]);

        $category = new Category($request->all());
        $category->save();
        $data = [
            'message' => 'Success',
            'data' => $category
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
        $category = Category::select('title', 'admin_fee')->where('id', $id)->get();

        $data = [
            'message' => 'Success',
            'data' => $category
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
            'title' => 'required',
            'admin_fee' => 'required|numeric',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        $data = [
            'message' => 'Success',
            'data' => $category
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
        $category = Category::findOrFail($id);
        $category->delete();

        $data = [
            'message' => 'Success',
            'data' => $category
        ];

        return response()->json($data);
    }
}
