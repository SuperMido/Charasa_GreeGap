<?php
require_once('models/sensor.php');
class Log{
    public $id;
    public $sensorid;
    public $productid;
    public $avg_tem;
    public $avg_hum;
    public $avg_humS;

    function __construct($id,$sensorid,$productid,$avg_tem,$avg_hum,$avg_humS)
    {
        $this->id=$id;
        $this->sensorid=$sensorid;
        $this->productid=$productid;
        $this->avg_tem=$avg_tem;
        $this->avg_hum=$avg_hum;
        $this->avg_humS=$avg_humS;
    }
}

class Farming
{
    public $id;
    public $farmid;
    public $name;
    public $des;
    public $avg_tem;
    public $avg_hum;
    public $avg_humS;
    public $create_at;
    public $update_at;
    public $pre_hash;
    public $hash;
    public $isApproved;

    function __construct($id,$farmid, $name, $des, $avg_tem, $avg_hum, $avg_humS, $create_at, $pre_hash, $hash, $update_at, $isApproved)
    {
        $this->id = $id;
        $this->farmid = $farmid;
        $this->name = $name;
        $this->des = $des;
        $this->avg_tem = $avg_tem;
        $this->avg_hum = $avg_hum;
        $this->avg_humS = $avg_humS;
        $this->create_at = $create_at;
        $this->pre_hash = $pre_hash;
        $this->hash = $hash;
        $this->update_at = $update_at;
        $this->isApproved = $isApproved;
    }

    static function harvest($id)
    {
        $templist = [];
        $date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM sensorlogs WHERE productid = :id;");
        $req->bindValue(':id',$id);
        $req->execute();


        foreach ($req->fetchAll() as $item){
            $templist[] = new Log($item['id'], $item['sensorid'], $item['productid'], $item['avg_tem'],$item['avg_hum'],$item['avg_humS']);
        }

        $logged = $templist[0];
        $avg_tem = $logged->avg_tem;
        $avg_hum = $logged->avg_hum;
        $avg_humS = $logged->avg_humS;

        $req=$db->prepare("UPDATE farming SET avg_tem=:avg_tem,avg_hum=:avg_hum,avg_humS=:avg_humS,update_at=:date WHERE id=:id;");
        $req->bindValue(':avg_tem',$avg_tem);
        $req->bindValue(':avg_hum',$avg_hum);
        $req->bindValue(':avg_humS',$avg_humS);
        $req->bindValue(':date',$date);
        $req->bindValue(':id',$id);
        $req->execute();

        $prod = [];
        $req=$db->prepare("SELECT * FROM farming WHERE id=:id;");
        $req->bindValue('id',$id);
        $req->execute();
        foreach ($req->fetchAll() as $item){
            $prod[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], $item['avg_tem'],$item['avg_hum'],$item['avg_humS'],  $item['create_at'],$item['pre_hash'], $item['hash'],$item['update_at'], $item['isApproved']);
        }
        $final = $prod[0];
        $hash = hash('sha256', $final->id . $final->farmid . $final->name . $final->des. $final->avg_tem. $final->avg_hum. $final->avg_humS. $final->create_at. $final->pre_hash. $final->update_at);

        $req=$db->prepare("UPDATE farming SET hash=:hash WHERE id=:id;");
        $req->bindValue('hash',$hash);
        $req->bindValue('id',$id);
        $req->execute();

        // Update object
        //$this->avg_temp = $avg_temp;
        //$this->avg_hum = $avg_hum;
        //$this->avg_humS = $avg_humS;

        //execHash();
        
        // Update DB
    }

    static function findbyFarm($farmid)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM farming WHERE farmid = :farmid AND hash = \"\";");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], NULL,NULL,NULL,  $item['create_at'],NULL, NULL,NULL, $item['isApproved']);
        }
        return $list;
    }

    static function findHarvested($farmid)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM farming WHERE farmid = :farmid AND hash != \"\";");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], $item['avg_tem'],$item['avg_hum'],$item['avg_humS'],  $item['create_at'],NULL, $item['hash'],$item['update_at'], $item['isApproved']);
        }
        return $list;
    }

    static function getSensor($farmid){
        $sensorList = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM sensor WHERE farmid = :farmid;");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
//            ob_start();
//            var_dump($item);
//            $sensorList[] = ob_get_clean();
            $sensorList[] = new Sensor($item['id'], $item['farmid'], $item['des'], $item['mac'], $item['create_at']);
        }
        return $sensorList;
    }

    static function add($farmid, $name, $des, $pre_hash, $sensorid)
    {

        $date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM source WHERE hash=:pre_hash;");
        $req->bindValue(':pre_hash', $pre_hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $prev[] = $item->id;
        }
        if(!empty($prev)){
            $req = $db->prepare("INSERT INTO farming(farmid, name, des, create_at, pre_hash)  VALUES (:farmid, :name, :des, :create_at, :pre_hash);");
            $req->bindValue(':farmid', $farmid);
            $req->bindValue(':name', $name);
            $req->bindValue(':des', $des);
            $req->bindValue(':create_at', $date);
            $req->bindValue(':pre_hash', $pre_hash);
            $req->execute();

            $id = $db->lastInsertId();

            $new = [];
            $req2 = $db->prepare("SELECT * FROM farming WHERE id = :id;");
            $req2->bindValue('id',$id);
            $req2->execute();
            foreach ($req2->fetchAll() as $item){
                $new[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], NULL , NULL , NULL ,  $item['create_at'],$item['update_at'],$item['pre_hash'], $item['hash'], $item['isApproved']);
            }

            $productid = $new[0];

            $req3 = $db->prepare("INSERT INTO sensorlogs(sensorid, productid) VALUES(:sensorid,:productid);");
            $req3->bindValue('sensorid',$sensorid);
            $req3->bindValue('productid',$productid->id);
            $req3->execute();

            return 1;
        }
        else return 0;
    }

    static function approveFarm($farmid)
    {
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE farming SET isApproved = TRUE WHERE id = :farmid;");
        $req->bindValue(':farmid', $farmid);
        $req->execute();
    }

    static function findUnapprovedFarming($providerid)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT DISTINCT user.name as username, user.des as userdes, farming.*, source.name as `sourcename`, source.des as `sourcedes`
                            FROM (user LEFT JOIN farming ON user.id = farming.farmid)
                            LEFT JOIN source ON source.hash = farming.pre_hash
                            WHERE farming.pre_hash IN ( 
                                SELECT source.hash FROM source WHERE source.providerid = :providerid
                            )
                            ORDER BY farming.create_at DESC;");
        $req->bindValue(':providerid', $providerid);
        $req->execute();
        foreach($req->fetchAll() as $item)
        {
            $templist = [];
            $templist["farm_id"] = $item['id'];
            $templist["farmer_name"] = $item['username'];
            $templist["farmer_des"] = $item['userdes'];
            $templist["source_name"] = $item['sourcename'];
            $templist["source_des"] = $item['sourcedes'];
            $templist["create_at"] = $item['create_at'];
            $list[] = $templist;
        }

        return $list;
    }
}
?>