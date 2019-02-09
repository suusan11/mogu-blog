<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-02-08
 * Time: 18:31
 */
?>

<?php get_header(sub); ?>

<?php
////サブクエリ発動　カテゴリ名よりもスラッグ名（'restaurant'）でサーチ
//$category_data = new WP_Query(array('category_name' => 'restaurant'));
//
//
//if ( $category_data->have_posts() ) {
//	// The 2nd Loop
//	while ( $category_data->have_posts() ) {
//		$category_data->the_post();
//
//		echo '<li>' . get_the_title( $category_data->post->ID ) . '</li>';
////            echo '<li>' . get_the_title( $category_data->post->ID ) ;  get_the_category($category_data->post->ID). '</li>';
//		$category = get_the_category();
//		print_r($category[0]->category_nicename);
//	}
//
//	// Restore original Post Data　メインクエリに戻す→サブクエリ発動したら最後に書く
//	wp_reset_postdata();
//}
//?>

<?php $category_data = new WP_Query(array('category_name' => 'restaurant')); ?>
	<?php if($category_data -> have_posts()):
		while($category_data -> have_posts()) : $category_data -> the_post(); ?>

			<div class="container">
				<section class="article">
					<div class="article__img--top">
						<?php
						if(has_post_thumbnail()) :
							the_post_thumbnail(); ?>
						<?php endif; ?>
					</div>
					<div class="article__header">
						<h1 class="article-title"><?php the_title(); ?></h1>
						<div class="article__header--flex">
							<p class="article-date"><?php echo get_the_date(); ?></p>
							<?php the_category(','); ?>
							<img class="category-icon" src="<?php echo get_template_directory_uri(); ?>./images/chef.svg" alt="icon burger">
						</div>
					</div>
					<div class="article__main">
						<p class="article-sentence"><?php the_content(); ?></p>
					</div>
					<div class="article__footer">
						<div class="article__footer--prev">
							<?php previous_post_link('%link', '<<< %title'); ?>
						</div>
						<div class="article__footer--next">
							<p><?php next_post_link('%link', '%title >>>'); ?></p>
						</div>
					</div>
				</section>
			</div>
           <?php wp_reset_postdata();?>
		<?php endwhile; else: ?>
	<?php endif; ?>
<?php get_footer(); ?>
