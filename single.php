<?php get_header(); 
    while(have_posts()) {
        the_post();
?>

<section>
		<div>
			<div>
				<div>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                
				</div>
                
				<div>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
				</div>
			</div>
		</div>
</section>

<?php
    }
get_footer(); ?>