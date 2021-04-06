<div class="topstrip">
	<div class="left">
		<h1 class="header"><?php echo $config["general"]["servername"] ?></h1>
		<h2 class="slogan"><?php echo $config["general"]["slogan"] ?></h2>
	</div>
	
	<div class="center">
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
		<center>
			<div class="profilesection">
				<div class="profilepic">
					<img src="<?php echo $userinfo["profilepic"] ?>">
				</div>
				
				<div class="userdata">
					<p><strong>Username: </strong><span><?php echo $userinfo["username"] ?></span></p>
					<p><strong>SteamID: </strong><span><?php echo $userinfo["steamid"] ?></span></p>
				</div>
			</div>
		</center>
	</div>
	
	<?php if ($config["music"]["disable"] != true) {echo "<div class='right'><i class='fa fa-volume-up' aria-hidden='true'></i>&nbsp; <span id='song'></span></div>";} ?>
</div>

<div class="main-section">
	<div class="innerholder">
		<?php
			if ($config["cbox"]["disable"] != true) {
		?>
			<div class="cbox">
				<div class="title"><?php echo $config["cbox"]["header"]; ?></div>
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
		<?php
			}
		?>
		
		<?php
			if (strlen($config["general"]["about"]) > 1) {
		?>
			<div class="about">
				<div class="title">About</div>
				<div class="content"><?php echo $config["general"]["about"] ?></div>
			</div>
		<?php
			}
		?>
		
		<?php
			if ($config["staff"]["disable"] != true) {
		?>
			<div class="staff">
				<div class="title"><?php echo $config["staff"]["header"] ?></div>
				<table>
					<?php
						$index = 0;
						foreach ($config["staff"]["staff"] as $staff) {
							if ($index == 5) {
								echo "</table><table style='margin-left: 10px;'>";
								$index = 0;
							}
							$userinfo = GetSteamInfo($staff["steamid"], true, $config["apikey"]);
							echo "<tr><td><img src='".$userinfo["profilepic"]."'></img></td><td><p>".$userinfo["username"]."</p><p>".$staff["rank"]."</p></td></tr>";
							$index = $index + 1;
						}
					?>
				</table>
			</div>
		<?php
			}
		?>
	</div>
</div>

<div class="bottom">
	<div class="bottomholder">
		<?php
			if ($config["otherinformation"]["disableserver"] != true) {
		?>
			<div class="inlineholder">
				<div class="title">Server Information</div>
				<div class="content">
					<p><i class="fa fa-map" aria-hidden="true"></i>&nbsp; Map: <span id="map">rp_downtown_v4c_v2</span></p>
					<p><i class="fa fa-gamepad" aria-hidden="true"></i>&nbsp; Gamemode: <span id="gamemode">DarkRP</span></p>
					<p><i class="fa fa-braille" aria-hidden="true"></i>&nbsp; Slots: <span id="slots">128</span></p>
				</div>                           
			</div>
		<?php
			}
		?>
		
		<?php
			if ($config["otherinformation"]["disable"] != true) {
		?>
			<div class="inlineholder">
				<div class="title">Other Information</div>
				<div class="content">
					<p><i class="fa fa-globe" aria-hidden="true"></i>&nbsp; Website: <span><?php echo $config["otherinformation"]["website"] ?></span></p>
					<p><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Store: <span><?php echo $config["otherinformation"]["store"] ?></span></p>
					<p><i class="fa fa-microphone" aria-hidden="true"></i>&nbsp; Voice: <span><?php echo $config["otherinformation"]["voice"] ?></span></p>
				</div>
			</div>
		<?php
			}
		?>
	</div>
</div>