<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function all_projects()
    {
        $project_count = Project::orderBy('id', 'DESC')->get()->count();
        $projects      = Project::orderBy('id', 'DESC')->get();
        
        foreach($projects as $obj)
        {
            $id = $obj->property_id;

            $properties = Property::where('id', $id)->orderBy('id', 'DESC')->get();

            $obj['property'] = $properties;
        }
        return view('admin.all-projects', compact('projects', 'project_count'));
    }
    public function project_details ($slug)
    {
        $project_count = Project::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        
        if ($project_count == 1) {
            $project      = Project::where('slug', $slug)->orderBy('id', 'DESC')->get();
            foreach($project as $obj)
            {
                $id = $obj->property_id;

                $properties = Property::where('id', $id)->orderBy('id', 'DESC')->get();

                $obj['property'] = $properties;
            }
            return view('admin.project-details', compact('project', 'project_count'));
        }else{
            return redirect('/admin/projects');
        }
    }
    public function add_project_view ()
    {
        $properties         = Property::orderBy('id', 'DESC')->get();
        $properties_count   = Property::orderBy('id', 'DESC')->get()->count();

        return view('admin.add-project', compact('properties', 'properties_count'));
    }
    public function add_project(Request $request)
    {
        // return $request;
        $name            =  $request->name;
        $property        =  $request->property;
        $project_status  =  $request->project_status;
        $image_title     =  $request->image_title;
        $image           =  $request->image;
        $permitted_chars =  '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug            =  substr(str_shuffle($permitted_chars), 0, 10);
        $status          =  1;

        $request->validate([
            'name'              => 'required|max:250',
            'property'          => 'required',
            'project_status'    => 'required',
            // 'image_title'       => '',
            // 'image'             => '',
        ]);

        $array = [
            'name'           =>  $name,
            'property_id'    =>  $property,
            'project_status' =>  $project_status,
            // 'image_title'    =>  $image_title,
            // 'image'          =>  $image,
            'slug'           =>  $slug,
            // 'url'            =>  $url,
            'status'         =>  $status
        ];

        $create_project = Project::create($array);
        if ($create_project) {
            return redirect('/admin/projects/')->withErrors('project_created');
        }else{
            return back()->withErrors('project_not_created');
        }
    }
    public function edit_project_view ($slug)
    {
        $project_count = Project::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        $properties_count = Property::orderBy('id', 'DESC')->get()->count();
        
        if ($project_count == 1) {
            $project      = Project::where('slug', $slug)->orderBy('id', 'DESC')->get();
            foreach($project as $obj)
            {
                $id = $obj->property_id;

                $properties = Property::where('id', $id)->orderBy('id', 'DESC')->get();
                $properties_other = Property::where('id', '!=', $id)->orderBy('id', 'DESC')->get();

                $obj['property'] = $properties;
                $obj['property_other'] = $properties_other;
            }
            // return $project;
            return view('admin.edit-project', compact('project', 'project_count', 'properties_count'));
        }else{
            return redirect('/admin/projects');
        }
    }
    public function update_project(Request $request)
    {
        $id              =  $request->id;
        $name            =  $request->name;
        $property        =  $request->property;
        $project_status  =  $request->project_status;
        $image_title     =  $request->image_title;
        $image           =  $request->image;
        $permitted_chars =  '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug            =  substr(str_shuffle($permitted_chars), 0, 10);

        $request->validate([
            'name'              => 'required|max:250',
            'property'          => 'required',
            'project_status'    => 'required',
            // 'image_title'       => '',
            // 'image'             => '',
        ]);

        $array = [
            'name'           =>  $name,
            'property_id'    =>  $property,
            'project_status' =>  $project_status,
            // 'image_title'    =>  $image_title,
            // 'image'          =>  $image,
            'slug'           =>  $slug,
            // 'url'            =>  $url,
        ];

        $update_project = Project::where('id', $id)->update($array);
        if ($update_project) {
            return redirect('/admin/projects/')->withErrors('project_updated');
        }else{
            return back()->withErrors('project_not_updated');
        }
    }
}
