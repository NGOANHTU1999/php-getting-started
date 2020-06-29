<?php
  Include '../lib/database.php';
  Include '../helpers/format.php';
?>

<?php
/** 
 * 
*/
class brand
{
    private $db;
    private $fm;

    public function __construct()
    {
       $this->db = new Database();
       $this->fm = new Format();
    }
    
    public function insert_brand($brandName){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
    
        if(empty($brandName)){
            $alert = " Brand must be not empty";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
            $result = $this->db->insert($query); 

            if($result){
                $alert = "<span class = 'success'> Insert Brand Successfully </span>";
                return $alert;
            }else{
                $alert = "<span class ='error'> Insert Brand Not Successfully </span>";
                return $alert;
            }
        }
    }

    public function show_brand(){
        $query = "SELECT * FROM tbl_brand order by brandId desc";
        $result = $this->db->select($query); 
        return $result;
    }

    public function getbrandbyId($id){
        $query = "SELECT * FROM tbl_brand where brandId = '$id'";
        $result = $this->db->select($query); 
        return $result;
    }

    public function update_brand($brandName,$id){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($brandName)){
            $alert = " Product must be not empty";
            return $alert;
        }else{
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
            $result = $this->db->update($query); 

            if($result){
                $alert = "<span class = 'success'> Updtate Brand Successfully </span>";
                return $alert;
            }else{
                $alert = "<span class ='error'> Update Brand Not Successfully </span>";
                return $alert;
            }
        }

    }
    public function del_brand($id){
        $query = "DELETE FROM tbl_brand where brandId = '$id'";
        $result = $this->db->delete($query); 
        if($result){
            $alert = "<span class = 'success'> Deleted Brand Successfully </span>";
            return $alert;
        }else{
            $alert = "<span class ='error'> Deleted Brand Not Successfully </span>";
            return $alert;
        }
    }
}
?>