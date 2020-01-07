<?php
class SensorLog
{
    public $id;
    public $sensorid;
    public $productid;
    public $avg_tem;
    public $avg_hum;
    public $avg_humS;

    function __construct($id,$sensorid,$productid,$avg_tem,$avg_hum,$avg_humS)
    {
        $this->id = $id;
        $this->sensorid = $sensorid;
        $this->productid = $productid;
        $this->avg_tem = $avg_tem;
        $this->avg_hum = $avg_hum;
        $this->avg_humS = $avg_humS;
    }

    static function updateData($sensorid, $avg_tem,$avg_hum,$avg_humS)
    {
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE sensorlogs SET
                            avg_tem = :avg_tem,
                            avg_hum = :avg_hum,
                            avg_humS = :avg_humS
                            WHERE sensorid = :sensorid");
        $req->bindValue(':avg_tem',$avg_tem);
        $req->bindValue(':avg_hum',$avg_hum);
        $req->bindValue(':avg_humS',$avg_humS);
        $req->bindValue(':sensorid',$sensorid);
        $req->execute();
    }

    static function updateFarm($sensorid, $productid)
    {
        //$date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE sensorlogs SET
                            productid = :productid
                            WHERE sensorid = :sensorid");
        $req->bindValue(':productid',$productid);
        $req->bindValue(':sensorid',$sensorid);
        $req->execute();
    }
}
?>