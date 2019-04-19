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
$show_only: if page has only one page
*/
function pagination($pages = '', $range = 1)
{
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	if(1 != $pages)
	{
		echo "<div class=\"pagination\"><div class=\"pagination-box\"><span class=\"page-of\">Page ".$paged." of ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		echo "</div></div>\n";
	}
}