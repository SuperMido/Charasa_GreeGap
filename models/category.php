<?php
class Category
{
  public $id;
  public $name;
  public $description;
  public $courseNumber;

  function __construct($id, $name, $description, $courseNumber)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->courseNumber = $courseNumber;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT gu_category.*, COUNT(gu_course.CourseID) AS number_of_course
                        FROM gu_category LEFT JOIN gu_course
                        ON gu_category.CategoryID = gu_course.CategoryID
                        GROUP BY gu_category.CategoryID
                        ORDER BY gu_category.CategoryID ASC;");
    foreach ($req->fetchAll() as $item) {
      $list[] = new Category($item['CategoryID'], $item['CategoryName'], $item['Description'], $item['number_of_course']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM gu_category WHERE CategoryID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['CategoryID'])) {
      return new Category($item['CategoryID'], $item['CategoryName'], $item['Description'], NULL);
    }
    return new Category(NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_category WHERE CategoryID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_category(CategoryName, Description)  VALUES (:name, :description);");
    $req->bindValue(':name',$name);
    $req->bindValue(':description',$description);
    $req->execute();
  }
  static function update($id,$name, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE gu_category SET
                        CategoryName = :name,
                        Description = :description
                        WHERE CategoryID = :id;");
    $req->bindValue(':name',$name);
    $req->bindValue(':description',$description);
    $req->bindValue(':id',$id);
    $req->execute();
  }
}