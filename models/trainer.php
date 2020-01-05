<?php
class Trainer
{
  public $id;
  public $name;
  public $email;
  public $telephone;
  public $password;

  function __construct($id, $name, $email, $telephone, $password)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->telephone = $telephone;
    $this->password = $password;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM gu_trainer ORDER BY TrainerID ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Trainer($item['TrainerID'], $item['TrainerName'], $item['Email'], $item['Telephone'], $item['Password']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM gu_trainer WHERE TrainerID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['TrainerID'])) {
      return new Trainer($item['TrainerID'], $item['TrainerName'], $item['Email'], $item['Telephone'], $item['Password']);
    }
    return new Trainer(NULL,NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_trainer WHERE TrainerID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $email, $telephone, $password)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_trainer(TrainerName, Email, Telephone, Password)  VALUES (:name, :email, :telephone, :password);");
    $req->bindValue(':name',$name);
    $req->bindValue(':email',$email);
    $req->bindValue(':telephone',$telephone);
    $req->bindValue(':password',$password);
    $req->execute();
  }
  static function update($id,$name, $email, $telephone, $password = NULL)
  {
    $db = DB::getInstance();
    if($password){
      $req = $db->prepare("UPDATE gu_trainer SET
                        TrainerName = :name,
                        Email = :email,
                        Telephone = :telephone,
                        Password = :password
                        WHERE TrainerID = :id;");
      $req->bindValue(':name',$name);
      $req->bindValue(':email',$email);
      $req->bindValue(':telephone',$telephone);
      $req->bindValue(':password',$password);
      $req->bindValue(':id',$id);
    }
    else {
      $req = $db->prepare("UPDATE gu_trainer SET
                        TrainerName = :name,
                        Email = :email,
                        Telephone = :telephone
                        WHERE TrainerID = :id;");
      $req->bindValue(':name',$name);
      $req->bindValue(':email',$email);
      $req->bindValue(':telephone',$telephone);
      $req->bindValue(':id',$id);
    }
    $req->execute();
  }
}