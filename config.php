<?php
	// authorized file types (4 char)
	$TYPES = array(".mp3", ".ogg", ".wav", ".mp4", ".avi", "mkv", "flac", "wma");

	// URI of musics' folders
	// can be a local path or a URL
	// URL works only with default apache's index
	$URIs = array(
		"."
		//,"./musics"
		//,"./path1/path2/musics"
		//,"http://example.com/music/"
        	//,"http://example.com/somewhere/zic/"
        	//,"http://123.123.123.123/"
        	//,"http://127.0.0.1/"
	);

	// scan subfolder level recursive
	//  0 : no recursive
	// int > 0 : level of recursive
	$MAX_RECURSIVE=2;

	// shuffle. true or false
	if(!defined("SHUFFLE")) {
		define("SHUFFLE", false);
	}

	// cache min life time in seconds
	$cache_min_life=300;
?>