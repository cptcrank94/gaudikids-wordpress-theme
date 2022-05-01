<?php
// Register custom options for the template
function gk_register_custom_options() {
    register_setting('gk_options', 'gk_theme_options', 'gk_validate_options');
}
add_action('admin_init', 'gk_register_custom_options');

function gk_register_custom_option_pages() {
    add_theme_page('Optionen', 'Optionen', 'edit_theme_options', 'theme-optionen', 'gk_theme_options_page');
}
add_action('admin_menu', 'gk_register_custom_option_pages');

function gk_theme_options_page() {
    ?>
        <div class="wrap">
            <h2>Theme-Optionen für <?php echo bloginfo('name'); ?></h2>
            <?php settings_errors(); ?>
            <form method="post" action="options.php">
                <?php settings_fields( 'gk_options' ); ?>
                <?php $options = get_option( 'gk_theme_options' ); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><h2>Generelle Einstellungen</h2></th>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Copyright</th>
                        <td><input id="gk_theme_options[copyright]" class="regular-text" type="text" name="gk_theme_options[copyright]" value="<?php esc_attr_e( $options['copyright'] ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Google Maps API Key</th>
                        <td><input id="gk_theme_options[googlemapsapikey]" class="regular-text" type="text" name="gk_theme_options[googlemapsapikey]" value="<?php esc_attr_e( $options['googlemapsapikey'] ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><h2>Event Einstellungen</h2></th>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Social Media Teilen-Buttons auf Single-Event-Page</th>
                        <td>
                            <select name="gk_theme_options[socialMediaOnEvents]" id="gk_theme_options[socialMediaOnEvents]">
                                <?php $selected = (isset( $options['socialMediaOnEvents']) && $options['socialMediaOnEvents'] === "true") ? 'selected' : '';?>
                                <option <?php echo $selected ?> value="true">Ja</option>
                                <?php $selected = (isset( $options['socialMediaOnEvents']) && $options['socialMediaOnEvents'] === "false") ? 'selected' : '';?>
                                <option <?php echo $selected ?> value="false">Nein</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><h2>Social Media</h2></th>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Facebook URL</th>
                        <td><input id="gk_theme_options[facebookurl]" class="regular-text" type="text" name="gk_theme_options[facebookurl]" value="<?php esc_attr_e( $options['facebookurl'] ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Instagram URL</th>
                        <td><input id="gk_theme_options[instagramurl]" class="regular-text" type="text" name="gk_theme_options[instagramurl]" value="<?php esc_attr_e( $options['instagramurl'] ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Youtube URL</th>
                        <td><input id="gk_theme_options[youtubeurl]" class="regular-text" type="text" name="gk_theme_options[youtubeurl]" value="<?php esc_attr_e( $options['youtubeurl'] ); ?>" /></td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" class="button-primary" value="Einstellungen speichern" /></p>
            </form>
        </div>
    <?php
}

function gk_validate_options( $input ) {
    return $input;
}

?>