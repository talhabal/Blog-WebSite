var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/staff.php",
        table: "#example",
        fields: [ {
                label: "First name:",
                name: "first_name"
            }, {
                label: "Last name:",
                name: "last_name"
            }, {
                label: "Position:",
                name: "position"
            }, {
                label: "Office:",
                name: "office"
            }, {
                label: "Extension:",
                name: "extn"
            }, {
                label: "Start date:",
                name: "start_date",
                type: "datetime"
            }, {
                label: "Salary:",
                name: "salary"
            }
        ]
    } );
 
    // Activate an inline edit on click of a table cell
    $('#example').on( 'click', 'tbody td:not(.child)', function (e) {
        // Ignore the Responsive control and checkbox columns
        if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') ) {
            return;
        }
 
        editor.inline( this );
    } );
 
    // Inline editing in responsive cell
    $('#example').on( 'click', 'tbody ul.dtr-details li', function (e) {
        // Edit the value, but this selector allows clicking on label as well
        editor.inline( $('span.dtr-data', this) );
    } );
 
    $('#example').DataTable( {
        responsive: true,
        dom: "Bfrtip",
        ajax: "../php/staff.php",
        columns: [
            {   // Responsive control column
                data: null,
                defaultContent: '',
                className: 'control',
                orderable: false
            },
            {   // Checkbox select column
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "first_name" },
            { data: "last_name", className: 'never' },
            { data: "position" },
            { data: "office" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        order: [ 2, 'asc' ],
        select: {
            style:    'os',
            selector: 'td.select-checkbox'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );