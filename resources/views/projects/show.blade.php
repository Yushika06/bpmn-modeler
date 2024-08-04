@extends('layouts.app')

@section('content')
    @vite('resources/css/app.css')

    <div class="p-5 h-screen bg-gray-100">
        <h1 class="text-xl mb-2">My Projects</h1>

        <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Date Modified</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($projects as $project)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="font-bold text-blue-500 hover:underline">{{ $project->name }}</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $project->description }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">
                                    <!-- Assume you have a method to get the status name -->
                                    {{ $project->status->name }}
                                </span>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $project->updated_at }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <!-- Add your actions here -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
