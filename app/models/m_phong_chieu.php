<?php
namespace App\Models;
class m_phong_chieu extends BaseModel{
    protected $table = "phong_chieu";
    public function getPhongChieu(){
        $sql = "select *,$this->table.id as id_pc from $this->table inner join chi_nhanh on chi_nhanh.id=$this->table.id_chi_nhanh";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deletePhongChieu($id){
        $sql = "delete from $this->table where id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function addPhongChieu($id, $ten_phong, $id_chi_nhanh){
        $sql = "insert into $this->table values(?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten_phong, $id_chi_nhanh]);
    }

    public function read_phong_chieu_by_id($id){
        $sql = "select *,$this->table.id as id_pc from $this->table inner join chi_nhanh on chi_nhanh.id=$this->table.id_chi_nhanh
            where $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editPhongChieu($id, $ten_phong, $id_chi_nhanh){
        $sql = "update $this->table set ten_phong=?, id_chi_nhanh=? where id=?";
        $this->setQuery($sql);
        return $this->execute([$ten_phong, $id_chi_nhanh, $id]);
    }
}
