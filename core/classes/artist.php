<?php

class Artist {
     public $id;
     public $name;
     public $created_at;
     public $updated_at;


     private $db;



     public function __construct(){

          global $db;
          $this->db = $db;


          
     }
     public function list(){
          $limit = isset($_GET['limit']) ?
          $_GET['limit']:10; 
           $sql = "SELECT  name
                   FROM artist 
                   ORDER BY id 
                   LIMIT $limit";

     return $this->db->query($sql);
          }
          
               
     public function details($id) {
          $params = array(
               'id' => array($id, PDO::PARAM_INT)
          );
          // Jeg skal globalzer min $db hvere gang
          // global $db;
          $sql = "SELECT title,content, artist_id
                  FROM song
                  WHERE id = :id";
                 

          return $this->db->query($sql, $params);
               
     }
}
    




?>