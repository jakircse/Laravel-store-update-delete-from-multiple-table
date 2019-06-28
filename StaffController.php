<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Staffcat;
use App\User;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $userinfo = User::all();
        $staffinfo = Staff::all();

        return view('staff.index')
        ->with('userinfo', $userinfo)
        ->with('staffinfo', $staffinfo);
      
    }

    public function tools()
    {
        $staffcats = Staffcat::all();

        return view('staff.staffcat')->with('staffcats', $staffcats);
  
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffcats = Staffcat::all(); //declared variable to get categories
        return view('staff.create')->with('staffcats', $staffcats);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Using same function to store Staff Category and Staff. if is true then storing staff category info in Staffcat table else storing staff info in staff and user table
        
        if ($request->has('st_cat_name')) {
            $this->validate($request,[
            'st_cat_name' => 'required'
            ]);

            $staffcats = new Staffcat;
            $staffcats->catname = $request->input('st_cat_name');

            $staffcats->save();
            return redirect('/tools')->with('success', 'Staff category Created');
        }
        

        else{
            $staffinfo = new Staff;
            $staffinfo->name = $request->input('stfname');
            $staffinfo->user_id = $request->input('stfid');
            $staffinfo->designaton = $request->input('stfdesig');
            $staffinfo->dob = $request->input('staffdob');
            $staffinfo->nid = $request->input('staffnid');
            $staffinfo->doj = $request->input('staffdoj');
            $staffinfo->blood = $request->input('staffblood');
            $staffinfo->mpoin = $request->input('staffindex');
            $staffinfo->save();

            $userinfo = new User;
            $userinfo->user_id = $request->input('stfid');
            $userinfo->user_type = $request->input('stfdesig');
            $userinfo->mobile = $request->input('staffmobile');
            $userinfo->email = $request->input('staffmail');
            $userinfo->password = $request->input('staffpw');
            $userinfo->save();

        }
        


        return redirect('/staff')->with('success', 'Staff Created');
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        //

        $staffinfo = Staff::find($user_id);  // Loading all data from 
        $userinfo = User::find($user_id); 
        return view('staff.view')
        ->with('staffinfo', $staffinfo)
        ->with('userinfo', $userinfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($user_id)
    {
        //
        $staffinfo = Staff::find($user_id);  // Loading all data from 
        $userinfo = User::find($user_id);
        return view('staff.edit')
        ->with('staffinfo', $staffinfo)
        ->with('userinfo', $userinfo);
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        //
        $staffinfo = Staff::find($user_id);
        $staffinfo->name = $request->input('stfname');
        $staffinfo->user_id = $request->input('stfid');
        $staffinfo->designaton = $request->input('stfdesig');
        $staffinfo->dob = $request->input('staffdob');
        $staffinfo->nid = $request->input('staffnid');
        $staffinfo->doj = $request->input('staffdoj');
        $staffinfo->blood = $request->input('staffblood');
        $staffinfo->mpoin = $request->input('staffindex');
        $staffinfo->save();

        $userinfo = User::find($user_id);
        $userinfo->user_id = $request->input('stfid');
        $userinfo->user_type = $request->input('stfdesig');
        $userinfo->mobile = $request->input('staffmobile');
        $userinfo->email = $request->input('staffmail');
        $userinfo->password = $request->input('staffpw');
        $userinfo->save();

        
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
        $staffcats = Staffcat::find($id);
        if ($staffcats->has($id)){
            $staffcats->delete();
            return redirect('/staff')->with('success', 'Category Deleted');
        }
        

        $staffinfo = Staff::find($id);
        if ($staffinfo->has($id)){
            $staffinfo->delete();
            return redirect('/staff-list')->with('success', 'Staff Deleted');

        }
    }
}
