<?php
class Source
{
    public $id;
    public $providerid;
    public $name;
    public $des;
    public $create_at;
    public $hash;

    function __constructor($id, $providerid, $name, $des, $create_at, $hash)
    {
        $this->id = $id;
        $this->providerid = $providerid;
        $this->name = $name;
        $this->des = $des;
        $this->create_at = $create_at;
        $this->hash = $hash;
    }

    static function find($hash)
    {
        // Find in DB with hash
    }

    function execHash()
    {
        $hash = hash('sha256', $this->id . $this->providerid . $this->name . $this->des . $this->create_at);
    }

    function insertDB()
    {
        //Add source to database
    }
}
?>