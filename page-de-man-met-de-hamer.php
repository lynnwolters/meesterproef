<?php get_header(); ?>

    <form class="button__container">
        <button type="button" class="links-omdat-het-van-eva-is">←</button>
        <button type="button" class="rechts-omdat-het-van-eva-is">→</button>
    </form>

    <section class="scene__room">
        <div class="scene__room__plane__front"></div>
        <div class="scene__room__plane__back"></div>
        <div class="scene__room__plane__left"></div>
        <div class="scene__room__plane__right"></div>
        <div class="scene__room__plane__top"></div>
        <div class="scene__room__plane__bottom"></div>
    </section>

    <!-- menu button -->
    <button class="scene__menu">
        <div class="scene__menu__plane__front">
            <p>Menu</p>
            <ul class="scene__menu__plane__front__submenu">
                <li>
                    <a class="active-link" href="#home">Home</a>
                </li>
                <li>
                    <a href="#over-ons">Over Ons</a>
                </li>
                <li>
                    <a href="#shop">Shop</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
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

    <section id="home">
    </section>

    <section id="over-ons">
    </section>

    <section id="shop">
    </section>

    <section id="contact">
    </section>

    <section class="scene__loader">
        <div class="scene__loader__plane">
            <div class="scene__loader__plane__door">
                <div class="scene__loader__plane__light"></div>
            </div>
        </div>
    </section>
    
    <div class="scheve-scroller">
    <div class="indicator"></div>  
    <ul class="list">
        <?php

            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1,
            );

            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();

                // Get the thumbnail ID of the current post
                $thumbnail_id = get_post_thumbnail_id(get_the_ID());

                // Get the medium-sized image URL
                $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'medium');
                $thumbnail_url = $thumbnail[0];

                // Get the alt text of the thumbnail
                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                // Get the custom field 'year' from ACF
                $year = get_field('year');
                $photographer = get_field('Photographer');
                $ontwerper = get_field('Ontwerper');

                // Get the multiple image fields
                $images = [
                    get_field('image'),
                    get_field('Image_2'),
                    get_field('image_3'),
                    get_field('image_4'),
                    get_field('image_5'),
                ];

            ?>
                <li class="item">
                    <button href="#">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" loading="eager">
                    </button>
                    <div class="data_pop-up" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-year="<?php echo esc_html($year); ?>" data-photographer="<?php echo esc_html($photographer); ?>" data-ontwerper="<?php echo esc_html($ontwerper); ?>" data-images='<?php echo json_encode(array_column($images, 'url')); ?>'>
                        <!-- Store image URLs in a data attribute -->
                    </div>
                </li>
        
        <?php }
        wp_reset_query();
        ?>   
    </ul>
    <dialog class="dialog">
        <button class="close-btn">
            <span></span>
        </button>
        <!-- <img src=""> -->
        <h2 class="title"></h2>
        <div class="dialog-content-container">
            <a class="url" href="">Bekijk project <span class="title"></span></a>
            <div class="additional-info"></div>
        </div>
        <div class="additional-images"></div>
    </dialog>
</div>


<?php get_footer(); ?>