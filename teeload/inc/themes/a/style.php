<style>
.topstrip {
	<?php if ($config["style"]["light"] == true) {echo "background-color: rgba(255, 255, 255, .2); box-shadow: 1px 1px 8px #000;";} ?>
	<?php if ($config["style"]["blur"] == true) {echo "backdrop-filter: blur(5px)";} ?>
}

.title {
	<?php if ($config["style"]["light"] == true) {echo "background-color: rgba(255, 255, 255, .1);";} ?>
}

.bottom .bottomholder .inlineholder,
.main-section .about,
.main-section .cbox,
.main-section .staff {
	<?php if ($config["style"]["light"] == true) {echo "background-color: rgba(255, 255, 255, .1); box-shadow: 1px 1px 8px #000;";} ?>
	<?php if ($config["style"]["blur"] == true) {echo "backdrop-filter: blur(5px)";} ?>
}

.main-section .cbox table tr td:first-child {
	<?php if ($config["style"]["light"] == true) {echo "background-color: rgba(255, 255, 255, .1);";} ?>
}

<?php
	if ($config["style"]["responsive"] == true) {
?>

@media only screen and (max-width:85.375em) {
	.topstrip,
	.topstrip .right,
	.topstrip .center,
	.topstrip .left {
		height: 80px;
	}

	.profilepic img {
		height: 52px;
	}
		
	.userdata p:first-child {
		margin-top: 16px;
	}

	.userdata p {
		font-size: 16px;
	}

	.header {
		font-size: 35px;
	}

	.slogan {
		font-size: 18px;
	}

	.right {
		font-size: 18px;
		padding-top: 30px;
	}

	.right span {
		color: rgb(220, 220, 220);
	}
	
	.title {
		font-size: 18px;
		padding: 10px;
	}
	
	.main-section {
		top: 100px;
	}
	
	.main-section .cbox table tr td,
	.main-section .about {
		font-size: 14px;
	}

	.main-section .staff table td img {
		height: 34px;
	}

	.main-section .cbox table tr:nth-child(n + 6) {
		display: none;
	}

	.main-section .staff table td p:first-child {
		font-size: 16px;
	}

	.main-section .staff table td p:last-child {
		font-size: 14px;
	}
	
	.bottom .bottomholder .inlineholder .content {
		padding: 0;
	}
	
	.bottom .bottomholder .inlineholder .content p {
		font-size: 14px;
	}
}

<?php
	}
?>
</style>