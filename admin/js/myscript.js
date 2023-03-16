$('#feedback_table').DataTable();
$('#baker_table').DataTable();
$('#contact_table').DataTable();
$('#promotion_table').DataTable();

$('#order_table').DataTable();
$('#category_table').DataTable();

$('#product_table').DataTable();

//$('#report_table_one').DataTable();
//$('#report_table_two').DataTable();
//$('#report_table_three').DataTable();
//$('#report_table_four').DataTable(); 

$('#size_table').DataTable();
$('#cream_table').DataTable();
$('#toy_table').DataTable();

$(document).ready(function () {
    $('#report_table_three').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

$(document).ready(function () {
    $('#report_table_one').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

$(document).ready(function () {
    $('#report_table_two').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

$(document).ready(function () {
    $('#report_table_four').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});




