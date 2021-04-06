<?php
	if (isset($_GET["steamid"])) {
		$userinfo = GetSteamInfo($_GET["steamid"], false, $config["apikey"]);
	} else {
		$userinfo = array(
			"username" => "tasid",
			"steamid" => "76561198210577821",
			"profilepic" => "inc/img/dp.png",
		);
	}
?>


<div class="container">
	<div class="topsection">
		<center>
			<h1><?php echo $config["general"]["servername"] ?></h1>
			<h2><?php echo $config["general"]["slogan"] ?></h2>
		
			<?php
				if (strlen($config["general"]["about"]) > 1) {
			?>
				<div class="about">
					<p><?php echo $config["general"]["about"] ?></p>
				</div>
			<?php
				}
			?>
			
			<?php
				if ($config["otherinformation"]["disable"] != true) {
			?>
				<p class="otherinfo"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp; <?php echo $config["otherinformation"]["website"] ?> &nbsp;&middot;&nbsp;
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; <?php echo $config["otherinformation"]["store"] ?>&nbsp; &middot;&nbsp;
				<i class="fa fa-microphone" aria-hidden="true"></i>&nbsp; <?php echo $config["otherinformation"]["voice"] ?></p>
			<?php
				}
			?>
		</center>
	</div>
	
	<div class="middle">
		<div class="section mid">
			<div class="profilepic">
				<img src="<?php echo $userinfo["profilepic"] ?>">
			</div>
			
			<div class="userdata">
				<p><?php echo $userinfo["username"] ?></p>
				<p><span style="color: rgb(200, 200, 200);"><?php echo $userinfo["steamid"] ?></span></p>
			</div>
		</div>
		
		<?php
			if ($config["otherinformation"]["disableserver"] != true) {
		?>
			<div class="section mid r">
				<p class="serverinfo"><i class="fa fa-map" aria-hidden="true"></i>&nbsp; <strong>Map:</strong> <span id="map">rp_downtown_v4c_v2</span></p>
				<p class="serverinfo"><i class="fa fa-gamepad" aria-hidden="true"></i>&nbsp; <strong>Gamemode:</strong> <span id="gamemode">DarkRP</span></p>
				<p class="serverinfo"><i class="fa fa-braille" aria-hidden="true"></i>&nbsp; <strong>Slots:</strong> <span id="slots">128</span></p>
			</div>
		<?php
			}
		?>
	</div>
	
	<div class="bottom">
		<?php
			if ($config["cbox"]["disable"] != true) {
		?>
			<div class="section bot">
				<div class="header">
					<?php echo $config["cbox"]["header"] ?>
				</div>
				
				<div class="cbox">
					<table>
						<?php
							$index = 1;
							foreach ($config["cbox"]["cbox"] as $cbox) {
								echo "<tr><td>".$index."</td><td>".$cbox."</td></tr>";
								$index = $index + 1;
							}
						?>
					</table>
				</div>
			</div>
		<?php
			}
		?>
		
		<?php
			if ($config["staff"]["disable"] != true) {
		?>
			<div class="section bot r">
				<div class="header">
					<?php echo $config["staff"]["header"] ?>
				</div>
				
				<div class="staff">
					<table>
						<?php
							$index = 0;
							foreach ($config["staff"]["staff"] as $staff) {
								$staffinfo = GetSteamInfo($staff["steamid"], true, $config["apikey"]);
								echo "<tr><td><img src='".$staffinfo["profilepic"]."'></td><td><p>".$staffinfo["username"]."</p><p>".$staff["rank"]."</p></center></td></tr>";
							}
						?>
					</table>
				</div>
			</div>
		<?php
			}
		?>
	</div>
</div>