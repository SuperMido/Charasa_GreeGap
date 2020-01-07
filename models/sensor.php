<?php
class Sensor
{
    public $id;
    public $farmid;
    public $des;
    public $mac;

    function __construct($id,$farmid,$des,$mac)
    {
        $this->id = $id;
        $this->farmid = $farmid;
        $this->des = $des;
        $this->mac = $mac;
    }

    static function add($farmid, $des, $mac)
    {
        //$date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO sensor(farmid, des, mac)  VALUES (:farmid,:des,:mac);");
        $req->bindValue(':farmid', $farmid);
        $req->bindValue(':des', $des);
        $req->bindValue(':mac', $mac);
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
            $list[] = new Sensor($item['id'], $item['farmid'], $item['des'], $item['mac']);
        }
        return $list;
    }
}
?>