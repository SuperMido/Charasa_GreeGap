<?php
class Rating
{
    public $id;
    public $userid;
    public $username;
    public $hash;
    public $rating;
    public $feedback;
    public $create_at;

    function __construct($id, $userid, $username, $hash, $rating, $feedback, $create_at)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->username = $username;
        $this->hash = $hash;
        $this->rating = $rating;
        $this->feedback = $feedback;
        $this->create_at = $create_at;
    }

    static function add($userid, $hash, $rating, $feedback)
    {
        $db = DB::getInstance();
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $req = $db->prepare("INSERT INTO rating(userid, hash, rating, feedback, create_at)  VALUES (:userid, :hash, :rating, :feedback, CURRENT_TIMESTAMP);");
        $req->bindValue(':userid', $userid);
        $req->bindValue(':hash', $hash);
        $req->bindValue(':rating', $rating);
        $req->bindValue(':feedback', $feedback);
        $req->execute();
    }

    static function findbyUser($userid)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM rating WHERE userid = :userid;");
        $req->bindValue(':userid',$userid);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Rating($item['id'], $item['userid'], NULL, $item['hash'], $item['rating'], $item['feedback'], $item['create_at']);
        }
        return $list;
    }

    static function findbyHash($hash)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare("SELECT rating.*, user.name 
                            FROM rating LEFT JOIN user
                            ON rating.userid = user.id
                            WHERE hash = :hash;");
        $req->bindValue(':hash',$hash);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new Rating($item['id'], $item['userid'], $item['name'], $item['hash'], $item['rating'], $item['feedback'], $item['create_at']);
        }
        return $list;
    }
}
?>