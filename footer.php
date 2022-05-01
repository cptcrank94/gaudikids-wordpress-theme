    <?php
        $options = get_option('gk_theme_options');
    ?>
    
    <footer>
        <div class="footer-links pb-5">
            <div class="container py-5">
                <div class="row">
                    <?php if( is_active_sidebar( 'footer-1') or is_active_sidebar( 'footer-2' ) or is_active_sidebar( 'footer-3' ) or is_active_sidebar( 'footer-4' ) ) : ?>
                        <?php if(is_active_sidebar( 'footer-1' ) ) : ?>
                            <div class="col-lg-3 pt-5 ob-3 py-lg-0">
                                <div class="logo">
                                    <?php
                                        dynamic_sidebar( 'footer-1' );
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(is_active_sidebar( 'footer-2' ) ) : ?>
                            <div class="col-lg-3 pt-5 ob-3 py-lg-0">
                                <?php 
                                    dynamic_sidebar( 'footer-2' );
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if(is_active_sidebar( 'footer-3' ) ) : ?>
                            <div class="col-lg-3 pt-5 ob-3 py-lg-0">
                                <?php 
                                    dynamic_sidebar( 'footer-3' );
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if(is_active_sidebar( 'footer-4' ) ) : ?>
                            <div class="col-lg-3 pt-5 ob-3 py-lg-0">
                                <?php 
                                    dynamic_sidebar( 'footer-4' );
                                ?>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container py-3">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4 pt-5 ob-3 py-lg-0 text-center">
                        <span class="footer-copyright">© 2022 <?php esc_attr_e($options['copyright']); ?>. Alle Rechte vorbehalten.</span>
                    </div>
                    <div class="col-lg-4 pt-5 ob-3 py-lg-0 footerLogo">
                        <?php
                            $custom_logo_id = get_theme_mod( 'gk_site_logo_inverted' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                            if ( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $custom_logo_id ) . '" alt="' . get_bloginfo('name') . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </div>
                    <div class="col-lg-4 pt-5 ob-3 py-lg-0">
                        <div class="footer-socialmedia">
                            <ul>
                                <li>
                                    <a class="facebookIcon" href="<?php esc_attr_e($options['facebookurl']); ?>" target="blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a class="instagramIcon" href="<?php esc_attr_e($options['instagramurl']); ?>" target="blank"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>    
    <?php
        wp_footer();
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrw0INqK90ZDNLUX7c108ZJ9CXCvyG8Pc"></script>
    </body>
</html>