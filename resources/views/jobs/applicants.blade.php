@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($applicants as $applicant)
                <div class="card">
                    <div class="card-header">{{ $applicant->title }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                {{-- <th>Phone</th> --}}
                                <th>Resume</th>
                                <th>Cover</th>
                            </thead>
                            @foreach ($applicant->users as $user )
                                <tbody>
                                    <tr>
                                        <td><img src="{{ $user->profile->avatar }}"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->profile->address }}</td>
                                        {{-- <td>{{ $user->profile->phone_number }}</td> --}}
                                        <td><a class="btn btn-info btn-sm" href="{{ Storage::url($user->profile->resume) }}">Download Resume</a></td>
                                        <td><a class="btn btn-info btn-sm" href="{{ Storage::url($user->profile->cover_letter) }}">Download Cover Letter</a></td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
