<?php
class Scanned
{
    public $id;
    public $userid;
    public $hash;
    public $create_at;

    function __construct($id, $userid, $hash, $create_at)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->hash = $hash;
        $this->create_at = $create_at;
    }

    static function add($userid, $hash)
    {
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO scanned(userid, hash)  VALUES (:userid,:hash);");
        $req->bindValue(':userid', $userid);
        $req->bindValue(':hash', $hash);
        $req->execute();
    }

    static function findbyUser($userid)
    {
        $list = [];
        // Find added sensor by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM scanned WHERE userid = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Scanned($item['id'], $item['userid'], $item['hash'], $item['create_at']);
        }
        return $list;
    }
}
?>