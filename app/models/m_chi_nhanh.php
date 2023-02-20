<?php
namespace App\Models;
class m_chi_nhanh extends BaseModel{
    protected $table = "chi_nhanh";
    public function getChiNhanh(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deleteChiNhanh($id){
        $sql = "delete from $this->table where id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function addChiNhanh($id, $ten_chi_nhanh){
        $sql = "insert into $this->table values (?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten_chi_nhanh]);
    }

    public function read_cn_by_id($id){
        $sql = "select * from $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editChiNhanh($id, $ten_chi_nhanh){
        $sql = "update $this->table set ten_chi_nhanh=? where id=?";
        $this->setQuery($sql);
        return $this->execute([$ten_chi_nhanh, $id]);
    }
}