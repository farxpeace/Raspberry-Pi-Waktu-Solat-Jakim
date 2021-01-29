<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/SleekDB/SleekDB.php';
class MY_Controller extends CI_Controller {
    public $SleekDB;
    public $ConfigDB;
    
    public $data;
    public $sleek_db_data_dir;
    
    //SleekDB configuration
    public $path_to_sleek_db;
    public $DB_path_prayer_time_by_zone;
    public $DB_path_jakim_by_current_year;
    
    //DB Pool
    public $DbPrayer_time_by_zone;
    public $DbInfo;
    
    public $dir_name_jakim = 'jakim';
    public $dir_name_prayer_time_by_zone = 'prayer_time_by_zone';
    
    public $db_name_info = 'jakim_information';
    public $db_name_config = 'config';
    
    public $Player;
    function __construct() {
        parent::__construct();
        $this->sleek_db_data_dir = APPPATH.'third_party/SleekDB/databases';
        $this->path_to_sleek_db = APPPATH.'third_party/SleekDB/databases';
        
        $this->DB_path_prayer_time_by_zone = $this->DB_path_prayer_time_by_zone();
        $this->DB_path_jakim_by_current_year = $this->DB_path_jakim_by_current_year();
        
       
        
        $this->initialize_config();
        
        //$this->detect_player_available();
        
        
        //prayer_time_by_zone
        $this->DbPrayer_time_by_zone = \SleekDB\SleekDB::store($this->db_name_info, $this->DB_path_prayer_time_by_zone);
        $this->SleekDB[] = $this->DbPrayer_time_by_zone;
        
        
        //jakim information
        $this->DbInfo = \SleekDB\SleekDB::store($this->db_name_info, $this->DB_path_jakim_by_current_year);
        $this->SleekDB[] = $this->DbInfo;
        
        
        $this->data = array();
        
        $config = $this->ConfigDB->limit(1)->fetch()[0];
        $this->data['config'] = $config;
        
        
        $jakim_information = $this->DbInfo->fetch()[0];
        $this->data['info'] = $jakim_information;
        
        
    }
    
    function detect_player_available(){
        //omxplayer
        $a = shell_exec('ls -l');
        var_dump($a); exit();
    }
    
    function initialize_config(){
        //$config = $this->config->config;
        
        $this->ConfigDB = \SleekDB\SleekDB::store($this->db_name_config, $this->path_to_sleek_db);
        
        $output = array();
        
        $output['system_name'] = "Waktu Solat Jakim";
        $output['author_name'] = "Ijul Farizul";
        $output['author_email'] = "farxpeace@gmail.com";
        $output['author_phone'] = "60137974467";
        $output['version'] = '1.0';
        
        //$insert_id = $this->ConfigDB->insert( $output );
        
        
        $this->SleekDB[] = $this->ConfigDB;
        
    }
    
    function DB_path_jakim_by_current_year(){
        return $this->path_to_sleek_db.DIRECTORY_SEPARATOR.$this->dir_name_jakim.DIRECTORY_SEPARATOR.date("Y");
    }
    
    function DB_path_prayer_time_by_zone(){
        
        $folder_name = $this->dir_name_jakim.DIRECTORY_SEPARATOR.date("Y").DIRECTORY_SEPARATOR.$this->dir_name_prayer_time_by_zone;
        
        $jakim_db_path = $this->path_to_sleek_db.DIRECTORY_SEPARATOR.$folder_name;
        
        return $jakim_db_path;
    }
}