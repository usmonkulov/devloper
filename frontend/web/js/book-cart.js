/*price range*/

// Modal javacrict orqali savatcha chiqadi 
function showCart(bookCart){
    $('#bookCart .modal-body').html(bookCart);
    $('#bookCart').modal();
}

// Main Korzinka bottom
function getCart(){
   $.ajax({
        // url: '/en/book-cart/show',
        url: show,
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
  return false;
}

// Savatchadagi productni bitta bitta tozalaydi
$('#bookCart .modal-body').on('click', '.del-item', function(){
   var id = $(this).data('id');
    $.ajax({
          // url: '/en/book-cart/del-item',
          url: delitem,
          data: {id: id },
          type: 'GET',
          success: function(res){
              if(!res) alert('Ошибка!');
              showCart(res);
          },
          error: function(){
              alert('Error!');
      }
    });
});

// Savatchadagi productni tozalaydi
function clearCart(){

 $.ajax({
      // url: '/en/book-cart/clear',
      url: clear,
      type: 'GET',
      success: function(res){
          if(!res) alert('Ошибка!');
          showCart(res);
      },
      error: function(){
          alert('Error!');
      }
  });

}

// add-to-cart class orqali chiqadi
$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),qty = $('#qty').val();
    $.ajax({
        // url: '/en/book-cart/add',
        url: add,
        data: {id: id, qty: qty},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});