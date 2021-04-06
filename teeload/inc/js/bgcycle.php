<script type="text/javascript">
	var index = 0;
	var imagesArray = <?php echo json_encode($config["backgrounds"]); ?>;
	var background1 = $("#background1");
	var background2 = $("#background2");

	background2.css("background","url('inc/bg/"+ imagesArray[index] +"') no-repeat bottom center fixed");
	background2.css("background-size", "cover");
	
	setInterval(changeImage, <?php echo $config["style"]["cycletime"] * 1000 ?>);

	function changeImage(){
		background2.css("background","url('inc/bg/"+ imagesArray[index] +"') no-repeat bottom center fixed");
		background2.css("background-size", "cover");
		
		background1.hide();

		index++;
		if(index >= imagesArray.length){
			index = 0;
		}
		
		background1.css("background","url('inc/bg/"+ imagesArray[index] +"') no-repeat bottom center fixed");
		background1.css("background-size", "cover");
		background1.fadeIn();
	}
</script>