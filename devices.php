<?php session_start();
if( !isset($_SESSION['ps_user']) )
{
	include('login.php');
	die();
}
include('includes/config.php');
if($lang == 'en'){include('languages/en.php');}else if($lang == 'ar'){include('languages/ar.php');}
$casheer = $_SESSION['ps_user'];
$close = $_GET['action']; 
$pause = $_GET['pause']; 
$reprep = $_GET['session']; 
$money = $_GET['wanted']; 
$old_id = $_POST['old_id'];
$new_id = $_POST['new_id'];
$old_time = $_POST['old_time'];
$barca = $_POST['barca'];
$dName = $_GET['name'];
$old_time = $_GET['seconds'];
$matloob = $_GET['seconds'];
$op = $_GET['oppa'];
$Receipt = $reprep;
$Month = idate('m');
$Day = idate('d');
$youm = $Day;
$Hour = idate('H');
$Minute = idate('i');
$Second = idate('s'); 
$Year = idate('Y');
$id = $_GET['id'];
$resume = $_GET['resume'];
$H = $Hour;
$tdis = $_GET['tdis']; 
$exact_discount = $_GET['exact_discount']; 

 	mysql_connect("$host", "$user", "$pass") or die(mysql_error()); 
	mysql_select_db("$db") or die(mysql_error()); 
	$sql="SELECT * FROM config";
	$result=mysql_query($sql);
	while($row = mysql_fetch_array($result))
		{
	     $current_shift = $row['current_shift'];
	     $last_shift = $row['last_shift'];
	     $shift_day = $row['shift_day'];
	     $shift_month = $row['shift_month'];
		}
 if($current_shift == 'No')
 {
	 
	mysql_query("UPDATE `config` set `shift_day` = '$Day';"); 
	mysql_query("UPDATE `config` set `shift_month` = '$Month';"); 
 }
 
 
  
$sql="SELECT MAX(session_id) FROM reports";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
{ 
  $last_session =  $row['MAX(session_id)'];
  // echo $last_session;
}
if(!isset($last_session))
{
	$sess = 1;
 }
else{
  $sess = $last_session + 1;
 }
 
     ob_start();  
	system('ipconfig /all');  
	$mycom=ob_get_contents(); 
	ob_clean();  
	$findme = "Physical";
	$pmac = strpos($mycom, $findme); 
	$mac=substr($mycom,($pmac+36),17);  
 
	$sql="SELECT * FROM config";
	$result=mysql_query($sql);
 	while($row = mysql_fetch_array($result))
	{
    $labx = $row['lic'];
	$mx = md5($mac);
 	}
     if($labx != $mx)
     {
	 header("location:control_copyrights_check.php");
	 die();
	 }
	
	// if($matloob < 900)
	// {
	// $matloob = 900;
	// if($close_p == 'single')
	// {$money = $singlea / 4;}
	// else if($close_p == 'multi')
	// {$money = $multia / 4;}
	// else if($close_p == 'multi6')
	// {$money = $multi6a / 4;}
	// else if($close_p == 'multi7')
	// {$money = $multi7a / 4;}
 

//$id=$_GET['id'];	
$sethour = isset($_POST['seth']) ? (int) $_POST['seth'] : 0;
$setminute = isset($_POST['setm']) ? (int) $_POST['setm'] : 0;
$sethour = isset($_POST['seth']) ? max(0, (int) $_POST['seth']) : 0;
$setminute = isset($_POST['setm']) ? max(0, (int) $_POST['setm']) : 0;
$setminute = min(59, $setminute);
$value1 = $_POST['selector']; 
$newt = isset($_POST['selector2']) ? $_POST['selector2'] : '';
if(isset($value1))
{
			$id=$_POST['idd'];

	    include('includes/config.php');

 	mysql_connect("$host", "$user", "$pass") or die(mysql_error()); 
	mysql_select_db("$db") or die(mysql_error()); 
	$sql="SELECT * FROM devices WHERE `ID` = '$id'";
	$result=mysql_query($sql);
	while($row = mysql_fetch_array($result))
		{
	     $current_ip = $row['ip'];
	     $current_port = $row['port'];
	     $current_open = $row['openword'];
 		}
 
    if($ta7akom == 'yes'){
  $socket = fsockopen($current_ip, $current_port); // creates connection it returns the file pointer
if($socket) {  // if it returns a file pointer
 fwrite($socket, $current_open);  //write the filename in the file pointer returned by socket and chagne line
}
	}
	
	
	
	
	$run_unlimited = (($sethour + $setminute) <= 0);
	if($run_unlimited)
	{


		//$value3=$_POST['Game'];

		$Month = idate('m');
		$Year = idate('Y');
		$Hour = idate('H');
		$Minute = idate('i');
		$Second = idate('s'); 

		$H = $Hour;

		//$sess = rand();

		
	 
		mysql_query("UPDATE `devices` set `type` = '$value1'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `day` = '$shift_day'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `day2` = '$Day2'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `month` = '$shift_month'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `year` = '$Year'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `hour` = '$H'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `minute` = '$Minute'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `second` = '$Second'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `Device Status` = 'On'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `session_id` = '$sess'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `timetype` = 'unlimited'  WHERE `id` = '$id';");  

		mysql_query("INSERT INTO `reports` (`type`, `pc_id`, `Start_hour` ,`Start_minute`,`session_id`,`day`,`day2`,`month`,`year`,`Start_second`,`shift`) VALUES ('$value1', '$id','$H','$Minute','$sess','$shift_day','$Day2','$shift_month','$Year','$Second','$current_shift');"); 

	}
	else
	{
		$id=$_POST['idd']; 
		$Month = idate('m');
		$Year = idate('Y');
		$Hour = idate('H');
		$Minute = idate('i');
		$Second = idate('s'); 
		$H = $Hour;
		$new_h = $Hour + $sethour;
		$new_m = $Minute + $setminute-1;
		$end_day = $shift_day;

		if($new_m > 60)
		{
			$new_m = $new_m -60;
			$new_h = $new_h + 1;
		}
		if($new_h == '24'){$new_h = 0;$end_day = $shift_day+1; }
		if($new_h == '26'){$new_h = 1;$end_day = $shift_day+1;}
		if($new_h == '27'){$new_h = 2;$end_day = $shift_day+1;}
		if($new_h == '28'){$new_h = 3;$end_day = $shift_day+1;}
		if($new_h == '29'){$new_h = 4;$end_day = $shift_day+1;}
		if($new_h == '30'){$new_h = 5;$end_day = $shift_day+1;}
		if($new_h == '31'){$new_h = 6;$end_day = $shift_day+1;}

		mysql_query("UPDATE `devices` set `type` = '$value1'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `day` = '$shift_day'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `end_day` = '$end_day'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `month` = '$shift_month'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `year` = '$Year'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `hour` = '$H'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `minute` = '$Minute'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `second` = '$Second'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `Device Status` = 'On'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `session_id` = '$sess'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `timetype` = 'time'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `end_m` = '$new_m'  WHERE `id` = '$id';");  
		mysql_query("UPDATE `devices` set `end_h` = '$new_h'  WHERE `id` = '$id';");  

		mysql_query("INSERT INTO `reports` (`type`, `pc_id`, `Start_hour` ,`Start_minute`,`session_id`,`day`,`day2`,`month`,`year`,`Start_second`,`shift`) VALUES ('$value1', '$id','$H','$Minute','$sess','$shift_day','$Day2','$shift_month','$Year','$Second','$current_shift');"); 
	}}
$finishedid = $_GET['finishedid'];
if(isset($finishedid))
{
 
	mysql_query("UPDATE `devices` set `Device Status` = 'finished'  WHERE `id` = '$finishedid';"); 
}
 
$sql="SELECT * FROM config";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	$add_funds = $row['add_funds'];
	$funds = $row['funds'];
}
if($add_funds == 'True')
{

	$sql="SELECT * FROM reports2 WHERE day = '$shift_day' AND month = '$shift_month' AND year = '$Year'";
	$result=mysql_query($sql);
	$funds_done = mysql_num_rows($result);
	if($funds_done > 0)
	{

	}
	else{
		$out = 'in';
		$notes = 'Daily Funds';
		mysql_query("INSERT INTO `reports2` ( `name`,`catagory`,`notes`,`price`,`day`,`month`,`year`) VALUES
('Admin','$out','$notes','$funds','$shift_day','$shift_month','$Year');"); 
	}
}

function ps_device_type_label($type)
{
	global $lang_3, $lang_4, $lang_6, $lang_7;
	if ($type == 'single') { return $lang_3; }
	if ($type == 'multi') { return $lang_4; }
	if ($type == 'multi6') { return $lang_6; }
	if ($type == 'multi7') { return $lang_7; }
	return $type;
}

function ps_device_icon($version, $active)
{
	$icons_off = array(
		'2' => 'p2.png',
		'3' => 'p3.png',
		'4' => 'p4.png',
		'5' => 'tenis.png',
		'6' => 'billiard.png',
		'7' => 'bein.png',
		'8' => 'vr.png',
		'9' => 'wii.png',
		'10' => 'xbox.png',
		'11' => 'cafe.png'
	);
	$icons_on = array(
		'2' => 'pss2.png',
		'3' => 'pss3.png',
		'4' => 'pss4.png',
		'5' => 'tenis2.png',
		'6' => 'billiard2.png',
		'7' => 'bein.png',
		'8' => 'vr2.png',
		'9' => 'wii2.png',
		'10' => 'xbox2.png',
		'11' => 'cafe.png'
	);
	$icons = $active ? $icons_on : $icons_off;
	return isset($icons[$version]) ? $icons[$version] : 'p4.png';
}

function ps_device_icon_style($version)
{
	if ($version == '11') { return ' style="height: 100px;"'; }
	if ($version == '7') { return ' style="height: 50px;"'; }
	return '';
}

function ps_elapsed_seconds($row)
{
	$hour = idate('H');
	$minute = idate('i');
	$second = idate('s');
	$gethour = $row['hour'];
	$getminute = $row['minute'];
	$getsecond = $row['second'];
	$start_day = $row['day'];
	$tod_date = idate('d');
	if ($hour == '0') { $hour = 24; }
	if ($gethour == '0') { $gethour = 24; }
	$hdiff = $hour - $gethour;
	if ($hdiff < 0 && $start_day != $tod_date) { $hdiff = $hdiff + 24; }
	$mdiff = $minute - $getminute;
	$sdiff = $second - $getsecond;
	return (($hdiff * 60 * 60) + ($mdiff * 60) + $sdiff);
}

function ps_remaining_seconds($row)
{
	$hour = idate('H');
	$minute = idate('i');
	$second = idate('s');
	$esth = $row['end_h'];
	$estm = $row['end_m'];
	$ests = $row['second'];
	$start_day = $row['day'];
	$end_day = $row['end_day'];
	$tod_date = idate('d');
	if ($hour == '0') { $hour = 24; }
	$hdiff = $esth - $hour;
	if (($hdiff < 0 && $start_day != $tod_date) || ($hdiff < 0 && $start_day != $end_day)) {
		$hdiff = $hdiff + 24;
	}
	$mdiff = $estm - $minute;
	$sdiff = $ests - $second;
	return (($hdiff * 60 * 60) + ($mdiff * 60) + $sdiff);
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script type="text/javascript">
// Popup window code
// var url = document.getElementById("www.google.com");
//url = document.getelementbyid('http://www.google.com');
function pay(url) {
	popupWindow = window.open(
	url,'popUpWindow','height=700,width=300,left=10,top=10,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no')
}

</script>


<title><?php echo $lang_1;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $lang_1;?>">
<meta name="author" content="Mohamed Gad">
		<style>
		body {
			background: #f3f6fb;
		}
		a.tip {
			border-bottom: 1px dashed;
			text-decoration: none;
		}
		a.tip:hover {
			cursor: help;
			position: relative;
		}
		a.tip span {
			display: none;
		}
		a.tip:hover span {
			border: #c0c0c0 1px dotted;
			padding: 5px 20px 5px 5px;
			display: block;
			z-index: 100;
			background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%;
			left: 0px;
			margin: 10px;
			width: 250px;
			position: absolute;
			color: #ff0505;
			top: 10px;
			text-decoration: none;
		}
		.devices-dashboard {
			padding: 8px 0 20px;
		}
		.devices-toolbar {
			background: linear-gradient(135deg, #0f172a, #1d4ed8);
			border-radius: 18px;
			box-shadow: 0 18px 45px rgba(15, 23, 42, .18);
			color: #fff;
			margin-bottom: 18px;
			padding: 18px 22px;
		}
		.devices-toolbar h2 {
			color: #fff;
			font-size: 24px;
			line-height: 1.2;
			margin: 0 0 6px;
		}
		.devices-toolbar p {
			color: rgba(255,255,255,.75);
			font-size: 13px;
			margin: 0;
		}
		.devices-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
			gap: 16px;
		}
		.device-card,
		.device-card:visited {
			background: #fff;
			border: 1px solid rgba(148, 163, 184, .28);
			border-radius: 18px;
			box-shadow: 0 12px 32px rgba(15, 23, 42, .08);
			color: #111827;
			display: block;
			min-height: 252px;
			overflow: hidden;
			padding: 16px;
			position: relative;
			text-align: center;
			text-decoration: none;
			transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
		}
		.device-card:hover {
			box-shadow: 0 18px 42px rgba(15, 23, 42, .16);
			text-decoration: none;
			transform: translateY(-3px);
		}
		.device-card--on { border-top: 5px solid #22c55e; }
		.device-card--off { border-top: 5px solid #64748b; }
		.device-card--finished { border-top: 5px solid #f59e0b; }
		.device-card__status {
			border-radius: 999px;
			color: #fff;
			font-size: 12px;
			font-weight: bold;
			padding: 5px 12px;
			position: absolute;
			right: 12px;
			top: 12px;
		}
		.device-card--on .device-card__status { background: #16a34a; }
		.device-card--off .device-card__status { background: #475569; }
		.device-card--finished .device-card__status { background: #f97316; }
		.device-card__name {
			font-size: 18px;
			font-weight: 700;
			margin: 20px 0 8px;
			padding: 0 58px 0 0;
		}
		.device-card__type {
			color: #64748b;
			font-size: 13px;
			font-weight: 600;
			margin-bottom: 10px;
			min-height: 18px;
		}
		.device-card__icon {
			align-items: center;
			display: flex;
			height: 112px;
			justify-content: center;
			margin: 0 auto 10px;
		}
		.device-card__icon img {
			max-height: 105px;
			max-width: 135px;
		}
		.device-card__timer {
			background: #f8fafc;
			border-radius: 14px;
			font-family: Arial, Tahoma, sans-serif;
			font-size: 24px;
			font-weight: 800;
			letter-spacing: .04em;
			margin: 8px auto 12px;
			padding: 10px 12px;
		}
		.device-card__timer--up { color: #dc2626; }
		.device-card__timer--down { color: #16a34a; }
		.device-card__timer--done { color: #0284c7; }
		.device-card__actions {
			align-items: center;
			display: flex;
			gap: 8px;
			justify-content: center;
		}
		.device-start-form select,
		.device-start-form input[type="number"],
		.device-start-form input[type="text"] {
			box-sizing: border-box;
			border: 1px solid #cbd5e1;
			border-radius: 10px;
			box-shadow: none;
			margin-bottom: 8px;
			padding: 8px 10px;
			width: 100%;
		}
		.device-start-form .time-inputs {
			display: none;
			gap: 8px;
		}
		.device-start-form .time-inputs input { width: 50%; }
		.device-start-form.is-time .time-inputs { display: flex; }
		.device-start-form.is-time .unlimited-input { display: none; }
		.device-mode-buttons {
			display: flex;
			gap: 8px;
			justify-content: center;
			margin-bottom: 8px;
		}
		.device-mode-btn {
			background: #eef2ff;
			border: 0;
			border-radius: 12px;
			cursor: pointer;
			padding: 8px 14px;
		}
		.device-mode-btn img { width: 30px; }
		.device-submit {
			background: linear-gradient(135deg, #16a34a, #22c55e);
			border: 0;
			border-radius: 12px;
			box-shadow: 0 8px 20px rgba(34, 197, 94, .25);
			color: #fff;
			font-weight: 700;
			padding: 10px 18px;
			width: 100%;
		}
		.blink_meee { animation: blinker 1s linear infinite; }
		@keyframes blinker { 50% { opacity: 0; } }
		@media (max-width: 767px) {
			.devices-grid { grid-template-columns: 1fr; }
			.device-card { min-height: auto; }
		}
		</style>
<!-- The styles -->
		<?php  include 'includes/css.php';?>
		<style>
		/* Safe visual refresh: keep the original PHP/JS flow and only polish the existing markup. */
		body {
			background: #eef3f8;
		}
		#content {
			padding-top: 12px;
		}
		.sortable.row-fluid {
			display: inline;
		}
		.top-block.well {
			background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
			border: 1px solid #dce6f1;
			border-radius: 16px;
			box-shadow: 0 10px 24px rgba(15, 23, 42, .09);
			box-sizing: border-box;
			color: #1f2937;
			margin: 0 1.5% 18px 0;
			min-height: 285px;
			overflow: hidden;
			padding: 16px 14px;
			position: relative;
			text-align: center;
			transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease;
		}
		a.top-block.well:hover,
		.top-block.well:hover {
			border-color: #93c5fd;
			box-shadow: 0 16px 34px rgba(15, 23, 42, .14);
			text-decoration: none;
			transform: translateY(-2px);
		}
		.top-block.well > div:first-child,
		.top-block.well > a:first-child + div {
			color: #0f172a;
			font-size: 18px;
			font-weight: bold;
			line-height: 1.25;
			margin-bottom: 10px;
		}
		.top-block.well img#aa {
			filter: drop-shadow(0 8px 12px rgba(15, 23, 42, .14));
			max-height: 108px;
			max-width: 150px;
			object-fit: contain;
		}
		.top-block.well select,
		.top-block.well input[type="number"],
		.top-block.well input[type="text"] {
			border: 1px solid #cbd5e1;
			border-radius: 10px;
			box-shadow: inset 0 1px 2px rgba(15, 23, 42, .05);
			box-sizing: border-box;
			margin-bottom: 8px;
			padding: 7px 9px;
		}
		.top-block.well .notification {
			border-radius: 999px;
			box-shadow: none;
			font-size: 12px;
			font-weight: bold;
			padding: 5px 10px;
		}
		.submit-button {
			border-radius: 12px;
			box-shadow: 0 8px 18px rgba(34, 197, 94, .22);
			transition: transform .15s ease, box-shadow .15s ease;
		}
		.submit-button:hover {
			box-shadow: 0 12px 24px rgba(34, 197, 94, .28);
			transform: translateY(-1px);
		}
		@media (max-width: 979px) {
			.top-block.well.span3 {
				width: 46%;
			}
		}
		@media (max-width: 767px) {
			.top-block.well.span3 {
				float: none;
				margin-right: 0;
				width: 100%;
			}
		}
		</style>
</head>
<?php 
if(isset($close))
{
	?><body onload="pay('actions/print/ps.php?Session=<?php  echo $Receipt; ?>&&id=<?php  echo $id; ?>')">
	<?php }
else
{
	?><body><?php 
}
?>
<!-- topbar starts -->
<?php include('includes/navbar.php');?>
<!-- topbar ends -->
<div class="container-fluid">
<div class="row-fluid">
<!-- left menu starts -->
<?php include('includes/menu.php');?>
<!--/span-->
<!-- left menu ends -->
<noscript>
<div class="alert alert-block span10">
<h4 class="alert-heading">Warning!</h4>
<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>

<div id="content" class="span10">
<!-- content starts -->

<?php 

// To connect to the database
mysql_connect("$host", "$user", "$pass")or die("cannot connect");
mysql_select_db("$db")or die("cannot select DB");

$sql="SELECT * FROM devices ORDER BY orderby";
$result=mysql_query($sql);
$devices = array();
$device_counts = array('On' => 0, 'Off' => 0, 'finished' => 0);
while($row = mysql_fetch_array($result))
{
	$devices[] = $row;
	$status_key = $row['Device Status'];
	if(isset($device_counts[$status_key]))
	{
		$device_counts[$status_key]++;
	}
}
$total_devices = count($devices);
?>
<div class="devices-dashboard">
	<div class="devices-toolbar">
		<h2><?php echo $lang_1; ?></h2>
		<p>
			<?php echo $total_devices; ?> Devices &nbsp; | &nbsp;
			<?php echo $lang_2; ?>: <?php echo $device_counts['On']; ?> &nbsp; | &nbsp;
			<?php echo $lang_12; ?>: <?php echo $device_counts['Off']; ?> &nbsp; | &nbsp;
			<?php echo $lang_13; ?>: <?php echo $device_counts['finished']; ?>
		</p>
	</div>
	<div class="devices-grid">
<?php
foreach($devices as $row)
{
	$id = $row['ID'];
	$thetype = $row['type'];
	$status = $row['Device Status'];
	$timetype = $row['timetype'];
	$is_cafe = ($row['ps_version'] == '11');
	$icon = ps_device_icon($row['ps_version'], $status == 'On');
	$icon_style = ps_device_icon_style($row['ps_version']);
	$type_label = ps_device_type_label($thetype);

	if ($status == 'On')
	{
		if($timetype == 'unlimited')
		{
			$the_url = $is_cafe ? 'devices_cafe.php?id=' : 'devices_ps.php?id=';
			$elapsed = $is_cafe ? 0 : ps_elapsed_seconds($row);
			?>
			<a data-rel="tooltip" class="device-card device-card--on" href="<?php echo $the_url.$id;?>">
				<span class="device-card__status"><?php echo $lang_2;?></span>
				<div class="device-card__name"><?php echo $row['Device Name']; ?></div>
				<div class="device-card__icon"><img src="img/app/devices/<?php echo $icon; ?>"<?php echo $icon_style; ?> /></div>
				<?php if(!$is_cafe) { ?>
					<div class="device-card__type"><?php echo $type_label; ?></div>
					<div class="device-card__timer device-card__timer--up js-device-timer" data-seconds="<?php echo $elapsed; ?>" data-direction="up"><?php echo $elapsed; ?></div>
				<?php } else { ?>
					<div class="device-card__type">Cafe</div>
				<?php } ?>
				<div class="device-card__actions"><img src="img/app/buttons/info.png" /> </div>
			</a>
			<?php
		}
		else if($timetype == 'time')
		{
			$remaining = ps_remaining_seconds($row);
			if($remaining <= 0)
			{
				mysql_query("UPDATE `devices` set `Device Status` = 'finished'  WHERE `ID` = '$id';");
				$status = 'finished';
			}
			?>
			<a data-rel="tooltip" class="device-card device-card--on" href="devices_ps.php?id=<?php echo $id;?>">
				<span class="device-card__status"><?php echo $lang_2;?></span>
				<div class="device-card__name"><?php echo $row['Device Name']; ?></div>
				<div class="device-card__icon"><img src="img/app/devices/<?php echo $icon; ?>"<?php echo $icon_style; ?> /></div>
				<div class="device-card__type"><?php echo $type_label; ?></div>
				<div class="device-card__timer device-card__timer--down js-device-timer" data-seconds="<?php echo $remaining; ?>" data-direction="down" data-expire-url="actions/ps/timerstop.php?id=<?php echo $id; ?>"><?php echo $remaining; ?></div>
				<div class="device-card__actions"><img src="img/app/buttons/info.png" /> </div>
			</a>
			<?php
		}
	}
	else if ($status == 'Off')
	{
		?>
		<div data-rel="tooltip" class="device-card device-card--off">
			<span class="device-card__status"><?php echo $lang_12;?></span>
			<div class="device-card__name"><?php echo $row['Device Name']; ?></div>
			<div class="device-card__icon">
				<?php if($row['ps_version'] == '2' || $row['ps_version'] == '3' || $row['ps_version'] == '4') { ?>
					<a href="#" class="tip"><span>الألعاب المتاحة:<br/><?php echo $row['Paused']; ?></span><img src="img/app/devices/<?php echo $icon; ?>"<?php echo $icon_style; ?> /></a>
				<?php } else { ?>
					<img src="img/app/devices/<?php echo $icon; ?>"<?php echo $icon_style; ?> />
				<?php } ?>
			</div>
			<form class="device-start-form" action="devices.php" method="post">
				<input type="hidden" name="idd" value="<?php echo $id;?>" />
				<?php if($is_cafe){ ?>
					<input name="selector2" type="hidden" value="unlimited">
					<input type="hidden" name="selector" value="single"/>
					<input type="hidden" name="time_mode" value="unlimited"/>
					<button type="submit" class="device-submit">Start</button>
				<?php }else{ ?>
					<input type="hidden" name="time_mode" class="js-time-mode" value="unlimited"/>
					<select name="selector">
						<option value="single"><?php echo $lang_3;?></option>
						<option value="multi"><?php echo $lang_4;?></option>
						<option value="multi6"><?php echo $lang_6;?></option>
						<option value="multi7"><?php echo $lang_7;?></option>
					</select>
					<div class="device-mode-buttons">
						<button class="device-mode-btn js-mode-unlimited" type="button" title="<?php echo $lang_8;?>" data-rel="tooltip"><img src="img/app/devices/un.png" /></button>
						<button class="device-mode-btn js-mode-time" type="button" title="<?php echo $lang_9;?>" data-rel="tooltip"><img src="img/app/devices/ti.png" /></button>
					</div>
					<div class="time-inputs">
						<input type="number" name="seth" placeholder="<?php echo $lang_10;?>" min="0" max="24" />
						<input type="number" name="setm" placeholder="<?php echo $lang_11;?>" min="0" max="59" step="1" />
					</div>
					<input class="unlimited-input" name="selector2" type="text" value="unlimited" readonly>
					<button type="submit" class="device-submit">Start</button>
				<?php }?>
			</form>
		</div>
		<?php
	}
	else if ($status == 'finished')
	{
		?>
		<a data-rel="tooltip" class="device-card device-card--finished js-finished-device" href="devices_ps.php?id=<?php echo $id;?>">
			<span class="device-card__status"><?php echo $lang_13;?></span>
			<div class="device-card__name"><?php echo $row['Device Name']; ?></div>
			<div class="device-card__type"><?php echo $type_label; ?></div>
			<div class="device-card__icon"><img src="img/app/devices/<?php echo $icon; ?>"<?php echo $icon_style; ?> /></div>
			<div class="device-card__timer device-card__timer--done"><span class="blink_meee">00:00:00</span></div>
			<div class="device-card__actions"><img src="img/app/buttons/pay.png" /></div>
		</a>
		<?php
	}
}
?>
	</div>
</div>
<!-- content ends -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->

<hr>

<div class="modal hide fade" id="shift">
<div class="modal-header">
 <h3><?php echo $lang_14;?></h3>
</div>
<div class="modal-body">
<center>
<h2><?php echo $lang_15;?></h2>
<br/>
<?php 
if($last_shift == 'One')
{
	$view_shift = $lang_16;
}
else if($last_shift == 'Two')
{
	$view_shift = $lang_17;
}
?>
<h3><?php echo $lang_18;?>: <?php echo $view_shift;?></h3>
<form action="actions/login/shifting.php" method="POST">
	<input type="hidden" name="shift_option" value="start"/>
	<input type="hidden" name="last_shift" value="<?php echo $last_shift?>"/>
	<input type="hidden" name="shift_day" value="<?php echo $Day?>"/>
	<input type="hidden" name="shift_month" value="<?php echo $Month?>"/>
	<input type="image" src="img/app/buttons/shift-start.png"/>
	</form>
	<a href="actions/login/logout.php"><img src="img/app/buttons/logout.png"></a><br/><br/>
	<a href="shift_report_day.php?day=<?php echo $Day?>&&month=<?php echo $Month?>&&year=<?php echo $Year?>"><img src="img/app/buttons/last-shift.png"/></a>
	
	 
	</center>
	</div>
<div class="modal-footer">
</div>
</div>
<div class="modal hide fade" id="shiftauth">
<div class="modal-header">
 <h3><?php echo $lang_170;?></h3>
</div>
<div class="modal-body">
<center>
<h2><?php echo $lang_416;?></h2>
<br/>
<?php 
if($user_shift == '2')
{
	$view_shift = $lang_16;
	$auth_shift = 'One'; 
}
else if($user_shift == '1')
{
	$view_shift = $lang_17;
	$auth_shift = 'Two';
}
?>
<h3><?php echo $lang_418;?>: <?php echo $view_shift;?></h3>
<form action="actions/login/shifting.php" method="POST">
	<input type="hidden" name="shift_option" value="start"/>
	<input type="hidden" name="last_shift" value="<?php echo $auth_shift?>"/>
	<input type="hidden" name="shift_day" value="<?php echo $Day?>"/>
	<input type="hidden" name="shift_month" value="<?php echo $Month?>"/>
	<input type="image" src="img/app/buttons/shift-start.png"/>
	</form>
	<a href="actions/login/logout.php"><img src="img/app/buttons/logout.png"></a><br/><br/>
 	
	 
	</center>
	</div>
<div class="modal-footer">
</div>
</div>
<footer>
<p class="pull-left">&copy; <a href="http://www.psxegy.com" target="_blank">Gesture For Playstation</a> <?php $Year = idate('Y');   echo $Year;?></p>

</footer>

</div><!--/.fluid-container-->

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<!-- jQuery -->
<script src="js/jquery-1.7.2.min.js"></script> 
<!-- jQuery UI -->
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<!-- transition / effect library -->
<script src="js/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src="js/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src="js/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src="js/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src="js/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src="js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="js/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src="js/bootstrap-popover.js"></script>
<!-- button enhancer library -->
<script src="js/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->

<!-- carousel slideshow library (optional, not used in demo) -->
<!-- autocomplete library -->
<script src="js/bootstrap-typeahead.js"></script>
<!-- tour library -->
<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calander plugin -->
<!-- data table plugin -->

<!-- chart libraries start -->

<!-- chart libraries end -->

<!-- select or dropdown enhancer -->
<script src="js/jquery.chosen.min.js"></script>
<!-- checkbox, radio, and file input styler -->
<!-- plugin for gallery image view -->
<!-- rich text editor library -->
<!-- notification plugin -->
	<script src="js/jquery.uniform.min.js"></script>

<!-- file manager library -->
<!-- star rating plugin -->
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src="js/bootstrap-collapse.js"></script>

 
<!-- autogrowing textarea plugin -->
<!-- multiple file upload plugin -->
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
<script type="text/javascript">
(function () {
	function pad(number) {
		number = parseInt(number, 10);
		return number < 10 ? '0' + number : '' + number;
	}

	function formatSeconds(seconds) {
		seconds = Math.max(0, parseInt(seconds, 10) || 0);
		var hours = Math.floor(seconds / 3600) % 24;
		var minutes = Math.floor(seconds / 60) % 60;
		var secs = seconds % 60;
		return pad(hours) + ':' + pad(minutes) + ':' + pad(secs);
	}

	function updateTimers() {
		$('.js-device-timer').each(function () {
			var $timer = $(this);
			var seconds = parseInt($timer.attr('data-seconds'), 10) || 0;
			var direction = $timer.attr('data-direction');

			seconds = direction === 'down' ? seconds - 1 : seconds + 1;
			$timer.attr('data-seconds', seconds);
			$timer.text(formatSeconds(seconds));

			if (direction === 'down' && seconds <= 0) {
				var expireUrl = $timer.attr('data-expire-url');
				$timer.removeClass('js-device-timer').text('00:00:00');
				if (expireUrl) {
					window.location.href = expireUrl;
				}
			}
		});
	}

	$(function () {
		$('.js-device-timer').each(function () {
			$(this).text(formatSeconds($(this).attr('data-seconds')));
		});

		if ($('.js-device-timer').length) {
			setInterval(updateTimers, 1000);
		}

		$('.js-mode-time').on('click', function () {
			var $form = $(this).closest('.device-start-form');
			$form.addClass('is-time');
			$form.find('.js-time-mode').val('time');
		});

		$('.js-mode-unlimited').on('click', function () {
			var $form = $(this).closest('.device-start-form');
			$form.removeClass('is-time');
			$form.find('.js-time-mode').val('unlimited');
		});

		if ($('.js-finished-device').length) {
			try {
				new Audio('sounds/aa.mp3').play();
			} catch (e) {}
		}
	});
}());
</script>

</body>
</html>
