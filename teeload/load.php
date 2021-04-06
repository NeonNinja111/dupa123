<?php include("config.php") ?>
<?php include("inc/php/steamapi.php") ?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="inc/css/style.css">
		<link rel="stylesheet" type="text/css" href="inc/themes/<?php echo $config["style"]["theme"] ?>/style.css">
		
		<?php include("inc/css/style.php") ?>
		<?php include("inc/themes/".$config["style"]["theme"]."/style.php") ?>
		
		<script src="inc/js/jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="inc/css/font-awesome.min.css">
		
		<title>tLoad by tasid</title>
	</head>

	<body>
		<div id="background1"></div>
		<div id="background2"></div>
		<div id="background3"></div>
		
		<?php include("inc/themes/".$config["style"]["theme"]."/content.php") ?>
		
		<audio id="audio" style="position: fixed; left: -1000px; top: -1000px;" controls autoplay>
			<source type="audio/ogg">
		</audio>
		
		<?php include("inc/js/serverinfo.php") ?>
		<?php include("inc/js/bgcycle.php") ?>
		<?php if ($config["music"]["disable"] != true) {include("inc/js/music.php");} ?>
	</body>
</html>