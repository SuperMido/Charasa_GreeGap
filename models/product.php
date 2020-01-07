<?php
class Product
{
    public $id;
    public $storeid;
    public $name;
    public $des;
    public $create_at;
    public $pre_hash;
    public $hash;

    function __construct($id, $storeid, $name, $des, $create_at, $pre_hash, $hash)
    {
        $this->id = $id;
        $this->storeid = $storeid;
        $this->name = $name;
        $this->des = $des;
        $this->create_at = $create_at;
        $this->pre_hash = $pre_hash;
        $this->hash = $hash;
    }

    static function findAddedbyStore($storeid)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $req = $db->prepare("SELECT * FROM product WHERE storeid = :storeid;");
        $req->bindValue(':storeid',$storeid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['storeid'], $item['name'], $item['des'] ,$item['create_at'], $item['pre_hash'],  $item['hash']);
        }
        return $list;
    }

    static function add($storeid, $name, $des, $pre_hash)
    {
        $date = getCurrentDate();
        $hash = hash('sha256', $storeid . $name . $des . $date . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $req = $db->prepare("INSERT INTO product(storeid, name, des, create_at, pre_hash, hash)  VALUES (:storeid, :name, :des, :create_at,:pre_hash, :hash);");
        $req->bindValue(':storeid', $storeid);
        $req->bindValue(':name', $name);
        $req->bindValue(':des', $des);
        $req->bindValue(':create_at', $date);
        $req->bindValue(':pre_hash', $pre_hash);
        $req->bindValue(':hash', $hash);
        $req->execute();
    }

    function isCheating()
    {
        // Get count from Sold return to $countDB
        // Get quantity from Transport return to $quantityDB
        if($countDB > $quantityDB)
            return true;
        return false;
    }

    function execHash()
    {
        $hash = hash('sha256', $this->id . $this->name . $this->des . $this->quantity . $this->create_at . $this->pre_hash);
    }

    function isValid()
    {
        // Check if pre hash is in DB Transport
    }

    function insertDB()
    {
        //Add source to database
    }
}
?>