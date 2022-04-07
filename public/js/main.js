jQuery(function($){
    $( "#form-method" ).change(function() {
        $("#getdata").attr("method", $(this).val());
    });
});