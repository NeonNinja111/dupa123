<?php
    require("inc/php/steamauth.php");
	include("config.php");
	include("inc/php/steamapi.php");
	
	$success = isset($_GET["success"]);
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="inc/css/style.css">
		<link rel="stylesheet" type="text/css" href="inc/css/admin.css">
		
		<script src="inc/js/jquery.js" type="text/javascript"></script>
		
		<title>Tee Load by tasid</title>
	</head>

	<body>
		<?php
			if (isset($_SESSION["steamid"]) && in_array($_SESSION["steamid"], $config["admins"])) {
		?>
			<div class="container">
				<?php
					if ($success == true) {
						echo "<div style='border-radius: 8px; background-color: rgba(0, 165, 135, .5); padding: 10px 20px; margin-bottom: 20px;'>Successfully updated settings</div>";
					}
				?>
				<form action="save.php" method="post">
					<div class="side">
						<div class="holder">
							<h1>General</h1>
							<hr>
							<input type="text" name="general[servername]" placeholder="Server Name" value="<?php echo $config["general"]["servername"] ?>"><br>
							<input type="text" name="general[slogan]" placeholder="Slogan" value="<?php echo $config["general"]["slogan"] ?>"><br>
							<textarea name="general[about]" rows="10" placeholder="About"><?php echo $config["general"]["about"] ?></textarea>
						</div>
						
						<div class="holder">
							<h1>Information</h1>
							<hr>
							<input type="text" name="otherinformation[website]" placeholder="Website" value="<?php echo $config["otherinformation"]["website"] ?>"><br>
							<input type="text" name="otherinformation[store]" placeholder="Store" value="<?php echo $config["otherinformation"]["store"] ?>"><br>
							<input type="text" name="otherinformation[voice]" placeholder="Voice" value="<?php echo $config["otherinformation"]["voice"] ?>"><br>
							<label class="cont">Disable Other Information<input name="otherinformation[disable]" type="checkbox" value="true" <?php if ($config["otherinformation"]["disable"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<label class="cont">Disable Server Information<input name="otherinformation[disableserver]" type="checkbox" value="true" <?php if ($config["otherinformation"]["disableserver"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
						</div>
					
						<div class="holder staffholder">
							<h1>Staff</h1>
							<hr>
							<input type="text" name="staff[header]" placeholder="Staff Header" value="<?php echo $config["staff"]["header"] ?>" style="width: 370px;"><br>
							<?php
								$index = 0;
								
								foreach ($config["staff"]["staff"] as $staff) {
									if ($index == 0) {
										echo '<div id="staffrow'.$index.'"><input type="text" name="staff[staff]['.$index.'][steamid]" placeholder="SteamID" value="'.$staff["steamid"].'"><input type="text" name="staff[staff]['.$index.'][rank]" placeholder="Rank" value="'.$staff["rank"].'"><button type="button" class="btn_add" id="add_staff">+</button></div>';
									} else {
										echo '<div id="staffrow'.$index.'"><input type="text" name="staff[staff]['.$index.'][steamid]" placeholder="SteamID" value="'.$staff["steamid"].'"><input type="text" name="staff[staff]['.$index.'][rank]" placeholder="Rank" value="'.$staff["rank"].'"><button type="button" id="'.$index.'" class="remove_staff btn_remove">-</button></div>';
									}
									
									$index = $index + 1;
								}
							?>
						</div>
						<label class="cont">Disable Staff<input name="staff[disable]" type="checkbox" value="true" <?php if ($config["staff"]["disable"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
					
						<div class="holder musicholder">
							<h1>Music</h1>
							<hr>
							<?php
								$index = 0;
								
								foreach ($config["music"]["music"] as $music) {
									if ($index == 0) {
										echo '<div id="musicrow'.$index.'"><input type="text" name="music[music]['.$index.'][id]" placeholder="File ID" value="'.$music["id"].'"><input type="text" name="music[music]['.$index.'][name]" placeholder="Song Name" value="'.$music["name"].'"><button type="button" class="btn_add" id="add_music">+</button></div>';
									} else {
										echo '<div id="musicrow'.$index.'"><input type="text" name="music[music]['.$index.'][id]" placeholder="File ID" value="'.$music["id"].'"><input type="text" name="music[music]['.$index.'][name]" placeholder="Song Name" value="'.$music["name"].'"><button type="button" id="'.$index.'" class="remove_music btn_remove">-</button></div>';
									}
									
									$index = $index + 1;
								}
							?>
						</div>
						<input type="number" name="music[volume]" min="1" max="100" placeholder="Volume 1-100" value="<?php echo $config["music"]["volume"] ?>"><br>
						<label class="cont">Shuffle Music<input name="music[shuffle]" type="checkbox" value="true" <?php if ($config["music"]["shuffle"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
						<label class="cont">Disable Music<input name="music[disable]" type="checkbox" value="true" <?php if ($config["music"]["disable"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
					</div>
					
					<div class="side">
						<div class="holder">
							<h1>Style</h1>
							<hr>
							
							 <input type="hidden" class="<?php echo $config["style"]["theme"]; ?>" id="themeselected" name="style[theme]" value="<?php echo $config["style"]["theme"]; ?>">

							<?php
								$themedir = "inc/themes";
								$themes = array_diff(scandir($themedir), array('..', '.'));
									
								foreach ($themes as $theme) {
									$images = array();
								
									foreach (glob($themedir."/".$theme."/*.jpg") as $img) {
									  $images[] = $img;
									}
									
									echo '<button class="btn_theme '.(($theme == $config["style"]["theme"])?'btn_selected':'').'" type="button" id="'.$theme.'"><img src="'.$images[0].'"></button>';
								}
							?>
							<label class="cont">Light mode<input name="style[light]" type="checkbox" value="true" <?php if ($config["style"]["light"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<label class="cont">Darken background<input name="style[darkbg]" type="checkbox" value="true" <?php if ($config["style"]["darkbg"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<label class="cont">Distort background<input name="style[distort]" type="checkbox" value="true" <?php if ($config["style"]["distort"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<label class="cont">Responsive <span style="color: rgb(0, 235, 200);">(fits for smaller screens)</span><input name="style[responsive]" type="checkbox" value="true" <?php if ($config["style"]["responsive"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<label class="cont">Blur background <span style="color: rgb(255, 140, 140);">(chromium branch only)</span><input name="style[blurbg]" type="checkbox" value="true" <?php if ($config["style"]["blurbg"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<label class="cont">Blur elements <span style="color: rgb(255, 140, 140);">(chromium branch only)</span><input name="style[blur]" type="checkbox" value="true" <?php if ($config["style"]["blur"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
							<input type="number" name="style[cycletime]" min="1" placeholder="Background Cycle Time (seconds)" value="<?php echo $config["style"]["cycletime"] ?>"><br>
						</div>
					
						<div class="holder cboxholder">
							<h1>Custom Box</h1>
							<hr>
							<input type="text" name="cbox[header]" placeholder="Custom Box Header" value="<?php echo $config["cbox"]["header"] ?>"><br>
							<?php
								$index = 0;
								
								foreach ($config["cbox"]["cbox"] as $rule) {
									if ($index == 0) {
										echo '<div id="cboxrow'.$index.'"><input type="text" name="cbox[cbox][]" placeholder="Rule" value="'.$rule.'"><button type="button" class="btn_add" id="add_rule">+</button></div>';
									} else {
										echo '<div id="cboxrow'.$index.'"><input type="text" name="cbox[cbox][]" placeholder="Rule" value="'.$rule.'"><button type="button" id="'.$index.'" class="remove_rule btn_remove">-</button></div>';
									}
									
									$index = $index + 1;
								}
							?>
						</div>
						<label class="cont">Disable Custom Box<input name="cbox[disable]" type="checkbox" value="true" <?php if ($config["cbox"]["disable"] == true) {echo "checked";} ?>><span class="checkmark"></span></label>
					</div>
							
					<input class="btn_save" type="submit" value="Save">
				</form>
				
				<?php logoutbutton(); ?>
				
				<?php
					$url = substr($_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"], 0, -10)."/load.php?steamid=%s";
					
					echo "<code style='border-radius: 5px; background-color: rgb(240, 240, 240); color: #e83e8c; text-shadow: none; padding: 5px 10px; display: block; margin-top: 10px;'>sv_loadingurl \"".$url."\"</code>";
				?>
			</div>
			
			<?php include("inc/js/admin.php") ?>
		<?php
			} else {
				
		?>
			<div class="center">
				<center>
					<h1>Tee Load - Admin Login</h1>
					<?php
						if (isset($_SESSION["steamid"]) && !in_array($_SESSION["steamid"], $config["admins"])) {
							echo "<span>Access Denied</span>";
							logoutbutton();
						} else {
							loginbutton();
						}
					?>
				</center>
			</div>
		<?php
			}
		?>
	</body>
</html>