<?php
class Trainee
{
  public $id;
  public $name;
  public $dob;
  public $email;
  public $address;
  public $toeicScore;
  public $password;

  function __construct($id, $name, $dob, $email, $address, $toeicScore, $password)
  {
    $this->id = $id;
    $this->name = $name;
    $this->dob = $dob;
    $this->email = $email;
    $this->address = $address;
    $this->toeicScore = $toeicScore;
    $this->password = $password;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM gu_trainee ORDER BY TraineeID ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Trainee($item['TraineeID'], $item['TraineeName'], $item['DOB'], $item['Email'], $item['Address'], $item['TOEICScore'], $item['Password']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM gu_trainee WHERE TraineeID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['TraineeID'])) {
      return new Trainee($item['TraineeID'], $item['TraineeName'], $item['DOB'], $item['Email'], $item['Address'], $item['TOEICScore'], $item['Password']);
    }
    return new Trainee(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_trainee WHERE TraineeID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $dob, $email, $address, $toeicScore, $password)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_trainee(TraineeName, DOB, Email, Address, TOEICScore, Password)  VALUES (:name, :dob, :email, :address, :toeicScore, :password);");
    $req->bindValue(':name',$name);
    $req->bindValue(':dob',$dob);
    $req->bindValue(':email',$email);
    $req->bindValue(':address',$address);
    $req->bindValue(':toeicScore',$toeicScore);
    $req->bindValue(':password',$name);
    $req->execute();
  }
  static function update($id, $name, $dob, $email, $address, $toeicScore, $password)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE gu_trainee SET
                      TraineeName = :name,
                      DOB = :dob,
                      Email = :email,
                      Address = :address,
                      TOEICScore = :toeicScore,
                      Password = :password
                      WHERE TraineeID = :id;");
    $req->bindValue(':name',$name);
    $req->bindValue(':dob',$dob);
    $req->bindValue(':email',$email);
    $req->bindValue(':address',$address);
    $req->bindValue(':toeicScore',$toeicScore);
    $req->bindValue(':password',$password);
    $req->bindValue(':id',$id);
    $req->execute();
  }
}