<?php

namespace App\Http\Controllers\Admin;

use App\Source;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SourceController extends Controller
{
    public function index(){
        $source = Source::all();
        return view('admin.source_.index',compact('source'));
    }

    public function add(){
        return view('admin.source_.add_source');
    }

    public function create(Request $request){

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

        $create_source = new Source;
        $create_source->text = $request->name;

        if($request->hasFile('image')){
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $create_source->image = $filename;
        }
        else{
            $create_source->image = 'NOPIC.png';
        }

        $create_source->id_user = Auth::user()->id;
        $create_source->save();
        return redirect('/Admin/source');
    }

    public function updateStatus(Request $request)
    {
        $Sources = Source::findOrFail($request->id_source);
        $Sources->status = $request->status;
        $Sources->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function edit($id){
        $source_ = source::find($id);
        return view('admin.source_.edit_source',compact('source_'));
    }

    public function update(Request $request, $id_source){

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
            $update_source = source::find($id_source);
            if ($update_source->image != 'NOPIC.png') {
                File::delete(public_path().'/admin/images/'.$update_source->image);
            }
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $update_source->image = $filename;

            $update_source->text = $request->name;
        }
        else{

            $update_source = source::find($id_source);
            $update_source->text = $request->name;
        }

        $update_source->save();
        return redirect()->route('source');
    }

        //delete
        public function delete($id_source){
            $delete = Source::find($id_source);
            if ($delete->image != 'NOPIC.png') {
                File::delete(public_path().'/admin/images/'.$delete->image);
            }
            $delete->delete();
            return redirect('/Admin/source');
        }
}
