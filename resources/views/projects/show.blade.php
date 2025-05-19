@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $project->title }}</h1>
        <div>
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$project->image) }}" class="img-fluid rounded-start" alt="{{ $project->title }}" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title mb-3">Project Details</h5>
                    
                    <p class="card-text">
                        <span class="badge bg-{{ $project->status === 'published' ? 'success' : 'warning' }} mb-3">
                            {{ ucfirst($project->status) }}
                        </span>
                    </p>
                    
                    <h6 class="fw-bold">Description:</h6>
                    <p class="card-text">{{ $project->description ?: 'No description provided.' }}</p>
                    
                    @if($project->project_url)
                        <h6 class="fw-bold">Project URL:</h6>
                        <p class="card-text">
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer">
                                {{ $project->project_url }}
                            </a>
                        </p>
                    @endif
                    
                    <p class="card-text">
                        <small class="text-muted">
                            Created: {{ $project->created_at->format('F j, Y') }}
                            <br>
                            Last updated: {{ $project->updated_at->format('F j, Y') }}
                        </small>
                    </p>

                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete this project?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection