<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends MY_Controller {
    function __construct(){
        parent::__construct();
        
        
        $this->load->library('far_jakim');
        
    }
    
	public function index(){
	   
        
	   
        $this->load->view('jakim/dashboard', $this->data);
	}
    
    function minutely_check_for_prayer_time(){
        $error = array();
        $output = array();
        //deduct 1 minute from current time
        //$current_dttm = date("Y-m-d H:i:s");
        $current_dttm = "2021-01-15 05:59:00";
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
        $allowed_zone = $this->DbInfo->fetch()[0]['list_all_zone'];
        
        $zone_name = "";
        if(isset($this->ConfigDB->fetch()[0]['selected_zone'])){
            $zone_name = $this->ConfigDB->fetch()[0]['selected_zone'];
        }else{
            $error['selected_zone'] = "Please select zone first";
        }
        
        if((isset($this->ConfigDB->fetch()[0]['selected_zone'])) && (!in_array($this->ConfigDB->fetch()[0]['selected_zone'], $allowed_zone))){
            $error['selected_zone'] = "Selected zone not matching with allowed zone";
        }

        
        //check if exists in db
        //load db by zone
        $db_name = strtolower($zone_name);
        $db_jakim_zone = strtoupper($zone_name);
        $DBbyZone = \SleekDB\SleekDB::store($db_name, $this->DB_path_prayer_time_by_zone);

        $prayer_detail_from_db = $DBbyZone
                            ->where( 'jakim_zon', '=', $db_jakim_zone)
                            ->where( 'run_status', '=', 'pending' )
                            ->where( 'proper_dttm', '=', $dttm_current )
                            ->orWhere( 'proper_dttm', '=', $dttm_subtract )
                            ->fetch();
                            
        if(is_array($prayer_detail_from_db) && count($prayer_detail_from_db) == 0){
            $error['prayer_time'] = "Not found in DB";
        }
        
        
        $output['zone'] = $zone_name;
        $output['dttm_current'] = $dttm_current;
        $output['dttm_subtract'] = $dttm_subtract;
        $output['dttm_add'] = $dttm_add;
        
        if(count($error) == 0){
            //$zone_name = $this->ConfigDB->fetch()[0]['selected_zone'];
            $prayer_detail = $prayer_detail_from_db[0];
            
            //update run_status to success
            $update_data = [
                'run_status' => 'success'
            ];
            $DBbyZone->where( '_id', '=', $prayer_detail['_id'] )->update( $update_data );
            $prayer_detail['run_status'] = 'success';
            
            
            //change updated data
            
            
            
            
            //play mp3
            //find mp3
            $media_detail = array();
            $media_adhan_info = $this->DbInfo->fetch()[0];
            $media_adhan_name = "media_adhan_".$prayer_detail['name'];
            if(strlen($media_adhan_info[$media_adhan_name]) > 4){
                $media_detail['status'] = "found";
                $media_detail['message'] = "Media found. Play mp3. (".$media_adhan_info[$media_adhan_name].")";
                $media_detail['media_name'] = $media_adhan_info[$media_adhan_name];
                //echo $media_adhan_info['']
            }else{
                $media_detail['status'] = "not_found";
                $media_detail['message'] = "Media not found";
            }
            $prayer_detail['media_detail'] = $media_detail;
            
            
            //update last run
            $update_data_last_run = array(
                'run_dttm' => date("Y-m-d H:i:s"),
                'prayer_detail' => $prayer_detail
                
            );
            $this->DbInfo->update([
                'last_run' => $update_data_last_run
            ]);
            
            //turn on led
            
            //webhook
            
            
            $output['status'] = "success";
            $output['prayer_detail'] = $prayer_detail;
            
            
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
