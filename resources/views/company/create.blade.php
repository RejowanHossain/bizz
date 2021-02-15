@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (empty(Auth::user()->company->logo))
                <img src="{{ asset('avatar/avatar.png') }}" alt="avatar" width="100%" height="250px">
            @else
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->company->logo }}" alt="avatar" width="100%" height="250px">
            @endif
             <form action="{{ route('company.logo') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->has('logo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('logo') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Update Company Logo</h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="logo" class="form-control">
                        <button class="btn btn-primary mt-3">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h2>Update Profile</h2>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('company.store') }}" method="post">
                        @csrf

                        {{-- error exception --}}
                        @if ($errors->has('website'))
                            <div class="alert alert-danger">
                                {{ $errors->first('website') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input class="form-control" name="website" value=" ">
                        </div>
                        {{-- error exception --}}
                        @if ($errors->has('phone'))
                            <div class="alert alert-danger">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" name="phone" value=" ">
                        </div>
                        {{-- error exception --}}
                        @if ($errors->has('slogan'))
                            <div class="alert alert-danger">
                                {{ $errors->first('slogan') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input class="form-control" name="slogan" value=" ">
                        </div>
                        {{-- error exception --}}
                        @if ($errors->has('description'))
                            <div class="alert alert-danger">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        {{-- error exception --}}
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Company Details </h2>
                </div>
                <div class="card-body">
                    <p><b>Company Name:</b> {{ Auth::user()->company->cname }}</p>
                    <p><b>Company Email:</b> {{ Auth::user()->email }}</p>
                    <p><b>Website:</b> {{ Auth::user()->company->website }}</p>
                    <p><b>Phone:</b> {{ Auth::user()->company->phone }}</p>
                    <p><b>Slogan:</b> {{ Auth::user()->company->slogan }}</p>
                    <p><b>Company Profile:</b> <a class="btn btn-info btn-sm" href="company/{{ Auth::user()->company->slug }}">View</a></p> 
                    <p><b>Description:</b> {{ Auth::user()->company->description }}</p>
                    <p><b>Member Since:</b> {{date('F d, Y' , strtotime(Auth::user()->created_at)) }}</p>
                    @if (!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}" class="btn btn-info text-white" download="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Download Cover Letter</a></p>
                    @else
                        <p>Please upload your company logo</p>
                    @endif

                    @if (!empty(Auth::user()->profile->resume))
                        <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}" class="btn btn-info text-white">Download Resume</a></p>
                    @else
                        <p>Please upload your cover photo</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('company.coverphoto') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Update Cover Photo </h2>
                    </div>
                    {{-- error exception --}}
                    @if ($errors->has('cover_photo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('cover_photo') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <input type="file" name="cover_photo" class="form-control">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
            {{-- <form action="{{ route('profile.resume') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Update Resume </h2>
                    </div>
                    @if ($errors->has('resume'))
                        <div class="alert alert-danger">
                            {{ $errors->first('resume') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <input type="file" name="resume" class="form-control">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
</div>
@endsection
