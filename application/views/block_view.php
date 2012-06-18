<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="/webexp/js/jquery-1.6.1.min"></script>
<script type="text/javascript" src="/webexp/js/<?php echo $js_file;?>"></script>
<script type="text/javascript" src="/webexp/js/json2"></script>
</head>
<body>

<div id="instructions" align="center"><font size="20" face="arial" color="black"> <?php echo($instructions);?> </font>
</br><button name="start_trials" id="start_trials" align="center" ><font size="10" face="arial" color="black">I understand</font></button></div>
<div id="start" style="display : none" align="center"><font size="20" face="arial" color="black"> STARTING TRIALS </font></div>
<div style="margin-top: 150px;"><table width="60%" align="center">
<?php foreach($trials as $i=>$trial) : ?>
	<tr id="row_<?php echo($i);?>" value="<?php echo($trial['correct_array']);?>" trialno="<?php echo($trial['id']);?>"  style="display : none">
	<?php foreach($trial['stims'] as $key=>$t) : ?>	
	<td id="cell_<?php echo($i . "_" . $key);?>"><div align="center" ><img src="/webexp/img/<?php echo($t['img']);?>"  alt="<?php echo($t['img']);?>" width="200" height="200" /></div></td>
	<?php endforeach; ?></tr>
	<?php endforeach; ?>
	<tr id="positive_feedback" name="feedback"style="display : none"><td colspan="2"><div style="padding-top: 25px;" align="center" id="positive_feedback_div" name="feedback"><img src="/webexp/img/<?php echo($positive_img);?> " width="100" height="100" alt="+1" /><div></td></tr>
	<tr id="negative_feedback" name="feedback" style="display : none"><td colspan="2"><div style="padding-top: 25px;" align="center" id="negative_feedback_div" name="feedback"><img src="/webexp/img/<?php echo($negative_img);?> " width="100" height="100" alt="-3" /><div></td></tr>
	<tr id="neutral_feedback" name="feedback" style="display : none"><td colspan="2"><div style="padding-top: 25px;" align="center" id="neutral_feedback_div" name="feedback"><img src="/webexp/img/<?php echo($neutral_img);?> " width="100" height="100" alt="0" /><div></td></tr>
		<tr id="fixation" name="fixation" style="display : none"><td colspan="2"><div align="center" id="fixation_div" name="fixation"><img src="/webexp/img/Fixation_Cross.png" width="200" height="200" alt="fixation" /><div></td></tr>
	</table>
</div>

<form action="/webexp/index.php/result_handler/submit" name="myform" method="post">
	<input type="hidden" name="json_res" id="json_res" value="">
	<!--<input type="hidden" name="subject" id="subject" value="">-->
	<input type="hidden" name="verify"	value="1">
</form>
	

<script>
	$('#start_trials').click(function(){
		$('#instructions').hide();
		$('#start_trials').remove();
		$('#start').show();
		trial(<?php echo $numtrials . ',' . $valid_responses . ',' . $timeout . ',' . $fb_time . ',' . $fixation ?>);
		});
	//trial(<?php echo $numtrials . ',' . $valid_responses . ',' . $timeout ?>);
	$(document).keypress(function(e){keypress(e);});
</script>
</body>
</html>