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
 * Register stylesheet
 */
function indiepub_spoken_essay_scripts() {
	wp_register_style( 'indiepub-spoken-essay', plugins_url( '/style.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'genericons', plugins_url('/genericons/genericons.css', __FILE__ ), array(), '3.0.3' );
	wp_enqueue_style( 'indiepub-spoken-essay' );
}

add_action( 'wp_enqueue_scripts', 'indiepub_spoken_essay_scripts' );

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
		return '<div id="audio-player"><a class="wpaudio" href="' . $audio_link . '"><i class="icon-audio"></i> ' . $link_text . '</a></div>';
	}
	else {
		return false;
	}
}

add_action( 'independent_publisher_entry_title_meta', 'indiepub_show_spoken_essay', 10, 1 );

function indiepub_show_spoken_essay( $separator ) {
	if ( indiepub_spoken_essay_url() ) {
		echo $separator . indiepub_spoken_essay_link();
	}
}
