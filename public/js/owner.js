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

    $('#owner_form').submit(function (event) {
        event.preventDefault();
        const ownerForm = $("#owner_form");
        const ajaxUrl = ownerForm.attr('action');
        $("#errors").html('');

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: ownerForm.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    swal({
                        title: "Owner Registration Completed.",
                        text: data.message,
                        icon: "success",
                        button: 'Ok',
                    });
                    ownerForm[0].reset();
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

    //------------------------------------------------------------------------------
    // for update the owner info
    //------------------------------------------------------------------------------
    //validating & submit owner form by ajax
    //start

    $('#update_owner_form').submit(function (event) {
        event.preventDefault();
        const ownerForm = $("#update_owner_form");
        const ajaxUrl = ownerForm.attr('action');
        const method = ownerForm.attr('method');
        $("#errors").html('');

        $.ajax({
            url: ajaxUrl,
            type: method,
            data: ownerForm.serialize(),
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
