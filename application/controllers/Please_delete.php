<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/php-playlist-generator/playlist_generator.php';

class Please_delete extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
    function create_playlist(){
        // authorized file types (4 char)
        	$TYPES = array(".mp3", ".ogg", ".wav", ".mp4", ".avi", "mkv");
        
        	// URI of musics' folders
        	// can be a local path or a URL
        	// URL works only with default apache's index
        	$URIs = array(
        		FCPATH."zikir"
        	);
        
        	// scan subfolder level recursive
        	//  0 : no recursive
        	// int > 0 : level of recursive
        	$MAX_RECURSIVE=2;
        
        	// shuffle. true or false
        	if(!defined("SHUFFLE")) {
        		define("SHUFFLE", false);
        	}
        
        	// cache min life time in seconds
        	$cache_min_life=300;
    }
    
    function rename_mp3(){
        
        $files = glob(FCPATH."zikir".DIRECTORY_SEPARATOR."*.mp3");
        
        $list_all_files = array();
        
        foreach($files as $a => $b){
            
            $object = array();
            
            
            $object['original_path'] = $b;
            
            //filename
            $object['original_filename'] = basename($b);
            
            $object['new_filename'] = strtolower(preg_replace("/[^a-zA-Z0-9._]+/", "", str_replace(' ', '_', $object['original_filename'])));
            $object['new_path'] = pathinfo($b)['dirname'].DIRECTORY_SEPARATOR;
            $object['rename_to'] = $object['new_path'].$object['new_filename'];
            //rename($b, $object['rename_to']);
            //echo $object['new_filename']."<br>";
            $mp3Obj = new MP3File($object['rename_to']);
            $object['mp3_info'] = $mp3Obj->getDuration();
            
            
            $list_all_files[] = $object;
        }
        
        echo "<pre>"; print_r($list_all_files); echo "</pre>";
        
        
    }
}
