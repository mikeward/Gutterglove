<?php

require_once WPSQT_DIR.'lib/Wpsqt/Page/Main/Results.php';

class Wpsqt_Page_Main_Results_Poll extends Wpsqt_Page_Main_Results {
	
	public function init(){
		$this->_pageView = 'admin/poll/result.php';
	}

	public function displayResults($pollId) {
		global $wpdb;

		$results = $wpdb->get_row(
					$wpdb->prepare("SELECT * FROM `".WPSQT_TABLE_SURVEY_CACHE."` WHERE item_id = %d",
								   array($_GET['id'])), ARRAY_A
								);
		
		$sections = unserialize($results['sections']);

		foreach ($sections as $section) {
			foreach ($section['questions'] as $question) {
				$total = 0;
				foreach($question['answers'] as $answer) {
					$total += $answer['count'];
				}
				echo '<h3>'.$question['name'].'</h3>';
				?>
				<table class="widefat post fixed" cellspacing="0">
				<thead>
					<tr>
						<th class="manage-column column-title" scope="col">Answer</th>
						<th scope="col" width="75">Votes</th>
						<th scope="col" width="90">Percentage</th>
					</tr>			
				</thead>
				<tfoot>
					<tr>
						<th class="manage-column column-title" scope="col">Answer</th>
						<th scope="col" width="75">Votes</th>
						<th scope="col" width="90">Percentage</th>
					</tr>			
				</tfoot>
				<tbody>
				<?php
				foreach ($question['answers'] as $answer) {
					$percentage = round($answer['count'] / $total * 100, 2);
					echo '<tr>';
						echo '<td>'.$answer['text'].'</td>';
						echo '<td>'.$answer['count'].'</td>';
						echo '<td>'.$percentage.'%</td>';
					echo '</tr>';
				}
				?>
				</tbody>
				</table>
				<?php
			}
		}
	}
	
}

?>