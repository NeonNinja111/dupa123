<script type="text/javascript">
	var cbox_i = <?php echo sizeof($config["cbox"]["cbox"]) ?>
	
	$('#add_rule').click(function() {
		cbox_i++;
		$(".cboxholder").append('<div id="cboxrow'+cbox_i+'"><input type="text" name="cbox[cbox][]" placeholder="Rule"><button type="button" id='+cbox_i+' class="remove_rule btn_remove">-</button></div>');
	});
	
	$(document).on('click', '.remove_rule', function(){
		var button_id = $(this).attr("id");
		$('#cboxrow'+button_id+'').remove();
	});
	
	var staff_i = <?php echo sizeof($config["staff"]["staff"]) ?>
	
	$('#add_staff').click(function() {
		staff_i++;
		$(".staffholder").append('<div id="staffrow'+staff_i+'"><input type="text" name="staff[staff]['+staff_i+'][steamid]" placeholder="SteamID"><input type="text" name="staff[staff]['+staff_i+'][rank]" placeholder="Rank"><button type="button" id='+staff_i+' class="remove_staff btn_remove">-</button></div>');
	});
	
	$(document).on('click', '.remove_staff', function(){
		var button_id = $(this).attr("id");
		$('#staffrow'+button_id+'').remove();
	});
	
	var music_i = <?php echo sizeof($config["music"]["music"]) ?>
	
	$('#add_music').click(function() {
		music_i++;
		$(".musicholder").append('<div id="musicrow'+music_i+'"><input type="text" name="music[music]['+music_i+'][id]" placeholder="File ID"><input type="text" name="music[music]['+music_i+'][name]" placeholder="Song Name"><button type="button" id='+music_i+' class="remove_music btn_remove">-</button></div>');
	});
	
	$(document).on('click', '.remove_music', function(){
		var button_id = $(this).attr("id");
		$('#musicrow'+button_id+'').remove();
	});
	
	var themes = <?php echo json_encode($themes); ?>;
	
	$(document).on('click', '.btn_theme', function() {
		var button_id = $(this).attr("id");
		$('#rulerow'+button_id+'').remove();
	
		for (theme in themes) {
			if (themes[theme] == button_id) {
				var oldtheme = $('#themeselected').attr('class');
				
				$('#'+oldtheme).attr('class', 'btn_theme');
				$('#'+themes[theme]).attr('class', 'btn_theme btn_selected');
				$('#themeselected').attr('class', themes[theme]);
				$('#themeselected').attr('value', themes[theme]);
			}
		}
	});
</script>