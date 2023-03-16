<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

$(document).ready(function() {
  // retrieve the data from localStorage
  var myData = JSON.parse(localStorage.getItem('myData'));
  
  // display the data on the page
  $('body').append('<p>Name: ' + myData.name + '</p>');
  $('body').append('<p>Age: ' + myData.age + '</p>');
  $('body').append('<p>Email: ' + myData.email + '</p>');
});
</script>