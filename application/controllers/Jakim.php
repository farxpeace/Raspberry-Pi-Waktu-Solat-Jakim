<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jakim extends MY_Controller {
    function __construct(){
        parent::__construct();
    }
    
    function add_zone(){
        $query = $this->db->query("SELECT COUNT(solat_id) as total_zone, jakim_zon FROM prayer_time GROUP BY jakim_zon");
        foreach($query->result_array() as $a => $b){
            
        }
    }
    
    
	public function index(){
	   
        
        $selected_zone = $this->adhan->get_meta_value('selected_zone');
        $this->data['selected_zone'] = $selected_zone;

        
        
	   
        $this->load->view('jakim/dashboard', $this->data);
	}
    
    function now_playing(){
        $output = array();
        
        $now_playing_json = $this->adhan->get_meta_value('now_playing');
        if(strlen($now_playing_json) > 5){
            $now_playing_array = json_decode($now_playing_json, true);
            
            $output['status'] = "playing";
            $output['now_playing'] = $now_playing_array;
        }else{
            $output['status'] = "idle";
        }
        
        
        
        
        
        
        echo json_encode($output);
    }
    
    function upload_mp3_for_adhan(){
        $postdata = $this->input->post('postdata');
        $error = array();
        $output = array();
        
        $maxsize    = 2097152;
        $acceptable = array(
            'audio/mp3',
            'audio/mpeg'
        );
        /* Valid extensions */
        $valid_extensions = array("mp3");
        
        //check file type
        if(!isset($_FILES['file']['name'])){
            $error['upload'] = "Please upload mp3 for adhan";
        }else{
            
            $filename = $_FILES['file']['name'];
            
            if((!in_array($_FILES['file']['type'], $acceptable)) && (!empty($_FILES["file"]["type"]))) {
                $error['upload'] = 'Invalid file type. Only mp3 types are accepted.';
            }   
            
            $location = FCPATH.'assets'.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'adhan'.DIRECTORY_SEPARATOR.$filename;
            $upload_dir = FCPATH.'assets'.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'adhan';
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            
            
            /* Check file extension */
            if(!in_array(strtolower($imageFileType), $valid_extensions)) {
                $error['upload'] = "Not a valid extension. Only mp3 are allowed";
            }
            
            if(count($error) == 0){
                //echo $location; exit();
                if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                    
                }else{
                    $error['upload'] = "Error while moving uploaded files";
                }
            }
        }
        

        
        

        if(count($error) == 0){
            $adhan_id = $this->input->post('adhan_id');
            
            $this->adhan->update_prayer_detail('adhan_id', $adhan_id, 'adhan_media_name', $filename);

           
            
            
            $output['message_single'] = "Media for ".$adhan_name." updated";
            $output['status'] = "success";
        }else{
            
            $output['message_single'] = current($error);
            $output['errors'] = $error;
            $output['status'] = 'error';
        }
        echo json_encode($output);
    }
    
    function remove_media_adhan(){
        $postdata = $this->input->post('postdata');
        
        $error = array();
        $output = array();
        
        
        
        
        
        if(count($error) == 0){
            
            $this->adhan->update_prayer_detail('adhan_id', $postdata['adhan_id'], 'adhan_media_name', NULL);
            

            $output['message_single'] = "Adhan media has been removed";
            $output['status'] = "success";
        }else{
            
            $output['message_single'] = current($error);
            $output['errors'] = $error;
            $output['status'] = 'error';
        }
        echo json_encode($output);
    }
    
    function jakim_update_config(){
        $postdata = $this->input->post('postdata');
        
        $error = array();
        $output = array();
        
        
        
        
        
        if(count($error) == 0){
            
            
            //print_r($list_config);
            foreach($postdata as $a => $b){
                $this->adhan->update_meta($a, $b);
                
            }
            
            $output['message_single'] = "Your settings has been updated successfully";
            $output['status'] = "success";
        }else{
            
            $output['message_single'] = current($error);
            $output['errors'] = $error;
            $output['status'] = 'error';
        }
        echo json_encode($output);
    }
    
    function populate_data_waktu_solat(){
        $query = $this->db->query("SELECT * FROM jakim_waktu_solat");
        $rows = $query->result_array();
        
        foreach($rows as $a => $b){
            
            //$insert_id = $this->SleekDB->insert( $b );
            //echo "Insert ID : ".$insert_id['_id']."<hr>";
            
        }
        
        echo "Finish";
        
        //echo "<pre>"; print_r($rows); echo "</pre>";
        
        
    }
}
