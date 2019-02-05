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


<?php
//    //サブクエリ発動　カテゴリ名よりもスラッグ名（'restaurant'）でサーチ
//    $category_data = new WP_Query(array('category_name' => 'restaurant'));
//
//
//    if ( $category_data->have_posts() ) {
//        // The 2nd Loop
//        while ( $category_data->have_posts() ) {
//            $category_data->the_post();
//
//            echo '<li>' . get_the_title( $category_data->post->ID ) . '</li>';
////            echo '<li>' . get_the_title( $category_data->post->ID ) ;  get_the_category($category_data->post->ID). '</li>';
//            $category = get_the_category();
//            print_r($category[0]->category_nicename);
//        }
//
//        // Restore original Post Data　メインクエリに戻す→サブクエリ発動したら最後に書く
//        wp_reset_postdata();
//    }
//
//?>

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
            </section>
        </div>

<?php if(the_post() > 10): ?>
    <button><?php the_permalink(); ?>もっと見る</button>
<?php endif;?>

<?php get_footer(); ?>