@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card-header">{{ $job->title }}</div>
                <div class="card-body">
                   <h3>Description</h3>
                   <p>{{ $job->description }}</p>
                   <h3>Duties</h3>
                   <p>{{ $job->roles }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>
                <div class="card-body">
                   <h3>
                        <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">
                            {{ $job->company->cname }}
                        </a>
                    </h3>
                   <p>Address: {{ $job->address }}</p>
                   <p>Position: {{  $job->position }}</p>
                   <p>Esrimated: {{  $job->last_date }}</p>
                   @if (!$job->checkApplication())
                       @if (Auth::user()->user_type == 'seeker')
                        <form action="{{ route('jobs.apply', [$job->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Apply</button>
                        </form>
                    @endif
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
