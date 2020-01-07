<?php
class Transport
{
    public $id;
    public $transportid;
    public $name;
    public $des;
    public $quantity;
    public $create_at;
    public $pre_hash;
    public $hash;

    function __construct($id, $transportid, $name, $des, $quantity, $create_at, $pre_hash, $hash)
    {
        $this->id = $id;
        $this->transportid = $transportid;
        $this->name = $name;
        $this->des = $des;
        $this->quantity = $quantity;
        $this->create_at = $create_at;
        $this->pre_hash = $pre_hash;
        $this->hash = $hash;
    }

    static function find($hash)
    {
        // Find in DB with hash
    }

    function execHash()
    {
        $hash = hash('sha256', $this->id . $this->name . $this->des . $this->quantity . $this->create_at . $this->pre_hash);
    }

    function addInformation($quantity)
    {
        $this->quantity = $quantity;

        execHash();

        // Update DB
    }

    function isValid()
    {
        // Check if pre hash is in DB Farming
    }

    function insertDB()
    {
        //Add source to database
    }

    static function findbyTransporter($transportid)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM transport WHERE transportid = :transportid;");
        $req->bindValue(':transportid',$transportid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Transport($item['id'], $item['transportid'], $item['name'], $item['des'], $item['quantity'],NULL,NULL,  $item['hash']);
        }
        return $list;
    }

    static function add($transportid, $name, $des,$pre_hash, $quantity)
    {
        $date = getCurrentDate();
        $hash = hash('sha256', $transportid . $name . $des .$quantity. $date.$pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO transport(transportid, name, des, quantity, create_at, pre_hash, hash)  VALUES (:transportid, :name, :des, :quantity, :create_at,:pre_hash, :hash);");
        $req->bindValue(':transportid', $transportid);
        $req->bindValue(':name', $name);
        $req->bindValue(':des', $des);
        $req->bindValue(':quantity', $quantity);
        $req->bindValue(':create_at', $date);
        $req->bindValue(':pre_hash', $pre_hash);
        $req->bindValue(':hash', $hash);
        $req->execute();
    }

}
?>