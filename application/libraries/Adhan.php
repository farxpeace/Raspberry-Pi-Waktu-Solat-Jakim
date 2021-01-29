<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Adhan {
    private $CI;
    public function __construct(){
        $this->CI =& get_instance();
        
    }
    
    function count_total_prayer_time(){
        $query = $this->CI->db->query("SELECT solat_id FROM prayer_time");
        return $query->num_rows();
    }
    
    function list_all_zone(){
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
    
    function list_all_meta(){
        $query = $this->CI->db->query("SELECT * FROM meta");
        return $query->result_array();
    }
    
    function get_meta($meta_key){
        $query = $this->CI->db->query("SELECT * FROM meta WHERE meta_key='".$meta_key."'");
        return $query->row_array();
    }
    
    function get_meta_value($meta_key){
        $query = $this->CI->db->query("SELECT * FROM meta WHERE meta_key='".$meta_key."'");
        return $query->row_array()['meta_value'];
    }
    
    function update_meta($meta_key, $meta_value){
        $query = $this->CI->db->query("SELECT * FROM meta WHERE meta_key='".$meta_key."' LIMIT 1");
        if($query->num_rows() > 0){
            $update_data = array(
                'meta_value' => $meta_value
            );

            $this->CI->db->where('meta_key', $meta_key);
            $this->CI->db->update('meta', $update_data); 
        }elseif($query->num_rows() == 0){
            $this->insert_meta($meta_key, $meta_value);
        }
        
    }
    
    function insert_meta($meta_key, $meta_value, $meta_description = NULL, $meta_sorting = 0){
        $insert_data = array();
        $insert_data['meta_key'] = $meta_key;
        $insert_data['meta_value'] = $meta_value;
        $insert_data['meta_description'] = $meta_description;
        $insert_data['meta_sorting'] = $meta_sorting;
        
        $this->CI->db->insert('meta', $insert_data); 
    }
    
    function query_meta($query, $result_row_numrow = "row"){
        $query = $this->CI->db->query("SELECT * FROM meta $query");
        if($result_row_numrow == 'row'){
            return $query->row_array();
        }elseif($result_row_numrow == 'result'){
            return $query->result_array();
        }elseif($result_row_numrow == 'num_rows'){
            return $query->num_rows();
        }
    }
    
    function get_prayer_detail($column, $value){
        $query = $this->CI->db->query("SELECT * FROM prayer_detail WHERE ".$column."='".$value."'");
        return $query->row_array();
    }
    
    function list_prayer_detail(){
        $query = $this->CI->db->query("SELECT * FROM prayer_detail ORDER BY adhan_sorting ASC");
        return $query->result_array();
        
    }
    
    function update_prayer_detail($key, $key_value, $column, $value){
        $data = array(
            $column => $value
        );

        $this->CI->db->where($key, $key_value);
        $this->CI->db->update('prayer_detail', $data); 
    }
    
    function get_triggered_adhan($jakim_zon, $dttm_current, $dttm_subtract){
        $query = $this->CI->db->query("
            SELECT * FROM prayer_time
            WHERE jakim_zon='".$jakim_zon."'
            AND run_status='pending'
            AND proper_dttm BETWEEN '".$dttm_subtract."' AND '".$dttm_current."'
        ");

        
        return $query->row_array();
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