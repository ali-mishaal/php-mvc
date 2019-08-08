<?php

    class Wimgs
    {
        public $id ;
        public $image;
        public $web_id;
        private $db;


        public function __construct($db)
        {
             $this->db = $db;
        }

        public function close()
        {
             $this->db = null;
        }


        public function read()
        {
            $query = "SELECT * FROM wimgs";
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            
            return $stmt;
        }

        public function single($id)
        {
            $query = "SELECT * FROM wimgs WHERE id =".$id;
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }

        public function singlebyweb($id)
        {
            $query = "SELECT * FROM wimgs WHERE web_id =".$id;
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }

        public function create()
        {
            $query = $this->db->prepare("INSERT INTO wimgs (image , web_id) VALUES (:firstname , :web)");
            $query->bindParam(':firstname', $this->image);
            $query->bindParam(':web', $this->web_id);
            $query->execute();
        }

        public function update($id)
        {
            $sql = "UPDATE wimgs SET image='$this->image' WHERE web_id=".$id;

            // Prepare statement
            $stmt = $this->db->prepare($sql);
        
            // execute the query
            $stmt->execute();
        }

        public function delete($id)
        {
            // sql to delete a record
            $sql = "DELETE FROM wimgs WHERE id=".$id;

            // use exec() because no results are returned
            $this->db->exec($sql);
        }

        public function deleteweb($id)
        {
            // sql to delete a record
            $sql = "DELETE FROM wimgs WHERE web_id=".$id;

            // use exec() because no results are returned
            $this->db->exec($sql);
        }


    }