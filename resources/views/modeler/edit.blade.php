@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@17.9.0/dist/assets/bpmn-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@17.9.0/dist/assets/diagram-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@17.9.0/dist/assets/bpmn-font/css/bpmn.css">

    <!-- modeler distro -->
    <script src="https://unpkg.com/bpmn-js@17.9.0/dist/bpmn-modeler.development.js"></script>

    <!-- needed for this example only -->
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>

    <div class="flex flex-col h-screen">
        <div class="flex-grow" style="padding-top: 60px;">
            <div id="bpmn-container" class="h-full bg-gray-200"></div>
        </div>
        <div class="p-4 flex items-center justify-center">
            <form id="bpmnForm" action="{{ route('modeler.update', $modeler->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="bpmnXml" id="bpmnXmlInput">
                <input type="hidden" name="fileName" value="{{ old('fileName', $modeler->fileName ?? '') }}"
                    placeholder="Enter filename" class="border rounded p-2 mr-2">
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
                keyboard: {
                    bindTo: window
                }
            });

            try {
                const bpmnXml = {!! json_encode($bpmnXml) !!};
                await modeler.importXML(bpmnXml);

                // Save the BPMN XML when form is submitted
                document.getElementById('saveButton').addEventListener('click', async () => {
                    const {
                        xml
                    } = await modeler.saveXML({
                        format: true
                    });
                    document.getElementById('bpmnXmlInput').value = xml;
                    document.getElementById('bpmnForm').submit();
                });
            } catch (err) {
                console.error('Error loading BPMN diagram:', err);
            }
        });
    </script>
@endsection
