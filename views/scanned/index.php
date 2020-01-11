<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"> <strong>List</strong> Scanned QR </div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center align-middle" style="width:50%">QR Code</th>
                    <th class="text-center align-middle" style="width:50%">Scanned at</th>
                  </tr>
                </thead>
                <tbody>
          <?php foreach ($scanneds as $scanned) { ?>
          <tr>
            <td class="text-center align-middle">
              <div><img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$scanned->hash;?>"><div>
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