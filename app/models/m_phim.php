<?php
namespace App\Models;
class m_phim extends BaseModel{
    protected $table = " phim";
    public function getPhim(){
        $sql = "select *, $this->table.id as id_phim from $this->table inner join loai_phim on loai_phim.id=$this->table.id_loai_phim";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deletePhim($id){
        $sql = "delete from $this->table where id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function addPhim($id, $ten_phim, $img, $description, $id_loai_phim){
        $sql = "insert into $this->table values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten_phim, $img, $description, $id_loai_phim]);
    }
    public function read_phim_by_id($id){
        $sql = "select * from $this->table inner join loai_phim on loai_phim.id=$this->table.id_loai_phim 
                where $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editPhim($id, $ten_phim, $img, $description, $id_loai_phim){
        $sql= "update $this->table set ten_phim=?, img=?, description=?, id_loai_phim=? where id=?";
        $this->setQuery($sql);
        return $this->execute([$ten_phim, $img, $description, $id_loai_phim, $id]);
    }
}

