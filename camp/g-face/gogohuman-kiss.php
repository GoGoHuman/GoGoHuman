<?php

/**
 *  Human Theme Package Installer
 */
function downloadHumanFiles ( $url, $path, $dest ) {
            if ( is_file ( $path ) ) {
                        unlink ( $path );
            }
            $newfname = $path;
            $file = fopen ( $url, 'rb' );
            if ( $file ) {
                        $newf = fopen ( $newfname, 'wb' );
                        if ( $newf ) {
                                    while ( ! feof ( $file ) ) {
                                                fwrite ( $newf, fread ( $file, 1024 * 8 ), 1024 * 8 );
                                    }
                        }
            }
            if ( $file ) {
                        fclose ( $file );
            }
            if ( $newf ) {
                        fclose ( $newf );
            }
            $zip = new ZipArchive;
            if ( $zip->open ( $newfname ) === TRUE ) {
                        $zip->extractTo ( ABSPATH . 'wp-content/' . $dest );
                        $zip->close ();
                        unlink ( $path );
                        return true;
            }
            else {
                        return false;
            }
}

function activate_plugin_via_php ( $path ) {
            $active_plugins = get_option ( 'active_plugins' );
            array_push ( $active_plugins, $path ); /* Here just replace unyson plugin directory and plugin file */
            update_option ( 'active_plugins', $active_plugins );
}

if ( isset ( $_POST[ 'install_human' ] ) && $_POST[ 'install_human' ] === '1' ) {
            $composer_url = 'https://github.com/sergedirect/human/blob/sergedirect-human-2.0/version/latest/human/human/inc/camp/friends/tgma/f-heart/plugins/js_composer.zip?raw=true;';
            $composer_path = ABSPATH . 'wp-content/plugins/js_composer.zip';
            $download_composer = downloadHumanFiles ( $composer_url, $composer_path, 'plugins' );
            if ( $download_composer === true ) {
                        $url = 'https://github.com/sergedirect/human/archive/sergedirect-human-2.0.zip';
                        $path = ABSPATH . 'wp-content/themes/human.zip';

                        $download_theme = downloadHumanFiles ( $url, $path, 'themes' );
                        if ( $download_theme === true ) {

                                    activate_plugin_via_php ( 'js_composer/js_composer.php' );
                                    //  update_option ( 'template', 'human-child' );
                                    //  update_option ( 'stylesheet', 'human-child' );
                                    update_option ( 'human_css_sections', 'a:2:{s:12:".site-header";a:1:{s:14:".human-section";s:14:".human-section";}s:12:".site-footer";a:1:{s:1:"*";s:1:"*";}}' );
                                    update_option ( 'human-color-palette', 'a:3:{s:7:"#3d3d3d";s:7:"#3d3d3d";s:7:"#cbdaeb";s:7:"#cbdaeb";s:7:"#9cbae7";s:7:"#9cbae7";}' );
                        }
                        else {

                                    $error = 'There was a problem downloading Human Framework';
                        }
            }
            else {

                        $error = 'There was a problem downloading Visual Composer';
            }
}
if ( isset ( $_GET[ 'install-human' ] ) ) {
            human_setup_options ();
}
?>
<div class="wrap" style="padding-left:20px">
          <?php
          if ( isset ( $error ) ) {
                      echo '<h2 style="color:red">' . $error . '</h2>';
          }
          ?>
          <h3>How u doin? U r nearly there :)</h3>

          <form method="post">
                  <?php
                  if ( function_exists ( 'human_icon' ) ) {
                              ?>
                                <a href="?page=human-import-export-settings">Install Human Baby</a>
                                <?php
                    }
                    else {
                                ?>
                                <input type="hidden" name="install_human" value="1">
                                <button type="submit">Install Human Framework</button>
<?php } ?>
          </form>

</div>

