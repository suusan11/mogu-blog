<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-03-04
 * Time: 18:49
 */

get_header('sub');
?>

<?php
$cats = get_the_category();
$cats = $cats[0];
?>

<div class="container">
	<div class="category__intro">
		<div class="category__intro--title">
			<div class="category-icon">
				<div class=" <?php echo $cats -> category_nicename; ?>"></div>
			</div>
			<h1><?php the_category(); ?></h1>
		</div>
		<div class="category__intro--desc">
			<?php echo category_description(); ?>
		</div>
	</div>
	<!--/category intro-->

	<section class="thumbnails__category">
		<?php if(have_posts()):
			while(have_posts()): the_post(); ?>

					<!--new post-->
					<?php if(is_first()): ?>
						<div class="thumbnails__category-top">
							<a href="<?php the_permalink(); ?>">
								<div class="thumbnail-container">
                                    <div class="thumbnails__category-top-img">
                                        <?php
                                        if(has_post_thumbnail()) :
                                        the_post_thumbnail();
                                            ?>
                                    </div>
										<div class="thumbnail-info">
                                            <p class="article-new">\ NEW /</p>
											<h1 class="article-title"><?php the_title(); ?></h1>
											<p class="article-date"><?php echo get_the_date(); ?></p>
										</div>
									<?php endif; ?>
								</div>
							</a>
						</div>

					<!--other posts-->

					<div class="thumbnails__category-other">
						<?php else: ?>
							<a href="<?php the_permalink(); ?>">
								<div class="thumbnail-container">
                                    <div class="thumbnails__category-other-img">
                                        <?php
                                        if(has_post_thumbnail()) :
                                            the_post_thumbnail();
                                            ?>
                                    </div>
                                    <div class="thumbnail-info">
                                        <h1 class="article-title"><?php the_title(); ?></h1>
                                        <p class="article-date"><?php echo get_the_date(); ?></p>
                                    </div>
									<?php endif; ?>
								</div>
							</a>
						<?php endif; ?>

			<?php endwhile;
		else: ?>
			<p>まだ食べてないよ！</p>
		<?php endif;?>
	</section>
</div>

<?php if( function_exists("the_pagination") ) the_pagination(); ?>

<?php get_template_part('template-parts/content', 'about'); ?>

<?php get_footer(); ?>