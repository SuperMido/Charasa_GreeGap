<?php
class Rating
{
    public $id;
    public $userid;
    public $productid;
    public $create_at;

    function __constructor($id, $userid, $productid, $create_at)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->productid = $productid;
        $this->create_at = $create_at;
    }

    static function findbyUser($userid)
    {
        // Find in DB with userID
    }

    static function findbyProduct($productid)
    {
        // Find in DB with productid
    }

    static function insertDB()
    {
        // Insert to DB
    }
}
?>