<?php
  $isUpdate = true;
  if(!isset($trainer->id))
  {
    $isUpdate = false;
  }
  if($isUpdate) $form = "./?controller=trainer&action=update";
  else $form = "./?controller=trainer&action=add";
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <?= $isUpdate? "<strong>Update</strong>" : "<strong>Add</strong>";?> Trainer
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="<?=$form?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">ID</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="id" value="<?=$trainer->id?>" disabled>
              <input type="hidden" name="id" value="<?=$trainer->id?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name" value="<?=$trainer->name?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Email</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="email" value="<?=$trainer->email?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Telephone</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="telephone" value="<?=$trainer->telephone?>">
            </div>
          </div>
          <?php if($_SESSION['role']=='Administrator') {?>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Password</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="password" name="password" value="<?=$trainer->password?>">
            </div>
          </div>
          <?php } ?>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Save changes</button>
        <a href="./?controller=trainer"><button class="btn btn-sm btn-danger" type="reset">
          <i class="fa fa-ban"></i> Cancel</button><a>
      </div>
    </div>
  </div>
</div>