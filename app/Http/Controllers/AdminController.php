<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequests;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Category;
use App\Models\Tin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(){
        return view('admin.indexs');
     }
    public function search(Request $request)
    {
        $key = $request->input('key');

        $dm = Category::where('title', 'like', "%$key%")->get();

        $tin = Tin::where('title', 'like', "%$key%")
                    ->orWhere('desc', 'like', "%$key%")
                    ->orWhere('content', 'like', "%$key%")
                    ->get();

        return view('admin.search', ['dm' => $dm, 'tin' => $tin,'key' => $key]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequests $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
