@extends('layouts.app')

@section('content')
<div class="flex flex-col h-screen">
    <div class="flex-1" id="canvas" style="border: 1px solid #ccc;"></div>
    <form id="bpmnForm" action="{{ route('modeler.store') }}" method="POST">
        @csrf
        <input type="hidden" name="bpmn" id="bpmnInput">
        <button type="button" id="saveButton" class="hidden">Save</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/bpmn-js@8.5.0/dist/bpmn-modeler.production.min.js"></script>
<script src="{{ asset('js/bpmn-modeler.js') }}"></script>
@endsection
