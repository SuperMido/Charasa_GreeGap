<?php
class Staff
{
  public $id;
  public $name;
  public $email;
  public $password;

  function __construct($id, $name, $email, $password)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM gu_staff ORDER BY StaffID ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Staff($item['StaffID'], $item['Name'], $item['Email'], $item['Password']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM gu_staff WHERE StaffID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['StaffID'])) {
      return new Staff($item['StaffID'], $item['Name'], $item['Email'], $item['Password']);
    }
    return new Staff(NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_staff WHERE StaffID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $email, $password)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_staff(Email, Name, Password)  VALUES (:email, :name, :password);");
    $req->bindValue(':email',$email);
    $req->bindValue(':name',$name);
    $req->bindValue(':password',$password);
    $req->execute();
  }
  static function update($id,$name, $email, $password)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE gu_staff SET
                      Email = :email,
                      Name = :name,
                      Password = :password
                      WHERE StaffID = :id;");
    $req->bindValue(':email',$email);
    $req->bindValue(':name',$name);
    $req->bindValue(':password',$password);
    $req->bindValue(':id',$id);
    $req->execute();
  }
}