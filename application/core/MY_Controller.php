<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
    
    public $data;
    
    
    public $Player;
    function __construct() {
        
        parent::__construct();
        
        
        $this->initialize_config();
        
        //$this->detect_player_available();
        
        
        
        $this->data = array();
        
        
    }
    
    function onload_check_modules(){
        
    }
    
    function detect_player_available(){
        //omxplayer
        $a = shell_exec('ls -l');
        var_dump($a); exit();
    }
    
    function initialize_config(){
        
        
    }
    
    
}