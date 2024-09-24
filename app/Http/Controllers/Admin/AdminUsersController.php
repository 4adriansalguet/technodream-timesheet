<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    public function index(){
        $users = User::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.pages.users.index', compact(['users']));
    }

    public function ShowAddUser(){
        return view('admin.pages.users.add');
    }

    public function StoreUser(Request $request){
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required|in:Male,Female',
            'avatar' => 'mimes:jpg,png',
            'role' => 'required|in:Admin,HR,Employee',
            'position' => 'required|in:Programmer,Project Manager,SEO,SMM,PULS,QA,Sales,Call Center',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $like = scandir('td-assets/users/avatar');
        foreach ($like as $thisFile) {
            $rs = User::where('avatar', $thisFile)->first();
            if (!$rs) {
                if($thisFile != "." and $thisFile != ".."){
                        unlink ('td-assets/users/avatar/' . $thisFile);
                }
            }
        }

        if(!empty($request->avatar)){
            $avatar = uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('td-assets/users/avatar'), $avatar);
        }else{
            $avatar = NULL;
        }
        $qrCodeUniqueID = $request->email .'-'. uniqid();

        $storeUser = User::create([
            'name' => ucfirst($request->firstname) .' '.ucfirst($request->middlename) .' '.ucfirst($request->lastname),
            'firstname' => ucfirst($request->firstname),
            'middlename' => ucfirst($request->middlename),
            'lastname' => ucfirst($request->lastname),
            'email' => $request->email,
            'gender' => ucfirst($request->gender),
            'role' => ucfirst($request->role),
            'position' => ucfirst($request->position),
            'avatar' => $avatar,
            'qrcode' => $qrCodeUniqueID,
            'password' => Hash::make($request->password)
        ]);

        if($storeUser){
            $qrcodes = scandir('td-assets/users/qrcodes');
            foreach ($qrcodes as $qrcodeFile) {
                $rs = User::where('qrcode', $qrcodeFile)->first();
                if (!$rs) {
                    if($qrcodeFile != "." and $qrcodeFile != ".."){
                            unlink ('td-assets/users/qrcodes/' . $qrcodeFile);
                    }
                }
            }
            QrCode::format('png')->merge('td-logo.png', .3, true)->style('round')->eye('circle')->color(41, 79, 179)->size(300)->generate($qrCodeUniqueID, '../public/td-assets/users/qrcodes/'.$qrCodeUniqueID.'.png');
            return back()->with('message', ucfirst($request->firstname) .' '.ucfirst($request->lastname) . ' is now a new user.');
        }
    }
}
