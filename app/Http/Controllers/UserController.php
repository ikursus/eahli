<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // $senarai_users = [
       //   ['id' => '1', 'nama' => 'Ali Bin Abu', 'email' => 'ali@abu.com'],
       //   ['id' => '2', 'nama' => 'Ahmad Bin Albab', 'email' => 'ahmad@albab.com'],
       //   ['id' => '3', 'nama' => 'Siti Nurhaliza', 'email' => 'siti@nurhaliza.com'],
       // ];
       $senarai_users = User::paginate(2);


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
        'name' => 'required|min:3',
        'email' => 'required|email'
      ]);

      # Dapatkan data yang perlu kemaskini
      $data = $request->except('password');

      $data['password'] = bcrypt($request->input('password'));

      # Simpan rekod dalam table users
      User::create($data);

      # Redirect pengguna ke halaman senarai users
      # return redirect('/senarai-users');
      return redirect('/senarai-users');
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
      # Panggil data user berdasar ID
      $user = User::findOrFail($id);

      return view('users/template_edit_user', compact('user'));
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
      $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email'
      ]);

      # Dapatkan data yang perlu kemaskini
      $data = $request->except('password');

      # Semak jika ruangan password tidak kosong
      if ( !empty($request->input('password') ) )
      {
        $data['password'] = bcrypt($request->input('password'));
      }

      # Update rekod dalam table users berdasarkan ID
      $user = User::findOrFail($id);
      $user->update($data);

      # Redirect pengguna ke halaman senarai users
      # return redirect('/senarai-users');
      return redirect()->back()->with('mesej-success', 'Rekod berjaya dikemaskini.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      # Update rekod dalam table users berdasarkan ID
      $user = User::findOrFail($id);
      $user->delete();

      # return redirect('/senarai-users');
      return redirect('/senarai-users')->with('mesej-success', 'Rekod telah berjaya dihapuskan!');
    }
}
