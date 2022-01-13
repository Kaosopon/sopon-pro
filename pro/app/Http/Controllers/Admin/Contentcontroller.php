<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Contentcontroller extends Controller
{
    public function index(){
        $content = Content::all();
        return view('admin.content.index',compact('content'));
    }

    public function add(){
        return view('admin.content.add_content');
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|file'
        ],
        [
            'name.required' => 'กรุณกรอกหัวข้อ',
            'detail.required' => 'กรุณกรอกรายละเอียด',
            'name.max:255' => 'กรอกเกิน 255 ตัวอักษร',
            'detail.max:255' => 'กรอกเกิน 255 ตัวอักษร',
            'image.mimes' => 'อัพโหลดรูปภาพได้เฉพาะ jpeg,jpg,png,gif เท่านั้น',
            'image.file' => 'อัพโหลดได้เฉพาะไลฟ์รูปภาพ',
        ]
        );

        $create_content = new Content;
        $create_content->headtext = $request->name;
        $create_content->detail = $request->detail;

        if($request->hasFile('image')){
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $create_content->image = $filename;
        }
        else{
            $create_content->image = 'NOPIC.png';
        }

        $create_content->id_user = Auth::user()->id;
        $create_content->save();
        return redirect('/Admin/content');
    }

    public function edit($id){
        $content_ = Content::find($id);
        return view('admin.content.edit_content',compact('content_'));
    }

    public function update(Request $request, $id_content){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|file'
        ],
        [
            'name.required' => 'กรุณกรอกประเภทสินค้า',
            'name.max:255' => 'กรอกเกิน 255 ตัวอักษร',
            'image.mimes' => 'อัพโหลดรูปภาพได้เฉพาะ jpeg,jpg,png,gif เท่านั้น',
            'image.file' => 'อัพโหลดได้เฉพาะไลฟ์รูปภาพ',
        ]
        );

        if($request->hasFile('image')){
            $update_content = Content::find($id_content);
            if ($update_content->image != 'NOPIC.png') {
                File::delete(public_path().'/admin/images/'.$update_content->image);
            }
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $update_content->image = $filename;

            $update_content->headtext = $request->name;
            $update_content->detail = $request->detail;
        }
        else{

            $update_content = Content::find($id_content);
            $update_content->headtext = $request->name;
            $update_content->detail = $request->detail;
        }

        $update_content->save();
        return redirect()->route('content');
    }

    //delete
    public function delete($id_content){
        $delete = Content::find($id_content);
        if ($delete->image != 'NOPIC.png') {
            File::delete(public_path().'/admin/images/'.$delete->image);
        }
        $delete->delete();
        return redirect('/Admin/content');
    }
}
