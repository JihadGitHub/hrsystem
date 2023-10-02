
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <style>
  .login-clean {
  background:#f1f7fc;
  padding:75px 0;
}

.login-clean form {
  max-width:320px;
  width:90%;
  margin:0 auto;
  background-color:#ffffff;
  padding:40px;
  border-radius:9px;
  color:#505e6c;
  box-shadow:1px 1px 5px rgba(0,0,0,0.1);
}

.login-clean .illustration {
  text-align:center;
  padding:0 0 20px;
  font-size:100px;
  color:rgb(244,71,107);
}

.login-clean form .form-control {
  background:#f7f9fc;
  border:none;  
  border-bottom:1px solid #dfe7f1;
  border-radius:5;
  box-shadow:none;
  outline:none;
  color:inherit;
  text-indent:8px;
  height:42px;
}

.login-clean form .btn-primary {
  background:#f4476b;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:26px;
  text-shadow:none;
  outline:none !important;
}

.login-clean form .btn-primary:hover, .login-clean form .btn-primary:active {
  background:#eb3b60;
}

.login-clean form .btn-primary:active {
  transform:translateY(1px);
}

.login-clean form .forgot {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}

.login-clean form .forgot:hover, .login-clean form .forgot:active {
  opacity:1;
  text-decoration:none;
}

</style>
</head>
<body>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
              <img src="image/calendar.png">
          </div>
          <form>
            <h5>Session</h5>
            <div class="container">
            <input type="radio" name="session" value="admin"> Admin <br>
            <input type="radio" name="session" value="hr"> Hr <br>
            <input type="radio" name="session" value="employee"> Employee <br>
            </div>
            <br/>
            <div class="form-group"><input class="form-control" for="" type="employee ID" name="employee ID" placeholder="Employee ID"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
          </form>
          </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</body>
</html>