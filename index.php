<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mogu-blog
 */
?>

<?php get_header(); ?>

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

	        <?php
	        if(!is_paged() && get_next_posts_link()) {
		        echo '<button class="link__next-page">もっと見る</button>';
	        }elseif(!is_paged() && !get_next_posts_link()) {
	        }
	        else {
		        wp_link_pages();
	        }
	        ?>
        </section>
    </div>

<?php get_footer(); ?>