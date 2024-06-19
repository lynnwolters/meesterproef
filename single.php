<?php get_header(); 
    while(have_posts()) {
        the_post();
?>

<style>
	.container {
		height: 100dvh;
		overflow: scroll;
		transform-style: unset;
		display: flex;
		justify-content: center;
		align-items: unset;
	}
</style>

<section class="single">
		<section>
			<section class="close">
					<a href="/#home" class="close-btn">
						<span></span>
					</a>
				</section>
			<section>

				

				<section>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<div class="additional-info">
						<?php 
						$year = get_field('year'); 
						if ($year) {
							?><p><?php
							echo 'Jaar: ' . esc_html($year);
							?></p><?php
						}
						?>
						<?php 
						$year = get_field('Photographer'); 
						if ($year) {
							?><p><?php
							echo 'Fotograaf: ' . esc_html($year);
							?></p><?php
						}
						?>
						<?php 
						$year = get_field('Ontwerper'); 
						if ($year) {
							?><p><?php
							echo 'Ontwerper: ' . esc_html($year);
							?></p><?php
						}
						?>
					</div>
				</section>

                
				<section>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
					<?php 
						$image2 = get_field('Image_2');
						if( !empty( $image2 ) ): ?>
							<img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
					<?php endif; ?>
					<?php 
						$image3 = get_field('Image_3');
						if( !empty( $image3 ) ): ?>
							<img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
					<?php endif; ?>
					<?php 
						$image4 = get_field('Image_4');
						if( !empty( $image4 ) ): ?>
							<img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" />
					<?php endif; ?>
					<?php 
						$image5 = get_field('Image_5');
						if( !empty( $image5 ) ): ?>
							<img src="<?php echo esc_url($image5['url']); ?>" alt="<?php echo esc_attr($image5['alt']); ?>" />
					<?php endif; ?>
				</section>
			</section>
		</section>
</section>

<?php
    }
get_footer(); ?>