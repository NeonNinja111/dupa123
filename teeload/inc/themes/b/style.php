<style>
.section {
	<?php if ($config["style"]["light"] == true) {echo "background-color: rgba(255, 255, 255, .2); box-shadow: 1px 1px 8px #000;";} ?>
	<?php if ($config["style"]["blur"] == true) {echo "backdrop-filter: blur(5px)";} ?>
}

.header {
	<?php if ($config["style"]["light"] == true) {echo "background-color: rgba(255, 255, 255, .1);";} ?>
}

.cbox table tr td:first-child {
	<?php if ($config["style"]["light"] == true) {echo "border-color: rgba(255, 255, 255, .4);";} ?>
}

<?php
	if ($config["style"]["responsive"] == true) {
?>

@media only screen and (max-width:85.375em) {
	.container {
		height: 720px;
		width: 800px;
	}
	
	.bot {
		min-height: 200px;
	}
	
	h1 {
		font-size: 35px;
	}

	h2 {
		font-size: 18px;
	}
	
	.otherinfo,
	.about p {
		font-size: 14px;
	}
}

<?php
	}
?>
</style>