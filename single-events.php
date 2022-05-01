<?php
    get_header();
    $socialMedia = get_option('gk_theme_options');
    ?>
    <div class="pageHead d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <h2><?php echo get_the_title(); ?></h2>
            </div>
        </div>
        <div class="background"></div>
    </div>
<?php
    
    if( have_posts() ) {
        while( have_posts() ) : the_post();
            ?>
            <div class="single-event-container">
                <div class="container">
                    <div class="row pb-5">
                        <div class="col-lg-8 mb-5">
                            <div class="single-event-wrap">
                                <div class="single-event-image">
                                    <?php 
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail();
                                        } else {
                                            echo "nein";
                                        }
                                    ?>
                                </div>
                                <div class="single-event-body">
                                    <div class="single-event-description">
                                        <?php
                                            echo the_content();
                                        ?>
                                    </div>
                                    <div class="single-event-maps">
                                        <?php echo get_post_meta($post->ID, "standort", true); ?>
                                    </div>
                                    <?php if( $socialMedia['socialMediaOnEvents'] === "true" ) { ?>
                                    <div class="single-event-footer">
                                        <div class="socialMedia">
                                            <ul>
                                                <li>
                                                    <a class="facebookIcon" href="<?php esc_attr_e($socialMedia['facebookurl']); ?>" target="blank"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a class="instagramIcon" href="<?php esc_attr_e($socialMedia['instagramurl']); ?>" target="blank"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <aside>
                                <div class="single-event-widget">
                                    <div class="widget-header">
                                        <h3 class="event-title">Eventinfos</h3>
                                    </div>
                                    <div class="widget-body">
                                        <ul>
                                            <li>
                                                <div class="single-event-info">
                                                    <i class="fas fa-calendar-day dateIcon"></i> Datum
                                                </div>
                                                <div class="single-event-info-ans">
                                                    <?php 
                                                        $date = get_post_meta($post->ID, 'datum', true);
                                                        $outputDate = date("d.m.Y", strtotime($date));
                                                        echo $outputDate;
                                                    ?>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-event-info">
                                                    <i class="fas fa-clock timestartIcon"></i> Startzeit
                                                </div>
                                                <div class="single-event-info-ans">
                                                    <?php echo get_post_meta($post->ID, 'startzeit', true); ?>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-event-info">
                                                    <i class="fas fa-clock timeendIcon"></i> Endzeit
                                                </div>
                                                <div class="single-event-info-ans">
                                                    <?php echo get_post_meta($post->ID, 'endzeit', true); ?>
                                                </div>
                                            </li>
                                            <li>
                                            <div class="single-event-info">
                                                    <i class="fas fa-map-marker-alt locationIcon"></i> Ort
                                                </div>
                                                <div class="single-event-info-ans">
                                                    <?php echo get_post_meta($post->ID, 'ort', true); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    }
    get_footer();
?>