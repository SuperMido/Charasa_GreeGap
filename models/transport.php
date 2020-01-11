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
    public $isApproved;

    function __construct($id, $transportid, $name, $des, $quantity, $create_at, $pre_hash, $hash, $isApproved)
    {
        $this->id = $id;
        $this->transportid = $transportid;
        $this->name = $name;
        $this->des = $des;
        $this->quantity = $quantity;
        $this->create_at = $create_at;
        $this->pre_hash = $pre_hash;
        $this->hash = $hash;
        $this->isApproved = $isApproved;
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
            $list[] = new Transport($item['id'], $item['transportid'], $item['name'], $item['des'], $item['quantity'],$item['create_at'],NULL,  $item['hash'], $item['isApproved']);
        }
        return $list;
    }

    static function add($transportid, $name, $des,$pre_hash, $quantity)
    {
        $date = getCurrentDate();

        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM farming WHERE hash=:pre_hash;");
        $req->bindValue(':pre_hash', $pre_hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $prev[] = $item->id;
        }
        if (!empty($prev)) {
            $hash = hash('sha256', $transportid . $name . $des . $quantity . $date . $pre_hash);
            $req = $db->prepare("INSERT INTO transport(transportid, name, des, quantity, create_at, pre_hash, hash)  VALUES (:transportid, :name, :des, :quantity, :create_at,:pre_hash, :hash);");
            $req->bindValue(':transportid', $transportid);
            $req->bindValue(':name', $name);
            $req->bindValue(':des', $des);
            $req->bindValue(':quantity', $quantity);
            $req->bindValue(':create_at', $date);
            $req->bindValue(':pre_hash', $pre_hash);
            $req->bindValue(':hash', $hash);
            $req->execute();

            return 1;
        }
        else return 0;
    }

    static function findUnapprovedTransport($farmid)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT DISTINCT user.name as username, user.des as userdes, transport.*, farming.name as `farmname`, farming.des as `farmdes`
                            FROM (user LEFT JOIN transport ON user.id = transport.transportid)
                            LEFT JOIN farming ON farming.hash = transport.pre_hash
                            WHERE transport.pre_hash IN ( 
                                SELECT farming.hash FROM farming WHERE farming.farmid = :farmid
                            )
                            ORDER BY transport.create_at DESC;");
        $req->bindValue(':farmid', $farmid);
        $req->execute();
        foreach($req->fetchAll() as $item)
        {
            $templist = [];
            $templist["transport_id"] = $item['id'];
            $templist["transporter_name"] = $item['username'];
            $templist["transporter_des"] = $item['userdes'];
            $templist["farm_name"] = $item['farmname'];
            $templist["farm_des"] = $item['farmdes'];
            $templist["quantity"] = $item['quantity'];
            $templist["create_at"] = $item['create_at'];
            $list[] = $templist;
        }

        return $list;
    }

    static function approveTrans($transportid)
    {
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE transport SET isApproved = TRUE WHERE id = :transportid;");
        $req->bindValue(':transportid', $transportid);
        $req->execute();
    }
}
?>