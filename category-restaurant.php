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
	<?php endif; ?>
<?php get_footer(); ?>