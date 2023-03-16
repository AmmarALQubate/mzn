<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>موقع المتجر</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    /* تخطيط الهيدر */
    .header {
      background-color: #f1f1f1;
      text-align: center;
      padding: 20px;
    }
    /* زر تسجيل الدخول */
    .login-btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
    }
    /* استجابة الشاشة */
    @media screen and (max-width: 500px) {
      .header a {
        float: none;
        display: block;
        text-align: left;
      }
      .header-right {
        float: none;
      }
    }
  </style>
</head>
<body style=" background-color: rgb(3, 126, 126);">

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">تسجيل الدخول</h2>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="username">اسم المستخدم:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="password">كلمة المرور:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
        </form>
      </div>
    </div>
  </div>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

