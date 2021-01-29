<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Prayer_time {
    private $CI;
    public function __construct(){
        $this->CI =& get_instance();
        
    }
    
    function count_total_prayer_time(){
        $query = $this->CI->db->query("SELECT solat_id FROM prayer_time");
        return $query->num_rows();
    }
    
    function list_zone(){
        $query = $this->CI->db->query("SELECT jakim_zon,COUNT(solat_id) as total_zon FROM prayer_time GROUP BY jakim_zon");
        return $query->result_array();
    }
    
    function list_all_state(){
        $query = $this->CI->db->query("
            SELECT state.state_name,COUNT(state.state_id) as total_prayer_time

            FROM states state LEFT JOIN
            
            prayer_time p ON state.state_id=p.state_id
            
            GROUP BY state.state_name
        
        ");
        return $query->result_array();
    }
    
    function total_zone(){
        $query = $this->CI->db->query("SELECT jakim_zon,COUNT(solat_id) as total_zon FROM prayer_time GROUP BY jakim_zon");
        return $query->num_rows();
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