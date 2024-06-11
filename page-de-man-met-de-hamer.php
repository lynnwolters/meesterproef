<?php get_header(); ?>

    <section class="scene__room">
        <div class="scene__room__plane__front"></div>
        <div class="scene__room__plane__back"></div>
        <div class="scene__room__plane__left"></div>
        <div class="scene__room__plane__right">

        <!-- menu button -->
            <button class="scene__menu">
                <div class="scene__menu__plane__front">
                    <p>Menu</p>
                    <ul class="scene__menu__plane__front__submenu">
                        <li>
                            <a class="active-link" href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Over Ons</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="scene__menu__plane__back"></div>
                <div class="scene__menu__plane__left">
                    <img src="http://man-met-de-hamer.local/wp-content/uploads/2024/06/logo-mmdh.png" alt="Het logo van De Man Met De Hamer">
                    <div class="scene__menu__plane__left__extension"></div>
                </div>
                <div class="scene__menu__plane__right"></div>
                <div class="scene__menu__plane__top"></div>
                <div class="scene__menu__plane__bottom"></div>
            </button>
            
        </div>
        <div class="scene__room__plane__top"></div>
        <div class="scene__room__plane__bottom"></div>

    </section>
    
    <section class="scene__carrousel">
    <?php
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 300,
    );

    $blogposts = new WP_Query($args);

    while ($blogposts->have_posts()) {
        $blogposts->the_post();

        // Get the thumbnail ID of the current post
        $thumbnail_id = get_post_thumbnail_id(get_the_ID());

        // Get the URL of the thumbnail
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());

        // Get the alt text of the thumbnail
        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<ul class="scene__slide">
    <div class="scene__slide__plane__front">
        <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo esc_attr($alt_text); ?>">
    </div>
    <div class="scene__slide__plane__back"></div>
    <div class="scene__slide__plane__left"></div>
    <div class="scene__slide__plane__right"></div>
    <div class="scene__slide__plane__top"></div>
    <div class="scene__slide__plane__bottom"></div>
</ul>

<?php 
    }
    wp_reset_query();
?>

        <dialog class="dialog">
              <button>X</button>
              <img src="">
        </dialog>
     
    </section>

 <script>


</script>

<?php get_footer(); ?>
