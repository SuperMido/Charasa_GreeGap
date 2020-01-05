<?php
  $isUpdate = true;
  if(!isset($trainee->id))
  {
    $isUpdate = false;
  }
  if($isUpdate) $form = "./?controller=trainee&action=update";
  else $form = "./?controller=trainee&action=add";
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <?= $isUpdate? "<strong>Update</strong>" : "<strong>Add</strong>";?> Trainee
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="<?=$form?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">ID</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="id" value="<?=$trainee->id?>" disabled>
              <input type="hidden" name="id" value="<?=$trainee->id?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name" value="<?=$trainee->name?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Date of Birth</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="date" name="dob" value="<?=$trainee->dob?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Email</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="email" value="<?=$trainee->email?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Address</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="address" value="<?=$trainee->address?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">TOEIC Score</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="toeicScore" value="<?=$trainee->toeicScore?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Password</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="password" name="password" value="<?=$trainee->password?>">
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Save changes</button>
        <a href="./?controller=trainee"><button class="btn btn-sm btn-danger" type="reset">
          <i class="fa fa-ban"></i> Cancel</button><a>
      </div>
    </div>
  </div>
</div>