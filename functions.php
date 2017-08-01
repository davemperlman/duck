<?php

// Enqueue Styles/Scripts
function addStyles() {
	wp_enqueue_style('template', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('reset', 'http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css');
	wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css');
	wp_enqueue_style('main', get_template_directory_uri() . '/_css/main.css');
	wp_enqueue_style('lora', 'https://fonts.googleapis.com/css?family=Merriweather+Sans');
	wp_enqueue_script('jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
}
add_action('wp_enqueue_scripts', 'addStyles');

add_theme_support('post-thumbnails');


// CREATE EVENTS POST TYPE ----------------------||
add_action( 'init', 'create_post_type' );

function create_post_type() {
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'public' => true,
      'has_archive' => true,
      'register_meta_box_cb' => 'add_events_metaboxes'
    )
  );
}
//-----------------------------------------------||
// ADD DATE META BOX FOR EVENTS

add_action('add_meta_boxes', 'add_events_metaboxes');

function add_events_metaboxes() {
	add_meta_box('eventDate', 'Event Date', 'metaDate', 'event', 'side');
	add_meta_box('eventTime', 'Event Time', 'metaTime', 'event', 'side');
}

function metaDate() {
	global $post;
	
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	$date = get_post_meta($post->ID, '_date', true);
	
	echo '<input type="date" name="_date" value="' . $date  . '" class="widefat" />';
}

function metaTime() {
	global $post;
	
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	$time = get_post_meta($post->ID, '_time', true);
	
	echo '<input type="text" name="_time" value="' . $time  . '" class="widefat" />';
}

function wpt_save_events_meta($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$events_meta['_time'] = $_POST['_time'];
	$events_meta['_date'] = $_POST['_date'];
	
	// Add values of $events_meta as custom fields
	
	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields