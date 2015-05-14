<html>
<head>
<title>Hapus</title>
        <link href="css/login-.css" rel="stylesheet" type="text/css" />
        <link href="css/main-.css" rel="stylesheet" type="text/css" />
  <style>

    .title h1{
      color:#FFFFFF;
      text-shadow: 0 1px 2px #000;
    }
  </style>
</head>
<body>
  <?
  if(isset($_GET['no'])){
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbnm = "mostryahoo";

  $conn = mysql_connect($host,$user,$pass);
  if($conn){
	$buka = mysql_select_db($dbnm);
	if(!$buka){
		die("Database tidak dapat dibuka");
	}
  } else {
	die("Server MySQL tidak terhubung");
  }

   $no = $_GET['no'];
   $sql = "DELETE FROM log WHERE no='$no'";
   $kueri = mysql_query($sql);
   if($kueri){
	echo "<script>alert('Data log berhasil dihapus');document.location='log.php'</script>";
   } else{
   echo "<script>alert('Data log Gagal dihapus');document.location='log.php'</script>";
   }
  } else {
	echo "<script>alert('No log Belum Dipilih');document.location='log.php'</script>";
  }
  ?>
</body>
</html>
