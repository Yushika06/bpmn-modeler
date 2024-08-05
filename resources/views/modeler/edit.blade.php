@extends('layouts.app')

@section('content')
    <div class="flex flex-col h-screen">
        <div class="flex-grow">
            <div id="bpmn-container" class="h-full"></div>
        </div>
        <div class="p-4">
            <form id="bpmnForm" action="{{ route('modeler.update', $modeler->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="bpmnXml" id="bpmnXmlInput">
                <input type="text" name="fileName" value="{{ old('fileName', $modeler->fileName ?? '') }}" placeholder="Enter filename" class="border rounded p-2 mr-2">
                <button type="button" id="saveButton" class="bg-blue-500 text-white py-2 px-4 rounded">
                    Save BPMN
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/bpmn-js@latest/dist/bpmn-modeler.development.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const bpmnContainer = document.getElementById('bpmn-container');
            const modeler = new BpmnJS({
                container: bpmnContainer,
                keyboard: { bindTo: window }
            });

            try {
                const bpmnXml = {!! json_encode($modeler->xml_content) !!};
                await modeler.importXML(bpmnXml);

                // Save the BPMN XML when form is submitted
                document.getElementById('saveButton').addEventListener('click', async () => {
                    const { xml } = await modeler.saveXML({ format: true });
                    document.getElementById('bpmnXmlInput').value = xml;
                    document.getElementById('bpmnForm').submit();
                });
            } catch (err) {
                console.error('Error loading BPMN diagram:', err);
            }
        });
    </script>
@endsection
