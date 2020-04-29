<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones=Phone::all();
        return view('phones.index',['phones'=>$phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|unique:phones|digits:11|regex:/(01)[0-2]{1}[0-9]{8}/',
        ]);
        $phone=new Phone();
        $phone->user_id=Auth::user()->id;
        $phone->phone=$request->phone;
        $phone->save();

        return redirect()->route('phones.index')->with('success','Phone number added successfully');

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
        $phone=Phone::find($id);
        return view('phones.edit',['phone'=>$phone]);
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
        $validatedData = $request->validate([
            'phone' => 'required|unique:phones|regex:/(01)[0-2]{1}[0-9]{8}/|max:11',
        ]);

        $phone=Phone::find($id);
        $phone->phone=$request->phone;
        $phone->save();
        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        return redirect()->route('phones.index');
    }
}
