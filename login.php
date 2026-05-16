<?php
if (function_exists('session_status')) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
} elseif (!isset($_SESSION)) {
    session_start();
}

include('includes/config.php');
if($lang == 'en'){include('languages/en.php');}else if($lang == 'ar'){include('languages/ar.php');}$id = $_GET['id'];     ob_start();  
	system('ipconfig /all');  
	$mycom=ob_get_contents(); 
	ob_clean();  
	$findme = "Physical";
	$pmac = strpos($mycom, $findme); 
	$mac=substr($mycom,($pmac+36),17);  
	mysql_connect("$host", "$user", "$pass") or die(mysql_error()); 
	mysql_select_db("$db") or die(mysql_error()); 
	$sql="SELECT * FROM config";
	$result=mysql_query($sql);
 	while($row = mysql_fetch_array($result))
	{
	$logo = $row['logo'];
	$store = $row['store'];
	$phone = $row['phone'];
	$facebook = $row['facebook'];
	$lab = $row['lic'];
	$m = md5($mac);
 	}
    // if($lab != $m)
    // {
	// header("location:install.php");
	// die();
	// }
	$lang_lo = $_GET['lo'];
if(isset($lang_lo))
{
	if($lang_lo == 'ar')
	{
	mysql_connect("$host", "$user", "$pass") or die(mysql_error()); 
	mysql_select_db("$db") or die(mysql_error()); 
	mysql_query("UPDATE `config` set `lang` = 'ar';"); 
	echo "<script>location='login.php'</script>";
	}
	else if($lang_lo == 'en')
	{
	mysql_connect("$host", "$user", "$pass") or die(mysql_error()); 
	mysql_select_db("$db") or die(mysql_error()); 
	mysql_query("UPDATE `config` set `lang` = 'en';"); 		
	echo "<script>location='login.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gesture for Playstation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $lang_1;?>">
	<meta name="author" content="Mohamed Gad">

	<!-- The styles -->
			<?php  include 'includes/css.php';?>

		<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
	url,'popUpWindow','height=300,width=300,left=10,top=10,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
	popupWindow.focus();

}
</script>
<script type="text/javascript">
// Popup window code
function newPopup2(url) {
	popupWindow = window.open(
	url,'popUpWindow','height=700,width=300,left=10,top=10,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
	popupWindow.focus();
}
</script>
</head>

<body class="login-page">
	<div class="login-shell">
		<div class="login-hero" aria-hidden="true">
			<div class="login-hero__card login-hero__card--primary">
				<span><?php echo $lang_169;?></span>
				<strong>Gesture</strong>
			</div>
			<div class="login-hero__card login-hero__card--secondary">
				<span><?php echo $lang_168;?></span>
				<strong><?php echo $store; ?></strong>
			</div>
		</div>

		<main class="login-panel" role="main">
			<div class="login-brand">
				<img src="img/app/defaults/logo20.png" alt="Gesture for Playstation" />
				<div>
					<p class="login-kicker"><?php echo $lang_169;?></p>
					<h1><span>Ges</span>ture</h1>
					<p><?php echo $lang_168;?></p>
				</div>
			</div>

			<?php $error = $_GET['error']; ?>
			<?php if(isset($error)) { ?>
				<div class="alert alert-error login-alert"><?php echo $lang_185;?></div>
			<?php } else { ?>
				<div class="alert alert-info login-alert"><?php echo $lang_186;?></div>
			<?php } ?>

			<form class="login-form" action="actions/login/login_process.php" method="post">
				<label for="username"><?php echo $lang_88;?></label>
				<div class="login-field" title="<?php echo $lang_88;?>" data-rel="tooltip">
					<i class="icon-user"></i>
					<input autofocus name="ps_user" id="username" type="text" value="" autocomplete="username" />
				</div>

				<label for="password"><?php echo $lang_89;?></label>
				<div class="login-field" title="<?php echo $lang_89;?>" data-rel="tooltip">
					<i class="icon-lock"></i>
					<input name="ps_pass" id="password" type="password" value="" autocomplete="current-password" />
				</div>

				<div class="login-options">
					<label class="remember" for="remember"><input type="checkbox" id="remember" /><?php echo $lang_188;?></label>
					<div class="login-languages" aria-label="Language">
						<a href="login.php?lo=ar" data-rel="tooltip" title="<?php echo $lang_358;?>"><img src="img/app/login/eg.ico" width="25" height="25" alt="<?php echo $lang_358;?>" /></a>
						<a href="login.php?lo=en" data-rel="tooltip" title="<?php echo $lang_359;?>"><img src="img/app/login/us.ico" width="25" height="25" alt="<?php echo $lang_359;?>" /></a>
					</div>
				</div>

				<button type="submit" class="btn btn-primary login-submit"><?php echo $lang_187;?></button>
			</form>

			<div class="login-meta">
				<?php if(!empty($phone)) { ?><span><?php echo $phone; ?></span><?php } ?>
				<?php if(!empty($facebook)) { ?><a href="<?php echo $facebook; ?>" target="_blank">Facebook</a><?php } ?>
			</div>
		</main>
	</div>

	<footer class="login-footer">
		<p>&copy; <a href="http://www.psxegy.com" target="_blank">Gesture For Playstation</a> <?php $Year = idate('Y'); echo $Year;?></p>
	</footer>
<?php  include 'includes/js.php';?>

		
</body>
</html>
