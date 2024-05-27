<?php get_header(); ?>

<h2>Home page</h2>

<section class="max-width">
<?php
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 3,
            );

            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();

            ?>
                <a href="<?php echo the_permalink(); ?>">
                    <div class="col-lg-4 col-sm-12 col-md-6 col-12 res-desk-mar-bot">
                        <div class="news-box content-width">
                            <div class="img-margin-bottom">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="750x500x1" class="img-fluid">
                            </div>
                            <!-- <h6 class="section-margin-bottom"><a href="#"><i class="fa fa-calendar theme-color mar-right"></i>14 aug 2023</a></h6> -->
                            <h5 class="section-margin-bottom"><?php the_title(); ?></h5>
                            <p class="section-margin-bottom"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <h6><a href="<?php echo the_permalink(); ?>" class="theme-color">Lees meer<i class="fa fa-long-arrow-right pad-left"></i></a></h6>
                        </div>
                    </div>
                </a>

            <?php }
            wp_reset_query();
            ?>

</section>

<?php get_footer(); ?>