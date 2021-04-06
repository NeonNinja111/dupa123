<?php
	function GetSteamInfo($steamid, $cache, $apikey) {
		$enable_cache = true;
		
		$cachefile = "cache/".$steamid.".json";
		$userdata = array();
		
		if (file_exists($cachefile) && time() - 86400 < filemtime($cachefile) && $cache == true && $enable_cache == true) {
			$file = fopen($cachefile, "r");
			$userdata = json_decode(fread($file, filesize($cachefile)), true);
			fclose($file);
		} else {
			$url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' .$apikey. '&steamids=' . $steamid;
			$json = file_get_contents($url);
			$table2 = json_decode($json, true);
			$table = $table2["response"]["players"][0];
			
			$userdata = array(
				"steamid" => $table["steamid"],
				"username" => $table["personaname"],
				"profilepic" => $table["avatarfull"],
			);
			
			if ($cache == true && $enable_cache == true && empty($table["steamid"]) != 1) {
				$file = fopen($cachefile, "w") or die("ERR");
				fwrite($file, json_encode($userdata));
				fclose($file);
			}
		}
		
		return $userdata;
	}
?>