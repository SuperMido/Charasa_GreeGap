<?php
  $isUpdate = true;
  if(!isset($course->id))
  {
    $isUpdate = false;
  }
  if($isUpdate) $form = "./?controller=course&action=update";
  else $form = "./?controller=course&action=add";
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <?= $isUpdate? "<strong>Update</strong>" : "<strong>Add</strong>";?> Course
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="<?=$form?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">ID</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="id" value="<?=$course->id?>" disabled>
              <input type="hidden" name="id" value="<?=$course->id?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name" value="<?=$course->name?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Category</label>
            <div class="col-md-9">
              <select class="form-control" name="categoryId">
                <?php foreach($categories as $category) {?>
                <option value="<?=$category->id?>" <?= $course->categoryId == $category->id? "selected" : ""?>><?=$category->name?></option>
                <?php }?>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Save changes</button>
        <a href="./?controller=course"><button class="btn btn-sm btn-danger" type="reset">
          <i class="fa fa-ban"></i> Cancel</button><a>
      </div>
    </div>
  </div>
</div>