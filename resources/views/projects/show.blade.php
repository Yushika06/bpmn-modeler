@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg w-full">
            <h1 class="text-2xl font-bold mb-4">{{ $project->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $project->description }}</p>

            <div class="flex justify-between mb-4">
                <!-- Edit Project Details Button -->
                <button id="editProjectBtn" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit Project Details
                </button>

                @if ($project->modeler)
                    <!-- If a modeler exists, show the Edit button -->
                    <a href="{{ route('modeler.edit', $project->modeler->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit BPMN Modeler
                    </a>
                @else
                    <!-- If no modeler exists, show the Create button -->
                    <a href="{{ route('modeler.create', ['project_id' => $project->id]) }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Create BPMN Modeler
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Edit Project Modal -->
    <div id="editProjectModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg w-full">
            <h1 class="text-2xl font-bold mb-4">Edit Project Details</h1>

            <form id="editProjectForm" action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Project Name:</label>
                    <input type="text" id="name" name="name" value="{{ $project->name }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                    <textarea id="description" name="description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $project->description }}</textarea>
                </div>

                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Project</button>
                    <button type="button" id="closeModalBtn"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editProjectBtn = document.getElementById('editProjectBtn');
            const editProjectModal = document.getElementById('editProjectModal');
            const closeModalBtn = document.getElementById('closeModalBtn');

            editProjectBtn.addEventListener('click', function() {
                editProjectModal.classList.remove('hidden');
                editProjectModal.classList.add('flex');
            });

            closeModalBtn.addEventListener('click', function() {
                editProjectModal.classList.add('hidden');
                editProjectModal.classList.remove('flex');
            });
        });
    </script>
@endsection
