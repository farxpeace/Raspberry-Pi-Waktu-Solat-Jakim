<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends MY_Controller {
    function __construct(){
        parent::__construct();
        
       
        
    }
    
	public function index(){
	   
        
	   
        $this->load->view('jakim/dashboard', $this->data);
	}
    
    function minutely_check_for_prayer_time(){
        $error = array();
        $output = array();
        $prayer_detail = array();
        //deduct 1 minute from current time
        //$current_dttm = date("Y-m-d H:i:s");
        $current_dttm = "2021-01-05 05:45:00";
        $timestamp_current = strtotime($current_dttm);
        // Subtract time from datetime
        $time_subtract = $timestamp_current - (1 * 60);
        $time_add = $timestamp_current + (1 * 60);
        
        $dttm_current = $current_dttm;
        $dttm_subtract = date("Y-m-d H:i:s", $time_subtract);
        $dttm_add = date("Y-m-d H:i:s", $time_add);
        // Date and time after subtraction
        $current_dttm_subtract_one_min = date("Y-m-d H:i:s", $time_subtract);
        $current_dttm_add_one_min = date("Y-m-d H:i:s", $time_add);
        
        //get zone
        $list_all_zone = $this->adhan->list_all_zone();
        $allowed_zone = array();
        foreach($list_all_zone as $a => $b){
            $allowed_zone[] = $b['jakim_zon'];
        }
        
        
        
        $zone_name = $this->adhan->get_meta_value('selected_zone');
        if(strlen($zone_name) < 3){
            $error['selected_zone'] = "Please select zone first";
        }
        
        if((strlen($zone_name) >= 3) && (!in_array($zone_name, $allowed_zone))){
            $error['selected_zone'] = "Selected zone not matching with allowed zone";
        }else{
            
            
            //get prayer detail
            
            $prayer_detail = $this->adhan->get_triggered_adhan($zone_name, $dttm_current, $dttm_subtract);
            
            
        }
                            
        if(is_array($prayer_detail) && count($prayer_detail) == 0){
            $error['prayer_time'] = "Not found in DB";
        }
        if(is_null($prayer_detail)){
            $error['prayer_time'] = "Not found in DB";
        }
        
        $output['cron']['run_time'] = date("Y-m-d H:i:s");
        
        $output['zone'] = $zone_name;
        $output['dttm_current'] = $dttm_current;
        $output['dttm_subtract'] = $dttm_subtract;
        $output['dttm_add'] = $dttm_add;
        
        
        if(count($error) == 0){
            //$zone_name = $this->DbInfo->fetch()[0]['selected_zone'];
            
            
            //update run_status to success
            //$this->adhan->update_prayer_time('solat_id', $prayer_detail['solat_id'], 'run_status', 'success');

            
            
            
            
            //play mp3
            //find mp3
            $media_detail = array();
            $media_adhan_info = $this->adhan->get_prayer_detail('adhan_code_name', $prayer_detail['name']);
            
            if(strlen($media_adhan_info['adhan_media_name']) > 4){
                $media_path = FCPATH.'assets'.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'adhan'.DIRECTORY_SEPARATOR.$media_adhan_info['adhan_media_name'];
                if (file_exists($media_path)) {
                    $media_adhan_info['media_found'] = "yes";
                    $media_adhan_info['media_path'] = $media_path;
                }
                
                
                
            }else{
                $media_adhan_info['media_found'] = "no";
            }
            $output['media_detail'] = $media_adhan_info;
            
            
            $output['prayer_detail'] = $prayer_detail;
            
            if($media_adhan_info['media_found'] == "yes"){
                //shell_exec("omxplayer --no-keys -o both ".$media_path." > /dev/null 2>/dev/null &");
                //shell_exec("mpg123 ".$media_path." > /dev/null 2>/dev/null &");
                //$media_path = "/var/www/html/assets/media/adhan/example.mp3";
                
                $now_playing = array();
                $now_playing['media_adhan_info'] = $media_adhan_info;
                $now_playing_json = json_encode($now_playing);
                
                $this->adhan->update_meta('now_playing', $now_playing_json);
                //shell_exec("mpg123 --gain 100 ".$media_path." > /dev/null 2>/dev/null &");
                $output_including_status = shell_exec("mpg123 --gain 100 ".$media_path." 2>&1; echo $?");
                $this->adhan->update_meta('now_playing', NULL);
            }

            
            
            
            //turn on led
            
            //webhook
            
            
            $output['status'] = "success";
            
            
            //update last run
            $last_run_data = json_encode($output);
            $this->adhan->update_meta('adhan_last_run', $last_run_data);
            
            
        }else{
            $output['status'] = 'error';
            $output['errors'] = $error;
            $output['error_message_single'] = current($error);
        }
        
        echo "<pre>"; print_r($output); echo "</pre>";
    }
    
    function sample_db(){
        $zone_name = 'JHR01';
            
            //load db by zone
            $db_name = strtolower($zone_name);
            $DBbyZone = \SleekDB\SleekDB::store($db_name, $this->DB_path_prayer_time_by_zone);
        echo "<pre>"; print_r($DBbyZone->where( 'name', '=', 'fajr' )->fetch());
    }
}
