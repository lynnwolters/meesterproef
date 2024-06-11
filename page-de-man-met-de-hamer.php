<?php get_header(); ?>

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

    <section class="scene__loader">
        <div class="scene__loader__plane">
            <div class="scene__loader__plane__door">
                <div class="scene__loader__plane__light"></div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>