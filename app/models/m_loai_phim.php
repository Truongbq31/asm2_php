<?php
namespace App\Models;
class m_loai_phim extends BaseModel {
    protected $table = "loai_phim";
    public function getLoaiPhim(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deleteLoaiPhim($id){
        $sql = "delete from $this->table where id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function addLoaiPhim($id, $ten_loai){
        $sql = "insert into $this->table values(?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten_loai]);
    }
    public function read_loai_by_id($id){
        $sql = "select * from $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editLoaiPhim($id, $ten_loai){
        $sql = "update $this->table set ten_loai=? where id=?";
        $this->setQuery($sql);
        return $this->execute([$ten_loai, $id]);
    }
}
