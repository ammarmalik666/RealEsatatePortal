<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function all_properties()
    {
        $properties         = Property::orderBy('id', 'DESC')->get();
        $properties_count   = Property::orderBy('id', 'DESC')->get()->count();

        return view('admin.all-properties', compact('properties', 'properties_count'));
    }
    public function property_details($slug)
    {
        $property = Property::where('slug', $slug)->orderBy('id', 'DESC')->get();
        $property_count = Property::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        if ($property_count == 1) {
            return view('admin.property-details', compact('property'));
        }else{
            return redirect('/admin/properties');
        }
    }
    public function add_property_view ()
    {
        return view('admin.add-property');
    }
    public function add_property(Request $request)
    {
        // return $request;
        $name                   =   $request->name;
        $address                =   $request->address;
        $city                   =   $request->city;
        $state                  =   $request->state;
        $zip                    =   $request->zip;
        $bedrooms               =   $request->bedrooms;
        $bathrooms              =   $request->bathrooms;
        $square_footage         =   $request->square_footage;
        $lot_acreage            =   $request->lot_acreage;
        $cars_in_garage         =   $request->cars_in_garage;
        $date_acquired          =   $request->date_acquired;
        $acquisition_price      =   $request->acquisition_price;
        $date_completed         =   $request->date_completed;
        $after_renovation_value =   $request->after_renovation_value;
        $sale_date              =   $request->sale_date;
        $sale_price             =   $request->sale_price;
        $property_status        =   $request->property_status;
        $permitted_chars        =   '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug                   =   substr(str_shuffle($permitted_chars), 0, 10);
        $status                 =   1;

        // return $slug;

        $request->validate([
            'name'              => 'required|max:150',
            'address'           => 'required|max:150',
            'city'              => 'required|max:18',
            'state'             => 'required|max:18',
            'zip'               => 'required|max:18',
            'bedrooms'          => 'required|numeric',
            'bathrooms'         => 'required|numeric',
            'square_footage'    => 'required|numeric',
            'lot_acreage'       => 'required|numeric',
            'cars_in_garage'    => 'required|numeric',
        ]);

        $array = [
            'name'                    =>    $name,
            'address'                 =>    $address,
            'city'                    =>    $city,
            'state'                   =>    $state,
            'zip'                     =>    $zip,
            'bedrooms'                =>    $bedrooms,
            'bathrooms'               =>    $bathrooms,
            'square_footage'          =>    $square_footage,
            'lot_acreage'             =>    $lot_acreage,
            'cars_in_garage'          =>    $cars_in_garage,
            'date_acquired'           =>    $date_acquired,
            'acquisition_price'       =>    $acquisition_price,
            'date_completed'          =>    $date_completed,
            'after_renovation_value'  =>    $after_renovation_value,
            'sale_date'               =>    $sale_date,
            'sale_price'              =>    $sale_price,
            'property_status'         =>    $property_status,
            'slug'                    =>    $slug,
            'status'                  =>    $status,
        ];

        $create_property = Property::create($array);

        if ($create_property) {
            return redirect('/admin/property/'.$slug.'/update/pictures')->withErrors('property_created');
        }else{
            return back()->withErrors('property_not_created');
        }
    }
    public function update_property_images($slug)
    {
        $property = Property::where('slug', $slug)->orderBy('id', 'DESC')->get();
        $property_count = Property::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        if ($property_count == 1) {
            return view('admin.update-property-pictures', compact('property'));
        }else{
            return redirect('/admin/properties');
        }
    }
    public function edit_property_view ($slug)
    {
        $property = Property::where('slug', $slug)->orderBy('id', 'DESC')->get();
        $property_count = Property::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        if ($property_count == 1) {
            return view('admin.edit-property', compact('property'));
        }else{
            return redirect('/admin/properties');
        }
    }
    public function update_property(Request $request)
    {
        $slug                   =   $request->slug;
        $property_id            =   $request->id;
        $name                   =   $request->name;
        $address                =   $request->address;
        $city                   =   $request->city;
        $state                  =   $request->state;
        $zip                    =   $request->zip;
        $bedrooms               =   $request->bedrooms;
        $bathrooms              =   $request->bathrooms;
        $square_footage         =   $request->square_footage;
        $lot_acreage            =   $request->lot_acreage;
        $cars_in_garage         =   $request->cars_in_garage;
        $date_acquired          =   $request->date_acquired;
        $acquisition_price      =   $request->acquisition_price;
        $date_completed         =   $request->date_completed;
        $after_renovation_value =   $request->after_renovation_value;
        $sale_date              =   $request->sale_date;
        $sale_price             =   $request->sale_price;
        $property_status        =   $request->property_status;

        $request->validate([
            'name'              => 'required|max:150',
            'address'           => 'required|max:150',
            'city'              => 'required|max:18',
            'state'             => 'required|max:18',
            'zip'               => 'required|max:18',
            'bedrooms'          => 'required|numeric',
            'bathrooms'         => 'required|numeric',
            'square_footage'    => 'required|numeric',
            'lot_acreage'       => 'required|numeric',
            'cars_in_garage'    => 'required|numeric',
        ]);

        $array = [
            'name'                    =>    $name,
            'address'                 =>    $address,
            'city'                    =>    $city,
            'state'                   =>    $state,
            'zip'                     =>    $zip,
            'bedrooms'                =>    $bedrooms,
            'bathrooms'               =>    $bathrooms,
            'square_footage'          =>    $square_footage,
            'lot_acreage'             =>    $lot_acreage,
            'cars_in_garage'          =>    $cars_in_garage,
            'date_acquired'           =>    $date_acquired,
            'acquisition_price'       =>    $acquisition_price,
            'date_completed'          =>    $date_completed,
            'after_renovation_value'  =>    $after_renovation_value,
            'sale_date'               =>    $sale_date,
            'sale_price'              =>    $sale_price,
            'property_status'         =>    $property_status
        ];

        $update_property = Property::where('id', $property_id)->update($array);

        if ($update_property) {
                return redirect('/admin/property/'.$slug.'/details')->withErrors('property_updated');
        }else{
            return back()->withErrors('property_not_updated');
        }
    }
}
