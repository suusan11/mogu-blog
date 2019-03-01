<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-02-28
 * Time: 18:31
 * Template Name: Archive Page
 */

get_header();
?>

	<div class="archive__date">

		<!--get archive month data-->
		<?php
			$monthly_archives = wp_get_archives(
			$args = array(
				'type' => 'monthly',
				'show_post_count' => true,
				'before' => '',
				'after' => ',',
				'echo' => 0,
			));
			$monthly_archives = explode(',', $monthly_archives); //divide month data which got before, and put array
			array_pop($monthly_archives); //remove extra margin that has after string
		?>

		<!--get archive year data-->
		<?php
			$yearly_archives = wp_get_archives(
			$args = array(
				'type' => 'yearly',
				'format' => 'custom',
				'before' => '',
				'after' => ',',
				'echo' => 0,
			));
			$yearly_archives = explode(',', $yearly_archives); //divide month data which got before, and put array
			array_pop($yearly_archives); //remove extra margin that has after string

		$this_year = (string)idate('Y'); //conversion to 4 digit num
		?>

		<!--output to html-->
		<?php
			$out = '<ul class="archive__date-list">';

			foreach ($yearly_archives as $year) {
				$the_year = substr($year,-8,4); //to show only year part

					$out .= '<li class="archive__date--list-year">' . $the_year;
					$out .= '<ul class="archive__date--list-month">';

				foreach ($monthly_archives as $month) {
					//find target year inside of the month
					$pos = strpos($month, $the_year);

					if ($pos !== false):
						$out .= $month;
					endif;
				}
				$out .= '</ul>';
			}
			$out .= '</ul>';

			//out put to html
			echo $out;
		?>
	</div>

<?php get_footer(); ?>