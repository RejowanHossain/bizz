<?php

namespace App\Http\Controllers;
use App\Company;
use App\Jobs;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($is, Company $company){
        
        return view('company.index', compact('company'));
    }

    public function create(){
        
        return view('company.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'website' => 'required',
            'slogan' => 'required',
            'description' => 'required',
            'phone' => 'required|min:12|numeric',
            'address' => 'required',
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
            'phone'=>request('phone'),
            'address'=>request('address'),
        ]);
        return redirect()->back()->with('message', 'Your company profile has been updated successfully');
    }

    public function coverphoto(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpg,jpeg,JPG,JPEG,png,PNG|max:1024',
           
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_photo')->store('public/files');
        Company::where('user_id', $user_id)->update([
            'cover_photo'=>$cover,
        ]);
        return redirect()->back()->with('message', 'Company cover photo has been updated successfully');
    }

     public function logo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:jpg,jpeg,JPG,JPEG,png,PNG|max:1024',
        ]);
        $user_id = auth()->user()->id;

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('uploads/avatar', $filename);
            Company::where('user_id', $user_id)->update([
            'logo'=>$filename,
            ]);
            return redirect()->back()->with('message', 'Company logo has been updated successfully');
        }
    }
}