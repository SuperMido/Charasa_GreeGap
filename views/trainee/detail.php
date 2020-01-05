<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Trainee Information
      </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
              <input class="form-control" id="text-input" type="text" name="name" value="<?=$trainee->name?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Date of Birth</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="date" name="dob" value="<?=$trainee->dob?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Email</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="email" value="<?=$trainee->email?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Address</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="address" value="<?=$trainee->address?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">TOEIC Score</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="toeicScore" value="<?=$trainee->toeicScore?>" disabled>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>