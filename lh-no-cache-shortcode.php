<?php
/**
 * Plugin Name: LH No Cache Shortcode
 * Plugin URI:  https://lhero.org/portfolio/lh-no-cache-shortcode/
 * Description: A shrtcode to prevent WP Super Cache from caching a certain page, post, or cpt
 * Version:     1.00
 * Author:      Peter Shaw
 * Author URI:  https://shawfactor.com
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 if (!class_exists('LH_No_cache_shortcode_plugin')) {


class LH_No_cache_shortcode_plugin {
    
    
    private static $instance;
    
public function do_shortcode($atts, $content = "") {
    
if (!defined('DONOTCACHEPAGE')) {
    
define( 'DONOTCACHEPAGE', true );


    
return '<!-- WP Super cache caching disabled courtesy of LH No Cache Shortcode. -->';

}


    
    
}
    
    
public function register_shortcodes(){


//register the main form shortcode
add_shortcode('lh_no_cache_shortcode', array($this,'do_shortcode'));



}

    
    
    public function plugin_init(){
         
            //register the key shortcodes
add_action( 'init', array($this,'register_shortcodes'));

        
  
        
     }   
    
       /**
     * Gets an instance of our plugin.
     *
     * using the singleton pattern
     */
     
     
    public static function get_instance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
 
        return self::$instance;
    }
    
        public function __construct() {
            
        //run our hooks on plugins loaded to as we may need checks
        add_action( 'plugins_loaded', array($this,'plugin_init'));


        
            
        }
    
    
    
}
    
    
$lh_no_cache_shortcode_instance = LH_No_cache_shortcode_plugin::get_instance();


}
 
 
 ?>