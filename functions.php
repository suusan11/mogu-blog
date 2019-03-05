<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-01-29
 * Time: 15:59
 */

add_theme_support('post-thumbnails');

register_nav_menus( array(
	'main' => esc_html__( 'Main menu', 'mogu' ),
	'sub' => esc_html__( 'Sub menu', 'mogu' )
) );

function is_first(){
	global $wp_query;
	return ($wp_query->current_post === 0);
}