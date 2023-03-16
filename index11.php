<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App | CodingNepal</title>
  <link rel="stylesheet" href="style.css"> 
 <link rel="stylesheet" href="css/bootstrap.min.css"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
 <link rel="stylesheet" href="cc.css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>


</head>
<body style=" background-color: rgb(3, 126, 126);">
  <div class="wrapper">
    <section class="form signup"   >
      <header > Create a new Constumer </header>  
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
      
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>

          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>

        <div class="field input">
          <label>Email Address or Phone</label>
          <input type="text" name="email" placeholder="Enter your email or Phone" required>
        </div>

        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>


        <div class="field button">
          <input type="submit" name="submit" value="Continue" style="background-color:#15fa00;">
        </div>

      </form>

       <div class="link"> Already signed up? 
        <a href="login.php">Login now</a> 
        
       </div>

    </section> 


      </script>
  </div>

</body>
</html>
