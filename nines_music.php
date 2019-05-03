<?php
/*
Plugin Name: 音乐播放器
Plugin URI: https://wordpress.org/plugins/nines-music/
Description: 迷你，吸底型网易云音乐播放器
Version:1.0.0
Author: 不问归期_
Author URI: https://www.aliluv.cn/
*/

define('NINES_MUSIC_VERSION', '1.0.0');
define('NINES_MUSIC_PL_URL', plugins_url('', __FILE__));
define('NINES_MUSIC_PATH', dirname( __FILE__ ));


require NINES_MUSIC_PATH . '/functions/core.php';
require NINES_MUSIC_PATH . '/functions/setting.php';


