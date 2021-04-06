<style>
	#background1,
	#background2,
	#background3 {
		<?php if ($config["style"]["blurbg"]) {echo "filter: blur(5px);";} ?>
	}
	
	#background3 {
		<?php if ($config["style"]["darkbg"]) {echo "background-color: rgba(0, 0, 0, .3);";} ?>
		<?php if ($config["style"]["distort"]) {echo "background-image: url('inc/img/d.png');";} ?>
	}
</style>