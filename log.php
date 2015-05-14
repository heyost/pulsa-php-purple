<?php
	session_start();
	
	if($_SESSION['user']==FALSE) {
		echo "<script>alert('Anda tidak berhak mengakses halaman ini');document.location='index.php'</script>";
	}
	else {
?>
<html>
<head>
<title>Data Log Transaksi</title>
        <link href="css/login-.css" rel="stylesheet" type="text/css" />
        <link href="css/main-.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    .head {
      color: #FFF;
      opacity: 0.9;
      -webkit-transition: box-shadow .25s ease-in-out;
      -moz-transition: box-shadow .25s ease-in-out;
      -o-transition: box-shadow .25s ease-in-out;
      transition: box-shadow .25s ease-in-out;
      background: #0099CC;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 1px 0px 15px #FFF;
    }
    .head:hover {
      box-shadow: 1px 0px 40px #66CCFF;
    }
    .title h1{
      color:#FFFFFF;
      text-shadow: 0 1px 2px #000;
    }
    .hov {
      -webkit-transition: background .25s ease-in-out;
      -moz-transition: background .25s ease-in-out;
      -o-transition: background .25s ease-in-out;
      transition: background .25s ease-in-out;
    }
    .hov:hover {
      background: #333;
      opacity: 0.7;
    }
    .tittab {
      background: #FFF;
      color: #000;
      padding: 15px;
    }
    .link a {
      color: #000;
    }
    .link:hover {
      color: #000;
    }
  </style>
</head>
<body>
  <p align="right" class="link"><a href="main.php">Back to Send App</a> - <a href="logout.php">Logout</a></p>
  <center><div class="title"><h1>DATA LOG</h1></div></center>
  <br><br>
  <table class="head" align="center" width="82%" cellspacing="0">
    <tr class="tittab">
      <td align="left" width="90"><b>No</b></td>
      <td align="left" width="190"><b>Nomor</b></td>
      <td align="left" width="140"><b>Nominal</b></td>
      <td align="left" width="140"><b>Tanggal</b></td>
      <td align="left" width="140"><b>&nbsp;</b></td>
    </tr>

  <?php
    mysql_connect("localhost","root","");
    mysql_select_db("mostryahoo");

    $hasil=mysql_query("SELECT * FROM log");
    
    if($hasil === FALSE) {
			die(mysql_error());
		}

    while($data=mysql_fetch_array($hasil))
    {
      $no=$data[0];
      $notel=$data[1];
      $nominal=$data[3];
      $date=$data[4];
      print ("<tr class='hov'>");
      print ("<td style='padding: 2px;'>$no</td>");
      print ("<td style='padding: 2px;'>$notel</td>");
      print ("<td style='padding: 2px;'>$nominal</td>");
      print ("<td style='padding: 2px;'>$date</td>");
      print ("<td style='padding: 2px;' class='link'><a href='Hapus_data.php?no=$no'>Delete</a></td>");
      print ("</tr>");
    }
    ?>
  </table>
 </body>
 </html>
<?php
}
?>
