<?php
class Sensor
{
    public $id;
    public $farmid;
    public $des;
    public $mac;
    public $create_at;

    function __construct($id,$farmid,$des,$mac,$create_at)
    {
        $this->id = $id;
        $this->farmid = $farmid;
        $this->des = $des;
        $this->mac = $mac;
        $this->create_at = $create_at;
    }

    static function add($farmid, $des, $mac)
    {
        $date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO sensor(farmid, des, mac, create_at)  VALUES (:farmid,:des,:mac,:create_at);");
        $req->bindValue(':farmid', $farmid);
        $req->bindValue(':des', $des);
        $req->bindValue(':mac', $mac);
        $req->bindValue(':create_at', $date);
        $req->execute();
    }

    static function findbyUser($userid)
    {
        $list = [];
        // Find added sensor by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM sensor WHERE farmid = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Sensor($item['id'], $item['farmid'], $item['des'], $item['mac'],$item['create_at']);
        }
        return $list;
    }
}
?>