$(document).ready(function () {

    //script for present address and permanent address same
    //start
    $('.checkbox').change(function () {
        if ($(this).prop('checked')) {
            let present_address = $('.present_address').val();
            if (present_address == '') {
                $('.present_address').css('border', '1px solid red');
            } else {
                $('.permanent_address').val(present_address);
            }
        } else {
            $('.permanent_address').val('');
        }
    });
    //end


    //------------------------------------------------------------------------------
    // for register owner info
    //------------------------------------------------------------------------------
    //validating & submit owner form by ajax
    //start

    $('#driver_registration_form').submit(function (event) {
        event.preventDefault();
        const driverForm = $("#driver_registration_form");
        const ajaxUrl = driverForm.attr('action');
        $("#errors").html('');

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: driverForm.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    swal({
                        title: "Driver Registration Completed.",
                        text: data.message,
                        icon: "success",
                        button: 'Close',
                    });
                    driverForm[0].reset();
                } else {
                    swal({
                        title: "Driver Registration Failed.",
                        text: data.message,
                        icon: "error",
                        button: 'Close',
                        dangerMode: true,
                    });
                    // popup error message

                    $.each(data.errors, function (key, value) {
                        $("#errors").append('<li class="error bounceInRight">' + value + '</li>').fadeIn('slow');
                    });
                }
            }
        })


    });
    //end

    //------------------------------------------------------------------------------
    // for update the owner info
    //------------------------------------------------------------------------------
    //validating & submit owner form by ajax
    //start

    $('#update_owner_form').submit(function (event) {
        event.preventDefault();
        const driverForm = $("#update_owner_form");
        const ajaxUrl = driverForm.attr('action');
        const method = driverForm.attr('method');
        $("#errors").html('');

        $.ajax({
            url: ajaxUrl,
            type: method,
            data: driverForm.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    swal({
                        title: "Owner Registration Completed.",
                        text: data.message,
                        icon: "success",
                        button: 'Close',
                    });
                } else {
                    swal({
                        title: "Owner Registration Failed.",
                        text: data.message,
                        icon: "error",
                        button: 'Close',
                        dangerMode: true,
                    });
                    // popup error message

                    $.each(data.errors, function (key, value) {
                        $("#errors").append('<li class="error bounceInRight">' + value + '</li>').fadeIn('slow');
                    });
                }
            }
        })
    });
    //end





    // Todo
    //  Ajax search system

    // $('.search-box').bind('keyup', function() { $('#search_form').submit(); } );

    // $("#search_form").submit(function(event) {
    //     /* Act on the event */

    //     event.preventDefault();

    //     var form = $("#search_form");
    //     var ajaxUrl = form.attr('action');

    //     $.ajax({
    //         url: ajaxUrl,
    //         type: 'GET',
    //         dataType: 'json',
    //         data: form.serialize(),
    //         success:function(data){
    //             // console.log(data);
    //             console.log('ok');

    //         }
    //     });

    // });



});