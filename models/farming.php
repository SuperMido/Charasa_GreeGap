<?php

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
    public $avg_temp;
    public $avg_hum;
    public $avg_humS;
    public $create_at;
    public $update_at;
    public $pre_hash;
    public $hash;

    function __construct($id,$farmid, $name, $des, $avg_temp, $avg_hum, $avg_humS, $create_at, $pre_hash, $hash, $update_at)
    {
        $this->id = $id;
        $this->farmid = $farmid;
        $this->name = $name;
        $this->des = $des;
        $this->avg_temp = $avg_temp;
        $this->avg_hum = $avg_hum;
        $this->avg_humS = $avg_humS;
        $this->create_at = $create_at;
        $this->pre_hash = $pre_hash;
        $this->hash = $hash;
        $this->update_at = $update_at;
    }

    static function find($hash)
    {
        // Find in DB with hash
    }

    function execHash()
    {
        $hash = hash('sha256', $this->id .$this->farmid . $this->name . $this->des . $this->avg_temp . $this->avg_hum . $this->avg_humS . $this->create_at . $this->update_at . $this->pre_hash);
    }

    function harvest($id)
    {
        $templist = [];
        $date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM sensorlogs WHERE productid = :id;");
        $req->bindValue(':id',$id);
        $req->execute();


        foreach ($req->fetchAll() as $item){
            $templist[] = new Log($item['id'], $item['sensorid'], $item['productid'], $item['avg_temp'],$item['avg_hum'],$item['avg_humS']);
        }

        $logged = $templist[0];
        $avg_temp = $logged->avg_temp;
        $avg_hum = $logged->avg_hum;
        $avg_humS = $logged->avg_humS;

        $db2 = DB::getInstance();
        $req2=$db2->prepare("UPDATE farming SET avg_temp=:avg_temp,avg_hum=:avg_hum,avg_humS=:avg_humS,update_at=:date WHERE id=:id;");
        $req2->bindValue('avg_temp',$avg_temp);
        $req2->bindValue('avg_hum',$avg_hum);
        $req2->bindValue('avg_humS',$avg_humS);
        $req2->bindValue('update_at',$date);
        $req2->bindValue('id',$id);
        $req2->execute();

        $prod = [];
        $db3 = DB::getInstance();
        $req3=$db3->prepare("SELECT * FROM farming WHERE id=:id;");
        $req3->bindValue('id',$id);
        $req3->execute();
        foreach ($req3->fetchAll() as $item){
            $prod[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], $item['avg_temp'],$item['avg_hum'],$item['avg_humS'],  $item['create_at'],$item['pre_hash'], $item['hash'],$item['update_at']);
        }
        $final = $prod[0];
        $hash = hash('sha256', $final->id . $final->farmid . $final->name . $final->des. $final->avg_temp. $final->avg_hum. $final->avg_humS. $final->create_at. $final->pre_hash. $final->update_at);

        $db4 = DB::getInstance();
        $req4=$db4->prepare("UPDATE farming SET hash=:hash WHERE id=:id;");
        $req2->bindValue('hash',$hash);
        $req2->bindValue('id',$id);
        $req2->execute();

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
        $req = $db->prepare("SELECT * FROM farming WHERE farmid = :farmid;");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], $item['avg_temp'],$item['avg_hum'],$item['avg_humS'],  $item['create_at'],$item['pre_hash'], $item['hash'],$item['update_at']);
        }
        return $list;
    }

    static function getSensor($farmid){
        $sensorList = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM sersors WHERE farmid = :farmid;");
        $req->bindValue(':farmid',$farmid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $sensorList[] = new Sensor($item['id'], $item['farmid'], $item['des'], $item['mac']);
        }
        return $sensorList;
    }

    static function add($farmid, $name, $des, $pre_hash, $sensorid)
    {
        $date = getCurrentDate();
        //$hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO farming(farmid, name, des, create_at, pre_hash)  VALUES (:farmid, :name, :des, :create_at, :pre_hash);");
        $req->bindValue(':farmid', $farmid);
        $req->bindValue(':name', $name);
        $req->bindValue(':des', $des);
        $req->bindValue(':create_at', $date);
        $req->bindValue(':pre_hash', $pre_hash);
        $req->execute();

        $new = [];
        $db2 = DB::getInstance();
        $req2 = $db2->prepare("SELECT * FROM farming WHERE pre_hash = :pre_hash;");
        $req2->bindValue('pre_hash',$pre_hash);
        $req2->execute();
        foreach ($req2->fetchAll() as $item){
            $new[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], $item['avg_temp'],$item['avg_hum'],$item['avg_humS'],  $item['create_at'],$item['update_at'],$item['pre_hash'], $item['hash']);
        }

        $productid = $new[0];

        $db3 = DB::getInstance();
        $req3 = $db3->prepare("INSERT INTO sensorlogs(sensorid, productid) VALUES(:sensorid,:productid);");
        $req3->bindValue('sensorid',$sensorid);
        $req3->bindValue('productid',$productid->id);
        $req3->execute();

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