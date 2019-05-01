<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-01-26
 * Time: 22:47
 */
?>

<?php get_header('sub'); ?>


<?php if ( have_posts() ) : ?>
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post(); ?>

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
						<p class="article-date"><?php the_date(); ?></p>
					</div>
				</div>
				<div class="article__main">
					<p class="article-sentence"><?php the_content(); ?></p>
				</div>


			</section>
		</div>

	<?php endwhile;
else : ?>
	<p>まだ食べてないよ！</p>
<?php endif; ?>

<?php the_field('name'); ?>
<?php the_field('content'); ?>
<?php

$image = get_field('image');
print_r($image['url']);

if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" style="width: 100%;" />

<?php endif; ?>
<?php get_footer(); ?>