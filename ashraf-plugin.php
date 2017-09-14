<?php
/**
  * @package AshrafPlugin
  */
/*
Plugin Name: Ashraf Plugin
Plugin URI: http://bengalnest.com/
Description: This is a simle wordpress plugin
Version: 0.0.1
Author: Ashraful Huq
Author URI: http://bengalnest.com/
License: GPLv2 or later
Text Domain: ashraf-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// if ( ! defined( 'ABSPATH' )){
//   die;
// }

defined( 'ABSPATH' ) or die('Hey, you cant access this file');

if ( !class_exists('AshraffPlugin' )) {

  class AshraffPlugin
  {
    public static function register(){
      add_action('admin_enqueue_scripts', array( 'AshraffPlugin', 'enqueue'));
    }
    protected function create_post_type(){
      add_action('init', array( $this, 'custom_post_type' ) );
    }


    function custom_post_type(){
      register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    }
    static function enqueue(){
      wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__ ) );
      wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__ ) );
    }
    function activate(){
      require_once plugin_dir_path( __FILE__ ) . 'inc/ashraf-plugin-activate.php';
      AshrafPluginActivate::activate();
    }
  }

  if ( class_exists('AshraffPlugin') ){
      $ashraffPlugin = new AshraffPlugin();
      $ashraffPlugin->register();

  }

  // activation
  register_activation_hook( __FILE__, array( $ashraffPlugin, 'activate') );
  // deactivation
  require_once plugin_dir_path( __FILE__ ) . 'inc/ashraf-plugin-deactivate.php';
  register_deactivation_hook( __FILE__, array( 'AshrafPluginDeactivate', 'deactivate') );

}
