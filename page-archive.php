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
					$out .= '<ul class="month-archive-list">';

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

<!--		<ul class="archive__date--list">-->
<!--			<li class="archive__date--list-year">2018-->
<!--				<ul class="archive__date--list-month">-->
<!--					<li><a href="https://cosybench.local/2018/02/">2018年2月</a> (1)</li>-->
<!--					<li><a href="https://cosybench.local/2018/01/">2018年1月</a> (2)</li>-->
<!--				</ul>-->
<!--			</li>-->
<!--			<li class="archive__date--list-year">2017-->
<!--				<ul class="archive__date--list-month">-->
<!--					<li><a href="https://cosybench.local/2017/12/">2017年12月</a> (3)</li>-->
<!--					<li><a href="https://cosybench.local/2017/11/">2017年11月</a> (5)</li>-->
<!--					<li><a href="https://cosybench.local/2017/10/">2017年10月</a> (7)</li>-->
<!--					<li><a href="https://cosybench.local/2017/09/">2017年9月</a> (8)</li>-->
<!--					<li><a href="https://cosybench.local/2017/08/">2017年8月</a> (8)</li>-->
<!---->
<!--				</ul>-->
<!--			</li>-->
<!--		</ul>-->


<?php get_footer(); ?>