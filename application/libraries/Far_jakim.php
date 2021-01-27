<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Far_jakim {
    private $CI;
    private $SleekDB;
    private $ConfigDB;
    public function __construct(){
        $this->CI =& get_instance();
        $this->SleekDB = $this->CI->SleekDB;
        $this->ConfigDB = $this->CI->ConfigDB;
    }
    
    function count_total_prayer_time(){
        //echo "<pre>"; print_r($this->ConfigDB); exit();
        //$results = $this->PrayerTimeDB->fetch();
        //$total = count($results);
        
        //return $total;
    }
    
    function list_zone(){
        
    }
    
    
    /**
     * Get User Account
     */
    /**
    function get_account($column, $value){
        $query = $this->CI->db->query("SELECT * FROM user_accounts WHERE ".$column."='".$value."'");
        return $query->row_array();
    }
    */
    /**
    function list_account($column, $value){
        $query = $this->CI->db->query("SELECT * FROM user_accounts WHERE ".$column."='".$value."'");
        return $query->result_array();
    }
    */
    
    /**
     * Insert / Create profile
     * @param array $data 
     */
    /**
    function insert_profile($data){
        $this->CI->db->insert('user_profiles', $data); 
    }
    */
    /**
     * Update
     * @param string $key Database column name
     * @param string $key_value Database column value(s)
     * @param string $column Column name to update
     * @param string $value New value for specified column
     */
    /**
    function update_user($key, $key_value, $column, $value){
        $data = array(
            $column => $value
        );

        $this->CI->db->where($key, $key_value);
        $this->CI->db->update('user_accounts', $data); 
    }
    */
    
}


?>