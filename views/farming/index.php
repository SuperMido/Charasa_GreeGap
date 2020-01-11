<div class="row">
  <div class="col-md-12">
      <?php if($is_legit==0){?>
          <div class="alert alert-danger" role="alert">You have scanned a fake product! Please try again or contact authors for further details!</div>
      <?php }?>
      <div class="card-header"> <strong>Add</strong> Farm item </div>
    <div class="card">
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
                              //node.parentNode.previousElementSibling.value = res;
                              //alert(res);
                              //res++;
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
                              <h5 class="modal-title">New product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form id="frmChange" class="form-horizontal" action="./?controller=farming&action=add" method="post" enctype="multipart/form-data">
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
                                  <div class="form-group">
                                      <label for="sensor">Sensor:</label>
                                      <select id="sensor" class="form-control" name="sensorid">
                                          <?php foreach ($sensors as $sensor){?>
                                          <option value="<?=$sensor->id;?>"><?=$sensor->des;?></option>
                                          <?php }?>
                                      </select>
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
          <!--<button class="btn btn-sm btn-primary" type="submit" onclick="$('#frmChange').submit();">
          <i class="fa fa-dot-circle-o"></i> Add</button>-->
      </div>
    </div>
    <div class="card">
      <div class="card-header"> <strong>List</strong> of items currently in your Farm </div>
      <div class="card-body">
          <div class="row">
              <?php foreach ($products as $product) { ?>
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-header"><strong>Item ID: <?=$product->id;?> </strong></div>
                          <div class="card-body">
                              <div class="bd-example">
                                  <dl class="row">
                                      <dt class="col-sm-12">Item name:</dt>
                                      <dd class="col-sm-12"><?=$product->name;?></dd>
                                      <dt class="col-sm-12">Item description:</dt>
                                      <dd class="col-sm-12"><?=$product->des;?></dd>
                                      <dt class="col-sm-12">Item's create date: </dt>
                                      <dd class="col-sm-12"><?=$product->create_at;?></dd>
                                  </dl>
                              </div>
                          </div>
                          <div class="card-footer">
                              <!--<td id="genHash" class="text-center align-middle" action="#" method="post" enctype="multipart/form-data">-->
                              <a href="./index.php?controller=farming&action=harvest&id=<?=$product->id;?>"><button type="button" class="btn btn-primary">
                                      Harvest
                                  </button></a>
                          </div>
                      </div>
                  </div>
              <?php } ?>
          </div>
      </div>
    </div>
      <div class="card">
          <div class="card-header"> <strong>List</strong> of items harvested from your Farm </div>
          <div class="card-body">
              <div class="row">
                  <?php foreach ($harvesteds as $harvested) { ?>
                      <div class="col-md-3">
                          <div class="card text-white bg-success">
                              <div class="card-header"><strong>Product ID: <?=$harvested->id;?> </strong></div>
                              <div class="card-body">
                                  <div class="bd-example">
                                      <dl class="row">
                                          <dt class="col-sm-12">Product name:</dt>
                                          <dd class="col-sm-12"><?=$harvested->name;?></dd>
                                          <dt class="col-sm-12">Product description:</dt>
                                          <dd class="col-sm-12"><?=$harvested->des;?></dd>
                                          <dt class="col-sm-12">Product's planting date: </dt>
                                          <dd class="col-sm-12"><?=$harvested->create_at;?></dd>
                                          <dt class="col-sm-12">Product's harvested date: </dt>
                                          <dd class="col-sm-12"><?=$harvested->update_at;?></dd>
                                          <dt class="col-sm-12">Average temperature (°C) log: </dt>
                                          <dd class="col-sm-12"><?=$harvested->avg_tem;?></dd>
                                          <dt class="col-sm-12">Average humidity (%) log: </dt>
                                          <dd class="col-sm-12"><?=$harvested->avg_hum;?></dd>
                                          <dt class="col-sm-12">Average soil's humidity (%) log: </dt>
                                          <dd class="col-sm-12"><?=$harvested->avg_humS;?></dd>
                                      </dl>
                                  </div>
                              </div>
                              <div class="card-footer text-white border-success">
                                  <!--<td id="genHash" class="text-center align-middle" action="#" method="post" enctype="multipart/form-data">-->
                                  <?php if($harvested->isApproved==1) {?>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?=$harvested->id;?>">
                                      Generate QR
                                  </button>
                                    <?php } else{?>
                                    <label class="text-black-50">Waiting for approval!</label>
                                  <?php } ?>
                                  <!-- Modal -->
                                  <div class="modal fade" id="Modal<?=$harvested->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>

                                              <div class="modal-body" id="qrcode">
                                                  <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$harvested->hash;?>">
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
                                  <!--</td>-->
                              </div>
                          </div>
                      </div>
                  <?php } ?>
              </div>
              </div>
      </div>
  </div>
</div>