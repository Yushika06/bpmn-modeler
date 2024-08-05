document.addEventListener('DOMContentLoaded', function() {
    const bpmnModeler = new BpmnJS({
        container: '#canvas'
    });

    // Create an empty BPMN diagram
    const emptyDiagram = '<?xml version="1.0" encoding="UTF-8"?><bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" xsi:schemaLocation="http://www.omg.org/spec/BPMN/20100524/MODEL BPMN20.xsd" id="Definitions_1"><bpmn:process id="Process_1" isExecutable="false"><bpmn:startEvent id="StartEvent_1"/></bpmn:process><bpmndi:BPMNDiagram id="BPMNDiagram_1"><bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Process_1"><bpmndi:BPMNShape id="StartEvent_1_di" bpmnElement="StartEvent_1"><dc:Bounds x="173" y="102" width="36" height="36"/></bpmndi:BPMNShape></bpmndi:BPMNPlane></bpmndi:BPMNDiagram></bpmn:definitions>';

    // Import the empty diagram or existing diagram for edit view
    if (document.querySelector('#bpmnForm').action.includes('update')) {
        fetch("{{ asset('bpmn/' . $modeler->bpmn) }}")
            .then(response => response.text())
            .then(xml => bpmnModeler.importXML(xml))
            .catch(err => console.error('Error loading BPMN diagram:', err));
    } else {
        bpmnModeler.importXML(emptyDiagram, function(err) {
            if (err) {
                console.error('Error importing BPMN diagram', err);
            }
        });
    }

    // Save button functionality
    document.getElementById('saveButton').addEventListener('click', function() {
        bpmnModeler.saveXML({ format: true }, function(err, xml) {
            if (err) {
                console.error('Error saving BPMN diagram', err);
            } else {
                document.getElementById('bpmnInput').value = xml;
                document.getElementById('bpmnForm').submit();
            }
        });
    });
});






// import BpmnModeler from 'bpmn-js/lib/Modeler';

// const modeler = new BpmnModeler({
//   container: '#canvas',
//   keyboard: {
//     bindTo: window
//   }
// });

// // Create a new empty BPMN diagram
// const newDiagramXML = `
// <?xml version="1.0" encoding="UTF-8"?>
// <bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
//                   xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL"
//                   xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI"
//                   xmlns:dc="http://www.omg.org/spec/DD/20100524/DC"
//                   targetNamespace="http://bpmn.io/schema/bpmn">
//   <bpmn:process id="Process_1" isExecutable="false">
//     <bpmn:startEvent id="StartEvent_1"/>
//   </bpmn:process>
//   <bpmndi:BPMNDiagram id="BPMNDiagram_1">
//     <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Process_1">
//       <bpmndi:BPMNShape id="StartEvent_1_di" bpmnElement="StartEvent_1">
//         <dc:Bounds x="173" y="102" width="36" height="36"/>
//       </bpmndi:BPMNShape>
//     </bpmndi:BPMNPlane>
//   </bpmndi:BPMNDiagram>
// </bpmn:definitions>`;

// modeler.importXML(newDiagramXML, (err) => {
//   if (err) {
//     console.error('Error importing BPMN diagram', err);
//   } else {
//     console.log('BPMN diagram imported successfully');
//   }
// });
