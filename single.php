<?php get_header(); 
    while(have_posts()) {
        the_post();
?>

<section class="section-space about position-relative section-white-bg" id="about">
		<div class="container">
			<div class="row rowsafari">
				<div class="col-lg-6 res-desk-mar-bot">
                <!-- <a class="terug" href="https://krachtenvlugheid.nl/nieuws/">Bekijk al het nieuws</a> -->
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                
				</div>
                
				<div class="col-lg-6">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
				</div>
			</div>
		</div>
</section>

<?php
    }
get_footer(); ?>