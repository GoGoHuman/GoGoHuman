<?php

/**
 * @package Go Go Human
 * @version 1.2
 * Author: SergeDirect <itpal24@gmail.com>
 * Version: 1.2
 * Author URI: www.gogohuman.com/sergedirect/
 * Plugin Name: GoGoHuman
 * Plugin URI: http://gogohuman.com/
 * Description: Go Go human is business and brand development tool, use it to set fields for content via shortcodes in any layout(supports visual composer), authors will be able to use Go Go Human APP, to clone preconfigured pages and create new one with easy to use interface, questions that help to extract content from thoughts, blog right from your mobile, take pictures, videos etc., works great with social updated plugin, that allows you to   * update 30+ social network accounts on a fly.
 * Still reading this?
 * The second interesting feature of this plugin is Human theme installer.
 * p.s. Please note if you downloading Human theme, you need to understand that Human themes work a little dif * ferently, than others - we strongly recommend to use this feature for new installations only.
 *
 */
define ( 'GGH', plugin_dir_path ( __FILE__ ) );
define ( 'GO_HUMAN_BASE_PATH', GGH . 'camp/' );
define ( 'GO_HUMAN_BASE_URL', plugin_dir_url ( __FILE__ ) . 'camp/' );

require GO_HUMAN_BASE_PATH . 'friends/tgma/f-heart/tgma-beat.php';



add_action ( 'admin_menu', 'gogoHumanMenu' );

function gogoHumanMenu () {
            add_dashboard_page ( 'Go-Go Human Dashboard', 'Go Go Human', 'read', 'go-go-human', 'goGoHuman' );
}

require GGH . 'camp/friends/meta-boxes/f-heart/meta-boxes-beat.php';

