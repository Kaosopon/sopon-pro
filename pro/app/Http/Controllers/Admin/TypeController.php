<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TypeController extends Controller
{
    public function index(){
        $type = Type::all();
        return view('admin.type.index' , compact('type'));
    }

    public function add(){
        return view('admin.type.add_type');
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:Types|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|file'
        ],
        [
            'name.required' => 'กรุณกรอกประเภทสินค้า',
            'name.unique' => 'มีประเภทสินค้านี้แล้ว',
            'name.max:255' => 'กรอกเกิน 255 ตัวอักษร',
            'image.mimes' => 'อัพโหลดรูปภาพได้เฉพาะ jpeg,jpg,png,gif เท่านั้น',
            'image.file' => 'อัพโหลดได้เฉพาะไลฟ์รูปภาพ',
        ]
        );

        $create_type = new Type;
        $create_type->name = $request->name;

        if($request->hasFile('image')){
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $create_type->image = $filename;
        }
        else{
            $create_type->image = 'NOPIC.png';
        }

        $create_type->id_user = Auth::user()->id;
        $create_type->save();
        return redirect('/Admin/type');
    }

    public function updateStatus(Request $request)
    {
        $types = type::findOrFail($request->id_type);
        $types->status = $request->status;
        $types->save();

        return response()->json(['success'=>'Status change successfully.']);
    }


    public function edit($id){
        $edit_type = Type::find($id);
        return view('admin.type.edit_type',compact('edit_type'));
    }

    public function update(Request $request, $id_types){

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
            $update_type = Type::find($id_types);
            if ($update_type->image != 'NOPIC.png') {
                File::delete(public_path().'/admin/images/'.$update_type->image);
            }
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $update_type->image = $filename;

            $update_type->name = $request->name;
        }
        else{

            $update_type = Type::find($id_types);
            $update_type->name = $request->name;
        }

        $update_type->save();
        return redirect()->route('type');
    }

    //delete
    public function delete($id_types){
        $delete = Type::find($id_types);
        if ($delete->image != 'NOPIC.png') {
            File::delete(public_path().'/admin/images/'.$delete->image);
        }
        $delete->delete();
        return redirect('/Admin/type');
    }
}
