<?php

namespace App\Http\Controllers;
use App\Company;
use App\Job;

use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::latest()->limit(10)->get(); 
        $companies = Company::latest()->limit(12)->get();   
        return view('welcome', compact('jobs', 'companies'));
    }

    public function show($id, Job $job){
        return view('jobs.show',compact('job'));
    }
    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id'=> $user_id,
            'company_id'=> $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            // 'last_date' => request('last_date'),
        ]);
        return redirect()->back()->with('message', 'Job posted succesfully');
    }
    public function myjobs(){
       $jobs = Job::where('user_id', auth()->user()->id)->get();
       return view('jobs.myjobs', compact('jobs'));
    }
    public function apply(Request $request, $id){
        $jobId = Job::find($id);
        $jobId->users()->attach(auth()->user()->id);
        return redirect()->back()->with('message', 'Job applied succesfully');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
       return view('jobs.applicants', compact('applicants'));
    }

    public function alljobs(Request $request){
        $keyword = request('title');
        $type = request('type');
        $category = request('category');
        $address = request('address');
    
        if($keyword || $type ||$category || $address){
            $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')
            ->orWhere('type', $type)
            ->orWhere('category_id', $category)
            ->orWhere('address', $address)
            ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }else{
            $jobs =Job::paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }
    }

}