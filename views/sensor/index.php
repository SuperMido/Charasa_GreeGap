<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"> <strong>Add</strong> Sensor </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="./?controller=sensor&action=add" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Description</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="des">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">MAC Address</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="mac">
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Add</button>
      </div>
    </div>
    <div class="card">
      <div class="card-header"> <strong>List</strong> Added Sensor </div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center align-middle" style="width:5%">ID</th>
                    <th class="text-center align-middle" style="width:35%">Description</th>
                    <th class="text-center align-middle" style="width:40%">MAC Address</th>
                    <th class="text-center align-middle" style="width:20%">Created at</th>
                  </tr>
                </thead>
                <tbody>
          <?php foreach ($sensors as $sensor) { ?>
          <tr>
            <td class="text-center align-middle">
              <div><?=$sensor->id;?> <div>
            </td>
            <td class="align-middle">
              <div><?=$sensor->des;?><div>
            </td>
            <td class="text-center align-middle">
              <div><?=$sensor->mac;?><div>
            </td>
              <td class="text-center align-middle">
                  <div><?=$sensor->create_at;?><div>
              </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>