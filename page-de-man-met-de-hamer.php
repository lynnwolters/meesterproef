<?php get_header(); ?>

    <section class="scene__room">
        <div class="scene__room__plane__front"></div>
        <div class="scene__room__plane__back"></div>
        <div class="scene__room__plane__left"></div>
        <div class="scene__room__plane__right"></div>
        <div class="scene__room__plane__top"></div>
        <div class="scene__room__plane__bottom"></div>
    </section>

    <nav>
        <button>Menu</button>
        <a href="#home">Home</a>
        <a href="#over-ons">Over ons</a>
        <a href="#shop">Shop</a>
        <a href="#contact">Contact</a>
    </nav>

    <section id="home">
    </section>

    <section id="over-ons">
    </section>

    <section id="shop">
    </section>

    <section id="contact">
    </section>

    <!-- <section class="scene__loader">
        <div class="scene__loader__plane">
            <div class="scene__loader__plane__door">
                <div class="scene__loader__plane__light"></div>
            </div>
        </div>
    </section> -->
    
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
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </button>
                    <div class="data_pop-up" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-year="<?php echo esc_html($year); ?>" data-photographer="<?php echo esc_html($photographer); ?>" data-ontwerper="<?php echo esc_html($ontwerper); ?>" data-images='<?php echo json_encode(array_column($images, 'url')); ?>'>
                        <!-- Store image URLs in a data attribute -->
                    </div>
                </li>
        
        <?php 
            }
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

<section class="prop-room">
        <?php
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 30,
            );

            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();
        ?>

        <ul class="prop-room__box" data-size="medium" >
            <div class="prop-room__box__plane prop-room__box__plane--front"></div>
            <div class="prop-room__box__plane prop-room__box__plane--back"></div>
            <div class="prop-room__box__plane prop-room__box__plane--left"></div>
            <div class="prop-room__box__plane prop-room__box__plane--right"></div>
            <div class="prop-room__box__plane prop-room__box__plane--top">
                <div class="prop-room__box__plane__top__lid prop-room__box__plane__top__lid--top"></div>
                <div class="prop-room__box__plane__top__lid prop-room__box__plane__top__lid--bottom"></div>
                <div class="prop-room__box__plane__top__lid prop-room__box__plane__top__lid--right"></div>
                <div class="prop-room__box__plane__top__lid prop-room__box__plane__top__lid--left"></div>
            </div>
            <div class="prop-room__box__plane prop-room__box__plane--bottom"></div>
        </ul>

        <?php }
            wp_reset_query();
        ?>
    </section>


<?php get_footer(); ?>