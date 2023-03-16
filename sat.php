<!DOCTYPE html>
<html>
<head>
  <title>Set Session Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function setSessionValue() {
      
      $.ajax({
        type: "POST",
        url: "b.php",
        data: { myGlobalVariable: myGlobalVariable }
      });
    }
  </script>
</head>
<body>
  <button onclick="setSessionValue()">Set Session Value</button>
</body>
</html>
<script>
var x = 2+3;
window.myGlobalVariable=x;


</script>