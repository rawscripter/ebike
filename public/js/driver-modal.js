  $(document).on('click',"tr.info_row",function (event) {
            event.preventDefault();
            //display the modal
            event.stopPropagation()
            $('tr').removeClass('active_modal_tr');
            $(this).addClass('active_modal_tr');

            // hiding extra table rows
            $(".showed").addClass('display_hidden');
            $(".display_hidden").removeClass('showed');
            $('.load_more_btn').text('Load More Info');


            // adding values to rows
            var driverData = $(this).data('info');

            // setting for update and delete with ajax
            $('.deleteable_id').val(driverData.id);
            $('.updateable_id').val(driverData.id);

            $.each(driverData, function (key, value) {
              $(".modal_"+key).text(value);
            });

            // display the modal
            $("#view_more_details_modal").modal('show');
          })



    // load more info
    $(document).on('click','.load_more_btn',function (event) {
      event.preventDefault();
      let button = $(this);
      button.text('Loading...');


      setTimeout(
                 function()
                 {
                     // displaying the rows
                     $(".display_hidden").addClass('showed');
                     $(".showed").removeClass('display_hidden');
                     button.text('Hide Information');
                     button.addClass('hide_button');
                   }, 200);



    })

    $(document).on('click','.hide_button',function (event) {
      let button = $(this);
      setTimeout(
                 function()
                 {
                  button.removeClass('hide_button');
                  $(".showed").addClass('display_hidden');
                  $(".display_hidden").removeClass('showed');
                  $('.load_more_btn').text('Load More Info');
                }, 200);
    });


//  DELETE OWNER BY AJAX REQUEST

$(".delete_btn").click(function(event) {
  event.preventDefault();
  let deleteID = $('.deleteable_id').val();
  swal({
    title: "STOP! Are you sure you want to Delete?",
    text: "Once you deleted it will store in Trash. Contact Super-Admin to Delete it Permanently!!  ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: 'driver/' + deleteID,
        type: 'POST',
        data: {
          _method: 'DELETE',
          _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success:function(data){
          if (data.response) {
            swal({
              title: "Owner Information Deleted",
              icon: "success",
            })
             $("#view_more_details_modal").modal('hide');
             $(".active_modal_tr").css('display', 'none');

             // updateing total values
             var total = $(".total_info").html();
              $(".total_info").html( parseInt(total) - 1 );
          }else{
            swal({
              title: "Error! Please try after sometime.",
              icon: "warning",
              dangerMode: true,
            })
          }
        }
      });

    }
  });
});
// END DELETE OWNER BY AJAX REQUEST

$(".update_btn").click(function(event) {
  let updateID = $('.updateable_id').val();
  swal({
    title: "Are you sure you want to update?",
    text: "It will permanently updated in database.",
    icon: "warning",
    buttons: true,
  })
  .then((willupdate) => {
    if (willupdate) {
      window.location = 'owner/'+updateID+'/edit';
    }
  });
});


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


