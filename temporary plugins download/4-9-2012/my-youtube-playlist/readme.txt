=== My Youtube Playlist ===
Contributors: Jonk
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9344931
Tags: youtube, playlist
Requires at least: 2.7.0
Tested up to: 2.9.1
Stable tag: 1.2

Custom playlist from youtube with thumbnails, loads youtube clips without reloading your page. Example: [myyoutubeplaylist WnY59mDJ1gg, bKwQ_zeRwEs]

== Description ==

This plugin adds a youtube video and a list of thumbnails of your choice. The thumbnails are clickable and replaces the youtube video without reloading the page. The interface is fully customizable from the css.

All you have to do to add a list to your post is to add a line like this:
[myyoutubeplaylist LO3n67BQvh0, WGOohBytKTU, iwY5o2fsG7Y, PyKNxUThW4E, 1cX4t5-YpHQ, SJ183htYl-8, eWwoHPrrJYY, bja2ttzGOFM]

The id's like "LO3n67BQvh0" for instace is youtube-clip id's. LO3n67BQvh0 is the clip found at http://www.youtube.com/watch?v=LO3n67BQvh0, so to show a youtube-clip simply take part of the url after "v=". Then simply add more id's separated by ", ".

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload "my-youtube-playlist" to the "/wp-content/plugins/" directory
2. Activate the plugin through the "Plugins" menu in WordPress
2. Add the hook in a post. Example: [myyoutubeplaylist LO3n67BQvh0, WGOohBytKTU, iwY5o2fsG7Y, PyKNxUThW4E, 1cX4t5-YpHQ, SJ183htYl-8, eWwoHPrrJYY, bja2ttzGOFM]

== Frequently Asked Questions ==

None, yet.

== Screenshots ==

1. The plugin in action. Showing the first clip and the playlist.

== Changelog ==

= 1.2 =
* When clicking a clip from the playlist it automatically starts playing.

= 1.1 =
* Fullscreen support added.
* Moved the loading javascript outside the containers for better loading order.
* I've also added the embed-tags again even though it is not Xhtml-valid simply because that is what Google Reader uses to show flash, and to have the plugin working is more important than getting less warnings when validating.

= 1.07 =
* If only one (1) YouTube id is added to the hook, like [myyoutubeplaylist LO3n67BQvh0] the playlist (containing the only clip) is not shown.

= 1.06 =
* Changed row 21 in myYoutubePlaylist.css
From ".myYoutubePlaylist_YoutubeMovie embed, .myYoutubePlaylist_YoutubeMovie object {" to ".myYoutubePlaylist_YoutubeMovie, .myYoutubePlaylist_YoutubeMovie embed, .myYoutubePlaylist_YoutubeMovie object {"
As a result the youtube area keeps its size when clicking the playlist.
* Changed the IE check in myYoutubePlaylist.js to javascriptcheck for all IEs, added rows 3-11, changed rows 24 and 30
As a result it works on all IEs too.
* Changed the IE check in myYoutubePlaylist.php to all IEs (to <!--[if IE]> from <!--[if lte IE 6]>)
As a result it works on all IEs without javascript too.

= 1.05 =
* Correcting path to files due to folder structure

= 1.04 =
* Correcting folder structure

= 1.02 =
* 100% valid XHTML
* Updated myYoutubePlaylist.php and myYoutubePlaylist.js

= 1.01 =
* No longer beta

= 0.33 =
* Subversion problems

= 0.32 =
* Subversion problems

= 0.31 =
* Noscript added

= 0.2 =
* Finishing

= 0.1 =
* Creation
