<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   public function profile($userid)
   {
       $user = User::find($userid);
       return view('user/profile', compact('user'));
   }

    public function update(Request $request, $userid)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$userid.'|email|max:255',
            'password' => 'sometimes|nullable|min:6',
            'pswd' => 'same:password',
        ]);

        $user = User::find($userid);
        $user->name = $request->name;
        $user->phone = $request->phone;
        if($request->avatar != null)
            {
                $file = $request->avatar;
                $fName = $file->getClientOriginalName(); // Название изображения
                $file->move(public_path().'/avatar', $fName);
                $user->avatar = $fName;
                $img = Image::make(public_path().'/avatar/'. $fName);
                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path().'/avatar/small/'. $fName);
            };
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
//       dd($request->role);
        return redirect('profile/'. $userid );
    }
}
