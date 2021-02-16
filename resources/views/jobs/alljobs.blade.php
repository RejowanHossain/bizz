@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <form action="{{ route('alljobs') }}" method="get">
            <div class="form-inline mb-5">
                <div class="form-group mr-2">
                    <label for="Keyword">Keyword</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group mr-2">
                    <label for="">Employment Type</label>
                    <option value="">Select Type</option>
                    <select name="type" class="form-control">
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </div>
                <div class="form-group mr-2">
                    <label for="Category">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach (App\Category::all() as $cat )
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-2">
                    <label for="Address">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group ">
                    <button class="btn btn-info">Search</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($jobs as $job )
                    <tr>
                        <td>
                            <img src="{{ asset('avatar/avatar.png') }}" alt="avatar" width="50px">
                        </td>
                        <td>
                            Position: {{ $job->position }}
                            <br>
                            <i class="fa fa-clock"></i> Job Type: {{ $job->type }}
                        </td>
                        <td>
                            <i class="fa fa-map-marker"></i> 
                            Address: {{ $job->address }}
                        </td>
                        <td>
                            <i class="fa fa-calendar"></i> 
                            Date: {{ $job->created_at->diffForHumans() }}
                        </td>
                        <td>
                            <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                                <button type="submit" class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $jobs->links() }}
    </div>
    <div>
    </div> 
</div>

@endsection
