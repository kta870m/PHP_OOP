<?php
    require_once("database.php");

    class Model{
        public $conn;
        public $id;
        public $district_name;
        public $provices_id;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getAll(){}

        public function get($id){
            $this->id=$id;
        }

        public function save($district_name, $provices_id){
            $this->district_name=$district_name;
            $this->provices_id=$provices_id;
        }

        public function delete_district($id){
            $this->id=$id;
        }
    }

    class District extends Model{

        public function getAllDistrict(){
            $this->getAll();
            $result=$this->conn->query("SELECT * FROM districts");
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getDistrict($conn, $id){
            $this->get($id);
            $stmt=$this->conn->prepare("SELECT * FROM districts WHERE id=? ");
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $result=$stmt->get_result();
            $district=$result->fetch_all(MYSQLI_ASSOC);
            return $district ? $district[0] : [];
        }

        public function saveDistrict($conn, $district_name, $provices_id){          
            $this->save($district_name, $provices_id);
            $stmt=$this->conn->prepare("INSERT INTO districts(name, provices_id) VALUES (?,?)");
            $stmt->bind_param("si", $this->district_name, $this->provices_id);
            $stmt->execute();
            return $stmt->execute() ? true : false;
        }

        public function deleteDistrict($conn, $id){
            $this->delete_district($id);
            $stmt=$this->conn->prepare("DELETE FROM districts WHERE id=?");
            $stmt->bind_param("i", $this->id);
            return $stmt->execute() ? true : false;
        }
    }

?>