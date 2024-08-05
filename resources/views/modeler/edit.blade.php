@extends('layouts.app')

@section('content')
<div class="flex flex-col h-screen">
    <div class="flex-1" id="canvas" style="border: 1px solid #ccc;"></div>
    <form id="bpmnForm" action="{{ route('modeler.update', $modeler->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="bpmn" id="bpmnInput">
        <button type="button" id="saveButton" class="hidden">Save</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/bpmn-js@8.5.0/dist/bpmn-modeler.production.min.js"></script>
<script src="{{ asset('js/bpmn-modeler.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bpmnModeler = new BpmnJS({
            container: '#canvas'
        });

        fetch("{{ asset('bpmn/' . $modeler->bpmn) }}")
            .then(response => response.text())
            .then(xml => bpmnModeler.importXML(xml))
            .catch(err => console.error('Error loading BPMN diagram:', err));
    });
</script>
@endsection
