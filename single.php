<?php
/**
 * Created by PhpStorm.
 * User: miiiiiiiiiiie
 * Date: 2019-01-26
 * Time: 22:47
 */
?>

<?php get_header(sub); ?>

<?php
$cats = get_the_category();
$cats = $cats[0];
?>

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
                        <div class="category-icon">
                            <div class=" <?php echo $cats -> category_nicename; ?>"></div>
                        </div>
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

    <?php endwhile;
        else : ?>
     <p>まだ食べてないよ！</p>
<?php endif; ?>


<?php get_footer(); ?>