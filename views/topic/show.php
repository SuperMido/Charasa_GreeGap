<?php
  $isUpdate = true;
  if(!isset($topic->id))
  {
    $isUpdate = false;
  }
  if($isUpdate) $form = "./?controller=topic&action=update";
  else $form = "./?controller=topic&action=add";
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <?= $isUpdate? "<strong>Update</strong>" : "<strong>Add</strong>";?> Topic
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="<?=$form?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">ID</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="id" value="<?=$topic->id?>" disabled>
              <input type="hidden" name="id" value="<?=$topic->id?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name" value="<?=$topic->name?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Trainer</label>
            <div class="col-md-9">
              <select class="form-control" name="trainerId">
                <?php foreach($trainers as $trainer) {?>
                <option value="<?=$trainer->id?>" <?= $topic->trainerId == $trainer->id? "selected" : ""?>><?=$trainer->name?></option>
                <?php }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Course</label>
            <div class="col-md-9">
              <select class="form-control" name="courseId">
                <?php foreach($courses as $course) {?>
                <option value="<?=$course->id?>" <?= $topic->courseId == $course->id? "selected" : ""?>><?=$course->name?></option>
                <?php }?>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Save changes</button>
        <a href="./?controller=topic"><button class="btn btn-sm btn-danger" type="reset">
          <i class="fa fa-ban"></i> Cancel</button><a>
      </div>
    </div>
  </div>
</div>