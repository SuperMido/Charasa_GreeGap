<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Remove Trainee from Course
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="./?controller=course&action=remove_trainee" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <input type="hidden" name="courseId" value="<?=$courseId?>">
            <label class="col-md-3 col-form-label" for="text-input">Trainee Name</label>
            <div class="col-md-9">
              <select class="form-control" name="traineeId">
                <?php foreach($trainees as $trainee) {?>
                <option value="<?=$trainee->id?>"><?=$trainee->name?></option>
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