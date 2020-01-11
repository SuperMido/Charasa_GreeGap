<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"> <strong>Add</strong> Source </div>
      <div class="card-body">
        <form id="frmChange" class="form-horizontal" action="./?controller=source&action=add" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Name</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="name" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Description</label>
            <div class="col-md-9">
              <input class="form-control" id="text-input" type="text" name="des" required>
              <input type="submit" style="display:none"/>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit" onclick="return submitForm();">
          <i class="fa fa-dot-circle-o"></i> Add</button>
        <!-- Script for required -->
        <script type="text/javascript" language="javascript">
                function submitForm()
                {
                    document.getElementById('frmChange').submit();
                }
        </script>
      </div>
    </div>
    <div class="card">
      <div class="card-header"> <strong>List</strong> Added Source </div>
      <div class="card-body">
          <div class="row">
              <?php foreach ($sources as $source) { ?>
              <div class="col-md-3">
                  <div class="card">
                      <div class="card-header"><strong>Item ID: <?=$source->id;?> </strong></div>
                      <div class="card-body">
                          <div class="bd-example">
                              <dl class="row">
                                  <dt class="col-sm-12">Item name:</dt>
                                  <dd class="col-sm-12"><?=$source->name;?></dd>
                                  <dt class="col-sm-12">Item description:</dt>
                                  <dd class="col-sm-12"><?=$source->des;?></dd>
                                  <dt class="col-sm-12">Item's create date: </dt>
                                  <dd class="col-sm-12"><?=$source->create_at;?></dd>
                              </dl>
                          </div>
                      </div>
                      <div class="card-footer">
                          <!--<td id="genHash" class="text-center align-middle" action="#" method="post" enctype="multipart/form-data">-->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?=$source->id;?>">
                              Generate QR
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="Modal<?=$source->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>

                                      <div class="modal-body" id="qrcode">
                                          <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$source->hash;?>">
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