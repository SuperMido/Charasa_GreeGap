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

    static function fetchAllData($hash)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM product WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["product_id"] = $item['id'];
            $list["product_name"]=$item['name'];
            $list["product_des"]=$item['des'];
            $list["product_create"]=$item['create_at'];
            //$list[0] = new Product($item['id'], $item['storeid'], $item['name'], $item['des'] ,$item['create_at'], NULL,  $item['hash']);
            $pre_hash = $item['pre_hash'];
            $userid = $item['storeid'];
        }

        $req = $db->prepare("SELECT * FROM user WHERE id = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["store_name"]=$item['name'];
            $list["store_des"]=$item['des'];
        }

        $req = $db->prepare("SELECT * FROM transport WHERE hash = :hash;");
        $req->bindValue(':hash',$pre_hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["quantity"]=$item['quantity'];
            $pre_hash = $item['pre_hash'];
            $userid = $item['transportid'];

            //$list[1] = new Transport($item['id'], $item['transportid'], $item['name'], $item['des'], $item['quantity'] ,$item['create_at'], NULL,  $item['hash']);
            //$pre_hash = $item['pre_hash'];
        }

        $req = $db->prepare("SELECT * FROM user WHERE id = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["transporter_name"]=$item['name'];
            $list["transporter_des"]=$item['des'];
        }

        $req = $db->prepare("SELECT * FROM farming WHERE hash = :hash;");
        $req->bindValue(':hash',$pre_hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            //$list[2] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'],$item['avg_temp'],$item['avg_hum'], $item['avg_humS'],$item['create_at'], NULL,  $item['hash'],$item['update_at']);
            $list["avg_tem"]=$item['avg_tem'];
            $list["avg_hum"]=$item['avg_hum'];
            $list["avg_humS"]=$item['avg_humS'];
            $list["create_at"]=$item['create_at'];
            $list["update_at"]=$item['update_at'];
            $pre_hash = $item['pre_hash'];
            $userid = $item['farmid'];
        }

        $req = $db->prepare("SELECT * FROM user WHERE id = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["farm_name"]=$item['name'];
            $list["farm_des"]=$item['des'];
        }

        $req = $db->prepare("SELECT * FROM source WHERE hash = :hash;");
        $req->bindValue(':hash',$pre_hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["seed_name"]=$item['name'];
            $list["seed_des"]=$item['des'];
            //$list["seed_create_at"]=$item['create_at'];
            $userid = $item['providerid'];
            //$list[3] = new Source($item['id'], $item['providerid'], $item['name'], $item['des'],$item['create_at'], NULL);
        }

        $req = $db->prepare("SELECT * FROM user WHERE id = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list["source_name"]=$item['name'];
            $list["source_des"]=$item['des'];
        }

        return $list;
    }

    static function findAddedbyStore($storeid)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
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