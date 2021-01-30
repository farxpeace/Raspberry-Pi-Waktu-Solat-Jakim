<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
    
    public $data;
    
    
    public $Player;
    function __construct() {
<<<<<<< HEAD
        $this->onload_check_modules();
=======
        
>>>>>>> d4b905ec6d1778088ac444774ef007efcdb141f5
        parent::__construct();
        
        
        $this->initialize_config();
        
        //$this->detect_player_available();
        
        
        
        $this->data = array();
        
        
    }
    
    function onload_check_modules(){
<<<<<<< HEAD
        $list_not_found = array();
        $required = array("sqlite3", "pdo_sqlite");
        $installed_extension = get_loaded_extensions();
        foreach($installed_extension as $a => $b){
            if(!in_array($b, $required)){
                $list_not_found[] = $b;
            }
        }
        echo "<pre>"; print_r($list_not_found); exit();
=======
        
>>>>>>> d4b905ec6d1778088ac444774ef007efcdb141f5
    }
    
    function detect_player_available(){
        //omxplayer
        $a = shell_exec('ls -l');
        var_dump($a); exit();
    }
    
    function initialize_config(){
        
        
    }
    
    
}