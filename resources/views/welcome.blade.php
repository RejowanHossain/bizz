@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
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
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
       <a href="{{ route('alljobs') }}">
            <button class="btn btn-primary btn-lg" width="100%">Browse All Jobs</button>
       </a>
    </div> 
    <h1 class="mt-5">Featured Company</h1>
        <div class="container">
            <div class="row">
                @foreach ($companies as $company )
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $company->cname }}</h5>
                                <p class="card-text">{{ str_limit($company->description, 20) }}</p>
                                <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-primary">Visit Company</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>

@endsection
