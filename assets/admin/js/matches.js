jQuery(document).ready(function($) {
    $('#matchesTable').DataTable({
        dom: 'Bfrtip',
		buttons: [
	        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );;