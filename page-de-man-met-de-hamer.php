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
    <div class="over-ons-text">
            <h2>Over ons</h2>
            <p>Welkom bij De Man met de Hamer! Wij zijn een enthousiast team met een passie voor vakmanschap en oog voor detail. Of het nu gaat om indrukwekkende theaterdecors, unieke props of interieur, wij staan klaar om je ideeën werkelijkheid te maken.
Bij De Man met de Hamer geloven we dat een goed ontwerp een verhaal vertelt en een blijvende indruk achterlaat. Met jarenlange ervaring en een breed scala aan vaardigheden, combineren we traditionele technieken met moderne innovaties om producten te maken die zowel functioneel als mooi zijn.
We begeleiden je door het hele proces om ervoor te zorgen dat het eindresultaat precies is wat je voor ogen had.
Geef ons een belletje en kom langs in onze werkplaats in Diemen om te ontdekken hoe De Man met de Hamer jouw volgende project tot een meesterwerk kan maken. We kunnen niet wachten om samen aan de slag te gaan!</p>
        </div>
        
        <div class="vrienden-text">
            <h2>Vrienden van De Man Met De Hamer</h2>
            <p>In de vele jaren werkervaring heeft De Man met de Hamer veel waardevolle contacten gelegd. Deze vrienden van ons zijn stuk voor stuk experts in hun vakgebied, en we bevelen ze van harte aan voor jouw projecten</p>
            <h2>Medewerkers</h2>
            <p>Bij De Man met de Hamer zijn we trots op ons team van getalenteerde en toegewijde medewerkers. Elk lid van ons team brengt unieke vaardigheden met zich mee, waardoor we samen de hoogste kwaliteit kunnen leveren.</p>
        </div>
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