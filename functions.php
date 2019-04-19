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
	'sub' => esc_html__( 'Sub menu', 'mogu' ),
	'mobile-main' => esc_html('Mobile Main menu', 'mogu'),
	'mobile-sub' => esc_html('Mobile Sub menu', 'mogu')
) );

function is_first(){
	global $wp_query;
	return ($wp_query->current_post === 0);
}

/* pageNation
$paged: current page
$pages: all pages
$range: how many pages to left and right
*/
function the_pagination() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	echo '<nav class="pagination">';
	echo paginate_links( array(
		'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
		'format'       => '',
		'current'      => max( 1, get_query_var('paged') ),
		'total'        => $wp_query->max_num_pages,
		'prev_text'    => '<<',
		'next_text'    => '>>',
		'type'         => 'list',
		'end_size'     => 3,
		'mid_size'     => 3
	) );
	echo '</nav>';
}