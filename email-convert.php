<?php

  /**
  * Plugin Name: Email Convert
  * Plugin URI: http://marketconvert.com/emailconvert
  * Description: A full fledged email subscription management and email marketing plugin.
  * Version: 1.0.0
  * Author: Marketconvert
  * Author URI: http://marketconvert.com
  * License: GPL 2
  */

  /*  Copyright 2015  Marketconvert  (email : hello@marketconvert.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  register_activation_hook( __FILE__, 'mcec_install_plugin' );
  register_activation_hook( __FILE__, 'mcec_install_data' );

  /* Installation function */
  function mcec_install_plugin(){

      global $wpdb;
      $table_name = $wpdb->prefix . "marketconvert_convert_email";

      $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        text text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        UNIQUE KEY id (id)
        ) $charset_collate;";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );

  } //End install function

  function mcec_install_data() {

      global $wpdb;

      $welcome_name = 'Mr. WordPress';
      $welcome_text = 'Congratulations, you just completed the installation!';

      $table_name = $wpdb->prefix . 'marketconvert_convert_email';

      $wpdb->insert(
        $table_name,
        array(
          'time' => current_time( 'mysql' ),
          'name' => $welcome_name,
          'text' => $welcome_text,
        )
      );

  }//End install data function


?>
