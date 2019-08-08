<?php

    class Web
    {
        public $id ;
        public $cat_id;
        public $name;
        public $image;
        public $desc;
        public $company;
        public $owner;
        public $op_date;
        public $country;
        public $tech;
        public $url;
        public $duration;
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
            $query = "SELECT * FROM websites";
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            
            return $stmt;
        }


        public function readlimit_New($skip )
        {
            $query = "SELECT * FROM websites LIMIT $skip, 4";
           
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $rows=$stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            return $stmt;
        }


        public function readlimit($skip , $max)
        {
            $query = "SELECT * FROM websites LIMIT {$skip}, {$max}";
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            
            return $stmt;
        }

        public function single($id)
        {
            $query = "SELECT * FROM websites WHERE id =".$id;
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }

        public function create()
        {
            $query = $this->db->prepare("INSERT INTO websites (id , name , cat_id , image , description , company , owner , op_date , country , technical , url , duration) VALUES (:id , :name , :cat , :image , :desc , :company , :owner , :date , :country ,:tech ,:url , :duration)");
            $query->bindParam(':id', $this->id);
            $query->bindParam(':name', $this->name);
            $query->bindParam(':cat', $this->cat_id);
            $query->bindParam(':image', $this->image);
            $query->bindParam(':desc', $this->desc);
            $query->bindParam(':company', $this->company);
            $query->bindParam(':owner', $this->owner);
            $query->bindParam(':date', $this->op_date);
            $query->bindParam(':country', $this->country);
            $query->bindParam(':tech', $this->tech);
            $query->bindParam(':url', $this->url);
            $query->bindParam(':duration', $this->duration);
            $query->execute();
        }

        public function update($id)
        {
            $sql = "UPDATE websites SET name='$this->name' , cat_id='$this->cat_id' , image='$this->image' , description='$this->desc' , company='$this->company' , owner='$this->owner' , op_date='$this->op_date' , country='$this->country' , technical='$this->tech' , url='$this->url' , duration ='$this->duration' WHERE id=".$id;

            // Prepare statement
            $stmt = $this->db->prepare($sql);
        
            // execute the query
            $stmt->execute();
        }

        public function delete($id)
        {
            // sql to delete a record
            $sql = "DELETE FROM websites WHERE id=".$id;

            // use exec() because no results are returned
            $this->db->exec($sql);
        }
    }