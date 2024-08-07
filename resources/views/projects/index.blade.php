@extends('layouts.app')

@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @vite('resources/css/app.css')

    <div class="p-20 h-screen bg-gray-100">
        <br />
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newProjectModal">New Project</a>

        <!-- New Project Modal -->
        <div class="modal fade" id="newProjectModal" tabindex="-1" role="dialog" aria-labelledby="newProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newProjectModalLabel">New Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="projectName">Project Name</label>
                                <input type="text" class="form-control" id="projectName" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="projectDescription">Description</label>
                                <textarea class="form-control" id="projectDescription" name="description" rows="3" required></textarea>
                            </div>
                            <!-- Add other necessary fields here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br />
        <h1 class="text-xl mb-2">My Projects</h1>

        <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Date Modified</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($projects as $project)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="{{ route('projects.show', $project->id) }}" class="font-bold text-blue-500 hover:underline">{{ $project->name }}</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $project->description }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">
                                    {{ $project->status->name }}
                                </span>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $project->updated_at }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProjectModal" data-id="{{ $project->id }}">Cancel</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Delete Project Modal -->
<div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProjectModalLabel">Delete Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this project?
            </div>
            <div class="modal-footer">
                <form method="POST" id="deleteProjectForm">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#deleteProjectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var projectId = button.data('id');
        var action = '{{ route('projects.destroy', ':id') }}';
        action = action.replace(':id', projectId);
        $('#deleteProjectForm').attr('action', action);
    });
</script>
@endsection
