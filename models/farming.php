<?php
class Farming
{
    public $id;
    public $name;
    public $des;
    public $avg_temp;
    public $avg_hum;
    public $avg_humS;
    public $create_at;
    public $update_at;
    public $pre_hash;
    public $hash;

    function __constructor($id, $name, $des, $avg_temp, $avg_hum, $avg_humS, $create_at, $update_at, $pre_hash, $hash)
    {
        $this->id = $id;
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
        $hash = hash('sha256', $this->id . $this->name . $this->des . $this->avg_temp . $this->avg_hum . $this->avg_humS . $this->create_at . $this->update_at . $this->pre_hash);
    }

    function harvestFarm($farmingid, $avg_temp, $avg_hum, $avg_humS)
    {
        // Update object
        $this->avg_temp = $avg_temp;
        $this->avg_hum = $avg_hum;
        $this->avg_humS = $avg_humS;

        execHash();
        
        // Update DB
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