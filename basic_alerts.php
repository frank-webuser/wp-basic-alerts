<?php
/*
 * Plugin Name:       基本警告
 * Description:       一些已预格式化的警告框。（通过简码实现）
 * Version:           1.2.2
 * Author:            Frank419
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

 function ba_warning( $atts = array(), $content = null, $tag = '' ) {
    $out = '';
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    $ba_atts = shortcode_atts( $atts, $tag );
    if(!is_null($content)) {
        $content = do_shortcode($content);
        $out = '<div class="ba-wrapper ba-warning"><div class="ba-side-wrapper"><div class="ba-side"><span class="fa fa-warning"></span></div></div><div class="ba-alert"><div class="ba-alert-title">';
        if(isset( $ba_atts['title'] )) {
            $out .= esc_html( $ba_atts['title'] );
        } else {
            $out .= '警告！';
        }
        $out .= '</div><div class="ba-alert-content">';
        $out .= $content;
        $out .= '</div></div></div>';
    }
    return $out;
 }
 function ba_important( $atts = array(), $content = null, $tag = '' ) {
    $out = '';
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    $ba_atts = shortcode_atts( $atts, $tag );
    if(!is_null($content)) {
        $content = do_shortcode($content);
        $out = '<div class="ba-wrapper ba-important"><div class="ba-side-wrapper"><div class="ba-side"><span class="fa fa-warning"></span></div></div><div class="ba-alert"><div class="ba-alert-title">';
        if(isset( $ba_atts['title'] )) {
            $out .= esc_html( $ba_atts['title'] );
        } else {
            $out .= '重要！';
        }
        $out .= '</div><div class="ba-alert-content">';
        $out .= $content;
        $out .= '</div></div></div>';
    }
    return $out;
 }
 function ba_info( $atts = array(), $content = null, $tag = '' ) {
    $out = '';
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    $ba_atts = shortcode_atts( $atts, $tag );
    if(!is_null($content)) {
        $content = do_shortcode($content);
        $out = '<div class="ba-wrapper ba-info"><div class="ba-side-wrapper"><div class="ba-side"><span class="fa fa-info"></span></div></div><div class="ba-alert"><div class="ba-alert-title">';
        if(isset( $ba_atts['title'] )) {
            $out .= esc_html( $ba_atts['title'] );
        } else {
            $out .= '提醒：';
        }
        $out .= '</div><div class="ba-alert-content">';
        $out .= $content;
        $out .= '</div></div></div>';
    }
    return $out;
 }

 function ba_misc( $atts = array(), $content = null, $tag = '' ) {
    $out = '';
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    $ba_atts = shortcode_atts( $atts, $tag );
    if(!is_null($content)) {
        $content = do_shortcode($content);
        $out = '<div class="ba-wrapper ba-misc"><div class="ba-side-wrapper"><div class="ba-side"><span class="fa fa-info"></span></div></div><div class="ba-alert"><div class="ba-alert-title">';
        if(isset( $ba_atts['title'] )) {
            $out .= esc_html( $ba_atts['title'] );
        } else {
            $out .= '提醒：';
        }
        $out .= '</div><div class="ba-alert-content">';
        $out .= $content;
        $out .= '</div></div></div>';
    }
    return $out;
 }


function ba_main_menu() {
    echo '<div class="wrap"><h1>基本警告</h1>';
    echo '<p>版本: 1.2.2</p>';
    echo '<p>由Frank419呈现。</p></div>';
}
function ba_main_menu_page() {
    add_menu_page(
        '基本警告',
        '关于基本警告',
        'ba_about',
        'alerts',
        'ba_main_menu',
        '',
        20
    );
}

function ba_add_styles() {
    wp_register_style('ba_stylesheet', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_style('ba_stylesheet');
  }

 function ba_init() {
 
 }
 add_shortcode('warning', 'ba_warning');
 add_shortcode('important', 'ba_important');
 add_shortcode('info', 'ba_info');
 add_shortcode('misc', 'ba_misc');
 add_action( 'admin_menu', 'ba_main_menu_page' );
 add_action( 'wp_enqueue_scripts', 'ba_add_styles' );  

 function ba_activate_plugin() {
    ba_init();
    flush_rewrite_rules();
 };
 register_activation_hook(__FILE__, 'ba_activate_plugin' );

 function ba_deactivate_plugin() {
    flush_rewrite_rules();
 };
 register_deactivation_hook(__FILE__, 'ba_deactivate_plugin' );
 ?>