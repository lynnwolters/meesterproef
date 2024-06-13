<?php get_header(); ?>

<div class="custom-cursor"></div>

    <section class="scene__room">
        <div class="scene__room__plane__front"></div>
        <div class="scene__room__plane__back"></div>
        <div class="scene__room__plane__left"></div>
        <div class="scene__room__plane__right">
            <button class="scene__menu">
                <div class="scene__menu__plane__front">
                    <p>Menu</p>
                    <ul class="scene__menu__plane__front__submenu">
                        <li>
                            <a class="active-link" href="/">Home</a>
                        </li>
                        <li>
                            <a href="#">Over Ons</a>
                        </li>
                        <li>
                            <a href="/prop-room">Shop</a>
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
