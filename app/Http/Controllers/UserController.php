<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/**
 * @author Ahmad Zaky Humami
 * @filesource UserController.php
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        
        if ($user) {
            return view('page.account')->withUser($user);
        } else {
            return redirect()->back();
        }
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
        $user = User::find($id)->get;
        $oldPassword = $request->oldpassword;
        $checkPassword = $request->checkpassword;

        if (Hash::check($oldPassword, $checkPassword)) {
            $newpassword = $request->newpassword;
            $confirmnewpassword = $request->confirmnewpassword;
            
            if ($newpassword == $confirmnewpassword) {
                $user->username = $request->username;
                $user->password = $request->newpassword; 
                $user->update($request->all());
                return view('page.account')->with('success', 'Data was changed'); 
            } else {
                return redirect()->back()->with('failed', 'New Password no matched');
            }
        } else {
            return redirect()->back()->with('failed', 'Last Password no matched');
        }
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
