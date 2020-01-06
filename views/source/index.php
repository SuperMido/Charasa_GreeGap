<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"> <strong>Add</strong> Source </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="./?controller=source&action=add" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Description</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="des">
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
      <div class="card-header"> <strong>List</strong> Added Source </div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center align-middle" style="width:5%">ID</th>
                    <th class="text-center align-middle" style="width:30%">Name</th>
                    <th class="text-center align-middle" style="width:45%">Description</th>
                    <th class="text-center align-middle" style="width:20%">Date Created</th>
                    <th class="text-center align-middle" style="width:20%">Action</th>
                  </tr>
                </thead>
                <tbody>
          <?php foreach ($sources as $source) { ?>
          <tr>
            <td class="text-center align-middle">
              <div><?=$source->id;?> <div>
            </td>
            <td class="align-middle">
              <div><?=$source->name;?><div>
            </td>
            <td class="align-middle">
              <div><?=$source->des;?><div>
            </td>
            <td class="text-center align-middle">
              <div><?=$source->create_at;?><div>
            </td>
            <td id="genHash" class="text-center align-middle" action="#" method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Generate QR
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$source->hash;?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>