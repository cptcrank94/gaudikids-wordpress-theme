<?php

    // Bootstrap Navigation
    function register_navwalker() {
        require_once get_template_directory() . '/inc/class-wp-booststrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker');

    function gk_theme_support() {
        // Theme support
        add_theme_support('title-tag');
        $defaults = array(
            'height'    => 50,
            'width'     => 200,
            'flex-height' => true,
            'flex-width' => true,
            'unlink-homepage-logo' => false
        );
        add_theme_support('custom-logo', $defaults);
        add_theme_support( 'post-thumbnails');
    }
    add_action('after_setup_theme', 'gk_theme_support');

    function gk_customize_register( $wp_customize ) {
        $wp_customize->add_section('gk_site_logo', array(
            'title'     => __('Seitenlogo', 'GaudiKids'),
            'priority'  => 30
        ) );

        $wp_customize->add_setting('gk_site_logo_inverted', array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'default'       => '',
            'sanitize_callback' => '',
            'sanitize_js_callback' => '',
            'transport'     => 'refresh',
        ));

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'gk_site_logo_inverted',
                array(
                    'label'     => __('Ein Logo hochladen', 'GaudiKids'),
                    'section'   => 'gk_site_logo',
                    'settings'  => 'gk_site_logo_inverted'
                )
            )
        );
    }

    add_action ('customize_register', 'gk_customize_register');

    // Navigationsmenüs registrieren
    function gk_register_menus() {
        $locations = array(
            'primary' => "Desktop Top Bar",
            'footer-gaudkids' => "Footer Menu Gaudikids",
            'footer-service' => "Footer Menu Service",
            'footer-kontakt' => "Footer Menu Kontakt",
        );

        register_nav_menus($locations);
    }
    add_action('init', 'gk_register_menus');

    // Stylesheets registrieren
    function gk_register_styles() {

        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('gaudikids-style', get_template_directory_uri() . "/style.css", array('gaudikids-bootstrap'), $version, 'all');
        wp_enqueue_style('gaudikids-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), '5.1.3', 'all');
        wp_enqueue_style('gaudikids-fontawesome', "https://use.fontawesome.com/releases/v5.15.4/css/all.css", array(), '5.15.4', 'all');
    }
    add_action('wp_enqueue_scripts', 'gk_register_styles');

    // Scripts registrieren
    function gk_register_scripts() {

        wp_enqueue_script('gaudikids-jquery', "https://code.jquery.com/jquery-3.6.0.min.js", array('gaudikids-bootstrap'), '3.6.0', true);
        wp_enqueue_script('gaudikids-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", array(), '5.1.3', true);
        wp_enqueue_script('gaudikids-fontawesome', "https://kit.fontawesome.com/df219ef3b7.js", array(), '5.15.4', true);
        wp_enqueue_script('gaudikids-script', get_template_directory_uri() . "/assets/js/scripts.js", array('gaudikids-bootstrap'), '1.0', true);
    }
    add_action('wp_enqueue_scripts', 'gk_register_scripts');

    // Custom Post Types
    function gk_create_event_post_type() {
        $supports_event = array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'post-formats'
        );

        $labels_event = array(
            'name' => __('Events', 'plural'),
            'singular_name' => __('Event', 'singular'),
            'menu_name' => __('Events', 'admin menu'),
            'name_admin_bar' => __('Events', 'admin bar'),
            'add_new' => __('Erstellen', 'erstellen'),
            'add_new_item' => __('Neues Event erstellen'),
            'new_item' => __('Neues Event'),
            'edit_item' => __('Event editieren'),
            'view_item' => __('Event ansehen'),
            'all_items' => __('Alle Events'),
            'search_items' => __('Events suchen'),
            'not_found' => __('Keine Events gefunden')
        );

        $args_event = array(
            'supports' => $supports_event,
            'labels' => $labels_event,
            'public' => true,
            'has_archive' => true,
            'rewrite' => array("slug" => "events"),
        );

        register_post_type('events', $args_event);

        // Location Post Type
        $supports_location = array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'post-formats'
        );

        $labels_location = array(
            'name' => __('Standorte', 'plural'),
            'singular_name' => __('Standort', 'singular'),
            'menu_name' => __('Standorte', 'admin menu'),
            'name_admin_bar' => __('Standorte', 'admin bar'),
            'add_new' => __('Erstellen', 'erstellen'),
            'add_new_item' => __('Neuen Standort erstellen'),
            'new_item' => __('Neuer Standort'),
            'edit_item' => __('Standort editieren'),
            'view_item' => __('Standort ansehen'),
            'all_items' => __('Alle Standorte'),
            'search_items' => __('Standorte durchsuchen'),
            'not_found' => __('Keine Standorte gefunden'),
        );

        $args_location = array(
            'supports' => $supports_location,
            'labels' => $labels_location,
            'public' => true,
            'has_archive' => false,
            'rewrite' => array("slug" => 'locations'),
        );

        register_post_type('locations', $args_location);
    }
    add_action('init', 'gk_create_event_post_type');

    function gk_eventloop_shortcode() {
        $args = array (
            'post_type' => 'events',
            'posts_per_page' => -1
        );

        $eventQuery = new WP_Query($args);
        if($eventQuery->have_posts()) : ?>
            <div class="row">
            <?php while($eventQuery->have_posts()) : $eventQuery->the_post(); ?>
                    <div class="eventContainer col-xl-12 col-md-12 col-sm-12">
                        <div class="eventBox">
                            <?php if ( get_the_post_thumbnail() ) : ?>
                            <div class="eventImage">
                                <?php echo the_post_thumbnail("medium"); ?>
                            </div>
                            <?php endif; ?>
                            <div class="eventContent">
                                <?php
                                    $date = get_field("datum");
                                    $outputDate = date("d M Y", strtotime($date));
                                ?>
                                <div class="eventDate"><h3><?php echo $outputDate; ?></h3></div>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <ul class="eventInfo">
                                    <li><span>Uhrzeit: </span><?php the_field('startzeit'); ?> - <?php the_field('endzeit'); ?> Uhr</li>
                                    <li><span>Ort: </span> <?php the_field('ort'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
            
        else : 
            _e("Keine Posts gefunden.");
        endif;
    }

    add_shortcode( 'event_loop', 'gk_eventloop_shortcode');

    // Create custom widgets
    function gk_register_widget_areas() {
        register_sidebar( array( 
            'name' => __('Footer Area 1', 'gaudikids-footer'),
            'id' => 'footer-1',
            'description' => __( 'Erscheint in der ersten Spalte des Footers.', 'gaudikids-footer'),
            'before_widget' => '<div class="widgetBox">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar( array( 
            'name' => __('Footer Area 2', 'gaudikids-footer'),
            'id' => 'footer-2',
            'description' => __( 'Erscheint in der ersten Spalte des Footers.', 'gaudikids-footer'),
            'before_widget' => '<div class="widgetBox">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar( array( 
            'name' => __('Footer Area 3', 'gaudikids-footer'),
            'id' => 'footer-3',
            'description' => __( 'Erscheint in der ersten Spalte des Footers.', 'gaudikids-footer'),
            'before_widget' => '<div class="widgetBox">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar( array( 
            'name' => __('Footer Area 4', 'gaudikids-footer'),
            'id' => 'footer-4',
            'description' => __( 'Erscheint in der ersten Spalte des Footers.', 'gaudikids-footer'),
            'before_widget' => '<div class="widgetBox">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }
    add_action( 'widgets_init', 'gk_register_widget_areas', 20);

    require_once( get_stylesheet_directory() . '/template/options-page.php');

    // Register Google Maps API Key in acf
    function my_acf_init() {
        $mapsKey = get_option('gk_theme_options["googlemapsapikey"]');
        acf_update_setting('google_api_key', $mapsKey);
    }
    add_action('acf/init', 'my_acf_init');

    if( function_exists('acf_add_options_page' ) ) {
        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Header Settings',
            'menu_title'	=> 'Header',
            'parent_slug'	=> 'theme-general-settings',
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Footer Settings',
            'menu_title'	=> 'Footer',
            'parent_slug'	=> 'theme-general-settings',
        ));
    }
?>