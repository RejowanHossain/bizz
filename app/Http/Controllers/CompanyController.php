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
}