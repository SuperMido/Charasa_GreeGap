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

    static function fetchDataProduct($hash)
    {
        $list = [];
        $list['hash'] = [];
        $list['hash'][] = $hash;

        $db = DB::getInstance();

        // Get product detail from product
        $req = $db->prepare("SELECT * FROM product WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        $item = $req->fetch();
        $list["product_id"] = $item['id'];
        $list["product_name"]=$item['name'];
        $list["product_des"]=$item['des'];
        $list["product_create"]=$item['create_at'];
        $list["hash"][] = $item['pre_hash'];
        $pre_hash = $item['pre_hash'];
        $storeid = $item['storeid'];

        // Get store information
        $req = $db->prepare("SELECT * FROM user WHERE id = :storeid;");
        $req->bindValue(':storeid',$storeid);
        $req->execute();
        $item = $req->fetch();
        $list["store_name"]=$item['name'];
        $list["store_des"]=$item['des'];

        // Get transport hash information
        $req = $db->prepare("SELECT * FROM transport WHERE hash = :pre_hash;");
        $req->bindValue(':pre_hash',$pre_hash);
        $req->execute();
        $item = $req->fetch();
        $list["quantity"]=$item['quantity'];
        $list["hash"][] = $item['pre_hash'];
        $pre_hash = $item['pre_hash'];
        $transportid = $item['transportid'];

        // Get transporter information
        $req = $db->prepare("SELECT * FROM user WHERE id = :transportid;");
        $req->bindValue(':transportid',$transportid);
        $req->execute();
        $item = $req->fetch();
        $list["transporter_name"]=$item['name'];
        $list["transporter_des"]=$item['des'];

        // Get farming information
        $req = $db->prepare("SELECT * FROM farming WHERE hash = :pre_hash;");
        $req->bindValue(':pre_hash',$pre_hash);
        $req->execute();
        $item = $req->fetch();
        $list["avg_tem"]=$item['avg_tem'];
        $list["avg_hum"]=$item['avg_hum'];
        $list["avg_humS"]=$item['avg_humS'];
        $list["create_at"]=$item['create_at'];
        $list["update_at"]=$item['update_at'];
        $list["hash"][] = $item['pre_hash'];
        $pre_hash = $item['pre_hash'];
        $farmid = $item['farmid'];

        // Get farmer information
        $req = $db->prepare("SELECT * FROM user WHERE id = :farmid;");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        $item = $req->fetch();
        $list["farm_name"]=$item['name'];
        $list["farm_des"]=$item['des'];

        // Get source information
        $req = $db->prepare("SELECT * FROM source WHERE hash = :pre_hash;");
        $req->bindValue(':pre_hash',$pre_hash);
        $req->execute();
        $item = $req->fetch();
        $list["seed_name"]=$item['name'];
        $list["seed_des"]=$item['des'];
        $providerid = $item['providerid'];

        // Get provider information
        $req = $db->prepare("SELECT * FROM user WHERE id = :providerid;");
        $req->bindValue(':providerid',$providerid);
        $req->execute();
        $item = $req->fetch();
        $list["source_name"]=$item['name'];
        $list["source_des"]=$item['des'];
        
        return $list;
    }
    
    static function fetchDataTransport($hash)
    {
        $list = [];
        $list['hash'] = [];
        $list['hash'][] = $hash;

        $db = DB::getInstance();

        // Get transport hash information
        $req = $db->prepare("SELECT * FROM transport WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        $item = $req->fetch();
        $list["quantity"]=$item['quantity'];
        $list["hash"][] = $item['pre_hash'];
        $pre_hash = $item['pre_hash'];
        $transportid = $item['transportid'];

        // Get transporter information
        $req = $db->prepare("SELECT * FROM user WHERE id = :transportid;");
        $req->bindValue(':transportid',$transportid);
        $req->execute();
        $item = $req->fetch();
        $list["transporter_name"]=$item['name'];
        $list["transporter_des"]=$item['des'];

        // Get farming information
        $req = $db->prepare("SELECT * FROM farming WHERE hash = :pre_hash;");
        $req->bindValue(':pre_hash',$pre_hash);
        $req->execute();
        $item = $req->fetch();
        $list["avg_tem"]=$item['avg_tem'];
        $list["avg_hum"]=$item['avg_hum'];
        $list["avg_humS"]=$item['avg_humS'];
        $list["create_at"]=$item['create_at'];
        $list["update_at"]=$item['update_at'];
        $list["hash"][] = $item['pre_hash'];
        $pre_hash = $item['pre_hash'];
        $farmid = $item['farmid'];

        // Get farmer information
        $req = $db->prepare("SELECT * FROM user WHERE id = :farmid;");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        $item = $req->fetch();
        $list["farm_name"]=$item['name'];
        $list["farm_des"]=$item['des'];

        // Get source information
        $req = $db->prepare("SELECT * FROM source WHERE hash = :pre_hash;");
        $req->bindValue(':pre_hash',$pre_hash);
        $req->execute();
        $item = $req->fetch();
        $list["seed_name"]=$item['name'];
        $list["seed_des"]=$item['des'];
        $providerid = $item['providerid'];

        // Get provider information
        $req = $db->prepare("SELECT * FROM user WHERE id = :providerid;");
        $req->bindValue(':providerid',$providerid);
        $req->execute();
        $item = $req->fetch();
        $list["source_name"]=$item['name'];
        $list["source_des"]=$item['des'];
        
        return $list;
    }

    static function fetchDataFarming($hash)
    {
        $list = [];
        $list['hash'] = [];
        $list['hash'][] = $hash;

        $db = DB::getInstance();

        // Get farming information
        $req = $db->prepare("SELECT * FROM farming WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        $item = $req->fetch();
        $list["avg_tem"]=$item['avg_tem'];
        $list["avg_hum"]=$item['avg_hum'];
        $list["avg_humS"]=$item['avg_humS'];
        $list["create_at"]=$item['create_at'];
        $list["update_at"]=$item['update_at'];
        $list["hash"][] = $item['pre_hash'];
        $pre_hash = $item['pre_hash'];
        $farmid = $item['farmid'];

        // Get farmer information
        $req = $db->prepare("SELECT * FROM user WHERE id = :farmid;");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        $item = $req->fetch();
        $list["farm_name"]=$item['name'];
        $list["farm_des"]=$item['des'];
        
        // Get source information
        $req = $db->prepare("SELECT * FROM source WHERE hash = :pre_hash;");
        $req->bindValue(':pre_hash',$pre_hash);
        $req->execute();
        $item = $req->fetch();
        $list["seed_name"]=$item['name'];
        $list["seed_des"]=$item['des'];
        $providerid = $item['providerid'];
        
        // Get provider information
        $req = $db->prepare("SELECT * FROM user WHERE id = :providerid;");
        $req->bindValue(':providerid',$providerid);
        $req->execute();
        $item = $req->fetch();
        $list["source_name"]=$item['name'];
        $list["source_des"]=$item['des'];
        
        return $list;
    }

    static function fetchDataSource($hash)
    {
        $list = [];
        $list['hash'] = [];
        $list['hash'][] = $hash;

        $db = DB::getInstance();

        // Get source information
        $req = $db->prepare("SELECT * FROM source WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        $item = $req->fetch();
        $list["seed_name"]=$item['name'];
        $list["seed_des"]=$item['des'];
        $providerid = $item['providerid'];
        // Get provider information
        $req = $db->prepare("SELECT * FROM user WHERE id = :providerid;");
        $req->bindValue(':providerid',$providerid);
        $req->execute();
        $item = $req->fetch();
        $list["source_name"]=$item['name'];
        $list["source_des"]=$item['des'];
        
        return $list;
    }

    static function fetchAllData($hash)
    {
        $list = [];

        $db = DB::getInstance();

        $req = $db->prepare("SELECT * FROM product WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        $item = $req->fetch();
        if(isset($item['id'])) $list = self::fetchDataProduct($hash) ;
        else
        {
            $req = $db->prepare("SELECT * FROM transport WHERE hash = :hash;");
            $req->bindValue(':hash',$hash);
            $req->execute();
            $item = $req->fetch();
            if(isset($item['transportid'])) $list = self::fetchDataTransport($hash);
            else
            {
                $req = $db->prepare("SELECT * FROM farming WHERE hash = :hash;");
                $req->bindValue(':hash',$hash);
                $req->execute();
                $item = $req->fetch();
                if(isset($item['farmid'])) $list = self::fetchDataFarming($hash);
                else
                {
                    $req = $db->prepare("SELECT * FROM source WHERE hash = :hash;");
                    $req->bindValue(':hash',$hash);
                    $req->execute();
                    $item = $req->fetch();
                    if(isset($item['providerid'])) $list = self::fetchDataSource($hash);
                    else return 0;
                }
            }
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

        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM transport WHERE hash=:pre_hash;");
        $req->bindValue(':pre_hash', $pre_hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $prev[] = $item->id;
        }
        if(!empty($prev)){

            $hash = hash('sha256', $storeid . $name . $des . $date . $pre_hash);
        $req = $db->prepare("INSERT INTO product(storeid, name, des, create_at, pre_hash, hash)  VALUES (:storeid, :name, :des, :create_at,:pre_hash, :hash);");
        $req->bindValue(':storeid', $storeid);
        $req->bindValue(':name', $name);
        $req->bindValue(':des', $des);
        $req->bindValue(':create_at', $date);
        $req->bindValue(':pre_hash', $pre_hash);
        $req->bindValue(':hash', $hash);
        $req->execute();
        return 1;
        }
        else return 0;
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