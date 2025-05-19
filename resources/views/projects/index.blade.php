@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>All Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
    </div>

    <div class="row mt-4">
        @forelse($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$project->image) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">
                            <span class="badge bg-{{ $project->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-info">View</a>
                            <div>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No projects found. <a href="{{ route('projects.create') }}">Add your first project</a>.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
@endsection