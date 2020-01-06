<?php
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

    function __construct($id,$farmid, $name, $des, $avg_temp, $avg_hum, $avg_humS, $create_at, $update_at, $pre_hash, $hash)
    {
        $this->id = $id;
        $this->farmid = $farmid;
        $this->name = $name;
        $this->des = $des;
        $this->avg_temp = $avg_temp;
        $this->avg_hum = $avg_hum;
        $this->avg_humS = $avg_humS;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
        $this->pre_hash = $pre_hash;
        $this->hash = $hash;
    }

    static function find($hash)
    {
        // Find in DB with hash
    }

    function execHash()
    {
        $hash = hash('sha256', $this->id .$this->farmid . $this->name . $this->des . $this->avg_temp . $this->avg_hum . $this->avg_humS . $this->create_at . $this->update_at . $this->pre_hash);
    }

    function harvestFarm($avg_temp, $avg_hum, $avg_humS)
    {
        // Update object
        $this->avg_temp = $avg_temp;
        $this->avg_hum = $avg_hum;
        $this->avg_humS = $avg_humS;

        execHash();
        
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
            $list[] = new Farming($item['id'], $item['farmid'], $item['name'], $item['des'], $item['avg_temp'],$item['avg_hum'],$item['avg_humS'],  $item['create_at'],$item['update_at'],$item['pre_hash'], $item['hash']);
        }
        return $list;
    }

    static function add($farmid, $name, $des, $pre_hash)
    {
        $date = getCurrentDate();
        $hash = hash('sha256', $farmid . $name . $des . $pre_hash);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO farming(farmid, name, des, create_at, pre_hash, hash)  VALUES (:farmid, :name, :des, :create_at, :pre_hash, :hash);");
        $req->bindValue(':providerid', $farmid);
        $req->bindValue(':name', $name);
        $req->bindValue(':des', $des);
        $req->bindValue(':create_at', $date);
        $req->bindValue(':pre_hash', $pre_hash);
        $req->bindValue(':hash', $hash);
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