<script type="text/javascript">
	var music = <?php echo json_encode($config["music"]["music"]) ?>
	
	function setMusic(id) {
		$("#audio")[0].setAttribute("src", "music/"+music[id]["id"]+".ogg")
		$("#audio")[0].play()
		$("#song").html(music[id]["name"])
	}
	
	<?php 
		if ($config["music"]["shuffle"] == true) {
	?>
		setTimeout(function() {
			setMusic(Math.floor((Math.random() * (music.length))))
			$("#audio").prop("volume", <?php echo $config["music"]["volume"] / 100 ?>)
		}, 500);
		
		$("#audio").on("ended", function() {
			setMusic(Math.floor((Math.random() * (music.length))))
		});
	<?php
		} else {
	?>
		var i = 1
		
		setTimeout(function() {
			setMusic(0)
			$("#audio").prop("volume", <?php echo $config["music"]["volume"] / 100 ?>)
		}, 500);
		
		$("#audio").on("ended", function() {
			setMusic(i)
			i++
			if (i == music.length) {
				i = 0
				console.log(i)
			}
		});
	<?php
		}
	?>
</script>