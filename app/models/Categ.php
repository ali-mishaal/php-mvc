<?php

    class Categ
    {
        public $id ;
        public $name;
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
            $query = "SELECT * FROM category";
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            
            return $stmt;
        }

        public function single($id)
        {
            $query = "SELECT * FROM category WHERE id =".$id;
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }

        public function create()
        {
            $query = $this->db->prepare("INSERT INTO category (name) VALUES (:firstname)");
            $query->bindParam(':firstname', $this->name);
            $query->execute();
        }

        public function update($id)
        {
            $sql = "UPDATE category SET name='$this->name' WHERE id=".$id;

            // Prepare statement
            $stmt = $this->db->prepare($sql);
        
            // execute the query
            $stmt->execute();
        }

        public function delete($id)
        {
            // sql to delete a record
            $sql = "DELETE FROM category WHERE id=".$id;

            // use exec() because no results are returned
            $this->db->exec($sql);
        }
    }