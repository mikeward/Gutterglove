<?php if ( $sections == false ) { ?>

	<p>There are no results for this survey yet.</p>

<?php } else { ?>

	<?php foreach ( $sections as $sectionKey => $secton ){
			foreach ( $secton['questions'] as $questonKey => $question ) {
		?>
			<div class="wpsqt-question-review">
			<h3><?php echo $question['name']; ?></h3>

			<?php if ( $question['type'] == "Multiple Choice" ||
					   $question['type'] == "Dropdown" ) {
						$googleChartUrl = 'http://chart.apis.google.com/chart?chs=400x185&cht=p&chf=bg,s,'.get_option("wpsqt_chart_bg").'&chco='.get_option("wpsqt_chart_colour");
						$valueArray    = array();
						$nameArray     = array();
					   foreach ( $question['answers'] as $answer ) {
					   		$nameArray[] = $answer['text'];
							$valueArray[] = $answer['count'];
					   }

						$googleChartUrl .= '&chd=t:'.implode(',', $valueArray);
						$googleChartUrl .= '&chl='.implode('|',$nameArray);
						?>

						<img class="wpsqt-chart" src="<?php echo $googleChartUrl; ?>" alt="<?php echo $question['name']; ?>" />
				<?php } else if ($question['type'] == "Free Text") {

						$i = 1; // Variable used to count answers - used later

						?> <em>All answers for this question</em> <?php

						foreach($uncachedresults as $uresult) {
							$usection = unserialize($uresult['sections']);

							foreach($usection as $result) {

								foreach($result['answers'] as $uanswerkey => $uanswer) {
									if($uanswerkey == $questonKey && in_array($uanswerkey, $freetextq)) {
										echo '<p>'.$i.') '.$uanswer['given'][0].'</p>';
										$i++;
									}

								}
							}

						}
					  } else if ($question['type'] == "Likert") {
							$googleChartUrl = 'http://chart.apis.google.com/chart?&cht=bvs&chf=bg,s,'.get_option("wpsqt_chart_bg").'&chco='.get_option("wpsqt_chart_colour");
							$valueArray    = array();
							$nameArray     = array();
							$maxValue = 0;
							$numAnswers = count($question['answers']);
							
							// Populates data array
							foreach ( $question['answers'] as $key => $answer ) {
								$nameArray[] = $key;
								$valueArray[] = $answer['count'];
								// Gets the maximum value
								if ($answer['count'] > $maxValue)
									$maxValue = $answer['count'];
							}
							// Makes chart wider if its an agree/disagree question
							if (array_key_exists('disagree', $question['answers'])) {
								$googleChartUrl .= '&chs=500x250&chbh=r,70,10';
								$googleChartUrl .= '&chxt=x&chxl=0:|Strongly Disagree|Disagree|No Opinion|Agree|Strongly Agree'; // Sets labelling to x-axis only
							} else {
								$googleChartUrl .= '&chs=350x250';
								$googleChartUrl .= '&chxt=x&chxl=0:|'.implode('|', $nameArray); // Sets labelling to x-axis only
							}
							$googleChartUrl .= '&chm=N,000000,0,,10|N,000000,1,,10|N,000000,2,,10'; // Adds the count above bars
							$googleChartUrl .= '&chds=0,'.(++$maxValue); // Sets scaling to a little bit more than max value
							$googleChartUrl .= '&chd=t:'.implode(',', $valueArray); // Chart data
							?><img class="wpsqt-chart" src="<?php echo $googleChartUrl; ?>" alt="<?php echo $question['name']; ?>" /><?php
					  } else {
							echo 'Something went really wrong, please report this bug to the forum. Here\'s a var dump which might make you feel better.<pre>'; var_dump($question); echo '</pre>';
					  } ?>
					<div class="wpsqt-question-info">
						<div class="wpsqt-question-title">Question Info</div>
						<?php for ($i = 0; $i < count($nameArray); $i++) {
							echo '<div class="wpsqt-question-response">'.$nameArray[$i].':&nbsp;'.$valueArray[$i].'&nbsp;entries</div>';
						} ?>
	<?php $givenAnswers = $wpdb->get_row("SELECT `sections` FROM `".WPSQT_TABLE_RESULTS."` ORDER BY `id` DESC LIMIT 1", ARRAY_A);
	$givenAnswers = unserialize($givenAnswers['sections']);
	$givenAnswers = $givenAnswers[$sectionKey]['answers'][$questonKey]['given'];
	echo '<div class="wpsqt-question-response-you">You entered: ';
	if (is_array($givenAnswers)) {
		foreach ($givenAnswers as $givenAnswer) {
			foreach($_SESSION['wpsqt'][$_SESSION['wpsqt']['current_id']]['sections'][$sectionKey]['questions'] as $question) {
				if ($question['id'] == $questonKey) {
					echo $question['answers'][$givenAnswer]['text'].' ';
				}
			}
		}
	} else {
		echo $givenAnswers;
	}
?>
</div>
					</div>
					</div>
					<?php } ?>
		<?php } ?>
		<div class="wpsqt-survey-info">
			<strong>Survey info</strong> <?php
			$nOfParticipants = $wpdb->get_var("SELECT `total` FROM `".WPSQT_TABLE_SURVEY_CACHE."` WHERE `item_id` = '".$_SESSION['wpsqt']['item_id']."'");
			echo '<p>There has been '.$nOfParticipants.' participants</p>';
		?></div><?php
} ?>
