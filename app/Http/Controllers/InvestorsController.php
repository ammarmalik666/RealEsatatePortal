<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor;
use App\Models\Property;

class InvestorsController extends Controller
{
    public function all_investors()
    {
        $investors = Investor::orderBy('id', 'DESC')->get();
        $investors_count = Investor::orderBy('id', 'DESC')->get()->count();
        return view('admin.all-investors', compact('investors', 'investors_count'));
    }
    public function investor_details($id)
    {
        $investor = Investor::where('id', $id)->orderBy('id', 'DESC')->get();
        $investors_count = Investor::where('id', $id)->orderBy('id', 'DESC')->get()->count();
        if ($investors_count == 0) {
            return redirect('/admin/investors');
        }else{
            return view('admin.investor-details', compact('investor'));
        }
    }
    public function add_investor_view()
    {
        $properties = Property::orderBy('id', 'DESC')->get();
        // return $properties;
        return view('admin.add-investors', compact('properties'));
    }
    public function add_investor(Request $request)
    {
        $first_name     =   $request->first_name;
        $last_name      =   $request->last_name;
        $username       =   $request->username;
        $password       =   $request->password;
        $cell_phone     =   $request->cell_phone;
        $landline_phone =   $request->landline_phone;
        $address_line_1 =   $request->address_line_1;
        $address_line_2 =   $request->address_line_2;
        $city           =   $request->city;
        $state          =   $request->state;
        $zip            =   $request->zip;
        $property_arry  =   $request->property;
        $property       =   implode(",",$property_arry);
        $b_crypyt_pass  =   bcrypt($password);
        $status         =   1;
        
        // return $string;
        $request->validate([
            'first_name'        => 'required|regex:/^[a-zA-Z]+$/u||max:32',
            'last_name'         => 'required|regex:/^[a-zA-Z]+$/u||max:32',
            'username'          => 'required|unique:investors|email|max:255',
            'password'          => 'required|min:6|max:14',
            'cell_phone'        => 'required|max:18',
            'landline_phone'    => 'max:18',
            'address_line_1'    => 'max:150',
            'address_line_2'    => 'max:150',
            'city'              => 'max:18',
            'state'             => 'max:18',
            'zip'               => 'max:8'
        ]);

        $array = [
            'first_name'        =>      $first_name,
            'last_name'         =>      $last_name,
            'username'          =>      $username,
            'password'          =>      $b_crypyt_pass,
            'cell_phone'        =>      $cell_phone,
            'landline_phone'    =>      $landline_phone,
            'address_line_1'    =>      $address_line_1,
            'address_line_2'    =>      $address_line_2,
            'city'              =>      $city,
            'state'             =>      $state,
            'zip'               =>      $zip,
            'property'          =>      $property,
            'status'            =>      $status
        ];

        $create_investor = Investor::create($array);

        if ($create_investor) {
                return back()->withErrors('investor_created');
        }else{
            return back()->withErrors('investor_not_created');
        }
        // return $b_crypyt_pass;
    }
    public function edit_investor_view($id)
    {
        $investor = Investor::where('id', $id)->orderBy('id', 'DESC')->get();
        $investors_count = Investor::where('id', $id)->orderBy('id', 'DESC')->get()->count();
        $properties = Property::orderBy('id', 'DESC')->get();
        if ($investors_count == 0) {
            return redirect('/admin/investors');
        }else{
            return view('admin.edit-investors', compact('investor', 'properties'));
        }
    }
    public function update_investor(Request $request)
    {
        $investor_id   =   $request->id;
        $first_name     =   $request->first_name;
        $last_name      =   $request->last_name;
        $cell_phone     =   $request->cell_phone;
        $landline_phone =   $request->landline_phone;
        $address_line_1 =   $request->address_line_1;
        $address_line_2 =   $request->address_line_2;
        $city           =   $request->city;
        $state          =   $request->state;
        $zip            =   $request->zip;
        $property_arry  =   $request->property;
        $property       =   implode(",",$property_arry);
        
        $request->validate([
            'first_name'        => 'required|regex:/^[a-zA-Z]+$/u||max:32',
            'last_name'         => 'required|regex:/^[a-zA-Z]+$/u||max:32',
            'cell_phone'        => 'required|max:18',
            'landline_phone'    => 'max:18',
            'address_line_1'    => 'max:150',
            'address_line_2'    => 'max:150',
            'city'              => 'max:18',
            'state'             => 'max:18'
        ]);

        $array = [
            'first_name'        =>      $first_name,
            'last_name'         =>      $last_name,
            'cell_phone'        =>      $cell_phone,
            'landline_phone'    =>      $landline_phone,
            'address_line_1'    =>      $address_line_1,
            'address_line_2'    =>      $address_line_2,
            'city'              =>      $city,
            'state'             =>      $state,
            'zip'               =>      $zip,
            'property'          =>      $property
        ];

        $update_investor = Investor::where('id', $investor_id)->update($array);

        if ($update_investor) {
                return redirect('/admin/investors')->withErrors('investor_updated');
        }else{
            return back()->withErrors('investor_not_updated');
        }
    }
    public function ban_investor(Request $request)
    {
        $investor_id   =   $request->id;
        $status        =   0;

        $array = [
            'status' =>      $status
        ];

        $ban_investor = Investor::where('id', $investor_id)->update($array);

        if ($ban_investor) {
                return back()->withErrors('investor_banned');
        }else{
            return back()->withErrors('unknownError');
        }
    }
    public function active_investor(Request $request)
    {
        $investor_id   =   $request->id;
        $status        =   1;

        $array = [
            'status' =>      $status
        ];

        $active_investor = Investor::where('id', $investor_id)->update($array);

        if ($active_investor) {
                return back()->withErrors('investor_active');
        }else{
            return back()->withErrors('unknownError');
        }
    }
}
