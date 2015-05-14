<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
        <title>Login Page</title>
        <link href="css/login.css" rel="stylesheet" type="text/css" />
        <script language="JavaScript">
            function validateForm(theForm){
                if(theForm.userid.value ==""){
                    alert("Enter the name");
                    theForm.userid.focus();
                    return false;
                }

                if(theForm.password.value==""){
                    alert("enter the password");
                    theForm.password.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body class="container">
        <div>
          <div class="login">
            <h1>Login</h1>
            <form method="POST" name="login" action="loginaction.php" onsubmit="return validateForm(this);">
              <p><input type="text" name="userid" value="" placeholder="Username or Email"></p>
              <p><input type="password" name="password" value="" placeholder="Password"></p>
              <p class="submit"><input type="submit" name="login" value="Login"></p>
            </form>
          </div>
        </div>
    </body>
</html>
