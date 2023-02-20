<?php
namespace App\Models;
class m_suat_chieu extends BaseModel{
    protected $table = "suat_chieu";
    public function getSuatChieu(){
        $sql = "select *, $this->table.id as id_suat_chieu from $this->table inner join phim on phim.id=$this->table.id_phim
                inner join phong_chieu on phong_chieu.id=$this->table.id_phong_chieu
                inner join chi_nhanh on chi_nhanh.id=phong_chieu.id_chi_nhanh
                inner join loai_phim on loai_phim.id=phim.id_loai_phim";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deleteSuatChieu($id){
        $sql = "delete from $this->table where id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function addSuatChieu($id, $id_phim, $id_phong_chieu){
        $sql = "insert into $this->table values(?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $id_phim, $id_phong_chieu]);
    }
    public function read_suat_chieu_by_id($id){
        $sql = "select *, $this->table.id as id_suat_chieu from $this->table inner join phim on phim.id=$this->table.id_phim
                inner join phong_chieu on phong_chieu.id=$this->table.id_phong_chieu
                inner join chi_nhanh on chi_nhanh.id=phong_chieu.id_chi_nhanh
                inner join loai_phim on loai_phim.id=phim.id_loai_phim
                where $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editSuatChieu($id, $id_phim, $id_phong_chieu){
        $sql = "update $this->table set id_phim = ?, id_phong_chieu = ? where id=?";
        $this->setQuery($sql);
        return $this->execute([$id_phim, $id_phong_chieu, $id]);
    }
}
