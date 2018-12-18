<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $senarai_users = [
         ['id' => '1', 'nama' => 'Ali Bin Abu', 'email' => 'ali@abu.com'],
         ['id' => '2', 'nama' => 'Ahmad Bin Albab', 'email' => 'ahmad@albab.com'],
         ['id' => '3', 'nama' => 'Siti Nurhaliza', 'email' => 'siti@nurhaliza.com'],
       ];

       return view('users.template_users', compact('senarai_users'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return view('users/template_tambah_user');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      # versi lama validation
      // $this->validate($request, [
      //   'name' => 'required|min:3'
      // ]);

      $request->validate([
        'name' => 'required|min:3|alpha_dash',
        'email' => 'required|email'
      ]);

      $data = $request->all();

      return $data;
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
      return 'Borang edit user ID: ' .$id;
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