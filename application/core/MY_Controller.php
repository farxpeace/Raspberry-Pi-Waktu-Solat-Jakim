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
        $missing_required_extension = array();
        $required = array("sqlite3", "pdo_sqlite");
        $installed_extension = get_loaded_extensions();
        foreach($required as $a => $b){
            if(!in_array($b, $installed_extension)){
                $missing_required_extension[] = $b;
            }
        }
        
        
        require_once(APPPATH.'views/errors/html/onload_check_modules.php');
        
        die();
    }
    
    function detect_player_available(){
        //omxplayer
        $a = shell_exec('ls -l');
        var_dump($a); exit();
    }
    
    function initialize_config(){
        
        
    }
    
    
    
    
}