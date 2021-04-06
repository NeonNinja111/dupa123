<?php
	if (!function_exists("ReadData")) {
		function ReadData($filelocation) {
			$file = fopen("data/".$filelocation, "r");
			$data = json_decode(fread($file, filesize("data/".$filelocation)), true);
			fclose($file);
			
			return $data;
		}
	}
		
	$settings = array(
		"staff",
		"cbox",
		"general",
		"music",
		"otherinformation",
		"style",
	);
		
	foreach ($settings as $setting) {
		$config[$setting] = ReadData($setting.".json");
	}
	
	$config["backgrounds"] = array_values(array_diff(scandir("inc/bg"), array('..', '.')));
?>