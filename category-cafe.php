<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-02-08
 * Time: 23:22
 */
?>

<?php get_header(sub); ?>

<?php $category_data = new WP_Query(array('category_name' => 'cafe')); ?>
<?php if($category_data -> have_posts()):
	while($category_data -> have_posts()) : $category_data -> the_post(); ?>

        <div class="container">
            <section class="thumbnails">
				<?php if(have_posts()):
					while(have_posts()): the_post();?>

                        <a href="<?php the_permalink(); ?>">
                            <div class="thumbnail-container">
								<?php
								if(has_post_thumbnail()) :
									the_post_thumbnail('thumbnail');
									?>
                                    <div class="thumbnail-info">
                                        <h1 class="article-title"><?php the_title(); ?></h1>
                                        <p class="article-date"><?php echo get_the_date(); ?></p>
                                    </div>
								<?php endif; ?>
                            </div>
                        </a>
					<?php endwhile;
				else: ?>
                    <p>まだ食べてないよ！</p>
				<?php endif;?>
            </section>
        </div>

		<?php wp_reset_postdata();?>
	<?php endwhile; else: ?>
	<p>No post!</p>
<?php endif; ?>

<?php get_footer(); ?>