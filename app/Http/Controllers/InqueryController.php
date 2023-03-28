<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Models\inquery;


class InqueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inqueryarray = inquery::all();
        return view('Inquery.index',compact('inqueryarray'));
        //dd($inqueryarray);
         
         //dd($loan_type_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loan_type_data = DB::table('loan_types')->select('id','title','status')->get();
        return view('Inquery.create',compact('loan_type_data'));

        
        //dd('hi');
        //return view('Inquery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        'first_name' => 'required | min:3',
        'last_name' => 'required',
        'email' => 'string | email | unique:inqueries,email',
        'address' => 'required | string',
        'mobile_no' => 'required | numeric | integer|max_digits:10',
        'status' => 'required | numeric',
        ],
        [
        'first_name.required' => 'First Name is required',
        'first_name.min' => '3 Character Required',
        'last_name.required' => 'Last Name is requied and only contains alphabet',
        'email.required' => 'Email is required And unique',
        'address.required' => 'address is required',
        'mobile_no.required.numeric' => "Mobile Number contains 10 numbers",
        'status.required.numeric' => 'Staus is required'
        ]
    );


        $inqueryq = new inquery([

            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'status' => $request->get('status'),
            'mobile_no' => $request->get('mobile_no'),
            "loan_type_id" => $request->get("loan_type_id"),
        ]);
        $inqueryq->save();
        //dd($inqueryq);
        //echo "Added";
        return redirect('/inquery')->with('success','Inquery Information Has Been Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inquirydata = inquery::where('id','=',$id)->first();
        return view('Inquery.show',compact('inquirydata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loan_type_data = DB::table('loan_types')->select('id','title','status')->get();
        $inquirydata = inquery::where('id','=',$id)->first();
        //dd($inquirydata);
        return view('Inquery.edit',compact('inquirydata','loan_type_data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inquiry = inquery::where('id',$id)->first();
        $inquiry->first_name = $request->get('first_name');
        $inquiry->last_name = $request->get('last_name');
        $inquiry->email = $request->get('email');
        $inquiry->address = $request->get('address');
        $inquiry->status = $request->get('status');
        $inquiry->mobile_no = $request->get('mobile_no');
        $inquiry->loan_type_id = $request->get('loan_type_id');
        

        $inquiry->save();
        return redirect('/inquery')->with('success','Inquiry Information Has Been Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        inquery::find($id)->delete();
        return redirect('/inquery')->with('success','Inquery Information Has Been Deleted Successfully!');
    }
}
