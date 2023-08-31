$(function(){
    "use strict"

    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $("#dataTable").dataTable();

    $('.select2').select2({
        placeholder: 'Select',
    });

    $(".otp").click(function(e){
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/otp',
            data: {'mobile': $("#mobile").val()},
            success: function(response){
                $(".msg").html(response);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
    });   

});
setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);