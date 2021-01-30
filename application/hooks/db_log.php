<?php
class Db_log 
{

    function __construct() 
    {
    }


    function logQueries() 
    {
        $CI = & get_instance();
        $total_time = 0;
        $filepath = APPPATH . 'logs/Query-log-' . date('Y-m-d') . '.php';
        
        $handle = fopen($filepath, "a+");                        

        $times = $CI->db->query_times;
        foreach ($CI->db->queries as $key => $query) 
        { 
            $sql = $query . " \n Execution Time:" . $times[$key]; 
            $total_time = $total_time+$times[$key];
            fwrite($handle, $sql . "\n\n");    
        }
        fwrite($handle, "Total Query Log Time : ".$total_time . "\n\n");    

        fclose($handle);  
    }

}
?>