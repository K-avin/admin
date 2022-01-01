<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;
use DB;
class CustomerController extends Controller
{

    public function customersIndex()
    {
        $customers = Customer::all();                 
        // dd($users);
        return view('admin/customer/index', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customer',
            'password' => 'required|min:5|max:8',
        ]);

        // Customer::create($request->all());

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $save = $customer->save();

        if($save){
            return response()->json(['message' => 'registration successfully completed!']);
        }else {
            return response()->json(['fail' => 'Somethig went wrong try agin!']);
        }
        
    }

    public function customerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:8',
        ]);

        $custInfo = Customer::where('email','=', $request->email)->first();
            
            if(!$custInfo){
                return response()->json(['fail' => 'we do not recognized your email address']);
            }else {

                if(Hash::check($request->password, $custInfo->password)){
                    // $request->session()->put('LoggedUser', $custInfo->id);
                    if(!$custInfo->staus == 1){
                        return response()->json(['fail' => 'we are deactivaed your account !']);
                    }else {
                        return response()->json([
                            'message' => 'login successfully completed!',
                            'user_id' => $custInfo->id,
                            'name' => $custInfo->name,
                            'email' => $custInfo->email
                        ]);
                    }
                    
                }else {
                    return response()->json(['fail' => 'incorrect password!']);
                }
            }
    }

    public function destroy($id)
    {
        $restaurant = Customer::find($id);
        $restaurant->delete();   
        return back()->with('success', 'Customer has successfully removed!'); 
    }

    public function update(Request $request, $id)
    {
        $data = Customer::find($id);
        $data->update($request->all());
        // return $data;
        return back()->with('success', 'Customer status successfully update');
    }
}
