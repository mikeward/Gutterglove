/*
myYoutubePlaylist
WordPress Plugin by Jonk, http://jonk.pirateboy.net
Download from http://wordpress.org/extend/plugins/my-youtube-playlist
*/

//check for ie
ie = false;
if (document.all) {
	var ie = true;
}

//a function to choose another youtube-video without reloading the page
function myYoutubePlaylist_cy(ytSrc,containerId,type,play) {
	if (type == null || type == '') {
		type = 'v';
	}
	document.getElementById(containerId).innerHTML = eval("myYoutubePlaylist_cf('',ytSrc,500,307,type,play)");
}

//a function to load flashmovies. it also prevents ie from adding the ugly border
function myYoutubePlaylist_cf(FlashVars,movie,width,height,type,play) {
	if (play == 'play') {
		play = '&autoplay=1';
	}
	myYoutubePlaylist_cfStr = '<obj' + 'ect width="' + width + '" height="' + height + '" data="' + 'http://www.youtube.com/'+ type +'/'+ movie +'&hl=en&fs=1' + play + '" type="application/x-shockwave-flash">';
	myYoutubePlaylist_cfStr += '<param name="movie" value="http://www.youtube.com/'+ type +'/'+ movie +'&hl=en&fs=1' + play + '"/>';
	myYoutubePlaylist_cfStr += '<param name="allowFullScreen" value="true"/>';
	myYoutubePlaylist_cfStr += '<param name="allowscriptaccess" value="always"/>';
	//myYoutubePlaylist_cfStr += '<param name="FlashVars" value="'+ FlashVars +'">';
	myYoutubePlaylist_cfStr += '<embed src="http://www.youtube.com/'+ type +'/'+ movie +'&hl=en&fs=1'+ play +'" type="application/x-shockwave-flash" width="' + width + '" height="' + height + '" allowscriptaccess="always" allowfullscreen="true"/>';
	myYoutubePlaylist_cfStr += '<' + '/object>';
	return myYoutubePlaylist_cfStr;
}

//a function to load all movies with thumbs to a list
function myYoutubePlaylist_dl(allVideos,containerId,targetContainerId) {
	allVideosArr = allVideos.split(', ');
	if (allVideosArr.length > 1) {
		allVideosLi = '<ul class="myYoutubePlaylist_Ul" >';	
		for (var i=0; i < allVideosArr.length; i++) {
			thisLink = 'javascript:myYoutubePlaylist_cy(\''+allVideosArr[i]+'\',\''+targetContainerId+'\',\'\',\''+'play'+'\');'
			allVideosLi += '<li>' + '<a href="'+thisLink+'">' + '<img class="myYoutubePlaylist_Img"  alt="" src="http://i3.ytimg.com/vi/'+allVideosArr[i]+'/default.jpg"/>' + '</'+'a></'+'li>';
		}
		allVideosLi += '</ul>';
		document.getElementById(containerId).innerHTML = allVideosLi;
	} else {
		document.getElementById(containerId).style.display = 'none';
	}
}
