<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Gaudikids Wordpress">
        <meta name="author" content="Gaudikids GmbH">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <?php
            wp_head();
        ?>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-xxl">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                            if ( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo('name') . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
                    <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                        <span class="mobile-dots">
                            <span class="mobile-dot dot-1"></span>
                            <span class="mobile-dot dot-2"></span>
                            <span class="mobile-dot dot-3"></span>
                        </span>
                    </button>

                    <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'primary',
                                'menu_class' => 'nav navbar-nav ms-auto',
                                'theme_location' => 'primary',
                                'depth' => 2,
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'navbar-gaudikids',
                                'fallback_cb' => '__return_false',
                                //'walker' => new bootstrap_5_wp_nav_menu_walker(),
                            )
                        );
                    ?>
                </div>
            </nav>
        </header>