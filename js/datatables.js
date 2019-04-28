$(document).ready(function () {
    $('#categoryTable').dataTable();
    $('#postTable').dataTable();
});
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );

function confirmMessage() {
    return confirm("Are you sure to delete?");
}