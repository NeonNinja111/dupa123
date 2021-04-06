<?php
    require("inc/php/steamauth.php");
	include("config.php");
	
	if (isset($_SESSION["steamid"]) && in_array($_SESSION["steamid"], $config["admins"])) {
		function SaveData($filelocation, $postdata) {
			$file = fopen("data/".$filelocation, "w") or die("ERR");
			fwrite($file, json_encode($postdata));
			fclose($file);
		}
		
		foreach ($settings as $setting) {
			if (isset($_POST[$setting])) {
				SaveData($setting.".json", $_POST[$setting]);
			}
		}
		
		header("location: admin.php?success=1");
	} else {
		header("location: index.php");
	}
?>