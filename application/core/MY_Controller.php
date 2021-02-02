<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
    
    public $data;
    
    
    public $Player;
    function __construct() {
        $this->onload_check_modules();
        parent::__construct();
        
        
        
        $this->initialize_config();
        
        //$this->detect_player_available();
        
        
        
        $this->data = array();
        
        
    }
    
    function onload_check_modules(){
        $error = array();
        $error['missing_required_extension'] = array();
        $error['database_not_writable'] = array();
        $error['media_adhan_directory_not_writable'] = array();
        $error['media_player_not_found'] = array();
        
        
        $missing_required_extension = array();
        $required = array("mbstring", "supervisor");
        $installed_extension = get_loaded_extensions();
        foreach($required as $a => $b){
            if(!in_array($b, $installed_extension)){
                $error['missing_required_extension'][] = $b;
            }
        }
        
        
        //check if database if writable
        $database_not_writable = array();
        $database_file_array = array(APPPATH."db".DIRECTORY_SEPARATOR,APPPATH."db".DIRECTORY_SEPARATOR."sqlite3_jakim");
        foreach($database_file_array as $a => $b){
            if (!is_writable($b)) {
                //$error['database_not_writable'][] = $b;
            }
        }
        
        //check if assets/media/adhan is writable
        $media_adhan_folder = array(FCPATH.'assets'.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'adhan');
        foreach($media_adhan_folder as $a => $b){
            if (!is_writable($b)) {
                $error['media_adhan_directory_not_writable'][] = $b;
            }
        }
        
        //check for cmus player
        $media_player_array = array('mpg123');
        foreach($media_player_array as $a => $b){
            $out_cms = shell_exec($b." 2>&1; echo $?");
            if(strpos($out_cms, "not found") !== false){
                $error['media_player_not_found'][] = $b;
            } 
        }
        
        
        
        
        if((count($error['missing_required_extension']) > 0) || (count($error['database_not_writable']) > 0) || (count($error['media_adhan_directory_not_writable'])) || (count($error['media_player_not_found']) > 0)){
            require_once(APPPATH.'views/errors/html/onload_check_modules.php');
            die();
        }
        
        
        
    }
    
    function detect_player_available(){
        //omxplayer
        $a = shell_exec('ls -l');
        var_dump($a); exit();
    }
    
    function initialize_config(){
        
        
    }
    
    
    
    
}