<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-03-04
 * Time: 18:49
 */

get_header('sub');
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
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
				Aenean commodo ligula eget dolor. Aenean massa.
				Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
			</p>
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
									<?php
									if(has_post_thumbnail()) :
									the_post_thumbnail();
										?>
										<div class="thumbnail-info">
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
									<?php
									if(has_post_thumbnail()) :
										the_post_thumbnail();
										?>
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

		<?php
		if(!is_paged() && get_next_posts_link()) {
			echo '<button class="link__next-page">もっと見る</button>';
		}elseif(!is_paged() && !get_next_posts_link()) {
		}
		else {
			wp_link_pages();
		}
		?>
		</div>
	</section>
</div>

<?php get_footer(); ?>