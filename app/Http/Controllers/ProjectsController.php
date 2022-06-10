<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class ProjectsController extends Controller
{
    public function all_projects()
    {
        $properties         = Property::orderBy('id', 'DESC')->get();
        $properties_count   = Property::orderBy('id', 'DESC')->get()->count();

        return view('admin.all-projects', compact('properties', 'properties_count'));
    }
    public function add_project_view ()
    {
        $properties         = Property::orderBy('id', 'DESC')->get();
        $properties_count   = Property::orderBy('id', 'DESC')->get()->count();

        return view('admin.add-project', compact('properties', 'properties_count'));
    }
    public function add_project(Request $request)
    {
        return $request;
        $name            =  $request->name;
        $property        =  $request->property;
        $project_status  =  $request->project_status;
        $image_title     =  $request->image_title;
        $image           =  $request->image;
        $permitted_chars =  '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug            =  substr(str_shuffle($permitted_chars), 0, 10);

        $request->validate([
            'name'              => 'required|max:150',
            'property'          => 'required',
            'project_status'    => 'required',
            // 'image_title'       => '',
            // 'image'             => '',
        ]);

        $array = [
            'name'           =>  $name,
            'property_id'    =>  $property,
            'project_status' =>  $project_status,
            'image_title'    =>  $image_title,
            'image'          =>  $image,
            'slug'           =>  $slug,
            'url'            =>  $url,
            'status'         =>  $status
        ];

        $create_project = Project::create($array);
        if ($create_project) {
            return redirect('/admin/project/'.$slug.'/details/')->withErrors('project_created');
        }else{
            return back()->withErrors('project_not_created');
        }
    }
}
