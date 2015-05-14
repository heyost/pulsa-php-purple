<?php
	session_start();
	
	if($_SESSION['user']==FALSE) {
		echo "<script>alert('Anda tidak berhak mengakses halaman ini');document.location='index.php'</script>";
	}
	else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Main Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/login-.css" rel="stylesheet" type="text/css" />
        <link href="css/main-.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    .head {
      color: #FFF;
      opacity: 0.8;
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
        <script type="text/javascript" src="js/button.js"></script>
        <script language="JavaScript">
            function validateForm(theForm){
                if(theForm.calc_result.value ==""){
                    alert("Enter the number");
                    theForm.userid.focus();
                    return false;
                }

                if(theForm.password.value==""){
                    alert("enter the password");
                    theForm.password.focus();
                    return false;
                }
                return true;
                
                if(theForm.kode.value==""){
                    alert("enter the kode");
                    theForm.password.focus();
                    return false;
                }
                return true;
                
                if(theForm.nominal.value==""){
                    alert("enter the nominal");
                    theForm.password.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
		<p align="right" class="link"><a href="log.php">Log Transaksi</a> - <a href="logout.php">Logout</a></p>
		<div class="container">
        <div class="main">
            <h1>FAST-CELL.com</h1>
        <form method="POST" action="send_message_to_yahoo_messenger.php" onsubmit="return validateForm(this);">
        <table class="calculator" id="calc" border="0">
            <tbody><tr>
                <td colspan="4" class="calc_td_result" align="left">
                    <input type="text" style="width: 750px; height: 50px; font-size: 20px;" name="calc_result" id="calc_result" class="calc_result" onkeydown="javascript:key_detect_calc(&#39;calc&#39;,event);">
                </td>
                </tr>
                <tr>
                <td class="calc_td_result" valign="top" style="padding-top: 7px;">
                    <input type="password" name="password" style="width: 150px;">
                </td>
                <td class="calc_td_result" valign="top" style="padding-top: 7px;">
                    <select name="kode" style="width: 100px;">
						
						<!-- KODE PROVIDER UNTUK DIEDIT TINGGAL IKUTI PENULISAN SEBELUMMNYA -->
						
                        <option value="">-KODE-</option>
                        <option value="xl">XL</option>
                        <option value="tri">Tri</option>
                        <option value="telk">Telkomsel</option>
                        
                        <!-- KODE PROVIDER END -->
                        
                    </select>
                </td>
                <td class="calc_td_result" valign="top" style="padding-top: 7px;">
                    <select name="nominal" style="width: 100px;">
                        <option value="">-NOMINAL-</option>
                        
                        <!-- NOMINAL PROVIDER UNTUK DIEDIT TINGGAL IKUTI PENULISAN SEBELUMMNYA -->
                        
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        
                        <!-- NOMINAL PROVIDER END -->
                        
                    </select>
                </td>
                <td>
                    <table class="calculator" id="calc" border="0">
                        <tr align="center">
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="7" onclick="javascript:add_calc(&#39;calc&#39;,7);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="8" onclick="javascript:add_calc(&#39;calc&#39;,8);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="9" onclick="javascript:add_calc(&#39;calc&#39;,9);">
                            </td>
                        </tr>
                        <tr align="center">
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="4" onclick="javascript:add_calc(&#39;calc&#39;,4);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="5" onclick="javascript:add_calc(&#39;calc&#39;,5);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="6" onclick="javascript:add_calc(&#39;calc&#39;,6);">
                            </td>
                        </tr>
                        <tr align="center">
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="1" onclick="javascript:add_calc(&#39;calc&#39;,1);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="2" onclick="javascript:add_calc(&#39;calc&#39;,2);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="3" onclick="javascript:add_calc(&#39;calc&#39;,3);">
                            </td>
                        </tr>
                        <tr align="center">
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="Del" onclick="javascript:f_calc(&#39;calc&#39;,&#39;ce&#39;);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="0" onclick="javascript:add_calc(&#39;calc&#39;,0);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="button" class="calc_btn" value="←" onclick="javascript:f_calc(&#39;calc&#39;,&#39;nbs&#39;);">
                            </td>
                            <td class="calc_td_btn">
                                    <input type="submit" class="calc_btn" name="submit" value="Ok">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody></table>
        </form>
        </div>
        <script type="text/javascript">
                document.getElementById('calc').onload=init_calc('calc');
        </script>
	</div>
    </body>
</html>
<?php
}
?>
