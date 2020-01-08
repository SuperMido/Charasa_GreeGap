<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"> <strong>Import</strong> from Transporter </div>
      <!--<div class="card-body">
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
      </div>-->
      <div class="card-footer">
          <script>
              window.console = window.console || function(t) {};
          </script>
          <script>
              if (document.location.search.match(/type=embed/gi)) {
                  window.parent.postMessage("resize", "*");
              }
          </script>
          <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
          <script src="https://dmla.github.io/jsqrcode/src/qr_packed.js"></script>
          <script id="rendered-js">
              function openQRCamera(node) {
                  var reader = new FileReader();
                  reader.onload = function() {
                      node.value = "";
                      qrcode.callback = function(res) {
                          if (res instanceof Error) {
                              alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
                          } else {
                              document.getElementById("hash").value = res;
                          }
                      };
                      qrcode.decode(reader.result);
                  };
                  reader.readAsDataURL(node.files[0]);
              }
          </script>
          <td class="text-center align-middle" style="">
              <button class="btn btn-lg btn-pill btn-success" type="button" data-toggle="modal" data-target="#addModal">
                      <i class="fa fa-qrcode"></i> Scan now!
                  </button>
              <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">New Import</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form id="frmChange" class="form-horizontal" action="./?controller=product&action=add" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <a><button class="btn btn-lg btn-pill btn-success" type="button">
                                              <label class="qrcode-text-btn">
                                                  <input type="file" accept="image/*" capture="environment" onchange="openQRCamera(this);" tabindex="-1"></label> Scan now!
                                          </button></a>

                                      <style>
                                          input,
                                          label {
                                              vertical-align: middle
                                          }

                                          .qrcode-text {
                                              padding-right: 1.7em;
                                              margin-right: 0
                                          }

                                          .qrcode-text-btn {
                                              display: inline-block;
                                              background: url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat;
                                              height: 1em;
                                              width: 1.7em;

                                              cursor: pointer
                                          }

                                          .qrcode-text-btn>input[type=file] {
                                              position: absolute;
                                              overflow: hidden;
                                              opacity: 0;
                                          }
                                      </style>

                                      <input type="hidden" class="form-control" id="hash" name="pre_hash" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="name" class="col-form-label">Name:</label>
                                      <input type="text" class="form-control" id="name" name="name" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="des" class="col-form-label">Description:</label>
                                      <textarea class="form-control" id="des" name="des"></textarea>
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
                                  <i class="fa fa-dot-circle-o"></i> Add</button>
                          </div>
                      </div>
                  </div>
              </div>
          </td>
      </div>
    </div>
    <div class="card">
      <div class="card-header"> <strong>List</strong> of Import </div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center align-middle" style="width:5%">ID</th>
                    <th class="text-center align-middle" style="width:30%">Name</th>
                    <th class="text-center align-middle" style="width:25%">Description</th>
                    <th class="text-center align-middle" style="width:20%">Date Created</th>
                    <th class="text-center align-middle" style="width:20%">Action</th>
                  </tr>
                </thead>
                <tbody>
          <?php foreach ($products as $product) { ?>
          <tr>
            <td class="text-center align-middle">
              <div><?=$product->id;?> <div>
            </td>
            <td class="align-middle">
              <div><?=$product->name;?><div>
            </td>
            <td class="align-middle">
              <div><?=$product->des;?><div>
            </td>
            <td class="text-center align-middle">
              <div><?=$product->create_at;?><div>
            </td>
              <td id="genHash" class="text-center align-middle" action="#" method="post" enctype="multipart/form-data">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?=$product->id;?>">
                      Generate QR
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="Modal<?=$product->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>

                              <div class="modal-body" id="qrcode">
                                  <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$product->hash;?>">
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary" onclick="myFunction('qrcode')">Print</button>
                                  <script>
                                      function myFunction(divId) {
                                          var content = document.getElementById(divId).outerHTML;
                                          var mywindow = window.open('', 'Print', 'height=600,width=800');

                                          mywindow.document.write('<html><head><title>Print</title>');
                                          mywindow.document.write('</head><body>');
                                          mywindow.document.write(content);
                                          mywindow.document.write('</body></html>');

                                          mywindow.document.close();
                                          mywindow.focus();
                                          setTimeout(function(){mywindow.print();mywindow.close();}, 400);
                                          return true;
                                      }
                                  </script>
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