<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function() {
  // get cart data from localStorage
  var cartData = JSON.parse(localStorage.getItem('cart'));
  
  // check if cartData is not null
  if (cartData != null) {
    // loop through cartData and display each item in a table
    for (var i = 0; i < cartData.length; i++) {
      var item = cartData[i];
      var row = '<tr><td>' + item.name + '</td><td>' + item.quantity + '</td><td>' + item.price + '</td><td>' + item.total + '</td></tr>';
      $('table').append(row);
    }
    
    // send cart data to server
    $.ajax({
      type: "POST",
      url: "cart.php",
      data: {cart: cartData},
      success: function(response) {
        console.log(response);
      }
    });
  }
});

</script>