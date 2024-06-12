<?php get_header(); ?>

    <section class="scene__room">
        <div class="scene__room__plane__front"></div>
        <div class="scene__room__plane__back"></div>
        <div class="scene__room__plane__left"></div>
        <div class="scene__room__plane__right"></div>
        <div class="scene__room__plane__top"></div>
        <div class="scene__room__plane__bottom"></div>

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

                ?>
                    <li class="item">
                        <button href="#"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="750x500x1"></button>
                    </li>
            
            <?php }
            wp_reset_query();
            ?>   
        </ul>
    </div>

<?php get_footer(); ?>