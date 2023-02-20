<?php
namespace App\Models;
class m_account extends BaseModel{
    protected $table = "account";
    public function getAccount(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function updateAccount($id, $trang_thai){
        $sql = "update $this->table set trang_thai = ? where id=?";
        $this->setQuery($sql);
        return $this->execute([$trang_thai, $id]);
    }

    public function signup($id, $username, $password, $email, $trang_thai){
        $sql = "insert into $this->table values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $username, $password, $email, $trang_thai]);
    }
}
