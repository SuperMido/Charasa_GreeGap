<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"> <strong>List</strong> Scanned Products </div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center align-middle" style="width:5%">ID</th>
                    <th class="text-center align-middle" style="width:70%">Product Name</th>
                    <th class="text-center align-middle" style="width:30%">Scanned at</th>
                  </tr>
                </thead>
                <tbody>
          <?php foreach ($scanneds as $scanned) { ?>
          <tr>
            <td class="text-center align-middle">
              <div><?=$scanned->id;?> <div>
            </td>
            <td class="align-middle">
              <div><?=$scanned->productname;?><div>
            </td>
            <td class="text-center align-middle">
              <div><?=$scanned->create_at;?><div>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>