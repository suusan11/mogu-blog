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

/* Page Index */
function read_toc_scripts(){
	wp_enqueue_script( 'toc', get_template_directory_uri() .'/js/toc.js', array('jquery') ); //load js file instead of head
}
add_action( 'wp_enqueue_scripts' , 'read_toc_scripts' );



/* add Page Index above any contents */
function toc_in($the_content) {
	if (is_single()) {
		$toc = "<div id=\"toc\"></div>";
		$h2 = '/<h2.*?>/i';

		if ( preg_match( $h2, $the_content, $h2s )) { //if the_content has h2
			$the_content  = preg_replace($h2, $toc.$h2s[0], $the_content, 1);
		}
	}
	return $the_content;
}
add_filter('the_content','toc_in');