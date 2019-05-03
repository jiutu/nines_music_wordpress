<?php
add_action('admin_menu', 'nines_music_setting_menu');
function nines_music_setting_menu() {
	add_menu_page('网易云', '音乐', 'manage_options', 'nines_music_settings', 'nines_music_settings_page', 'dashicons-format-audio');
	add_action( 'admin_init', 'nines_music_register_mysettings' );
}
function nines_music_register_mysettings() {
	register_setting( 'nines-music-settings-group', 'nines_music_id' );
	register_setting( 'nines-music-settings-group', 'nines_music_loop' );
	register_setting( 'nines-music-settings-group', 'nines_music_autoplay' );
}

add_action('wp_enqueue_scripts', 'nines_music_scripts');
function nines_music_scripts(){
	wp_register_style( 'nines_music_css', NINES_MUSIC_PL_URL . '/dist/APlayer.min.css', array(), NINES_MUSIC_VERSION );
	wp_register_script( 'nines_music_js', NINES_MUSIC_PL_URL . '/dist/APlayer.min.js', array(), NINES_MUSIC_VERSION );
	wp_enqueue_style( 'nines_music_css');
	wp_enqueue_script( 'nines_music_js');
}

add_action('wp_footer', 'nines_music_template' );
function nines_music_template(){
	include( NINES_MUSIC_PATH . '/functions/template.php' );
	echo nines_music_template_output();
}


?>