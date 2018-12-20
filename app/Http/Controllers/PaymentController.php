<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $payments = DB::table('payments')
        // ->join('users', 'payments.user_id', '=', 'users.id')
        // ->select('payments.*', 'users.name')
        // ->paginate(2);
        $payments = Payment::paginate(2);


        return view('payments/index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->select('id', 'name')->get();

        return view('payments.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
          'user_id' => 'required|integer',
          'amount' => 'required|numeric',
          'status' => 'required',
          'due_date' => 'required|date'
        ]);

        #DB::table('payments')->insert($data);
        Payment::create($data);

        return redirect()->route('payments.index')->with('alert-success', 'Rekod berjaya ditambah');
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
        # $payment = DB::table('payments')->whereId($id)->first();
        $payment = Payment::findOrFail($id);

        $users = DB::table('users')->select('id', 'name')->get();

        return view('payments.edit', compact('payment', 'users'));
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
      $data = $request->all();

      // DB::table('payments')
      // ->whereId($id)
      // ->update($data);
      $payment = Payment::findOrFail($id);
      $payment->update($data);

      return redirect()->back()->with('alert-success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // DB::table('payments')
      // ->whereId($id)
      // ->delete();

      $payment = Payment::findOrFail($id);
      $payment->delete();

      return redirect()->back()->with('alert-success', 'Rekod berjaya dihapuskan');
    }
}
