<?php

namespace App\Http\Controllers;
use App\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'experience'=>request('experience'),
            'address'=>request('address'),
            'bio'=>request('bio'),
        ]);
        return redirect()->back()->with('message', 'Your profile has been updated successfully');
    }

    public function coverletter(Request $request){
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter'=>$cover,
        ]);
        return redirect()->back()->with('message', 'Your cover letter has been updated successfully');
    }

     public function resume(Request $request){
        $user_id = auth()->user()->id;
        $resume = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume'=>$resume,
        ]);
        return redirect()->back()->with('message', 'Your resume has been updated successfully');
    }

    
     public function avatar(Request $request){
        $user_id = auth()->user()->id;

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('uploads/avatar', $filename);
            Profile::where('user_id', $user_id)->update([
            'avatar'=>$filename,
            ]);
            return redirect()->back()->with('message', 'Your profile picture has been updated successfully');
        }
    }


    
}