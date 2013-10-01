<?php
/* 
Plugin Name: IndiePub Spoken Essay
Plugin URI: http://independentpublisher.me/plugins/indiepub-spoken-essay/
Description: Plugin for displaying an audio version of posts
Author: Raam Dev
Version: 1.0 
Author URI: http://raamdev.com/
*/

/**
 * Show link to Spoken Essay
 */
function indiepub_spoken_essay_url() {
	$audio_link = get_post_meta( get_the_ID(), 'indiepub_spoken_essay_url', TRUE );

	if ( trim( $audio_link ) == "" ) { // backwards compatibility
		$audio_link = get_post_meta( get_the_ID(), 'audio_reading_url', TRUE );
	}

	if ( trim( $audio_link ) != "" ) {
		return $audio_link;
	}
	else {
		return false;
	}
}

/**
 * Show link to Spoken Essay
 */
function indiepub_spoken_essay_link( $link_text = 'Listen to the Spoken Essay' ) {
	if ( $audio_link = indiepub_spoken_essay_url() ) {
		return '<div id="audio-player"><a class="wpaudio" href="' . $audio_link . '"><i class="icon-volume-up"></i> ' . $link_text . '</a></div>';
	}
	else {
		return false;
	}
}