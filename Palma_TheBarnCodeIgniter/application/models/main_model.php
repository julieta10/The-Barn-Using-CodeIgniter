<?php
class Main_model extends CI_Model
{
      function insert_data($data)  
      {  
           $this->db->insert("feedback", $data);  
      }  
      function fetch_data()  
      {  
 		   $this->db->select("*");  
           $this->db->from("feedback");  
           $query = $this->db->get();  
           return $query;    
      }  
}
?>