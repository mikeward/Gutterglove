<?php
/*
Plugin Name: My Youtube Playlist
Plugin URI: http://jonk.pirateboy.net/blog/category/bloggeriet/wordpress/plugins/
Description: Custom playlist from YouTube with thumbnails, loads YouTube clips without reloading your page.  Example: [myyoutubeplaylist WnY59mDJ1gg, bKwQ_zeRwEs]
Version: 1.2
Author: Jonk
Author URI: http://jonk.pirateboy.net
*/
$myYoutubePlaylistGlobal_Path = get_option('siteurl')."/wp-content/plugins/my-youtube-playlist/";

define("myYoutubePlaylist_REGEXP", "/\[myyoutubeplaylist ([[:print:]]+)\]/");

define("myYoutubePlaylist_TARGET", "<div class=\"myYoutubePlaylist\">
	<div id=\"myYoutubePlaylist_###STARTVIDEO###\" class=\"myYoutubePlaylist_YoutubeMovie\">
		<noscript><object width=\"500\" height=\"307\" data=\"http://www.youtube.com/v/###STARTVIDEO###&hl=en&fs=1\" type=\"application/x-shockwave-flash\"><param name=\"movie\" value=\"http://www.youtube.com/v/###STARTVIDEO###&hl=en&fs=1\"/><param name=\"allowFullScreen\" value=\"true\"/><param name=\"allowscriptaccess\" value=\"always\"/><embed src=\"http://www.youtube.com/v/###STARTVIDEO###&hl=en&fs=1\" type=\"application/x-shockwave-flash\" width=\"500\" height=\"307\" allowscriptaccess=\"always\" allowfullscreen=\"true\"/></object></noscript>
	</div>
	<div class=\"myYoutubePlaylist_YoutubePlaylist\" id=\"myYoutubePlaylist_YoutubePlaylist_###STARTVIDEO###\"></div>
</div>
<div class=\"myYoutubePlaylist_clearer\"><script language=\"JavaScript\" type=\"text/javascript\">
<!--
myYoutubePlaylist_cy('###STARTVIDEO###','myYoutubePlaylist_###STARTVIDEO###');
myYoutubePlaylist_dl('###ALLVIDEOS###','myYoutubePlaylist_YoutubePlaylist_###STARTVIDEO###','myYoutubePlaylist_###STARTVIDEO###');
//-->
</script></div>
");

function myYoutubePlaylist_callback($match) {
	$output = myYoutubePlaylist_TARGET;
	$video = explode(", ", $match[1]);
	$output = str_replace("###STARTVIDEO###", $video[0], $output);
	$output = str_replace("###ALLVIDEOS###", $match[1], $output);
	return ($output);
}

function myYoutubePlaylist($content) {
	return (preg_replace_callback(myYoutubePlaylist_REGEXP, 'myYoutubePlaylist_callback', $content));
}

function myYoutubePlaylist_css() {
	global $myYoutubePlaylistGlobal_Path;
	echo "
<style type=\"text/css\">
	@import url(\"".$myYoutubePlaylistGlobal_Path."myYoutubePlaylist.css\");
</style>
";
}

function myYoutubePlaylist_js() {
	global $myYoutubePlaylistGlobal_Path;
	echo "
<script language=\"JavaScript\" src=\"".$myYoutubePlaylistGlobal_Path."myYoutubePlaylist.js\" type=\"text/javascript\"></script>
";
}

//add_action ('init', 'checkExtLogin');
add_action('wp_head', 'myYoutubePlaylist_css');
add_action('wp_head', 'myYoutubePlaylist_js');
add_filter('the_content', 'myYoutubePlaylist',1);
?>
