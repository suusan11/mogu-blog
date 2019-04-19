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
                            the_post_thumbnail();
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

            <?php if( function_exists("the_pagination") ) the_pagination(); ?>
        </section>
    </div>

    <div class="container">
        <section class="intro">
            <div class="intro__icon">
                <img src="<?php echo get_template_directory_uri()?>/images/pig.svg" alt="pig icon">
            </div>
            <div class="intro__flex">
                <img src="<?php echo get_template_directory_uri()?>/images/me.jpeg" alt="my img">
                <div>
                    <p>カナダ・バンクーバー在住、食べることが大好きな私です。
                        一番好きな食べ物は餃子、カフェでよく注文する飲み物はロンドンフォグ、好きな言葉は"お腹いっぱい"です。
                        某百貨店の食料品売り場を5年半担当し培われた食欲と胃袋が自慢です。独断と偏見、そして偏食によるカナダの食情報をお届けします。
                    </p>
                    <div class="intro__flex-insta">
                        <a href="https://www.instagram.com/miiiiiiiiiiie.55/?hl=ja" target="_blank">
                            <img src="<?php echo get_template_directory_uri()?>/images/insta.png" alt="instagram icon">
                        </a>
                        <p><< follow me!!</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>