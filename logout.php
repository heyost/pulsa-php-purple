<?php
	session_start();
  session_destroy();
  header("Location: index.php?" . "pesan=silahkan Login");
?>
