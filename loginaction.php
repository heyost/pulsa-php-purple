<?php
  session_start();
  
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "mostryahoo";
  $conn = mysql_connect($host,$user,$pass);
  if($conn) {
  //select database
    $select = mysql_select_db($dbname);
      if(!$select) {
        echo mysql_error();
      }
  }

  if($_POST ['login']){
  $username = $_POST ['userid'];
  $password = $_POST ['password'];
  $sql = mysql_query("SELECT * FROM users WHERE username= '$username' && password='$password'");
  $num = mysql_num_rows($sql);
  if($num==1) {
      
    $_SESSION['user'] = $username;
    $_SESSION['passwrd'] = $password;
  ?>
    <script language= "javascript">
      alert('Anda berhasil login');
      document.location='main.php'
    </script><?
  }
    else {
        
    ?>
      <script language="JavaScript">
          alert('Username atau password anda salah');
      document.location='index.php'
      </script>
    <?
    }
  }
  ?>
