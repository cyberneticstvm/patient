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

    $(document).on("click", ".otp", function(e){
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/otp',
            data: {'mobile': $("#mobile").val()},
            success: function(response){
                if(response.trim() == 1){
                    $(".msg").html('OTP sent to mobile number successfully');
                    $("#otp").addClass('fs-6 text-muted').removeClass("otp text-primary fw-bold");
                    counter();
                }else{
                    $(".msg").html(response);
                }
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
function counter(){
    var timerId = setInterval(countdown, 1000);
    var timeLeft = 180;
    var elem = document.getElementById('otp');
    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
            $("#otp").html("Click here to generate OTP").removeClass('fs-6 text-muted').addClass("otp text-primary fw-bold");
        } else {
            elem.innerHTML = "You can resend OTP after "+timeLeft + ' seconds';
            timeLeft--;
        }
    }
}