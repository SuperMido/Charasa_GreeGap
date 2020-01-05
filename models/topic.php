<?php
class Topic
{
  public $id;
  public $name;
  public $trainerId;
  public $courseId;
  public $trainerName;
  public $courseName;

  function __construct($id, $name, $trainerId, $courseId, $trainerName, $courseName)
  {
    $this->id = $id;
    $this->name = $name;
    $this->trainerId = $trainerId;
    $this->courseId = $courseId;
    $this->trainerName = $trainerName;
    $this->courseName = $courseName;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT TopicID, TopicName, gu_trainer.TrainerName, gu_course.CourseName
                      FROM (gu_topic LEFT JOIN gu_trainer ON gu_topic.TrainerID = gu_trainer.TrainerID)
                      LEFT JOIN gu_course ON gu_topic.CourseID = gu_course.CourseID
                      ORDER BY TopicID ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Topic($item['TopicID'], $item['TopicName'], NULL, NULL, $item['TrainerName'], $item['CourseName']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM gu_topic WHERE TopicID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['TrainerID'])) {
      return new Topic($item['TopicID'], $item['TopicName'], $item['TrainerID'], $item['CourseID'], NULL, NULL);
    }
    return new Topic(NULL,NULL,NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM gu_topic WHERE TopicID = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $trainerId, $courseId)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO gu_topic(TrainerID, CourseID, TopicName)  VALUES (:trainerId, :courseId, :name);");
    $req->bindValue(':trainerId',$trainerId);
    $req->bindValue(':courseId',$courseId);
    $req->bindValue(':name',$name);
    $req->execute();
  }
  static function update($id,$trainerId, $courseId, $name)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE gu_topic SET
                      TrainerID = :trainerId,
                      CourseID = :courseId,
                      TopicName = :name
                      WHERE TopicID = :id;");
    $req->bindValue(':trainerId',$trainerId);
    $req->bindValue(':courseId',$courseId);
    $req->bindValue(':name',$name);
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function inprogress($trainerId)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT gu_topic.*, CourseName
                      FROM gu_topic LEFT JOIN gu_course ON gu_topic.CourseID = gu_course.CourseID
                      WHERE TrainerID = $trainerId;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Topic($item['TopicID'], $item['TopicName'], NULL, NULL, NULL, $item['CourseName']);
    }

    return $list;
  }
}