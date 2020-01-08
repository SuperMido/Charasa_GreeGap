<?php
class Scanned
{
    public $id;
    public $userid;
    public $productid;
    public $productname;
    public $create_at;

    function __construct($id, $userid, $productid, $productname, $create_at)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->productid = $productid;
        $this->productname = $productname;
        $this->create_at = $create_at;
    }

    static function add($userid, $productid)
    {
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO scanned(userid, productid)  VALUES (:userid,:productid);");
        $req->bindValue(':userid', $userid);
        $req->bindValue(':productid', $productid);
        $req->execute();
    }

    static function findbyUser($userid)
    {
        $list = [];
        // Find added sensor by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT scanned.*,product.name 
                            FROM scanned LEFT JOIN product
                            ON scanned.productid = product.id
                            WHERE userid = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Scanned($item['id'], $item['userid'], $item['productid'], $item['name'],$item['create_at']);
        }
        return $list;
    }
}
?>