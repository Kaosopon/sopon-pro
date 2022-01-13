<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view('admin.menu.index',compact('menu'));
    }

    public function add(){
        $Type = Type::all();
        return view('admin.menu.add_menu',compact('Type'));
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|file'
        ],
        [
            'name.required' => 'กรุณกรอกชื่อเมนู',
            'type.required' => 'กรุณเลือกประเภท',
            'image.mimes' => 'อัพโหลดรูปภาพได้เฉพาะ jpeg,jpg,png,gif เท่านั้น',
            'image.file' => 'อัพโหลดได้เฉพาะไลฟ์รูปภาพ',
        ]
        );

        $create_menu = new Menu;
        $create_menu->text = $request->name;
        $create_menu->id_type = $request->type;


        if($request->hasFile('image')){
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $create_menu->image = $filename;
        }
        else{
            $create_menu->image = 'NOPIC.png';
        }

        $create_menu->id_user = Auth::user()->id;
        $create_menu->save();
        return redirect()->route('menu');
    }

    public function updateStatus(Request $request)
    {
        $menu = Menu::findOrFail($request->id_menu);
        $menu->status = $request->status;
        $menu->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function edit($id){
        $menu_ = Menu::find($id);
        return view('admin.menu.edit_menu',compact('menu_',))->with('type_',Type::all());
    }

    public function update(Request $request, $id_menus){

        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|file'
        ],
        [
            'name.required' => 'กรุณกรอกชื่อเมนู',
            'type.required' => 'กรุณเลือกประเภท',
            'image.mimes' => 'อัพโหลดรูปภาพได้เฉพาะ jpeg,jpg,png,gif เท่านั้น',
            'image.file' => 'อัพโหลดได้เฉพาะไลฟ์รูปภาพ',
        ]
        );

        if($request->hasFile('image')){
            $update_menu = Menu::find($id_menus);
            if ($update_menu->image != 'NOPIC.png') {
                File::delete(public_path().'/admin/images/'.$update_menu->image);
            }
            $filename = Str::random(10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/admin/images/',$filename);
            $update_menu->image = $filename;

            $update_menu->text = $request->name;
            $update_menu->id_type = $request->type;
        }
        else{

            $update_menu = Menu::find($id_menus);
            $update_menu->text = $request->name;
            $update_menu->id_type = $request->type;
        }

        $update_menu->save();
        return redirect()->route('menu');
    }

    //delete
    public function delete($id_menus){
        $delete = Menu::find($id_menus );
        if ($delete->image != 'NOPIC.png') {
            File::delete(public_path().'/admin/images/'.$delete->image);
        }
        $delete->delete();
        return redirect('/Admin/menu');
    }
}
