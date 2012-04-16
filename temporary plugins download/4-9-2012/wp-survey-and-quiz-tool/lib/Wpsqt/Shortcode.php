<?php
require_once WPSQT_DIR.'lib/Wpsqt/Question.php';
require_once WPSQT_DIR.'lib/Wpsqt/Mail.php';
if ( !defined('DONOTCACHEPAGE') ){
	define('DONOTCACHEPAGE',true);
}
if (!defined ('exclude_from_search') ) {
	//define('exclude_from_search',true);
}


	/**
	 * Handles the main displaying and processing
	 * of the quizzes and surveys.
	 *
	 * @author Iain Cambridge
	 * @copyright Fubra Limited 2010-2011, all rights reserved.
	 * @license http://www.gnu.org/licenses/gpl.html GPL v3
	 */

class Wpsqt_Shortcode {

	/**
	 * Defines what step in the quiz/survey we are in.
	 *
	 * @var integer
	 * @since 2.0
	 */
	protected $_step;

	/**
	 * Holds any errors which have happened within
	 * the process from construction to display.
	 *
	 * @var array
	 * @since 2.0
	 */
	protected $_errors = array();

	/**
	 * Contains either quiz or survey. Used for selected
	 * what filters are applied
	 *
	 * @var string
	 * @since 2.0
	 */
	protected $_type;

	/**
     * The current section key.
     *
     * @var integer
     * @since 2.0
	 */
	protected $_key;
	/**
	 * The identifier for the question.
	 *
	 * @var string
	 * @since 2.0
	 */
	protected $_identifier;

	protected $_acceptableTypes = array('quiz','survey', 'poll');

	/**
	 * Starts the shortcode off firstly checks to see
	 * if there is a wpsqt key item in the session
	 * array. Then checks to see if there is a step
	 * number provided if not it's zero. If the step
	 * is zero we then build up the quiz data, fetching
	 * the quiz first, then fetching the sections.
	 *
	 * @param integer $identifier
	 * @since 2.0
	 */
	public function __construct($identifier,$type){

		global $wpdb;

		if ( !isset($_SESSION['wpsqt']) ){
			$_SESSION['wpsqt'] = array();
		}

		if ( empty($identifier) ) {
			$this->_errors['name'] = "The name is missing for ".$type;
		}

		$this->_acceptableTypes = apply_filters("wpsqt_shortcode_types",$this->_acceptableTypes);
		$this->_acceptableTypes = array_map("strtolower",$this->_acceptableTypes);
		if ( !in_array($type, $this->_acceptableTypes) ) {
			$this->_errors['type'] = "Invalid type given";
		}

		$_SESSION['wpsqt']['current_type'] = $type;
		$this->_type = $type;
		$this->_step = ( isset($_POST['step']) && ctype_digit($_POST['step']) ) ? intval($_POST['step']) : 0;
		if ( $this->_step == 0 ){

			$_SESSION['wpsqt'][$identifier]['start_time'] = microtime(true);
			$_SESSION['wpsqt'][$identifier]['person'] = array();
			$_SESSION['wpsqt'][$identifier]['details'] = Wpsqt_System::getItemDetails($identifier, $type);

			$_SESSION['wpsqt']['current_id'] = $identifier;
			$_SESSION['wpsqt']['item_id'] = $_SESSION['wpsqt'][$identifier]['details']['id'];
			if ( !empty($_SESSION['wpsqt'][$identifier]['details']) ){
				$_SESSION['wpsqt'][$identifier]['sections'] = $wpdb->get_results(
														$wpdb->prepare("SELECT * FROM `".WPSQT_TABLE_SECTIONS."` WHERE item_id = %d ORDER BY `id` ASC",
																		array($_SESSION['wpsqt'][$identifier]['details']['id'])), ARRAY_A
												);
			} else {
				$noquiz = true;
			}

		}

		if ( empty($_SESSION['wpsqt'][$identifier]['details']) ){
			if ( !isset($noquiz) ){
				$this->_errors['session'] = true;
			} else {
				$this->_errors['noexist'] = true;
			}
		}

	}

	/**
	 * Displays the quiz/survey.
	 *
	 * @since 2.0
	 */

	// Guy 1: What does this do?
	// Guy 2: Dunno.
	// Guy 1: What does the comment say?
	// Guy 2: "Displays the quiz/survey"
	// Guy 2: I better look at the source!
	// http://geekandpoke.typepad.com/.a/6a00d8341d3df553ef014e5f3e2868970c-pi
	public function display(){

		global $wpdb;

		// Check and see if there is a major issue.
		if ( !empty($this->_errors) ){
			global $message;
			if ( isset($this->_errors["session"]) ){
				$message = "PHP Sessions error. Check your sessions settings.";
			} elseif ( isset($this->_errors["noexist"]) ){
				$message = "No such quiz/survey/poll";
			} elseif ( isset($this->_errors['name']) ) {
				$message = "No quiz identifier/name was given";
			} elseif ( isset($this->_errors["type"]) ){
				$message = "Invalid type given";
			}
			$message = apply_filters("wpsqt_".$this->_type."_error",$message, $this->_errors);
			echo $message;
			return;
		}
		$quizName = $_SESSION['wpsqt']['current_id'];

		// Checks if limiting per IP is enabled and if the user has already taken it
		if (isset($_SESSION['wpsqt'][$quizName]['details']['limit_one']) && $_SESSION['wpsqt'][$quizName]['details']['limit_one'] == 'yes') {
			$item_id = $_SESSION['wpsqt'][$quizName]['details']['id'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$results = $wpdb->get_results('SELECT * FROM `'.WPSQT_TABLE_RESULTS. '` WHERE `ipaddress` = "'.$ip.'" AND `item_id` = "'.$item_id.'"', ARRAY_A);
			if (count($results) != 0) {
				echo 'You appear to have already taken this '.$this->_type.'.';
				if ($this->_type == 'poll' && isset($_SESSION['wpsqt'][$quizName]['details']['show_results_limited']) && $_SESSION['wpsqt'][$quizName]['details']['show_results_limited'] == 'yes') {
					require_once WPSQT_DIR.'/lib/Wpsqt/Page.php';
					require_once WPSQT_DIR.'/lib/Wpsqt/Page/Main/Results/Poll.php';
					Wpsqt_Page_Main_Results_Poll::displayResults($item_id);
				}
				return;
			}
		}
		
		// Checks if limiting per WP user is enabled and if the user has already taken it
		if (isset($_SESSION['wpsqt'][$quizName]['details']['limit_one_wp']) && $_SESSION['wpsqt'][$quizName]['details']['limit_one_wp'] == 'yes') {
			global $user_login;
			$item_id = $_SESSION['wpsqt'][$quizName]['details']['id'];
			$results = $wpdb->get_results('SELECT * FROM `'.WPSQT_TABLE_RESULTS. '` WHERE `item_id` = "'.$item_id.'"', ARRAY_A);
			foreach ($results as $result) {
				if (isset($result['person_name']) && $result['person_name'] == $user_login) {
					echo 'You appear to have already taken this '.$this->_type.'.';
					return;
				}
			}
		}


		// handle contact form and all the stuff that comes with it.
		if ( isset($_SESSION['wpsqt'][$quizName]['details']['contact']) && $_SESSION['wpsqt'][$quizName]['details']['contact'] == "yes" && $this->_step <= 1 ){
			$fields = $wpdb->get_results(
							$wpdb->prepare("SELECT * FROM `".WPSQT_TABLE_FORMS."` WHERE item_id = %d ORDER BY id ASC",
							array($_SESSION['wpsqt'][$quizName]['details']['id'])),ARRAY_A
										);
			$fields = apply_filters("wpsqt_".$this->_type."_form_fields",$fields);

			if ( $this->_step == 1 ){
				$errors = array();
				$_SESSION['wpsqt'][$quizName]['person'] = array();
				foreach ( $fields as $key => $field ){

					if ( empty($field) ){
						continue;
					}

					$fieldName = preg_replace('~[^a-z0-9]~i','',$field['name']);
					$fields[$key]['value'] = $_POST["Custom_".$fieldName];

					if ( !isset($_POST["Custom_".$fieldName]) || empty($_POST["Custom_".$fieldName]) ){
						if ( $field['required'] == 'yes' ){
							$errors[] = $field['name'].' is required';
						}
					} else {
						$field['value'] = $_POST["Custom_".$fieldName];
						$_SESSION['wpsqt'][$quizName]['person'][ strtolower($field['name']) ] = $_POST["Custom_".$fieldName];
					}
				}

				if ( !empty($errors) ) {
					do_action("wpsqt_".$this->_type."_form","original");
					require_once Wpsqt_Core::pageView('site/shared/custom-form.php');
					return;
				}

			} else {
				do_action("wpsqt_".$this->_type."_form","original");
				require_once Wpsqt_Core::pageView('site/shared/custom-form.php');
				return;
			}

		}
		if ( isset($_SESSION['wpsqt'][$quizName]['details']['contact']) && $_SESSION['wpsqt'][$quizName]['details']['contact'] == "yes" ){
			$this->_key = $this->_step - 1;
		} else {
			$this->_key = $this->_step;
		}





		// Handles the timer if enabled
		if ($this->_key == 0) {
			$timeTaken = 0;
		} else {
			$timeTaken = round(microtime(true) - $_SESSION['wpsqt'][$quizName]['start_time'], 0);
		}
		if (is_page() || is_single()) {
			if (isset($_SESSION['wpsqt'][$quizName]['details']['timer']) && $_SESSION['wpsqt'][$quizName]['details']['timer'] != '0' && $_SESSION['wpsqt'][$quizName]['details']['timer'] != "") {
				$timerVal = (((int) $_SESSION['wpsqt'][$quizName]['details']['timer']) * 60) - $timeTaken;
				echo '<div class="timer" style="float: right;"></div>';
				?>
					<script type="text/javascript">
						jQuery(document).ready( function(){
							var timeSecs = <?= $timerVal; ?>;
							var refreshId = setInterval(function() {
								if (timeSecs != 0) {
									timeSecs = timeSecs - 1;
									var timeMins = timeSecs / 60;
									timeMins = (timeMins<0?-1:+1)*Math.floor(Math.abs(timeMins)); // Gets rid of the decimal place
									var timeSecsRem = timeSecs % 60;
									if (timeMins > 0) {
										jQuery(".timer").html("Time Left: " + timeMins + " mins and " + timeSecsRem + " seconds");
									} else {
										jQuery(".timer").html("Time Left: " + timeSecsRem + " seconds");
									}
								} else {
									jQuery(".quiz").html("Unfortunately you have run out of time for this quiz.");
									jQuery(".timer").hide();
								}
							}, 1000);
						});
					</script>
				<?php
			}
		}

		// if we are still here then we are to
		// show the section with some questions and stuff.

		$requiredQuestions = array('exist' => 0, 'given' => array());
		if ( $this->_key != 0 ){
			// We should have data to deal with.

			$incorrect = 0;
			$correct = 0;
			$pastSectionKey = $this->_key - 1;

			$_SESSION['wpsqt'][$quizName]['sections'][$pastSectionKey]['answers'] = array();
			$canAutoMark = true;
			foreach ($_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["questions"] as $questionData ){
				if ( isset($questionData['required']) && $questionData['required'] == "yes") {
					$requiredQuestions['exist']++;
				}
			}

			if ( isset($_POST['answers']) ){

				foreach ( $_POST['answers'] as $questionKey => $givenAnswers ){
					$answerMarked = array();
					$questionData =  (isset($_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["questions"][$questionKey])) ? $_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["questions"][$questionKey] : array();
					$questionId = $questionData['id'];

					if ( $questionData["type"] == "Single" ||
						 $questionData["type"] == "Multiple" ) {
						if ( !isset($_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["questions"][$questionKey]) ){
							$incorrect++;
							continue;
						}// END if isset question
						$subNumOfCorrect = 0;
						$subCorrect = 0;
						$subIncorrect = 0;
						foreach ( $questionData["answers"] as $answerKey => $rawAnswers ){
							$numberVarName = "";
							if ($rawAnswers["correct"] == "yes"){
								$numberVarName = "subCorrect";
								$subNumOfCorrect++;
							} else {
								$numberVarName = "subIncorrect";
							}

							if ( in_array($answerKey, $givenAnswers) ){
								${$numberVarName}++;
							}
						}

						if ( $subCorrect === $subNumOfCorrect && $subIncorrect === 0 ){
							$correct += $questionData["points"];
							$answerMarked['mark'] = 'correct';
						}
						else {
							// TODO Insert ability to set point per answer scores

							$incorrect += $questionData["points"];
							$answerMarked['mark'] = "incorrect";
						}

					} else {
							$canAutoMark = false;
					}// END if section type == multiple

					if ( isset($questionData['required']) && $questionData['required'] == 'yes' ){
						$requiredQuestions['given'][] = $questionId;
					}

					$answerMarked["given"] = $givenAnswers;
					$_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["answers"][$questionId] = $answerMarked;

				}// END foreach answer
				$_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["stats"] = array("correct" => $correct, "incorrect" => $incorrect);
				$_SESSION["wpsqt"][$quizName]["sections"][$pastSectionKey]["can_automark"] = $canAutoMark;
			}// END if isset($_POST['answers'])

		}

		if ( isset($requiredQuestions) && $requiredQuestions['exist'] > sizeof($requiredQuestions['given']) ){
			$_SESSION['wpsqt']['current_message'] = 'Not all the required questions were answered!';
			$this->_step--;
			$this->_key--;
		}

		$_SESSION['wpsqt']['current_step'] = $this->_step;
		$_SESSION['wpsqt']['required'] = $requiredQuestions;

		// if equal or greater than so other
		// plugins can add extra steps at the end.
		if ( sizeof($_SESSION["wpsqt"][$quizName]["sections"]) <= $this->_key ){
			// finished!
			do_action("wpsqt_".$this->_type."_finished",$this->_step);
			$this->finishQuiz();

			return;
		} else {
			// Show section.
			do_action("wpsqt_".$this->_type."_step",$this->_step);
			$this->showSection();
			return;
		}

	}

	/**
	 * Handles showing the section.
	 *
	 * @since 2.0
	 */
	public function showSection(){

		global $wpdb;

		$quizName = $_SESSION["wpsqt"]["current_id"];
		$sectionKey = $this->_key;
		$section = $_SESSION["wpsqt"][$quizName]["sections"][$sectionKey];
		$orderBy = ($section["order"] == "random") ? "RAND()" : "id ".strtoupper($section["order"]);
		$_SESSION["wpsqt"][$quizName]["sections"][$sectionKey]["questions"] = array();

		if ( !empty($_SESSION["wpsqt"][$quizName]["sections"][$sectionKey]['limit']) ){
			$end = " LIMIT 0,".$_SESSION["wpsqt"][$quizName]["sections"][$sectionKey]['limit'];
		} else {
			$end = '';
		}

		$rawQuestions = $wpdb->get_results(
							$wpdb->prepare("SELECT * FROM `".WPSQT_TABLE_QUESTIONS.
										   "` WHERE section_id = %d ORDER BY ".$orderBy.$end,
										  array($section["id"])),ARRAY_A
								);

		foreach ( $rawQuestions as $rawQuestion ){
			$_SESSION["wpsqt"][$quizName]["sections"][$sectionKey]["questions"][] = Wpsqt_System::unserializeQuestion($rawQuestion, $this->_type);
		}
		require Wpsqt_Core::pageView('site/'.$this->_type.'/section.php');

	}

	/**
	 * Handles the end of the quiz/survey.
	 *
	 * @since 2.0
	 */
	public function finishQuiz(){

		global $wpdb;

		$quizName = $_SESSION['wpsqt']['current_id'];

		if (isset($_SESSION['wpsqt'][$quizName]['details']['timer']) && $_SESSION['wpsqt'][$quizName]['details']['timer'] != '0' && $_SESSION['wpsqt'][$quizName]['details']['timer'] != "") {
				?>
					<script type="text/javascript">
						jQuery(document).ready( function(){
							jQuery(".timer").hide();
						});
					</script>
				<?php
			}

		if ( isset($_SESSION['wpsqt'][$quizName]['details']['use_wp']) && $_SESSION['wpsqt'][$quizName]['details']['use_wp'] == 'yes'){
			$objUser = wp_get_current_user();
			$_SESSION['wpsqt'][$quizName]['person']['name'] = $objUser->user_login;
			$_SESSION['wpsqt'][$quizName]['person']['fname'] = $objUser->first_name;
			$_SESSION['wpsqt'][$quizName]['person']['lname'] = $objUser->last_name;
			$_SESSION['wpsqt'][$quizName]['person']['email'] = $objUser->user_email;
		}

		$personName = (isset($_SESSION['wpsqt'][$quizName]['person']['name'])) ? $_SESSION['wpsqt'][$quizName]['person']['name'] :  'Anonymous';
		$timeTaken = microtime(true) - $_SESSION['wpsqt'][$quizName]['start_time'];



		$totalPoints = 0;
		$correctAnswers = 0;
		$canAutoMark = true;

		if ($_SESSION['wpsqt'][$quizName]['details']['type'] == 'quiz')
			$passMark = (int)$_SESSION['wpsqt'][$quizName]['details']['pass_mark'];

		foreach ( $_SESSION['wpsqt'][$quizName]['sections'] as $quizSection ){
			if ( $this->_type != "quiz" || ( isset($quizSection['can_automark']) && $quizSection['can_automark'] == false) ){
				$canAutoMark = false;
					break;
			}

			foreach ( $quizSection['questions'] as $key => $question ){
				$totalPoints += $question['points'];
			}

			if ( !isset($quizSection['stats']) ) {
				continue;
			}

			if ( isset($quizSection['stats']['correct']) ){
				$correctAnswers += $quizSection['stats']['correct'];
			}

		}

		if ( $canAutoMark === true ){
			$_SESSION['wpsqt']['current_score'] = $correctAnswers." correct out of ".$totalPoints;
		} else {
			$_SESSION['wpsqt']['current_score'] = "quiz can't be auto marked";
		}

		if ( $correctAnswers !== 0 ){
			$percentRight = ( $correctAnswers / $totalPoints ) * 100;
		} else {
			$percentRight = 0;
		}

		$status = 'unviewed';
		$pass = '0';

		if ($_SESSION['wpsqt'][$quizName]['details']['type'] == 'quiz') {
			// Check if pass
			if ($percentRight >= $passMark)
				$pass = '1';

			if ($pass == '1') {
				$status = 'Accepted';
			} else {
				$status = 'unviewed';
			}
		}

		if ( !isset($_SESSION['wpsqt'][$quizName]['details']['store_results']) ||  $_SESSION['wpsqt'][$quizName]['details']['store_results'] !== "no" ){
			$wpdb->query(
				$wpdb->prepare("INSERT INTO `".WPSQT_TABLE_RESULTS."` (datetaken,timetaken,person,sections,item_id,person_name,ipaddress,score,total,percentage,status,pass)
								VALUES (%s,%d,%s,%s,%d,%s,%s,%d,%d,%d,%s,%d)",
								   array($_SESSION['wpsqt'][$quizName]['start_time'],
							   		 $timeTaken,
							   		 serialize($_SESSION['wpsqt'][$quizName]['person']),
							   		 serialize($_SESSION['wpsqt'][$quizName]['sections']),
							   		 $_SESSION['wpsqt'][$quizName]['details']['id'],
							   		 $personName,$_SERVER['REMOTE_ADDR'],$correctAnswers,$totalPoints,$percentRight,$status,$pass ) )
					);

			$_SESSION['wpsqt']['result_id'] = $wpdb->insert_id;
		} else {
			$_SESSION['wpsqt']['result_id'] = null;
		}
		$emailAddress = get_option('wpsqt_contact_email');

		if ( isset($_SESSION['wpsqt'][$quizName]['details']['notificaton_type']) && $_SESSION['wpsqt'][$quizName]['details']['notificaton_type'] == 'instant' ){
			$emailTrue = true;
		} elseif ( isset($_SESSION['wpsqt'][$quizName]['details']['notificaton_type']) && $_SESSION['wpsqt'][$quizName]['details']['notificaton_type'] == 'instant-100'
					&& $percentRight == 100 ) {
			$emailTrue = true;
		} elseif ( isset($_SESSION['wpsqt'][$quizName]['details']['notificaton_type']) && $_SESSION['wpsqt'][$quizName]['details']['notificaton_type'] == 'instant-75'
					 && $percentRight > 75 ){
			$emailTrue = true;
		} elseif ( isset($_SESSION['wpsqt'][$quizName]['details']['notificaton_type']) && $_SESSION['wpsqt'][$quizName]['details']['notificaton_type'] == 'instant-50'
					&& $percentRight > 50 ){
			$emailTrue = true;
		} elseif ( isset($_SESSION['wpsqt'][$quizName]['details']['notificaton_type']) && isset($_SESSION['wpsqt'][$quizName]['details']['send_user']) && $_SESSION['wpsqt'][$quizName]['details']['send_user'] == 'yes' ) {
			$emailTrue = true;
		}

		if ( isset($emailTrue) ){
			Wpsqt_Mail::sendMail();
		}

		if ( $this->_type == "survey" || $this->_type == "poll" ){
			$this->_cacheSurveys();
		}

		require_once Wpsqt_Core::pageView('site/'.$this->_type.'/finished.php');
		unset($_SESSION['wpsqt']['result_id']);
	}

	/**
	 * Handles creating a cache of the survey total results so results
	 * can still be viewed even while a massive survey polling is on
	 * going.
	 *
	 * @todo look into optimizations and possible better ways.
	 *
	 * @since 2.0
	 */
	protected function _cacheSurveys(){

		global $wpdb;

		$quizName = $_SESSION['wpsqt']['current_id'];

		$surveyResults = $wpdb->get_row(
							$wpdb->prepare("SELECT * FROM `".WPSQT_TABLE_SURVEY_CACHE."` WHERE item_id = %d",
											array($_SESSION['wpsqt'][$quizName]['details']['id']) ),ARRAY_A
									);
		if ( !empty($surveyResults) ){
			$cachedSections = unserialize($surveyResults['sections']);
		} else {
			$cachedSections = array();
		}

		foreach ( $_SESSION['wpsqt'][$quizName]['sections'] as $sectionKey => $section ) {

			if ( !array_key_exists($sectionKey,$cachedSections) ){
				$cachedSections[$sectionKey] = array();
				$cachedSections[$sectionKey]['questions'] = array();
			}
			foreach ( $section['questions'] as $questionKey => $question ) {

				if ( !array_key_exists($question['id'], $cachedSections[$sectionKey]['questions']) ) {
					$cachedSections[$sectionKey]['questions'][$question['id']] = array();
					$cachedSections[$sectionKey]['questions'][$question['id']]['name'] = $question['name'];
					$cachedSections[$sectionKey]['questions'][$question['id']]['type'] = $question['type'];
					$cachedSections[$sectionKey]['questions'][$question['id']]['answers'] = array();
				}
				if ( $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Multiple Choice" ||
					 $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Dropdown" || 
					 $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == 'Single' || 
					 $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == 'Multiple') {
					if ( empty($cachedSections[$sectionKey]['questions'][$question['id']]['answers']) ) {
						foreach ( $question['answers'] as $answerKey => $answers ){
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers'][$answerKey] = array("text" => $answers['text'],"count" => 0);
						}
					 }

				} elseif ( $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Likert" ||
						   $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Scale" ){
				 	if ( empty($cachedSections[$sectionKey]['questions'][$question['id']]['answers']) ) {
				 		if ($question['likertscale'] != 'Agree/Disagree') {
				 			$scale = (int) $question['likertscale'];
							for ( $i = 1; $i <= $scale; ++$i ){
								$cachedSections[$sectionKey]['questions'][$question['id']]['answers'][$i] = array('count' => 0);
							}
						} else {
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers']['Strongly Disagree'] = array('count' => 0);
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers']['Disagree'] = array('count' => 0);
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers']['No Opinion'] = array('count' => 0);
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers']['Agree'] = array('count' => 0);
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers']['Strongly Agree'] = array('count' => 0);
						}
					}
				} elseif ( $cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Free Text" ){
					if ( empty($cachedSections[$sectionKey]['questions'][$question['id']]['answers']) ) {
						$cachedSections[$sectionKey]['questions'][$question['id']]['answers'] = 'None Cached - Free Text Result';
					}
					continue;
				} else {
					if ( empty($cachedSections[$sectionKey]['questions'][$question['id']]['answers']) ) {
						$cachedSections[$sectionKey]['questions'][$question['id']]['answers'] = 'None Cached - Not a default question type.';
					}
					continue;
				}
				if ($cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Likert") {
					if(isset($section['answers'][$question['id']])) {
						$givenAnswer = (int) $section['answers'][$question['id']]['given'];
					} else {
						$givenAnswer = NULL;
					}
				} else {
					if(isset($section['answers'][$question['id']])) {
						$givenAnswer = (int) current($section['answers'][$question['id']]['given']);
					} else {
						$givenAnswer = NULL;
					}
				}
				// This is only run on a poll multiple question.
				if ($cachedSections[$sectionKey]['questions'][$question['id']]['type'] == "Multiple") {
					if(isset($section['answers'][$question['id']])) {
						$givenAnswer = array();
						foreach( $section['answers'][$question['id']]['given'] as $gAnswer) {
							$cachedSections[$sectionKey]['questions'][$question['id']]['answers'][$gAnswer]["count"]++;
						}
					} else {
						$givenAnswer = NULL;
					}
				}
				if (isset($question['likertscale']) && $question['likertscale'] == 'Agree/Disagree') {
				 	if(isset($section['answers'][$question['id']])) {
						$givenAnswer = $section['answers'][$question['id']]['given'];
					} else {
						$givenAnswer = NULL;
					}
				}
				if ($cachedSections[$sectionKey]['questions'][$question['id']]['type'] != "Multiple" && isset($cachedSections[$sectionKey]['questions'][$question['id']]['answers'][$givenAnswer]["count"]))
					$cachedSections[$sectionKey]['questions'][$question['id']]['answers'][$givenAnswer]["count"]++;
			}
		}
		if ( !empty($surveyResults) ){
			$wpdb->query(
				$wpdb->prepare("UPDATE `".WPSQT_TABLE_SURVEY_CACHE."` SET sections=%s,total=total+1 WHERE item_id = %d",
						 array(serialize($cachedSections),$_SESSION['wpsqt'][$quizName]['details']['id']) )
					);
		} else {
			$wpdb->query(
				$wpdb->prepare("INSERT INTO `".WPSQT_TABLE_SURVEY_CACHE."` (sections,item_id,total) VALUES (%s,%d,1)",
								 array(serialize($cachedSections),$_SESSION['wpsqt'][$quizName]['details']['id']) )
					);
		}
		if (!isset($_SESSION['wpsqt']['result_id']) || $_SESSION['wpsqt']['result_id'] == null) {
			$resultId = $_SESSION['wpsqt']['current_result_id'];
		} else {
			$resultId = $_SESSION['wpsqt']['result_id'];
		}
		$wpdb->query(
				$wpdb->prepare("UPDATE `".WPSQT_TABLE_RESULTS."` SET cached=1 WHERE `id` = %d", $resultId)
					);

	}

	/**
	 * Alias to the cache surveys function for polls
	 * so it can be ran from upgrade script.
	 * 
	 * @author Ollie Armstrong
	 */
	public function cachePoll() {
		$this->_cacheSurveys();
	}

}
