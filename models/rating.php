<?php
class Rating
{
    public $id;
    public $userid;
    public $username;
    public $productid;
    public $productname;
    public $rating;
    public $count;
    public $feedback;
    public $create_at;

    function __construct($id, $userid, $username, $productid, $productname, $rating, $count, $feedback, $create_at)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->username = $username;
        $this->productid = $productid;
        $this->productname = $productname;
        $this->rating = $rating;
        $this->count = $count;
        $this->feedback = $feedback;
        $this->create_at = $create_at;
    }

    static function add($userid, $productid, $rating, $count, $feedback)
    {
        $db = DB::getInstance();
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $req = $db->prepare("INSERT INTO rating(userid, productid, rating, count, feedback)  VALUES (:userid, :productid, :rating, :count, :feedback);");
        $req->bindValue(':userid', $userid);
        $req->bindValue(':productid', $productid);
        $req->bindValue(':rating', $rating);
        $req->bindValue(':count', $count);
        $req->bindValue(':feedback', $feedback);
        $req->execute();
    }

    static function findbyUser($userid)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT rating.*, product.name 
                            FROM rating LEFT JOIN product
                            ON rating.productid = product.id
                            WHERE userid = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Rating($item['id'], $item['userid'], NULL, $item['productid'], $item['name'], $item['rating'], $item['count'], $item['feedback'], $item['create_at']);
        }
        return $list;
    }

    static function findbyProduct($productid)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT rating.*, user.name 
                            FROM rating LEFT JOIN user
                            ON rating.userid = user.id
                            WHERE productid = :productid;");
        $req->bindValue(':productid',$productid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Rating($item['id'], $item['userid'], $item['name'], $item['productid'], NULL, $item['rating'], $item['count'], $item['feedback'], $item['create_at']);
        }
        return $list;
    }
}
?>