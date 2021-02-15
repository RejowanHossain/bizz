@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (empty(Auth::user()->profile->avatar)))
                <img src="{{ asset('avatar/avatar.png') }}" alt="avatar" width="100%" height="250px">
            @else
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="avatar" width="100%" height="250px">
            @endif
             <form action="{{ route('profile.avatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Update Profile Picture</h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="avatar" class="form-control">
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
                    <form action="{{ route('profile.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input class="form-control" name="experience" value=" {{ Auth::user()->profile->experience }}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" name="bio">{{ Auth::user()->profile->bio }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address">{{ Auth::user()->profile->address }}</textarea>
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
                    <h2>User Description </h2>
                </div>
                <div class="card-body">
                    <p><b>Name:</b> {{ Auth::user()->name }}</p>
                    <p><b>Email:</b> {{ Auth::user()->email }}</p>
                    <p><b>Bio:</b> {{ Auth::user()->profile->bio }}</p>
                    <p><b>Experience:</b> {{ Auth::user()->profile->experience }}</p>
                    <p><b>Address:</b> {{ Auth::user()->profile->address }}</p>
                    <p><b>Member Since:</b> {{date('F d, Y' , strtotime(Auth::user()->created_at)) }}</p>
                    @if (!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}" class="btn btn-info text-white" download="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Download Cover Letter</a></p>
                    @else
                        <p>Please upload your cover letter</p>
                    @endif

                    @if (!empty(Auth::user()->profile->resume))
                        <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}" class="btn btn-info text-white">Download Resume</a></p>
                    @else
                        <p>Please upload your resume</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('profile.coverletter') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Update Cover Letter </h2>
                    </div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" class="form-control">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
            <form action="{{ route('profile.resume') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Update Resume </h2>
                    </div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" class="form-control">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
