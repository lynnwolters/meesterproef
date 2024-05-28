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
                    <div>
                        <div>
                            <div>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="750x500x1">
                            </div>
                            <h5><?php the_title(); ?></h5>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <h6><a href="<?php echo the_permalink(); ?>">Lees meer</a></h6>
                        </div>
                    </div>
                </a>

            <?php }
            wp_reset_query();
            ?>

</section>

<?php get_footer(); ?>