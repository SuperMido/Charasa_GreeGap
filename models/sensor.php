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
        $this->hash = $mac;
    }

    static function add($farmid, $des, $mac)
    {
        //$date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO sensor(farmid, des,mac)  VALUES (:farmid,:des,:mac);");
        $req->bindValue(':farmid', $farmid);
        $req->bindValue(':des', $des);
        $req->bindValue(':mac', $mac);
        $req->execute();
    }

    function isValid()
    {
        // Check if pre hash is in DB Source
    }

    function insertDB()
    {
        //Add source to database
    }
}
?>