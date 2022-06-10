<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenovationGallery;

class AdminsController extends Controller
{
    public function renovation_gallery_view($value='')
    {
        $gallery = RenovationGallery::orderBy('id', 'DESC')->get();
        $gallery_count = RenovationGallery::orderBy('id', 'DESC')->get()->count();
        return view('admin.renovation-gallery', compact('gallery', 'gallery_count'));
    }
    public function gallery_image_detail($slug)
    {
        $gallery = RenovationGallery::where('slug', $slug)->orderBy('id', 'DESC')->get();
        $gallery_count = RenovationGallery::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        if ($gallery_count == 1) {
            return view('admin.renovation-gallery-details', compact('gallery', 'gallery_count'));
        }else{
            return redirect('/admin/renovation-gallery');   
        }
        
    }
    public function add_renovation_gallery(Request $request)
    {
        // return $request;
        $title           =  $request->title;
        $image           =  $request->image;
        $description     =  $request->description;
        $permitted_chars =  '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug            =  substr(str_shuffle($permitted_chars), 0, 10);
        $url             =  str_replace(' ', '-', strtolower($title));
        $status          =  1;
        
        $request->validate([
            'title'       => 'max:200',
            'image'       => 'required|mimes:jpeg,jpg,png|max:3000',
            'description' => 'max:10000',
        ]);

        if($request->hasfile('image')) {

            $file = $request->file('image');
            $orignal_name = $file->getClientOriginalName();
            $name = time().rand(1,100000000).'.'.$file->extension();
            $move_file = $file->move(public_path().'/uploads/renovation-gallery/', $name);  
            $array = [
                'title'       => $title,
                'image'       => $name,
                'description' => $description,
                'slug'        => $slug,
                'url'         => $url,
                'status'      => $status,
            ];
            $create_gallery = RenovationGallery::create($array);
            if ($create_gallery) {
                return back()->withErrors('gallery_image_created');
            }else{
                return back()->withErrors('gallery_image_not_created');
            }
        }else{
            return back()->withErrors('unknownError');
        }
    }
    public function gallery_image_edit_view($slug)
    {
        $gallery = RenovationGallery::where('slug', $slug)->orderBy('id', 'DESC')->get();
        $gallery_count = RenovationGallery::where('slug', $slug)->orderBy('id', 'DESC')->get()->count();
        if ($gallery_count == 1) {
            return view('admin.edit-renovation-gallery', compact('gallery', 'gallery_count'));
        }else{
            return redirect('/admin/renovation-gallery');   
        }
    }
    public function update_renovation_gallery(Request $request)
    {
        // return $request;
        $id              =  $request->id;
        $slug            =  $request->slug;
        $title           =  $request->title;
        $image           =  $request->image;
        $description     =  $request->description;
        $url             =  str_replace(' ', '-', strtolower($title));  


        
        if ($image == "" || $image == NULL) {
            
            $request->validate([
                'title'       => 'max:200',
                'description' => 'max:10000',
            ]);

            $array = [
                'title'       => $title,
                'description' => $description,
                'url'         => $url,
            ];
            
            $update_gallery = RenovationGallery::where('id', $id)->update($array);
            
            if ($update_gallery) {
                return redirect('/admin/renovation-gallery/'.$slug.'/details')->withErrors('gallery_image_updated');
            }else{
                return back()->withErrors('gallery_image_not_updated');
            }

        }else{

            $request->validate([
                'title'       => 'max:200',
                'image'       => 'required|mimes:jpeg,jpg,png|max:3000',
                'description' => 'max:10000',
            ]);
            
            if($request->hasfile('image')) {
                
                $old_image_details = RenovationGallery::where('id', $id)->orderBy('id', 'DESC')->get();
                $old_filename = $old_image_details[0]->image;
                $old_file_path = public_path().'/uploads/renovation-gallery/'.$old_filename;
                $delete_old_image = File::delete($old_file_path);


                $file = $request->file('image');
                $orignal_name = $file->getClientOriginalName();
                $name = time().rand(1,100000000).'.'.$file->extension();
                $move_file = $file->move(public_path().'/uploads/renovation-gallery/', $name); 

                $array = [
                    'title'       => $title,
                    'image'       => $name,
                    'description' => $description,
                    'url'         => $url,
                ];

                $update_gallery = RenovationGallery::where('id', $id)->update($array);
                
                if ($update_gallery) {
                    return redirect('/admin/renovation-gallery/'.$slug.'/details')->withErrors('gallery_image_updated');
                }else{
                    return back()->withErrors('gallery_image_not_updated');
                }

            }else{
                return back()->withErrors('unknownError');
            }
        }
            
    }
    public function archive_gallery(Request $request)
    {
        $image_id   =   $request->id;
        $status     =   0;

        $array = [
            'status' =>      $status
        ];

        $archive_gallery = RenovationGallery::where('id', $image_id)->update($array);

        if ($archive_gallery) {
                return back()->withErrors('archived_gallery');
        }else{
            return back()->withErrors('unknownError');
        }
    }
    public function active_renovation_gallery (Request $request)
    {
        $image_id   =   $request->id;
        $status     =   1;

        $array = [
            'status' =>      $status
        ];

        $active_gallery = RenovationGallery::where('id', $image_id)->update($array);

        if ($active_gallery) {
                return back()->withErrors('active_gallery');
        }else{
            return back()->withErrors('unknownError');
        }
    }
}
