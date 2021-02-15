@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="company-profile">
               @if (empty(Auth::user()->company->cover_photo))
                <img src="{{ asset('avatar/avatar.png') }}" alt="avatar" width="100%" height="250px">
            @else
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->company->cover_photo }}" alt="avatar" width="100%" height="450px">
            @endif
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="company-desc mt-3">
                @if (empty(Auth::user()->company->logo))
                    <img src="{{ asset('avatar/avatar.png') }}" alt="avatar" width="100%" height="250px">
                @else
                    <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->company->logo }}" alt="avatar" height="250px">
                @endif
                <h1>Company Name: {{ $company->cname }}</h1>
                <p><b class="f-20">Company Details:</b> {{ $company->description }}</p>
                <p><b>Slogan:</b> {{ $company->slogan }}</p> 
                <p><b>Address:</b> {{ $company->address }}</p> 
                <p><b>Contact:</b> {{ $company->phone }}</p> 
                <p><b>Website:</b> {{ $company->website }}</p>
            </div>
            <table class="table">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($company->jobs as $job )
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
    </div>
</div>
@endsection
