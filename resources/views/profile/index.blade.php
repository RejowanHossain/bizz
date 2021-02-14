@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('avatar/avatar.png') }}" alt="avatar" width="100px" >
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Update Profile</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <textarea class="form-control" name="experience"  ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" name="bio" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address"  ></textarea>
                    </div>
                    <div class="form-group">
                       <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>User Description </h2>
                </div>
                <div class="card-body">
                    <h5>User Details</h5>
                </div>
            </div>
             <div class="card">
                <div class="card-header">
                    <h2>Update Cover Letter </h2>
                </div>
                <div class="card-body">
                    <input type="file" name="cover_letter" class="form-control">
                     <button class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
             <div class="card">
                <div class="card-header">
                    <h2>Update Resume </h2>
                </div>
                <div class="card-body">
                    <input type="file" name="cover_letter" class="form-control">
                     <button class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
