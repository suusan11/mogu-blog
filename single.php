<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-01-26
 * Time: 22:47
 */
?>

<?php get_header(sub); ?>

<?php if ( have_posts() ) : ?>
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post(); ?>

        <div class="container">
            <section class="article">
                <?php
                    if(has_post_thumbnail()) :
                        the_post_thumbnail(); ?>
                <?php endif; ?>
                <div class="article__header">
                    <h1 class="article-title"><?php the_title(); ?></h1>
                    <div class="article__header--flex">
                        <p class="article-date"><?php echo get_the_date(); ?></p>
	                    <?php the_category(','); ?>
                        <img class="category-icon" src="<?php echo get_template_directory_uri(); ?>/images/burger.svg" alt="icon burger">
                    </div>
                </div>
                <div class="article__main">
                    <p class="article-sentence"><?php the_content(); ?></p>
                </div>
                <div class="article__footer">
                    <a href="">
                        <div class="article__footer--flex prev">
	                        <?php previous_post_link(); ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.svg" alt="arrow left">
                            <p><?php previous_post_link($link); ?></p>
                        </div>
                    </a>
                    <a href="">
                        <div class="article__footer--flex next">
	                        <?php next_post_link(); ?>
                            <p><?php next_post_link($link); ?></p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" alt="arrow right">
                        </div>
                    </a>
                </div>
            </section>
        </div>

    <?php endwhile;
        else : ?>
     <p>まだ食べてないよ！</p>
<?php endif; ?>


<?php get_footer(); ?>