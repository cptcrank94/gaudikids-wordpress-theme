<?php
    get_header();
    ?>
    <div class="pageHead d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <h2>Standort: <?php echo get_the_title(); ?></h2>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <aside>
                                <div class="single-event-widget">
                                    <div class="widget-header">
                                        <h3 class="event-title">Allgemeine Informationen</h3>
                                    </div>
                                    <div class="widget-body">
                                        <ul>
                                            <li>
                                                <div class="single-event-info">
                                                    Gruppenanzahl
                                                </div>
                                                <div class="single-event-info-ans">
                                                    4
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-event-info">
                                                    Gruppengröße
                                                </div>
                                                <div class="single-event-info-ans">
                                                    max. 15
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-event-info">
                                                    Betreuungsalter
                                                </div>
                                                <div class="single-event-info-ans">
                                                    6 - 8 Jahre
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-event-widget">
                                    <div class="widget-header">
                                        <h3 class="event-title">Öffnungszeiten</h3>
                                    </div>
                                    <div class="widget-body">
                                        <ul>
                                            <li>
                                                <div class="single-event-info">
                                                    Montag bis Freitag
                                                </div>
                                                <div class="single-event-info-ans">
                                                    08:00 Uhr - 17:30 Uhr
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-event-widget">
                                    <div class="widget-header">
                                        <h3 class="event-title">Adresse</h3>
                                    </div>
                                    <div class="widget-body">
                                        <img style="width: 100%;" src="http://dominicingram.de/wp-content/uploads/2022/01/maps.jpg" /><br />
                                        <strong>GaudiKids Neuperlach</strong><br />
                                        Gaudikidsallee 120<br />
                                        81476 München
                                    </div>
                                </div>
                                <div class="single-event-widget">
                                    <div class="widget-header">
                                        <h3 class="event-title">Kontakt</h3>
                                    </div>
                                    <div class="widget-body">
                                    <ul>
                                        <li>
                                            <div class="single-event-info">
                                                Telefon
                                            </div>
                                            <div class="single-event-info-ans">
                                                +49 (89) 12 34 56 78
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-event-info">
                                                E-Mail
                                            </div>
                                            <div class="single-event-info-ans">
                                                info@gaudikids.de
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