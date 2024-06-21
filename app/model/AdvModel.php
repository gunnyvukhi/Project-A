<?php

require_once "config/db.php";

class AdvModel{
    public function getAdv(){
        $sql = "SELECT * FROM advs";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

    public function getAdvById($id){
        $sql = "SELECT * FROM advs WHERE id = '$id'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetch(PDO::FETCH_ASSOC);
        return $db;
    }

    public function addAdv($caption, $views, $image, $create_at, $end_at){
        $sql = "INSERT INTO advs (caption, views, image, create_at, end_at) VALUES ('$caption', $views, '$image', '$create_at', '$end_at')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function deleteAdv($id){
        $sql = "DELETE FROM advs WHERE id = '$id'";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    // view +1
    public function viewPlus($id){
        $sql = "UPDATE advs SET views = views + 1 WHERE id = '$id'";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }
}