<?php
class Source
{
    public $id;
    public $providerid;
    public $name;
    public $des;
    public $create_at;
    public $hash;

    function __construct($id, $providerid, $name, $des, $create_at, $hash)
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

    static function findbyUser($userid)
    {
        $list = [];
        // Find added source by user id
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM source WHERE providerid = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Source($item['id'], $item['providerid'], $item['name'], $item['des'], $item['create_at'], $item['hash']);
        }
        return $list;
    }

    static function add($providerid, $name, $des)
    {
        $date = getCurrentDate();
        $hash = hash('sha256', $providerid . $name . $des . $date);
        //Add source to database
        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO source(providerid, name, des, create_at, hash)  VALUES (:providerid, :name, :des, :create_at, :hash);");
        $req->bindValue(':providerid', $providerid);
        $req->bindValue(':name', $name);
        $req->bindValue(':des', $des);
        $req->bindValue(':create_at', $date);
        $req->bindValue(':hash', $hash);
        $req->execute();
    }
}
?>