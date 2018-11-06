@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ request()->tenant()->name }} projects</div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($projects as $project)
                                <a href="{{ route('projects.show', $project) }}" class="list-group-item"> {{ $project->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
