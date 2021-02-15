@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Job Post</div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   <form action="{{ route('jobs.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label for="Title">Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Title">
                       </div>
                       <div class="form-group">
                           <label for="Roles">Roles</label>
                           <input type="text" name="roles" class="form-control" placeholder="Roles">
                       </div>
                       <div class="form-group">
                           <label for="Position">Position</label>
                           <input type="text" name="position" class="form-control" placeholder="Position">
                       </div>
                       <div class="form-group">
                           <label for="Category">Category</label>
                           <select name="category" class="form-control">
                               @foreach (App\Category::all() as $cat )
                                   <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="Type">Type</label>
                           <select name="type" class="form-control">
                               <option value="Full Time">Full Time</option>
                               <option value="Part Time">Part Time</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="Status">Status</label>
                           <select name="status" class="form-control">
                               <option value="Status">Live</option>
                               <option value="Draft">Draft</option>
                           </select>
                       </div>
                        <div class="form-group">
                           <label for="Description">Description</label>
                           <textarea name="description" class="form-control" placeholder="Description"></textarea>
                       </div>
                       <div class="form-group">
                           <label for="Address">Address</label>
                           <textarea name="address" class="form-control" placeholder="Address"></textarea>
                       </div>
                       {{-- <div class="form-group">
                           <label for="Deadline">Deadline</label>
                           <input type="date" name="deadline" class="form-control">
                       </div> --}}
                       <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
