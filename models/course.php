<?php
require_once('models/trainee.php');
class Course
{
  public $id;
  public $name;
  public $categoryId;
  public $categoryName;
  public $traineeNumber;

  function __construct($id, $name, $categoryId, $categoryName, $traineeNumber)
  {
    $this->id = $id;
    $this->name = $name;
    $this->categoryId = $categoryId;
    $this->categoryName = $categoryName;
    $this->traineeNumber = $traineeNumber;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT gu_course.*, gu_category.CategoryName, COUNT(gu_enrollment.TraineeID) as number_trainee
                        FROM (gu_course LEFT JOIN gu_category ON gu_course.CategoryID = gu_category.CategoryID)
                        LEFT JOIN gu_enrollment ON gu_course.CourseID = gu_enrollment.CourseID
                        GROUP BY gu_course.CourseID
                        ORDER BY CourseID ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Course($item['CourseID'], $item['CourseName'], $item['CategoryID'], $item['CategoryName'], $item['number_trainee']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM gu_course WHERE CourseID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['CourseID'])) {
      return new Course($item['CourseID'], $item['CourseName'], $item['CategoryID'], NULL, NULL);
    }
    return new Course(NULL,NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_course WHERE CourseID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $categoryId)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_course(CategoryID, CourseName)  VALUES (:categoryId, :name);");
    $req->bindValue(':categoryId',$categoryId);
    $req->bindValue(':name',$name);
    $req->execute();
  }
  static function update($id,$name, $categoryId)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE gu_course SET
                      CategoryID = :categoryId,
                      CourseName = :name
                      WHERE CourseID = :id;");
    $req->bindValue(':categoryId',$categoryId);
    $req->bindValue(':name',$name);
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function unassign_trainee($id)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT TraineeID, TraineeName FROM gu_trainee
                          WHERE TraineeID not IN
                          (
                              SELECT gu_trainee.TraineeID FROM gu_trainee
                              INNER JOIN gu_enrollment ON gu_trainee.TraineeID = gu_enrollment.TraineeID
                              WHERE CourseID = $id
                          );"
                      );
    foreach ($req->fetchAll() as $item) {
      $list[] = new Trainee($item['TraineeID'], $item['TraineeName'], NULL, NULL, NULL, NULL, NULL);
    }

    return $list;
  }
  static function assign_trainee($id)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT gu_trainee.TraineeID, TraineeName FROM gu_trainee
                        INNER JOIN gu_enrollment ON gu_trainee.TraineeID = gu_enrollment.TraineeID
                        WHERE CourseID = $id;");
    foreach ($req->fetchAll() as $item) {
      $list[] = new Trainee($item['TraineeID'], $item['TraineeName'], NULL, NULL, NULL, NULL, NULL);
    }

    return $list;
  }
  static function add_trainee($traineeId, $courseId)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_enrollment(TraineeID, CourseID) VALUES (:traineeId,:courseId);");
    $req->bindValue(':traineeId',$traineeId);
    $req->bindValue(':courseId',$courseId);
    $req->execute();
  }
  static function remove_trainee($traineeId, $courseId)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_enrollment WHERE TraineeID = :traineeId AND CourseID = :courseId;");
    $req->bindValue(':traineeId',$traineeId);
    $req->bindValue(':courseId',$courseId);
    $req->execute();
  }
  static function inprogress($traineeId)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT gu_course.*, CategoryName
                        FROM (gu_course LEFT JOIN gu_category ON gu_course.CategoryID = gu_category.CategoryID)
                        LEFT JOIN gu_enrollment ON gu_course.CourseID = gu_enrollment.CourseID
                        WHERE TraineeID = $traineeId;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Course($item['CourseID'], $item['CourseName'], $item['CategoryID'], $item['CategoryName'], NULL);
    }

    return $list;
  }
}