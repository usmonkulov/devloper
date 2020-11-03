// login uchun funksiya
$(function(){
  // get the clic
  $('.modalLoginButton').click(function (){
    $('#login').modal('show')
    .find('#modalLogin')
    .load($(this).attr('valueLogin'));
  });
});


// SendEmail uchun funksiya
$(function(){
  // get the clic
  $('.modalSendEmailButton').click(function (){
    $('#sendEmail').modal('show')
    .find('#modalSendEmail')
    .load($(this).attr('valueSendEmail'));
  });
});

// Reg uchun funksiya
$(function(){
  // get the clic
  $('.modalRegButton').click(function (){
    $('#reg').modal('show')
    .find('#modalReg')
    .load($(this).attr('valueReg'));
  });
});



// $('.grid-view tbody tr').on('click', function(){
// var data = $(this).data();
// $('#modal-info').modal('show');
// $('#modal-info').find('.modal-title').text('id:'+data.key);
// $('#modal-info').find('.modal-body').load('/admin/en/category/update?id=' + data.key);
// });


$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});


 // <div class="text-center">
 //        <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
 //        <h6>Upload a different photo...</h6>
 //        <input type="file" class="text-center center-block file-upload">
 //      </div></hr><br>
