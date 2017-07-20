<?php 
	/*
	Plugin Name: Loader
	Plugin URI: http://themeforest.net/user/SW-THEMES
	Description: Shortcodes for Porto Wordpress Theme.
	Version: 1.4.2
	Author: SW-THEMES
	Author URI: http://themeforest.net/user/SW-THEMES
	*/

class Loader
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
		$this->libraries();
		
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        //add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'My Settings', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }
	
	public function libraries(){
		require_once( dirname(__FILE__) . '/libraries/PHPExcel.php');
	}
	
    /**
     * Options page callback
     */
    public function create_admin_page(){
		
		global $wpdb;
        
		$filename = dirname(__FILE__). "/goaway.xlsx";
		
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($filename);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		
		$highestRow = $objWorksheet->getHighestRow(); 
		$highestColumn = $objWorksheet->getHighestColumn(); 

		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
		
		$array = array();
		
		for($row=1; $row < $highestRow; $row++){
			if($row == 1) continue;			
			
			$col01 = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
			$col02 = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
			$col03 = $objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
			 
			$array[$col01][$col02] = $col03;
			
		}
		
		foreach($array as $product => $rows){
			$table = '<table style="width: 100%;"><tbody>';
			
			foreach($rows as $attr => $value){
				$table .= '<tr>';
				
				$table .= '<td style="padding-bottom: 20px; width: 48%; vertical-align: top;">'.$attr.'</td>';
				$table .= '<td style="padding-bottom: 20px; width: 2%; ">&nbsp;</td>';								
				$table .= '<td style="vertical-align: top; width: 48%;">'.str_replace('|', '</br>', $value).'</td>';
				
				
				$table .= '</tr>';
			}
			
			$table .= '</tbody></table>';
			
			$postid = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '" . trim($product) . "'" );
			
			var_dump($wpdb->update($wpdb->posts, 
				array(
					'post_excerpt' => $table
				),
				array( 'post_title' => trim($product) )
			));
			
			//break;
		}
		
		
    }
}

if( is_admin() )
    $my_settings_page = new Loader();