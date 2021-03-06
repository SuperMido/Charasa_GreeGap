<?php if($qrInfo==0){?>
    <div class="alert alert-danger" role="alert">You have scanned a fake QR Code! Please try again or contact authors for further details!</div>
<?php } else{
$i = 0;?>
<div class="card">
    <div class="card-header"><strong>User Feedback</strong></div>
    <div class="card-body">
        <div class="bd-example">
            <dl class="row">
            <?php foreach ($ratings as $rating) { ?>
                <dt class="col-sm-2"><?=$rating->username;?></dt>
                <dd class="col-sm-2"><input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" data-readonly value="<?=$rating->rating;?>"/></dd>
                <dd class="col-sm-8"><?=$rating->feedback;?></dd>
            <?php } ?>
            </dl>
        </div>
    </div>
</div>
<?php if(isset($qrInfo['product_name'])) { ?>
<div class="card">
    <div class="card-header"><strong>Product</strong> information</div>
    <div class="card-body">
        <div class="text-center">
            <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$qrInfo['hash'][$i++];?>">
        </div>
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Product name</dt>
                <dd class="col-sm-8"><?=$qrInfo['product_name'];?></dd>
                <dt class="col-sm-4">Product description</dt>
                <dd class="col-sm-8"><?=$qrInfo['product_des'];?></dd>
                <dt class="col-sm-4">Product's release date </dt>
                <dd class="col-sm-8"><?=$qrInfo['product_create'];?></dd>
            </dl>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header"><strong>Store</strong> information</div>
    <div class="card-body">
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Store name</dt>
                <dd class="col-sm-8"><?=$qrInfo['store_name'];?></dd>
                <dt class="col-sm-4">Store description</dt>
                <dd class="col-sm-8"><?=$qrInfo['store_des'];?></dd>
                <dt class="col-sm-4">Product's imported amount </dt>
                <dd class="col-sm-8"><?=$qrInfo['product_quantity'];?></dd>
                </dl>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($qrInfo['transporter_name'])) { ?>
<div class="card">
    <div class="card-header"><strong>Transporter</strong> information</div>
    <div class="card-body">
        <div class="text-center">
            <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$qrInfo['hash'][$i++];?>">
        </div>
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Transporter name</dt>
                <dd class="col-sm-8"><?=$qrInfo['transporter_name'];?></dd>
                <dt class="col-sm-4">Transporter description</dt>
                <dd class="col-sm-8"><?=$qrInfo['transporter_des'];?></dd>
                <dt class="col-sm-4">Imported amount </dt>
                <dd class="col-sm-8"><?=$qrInfo['quantity'];?></dd>
            </dl>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($qrInfo['farm_name'])) { ?>
<div class="card">
    <div class="card-header"><strong>Farm</strong> information</div>
    <div class="card-body">
        <div class="text-center">
            <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$qrInfo['hash'][$i++];?>">
        </div>
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Farm name</dt>
                <dd class="col-sm-8"><?=$qrInfo['farm_name'];?></dd>
                <dt class="col-sm-4">Farm description</dt>
                <dd class="col-sm-8"><?=$qrInfo['farm_des'];?></dd>
                <dt class="col-sm-4">Plant date </dt>
                <dd class="col-sm-8"><?=$qrInfo['create_at'];?></dd>
                <dt class="col-sm-4">Harvest date </dt>
                <dd class="col-sm-8"><?=$qrInfo['update_at'];?></dd>
                <dt class="col-sm-4">Average temperature (°C) </dt>
                <dd class="col-sm-8"><?=$qrInfo['avg_tem'];?></dd>
                <dt class="col-sm-4">Average humidity (%)</dt>
                <dd class="col-sm-8"><?=$qrInfo['avg_hum'];?></dd>
                <dt class="col-sm-4">Average soil's humidity (%)</dt>
                <dd class="col-sm-8"><?=$qrInfo['avg_humS'];?></dd>
            </dl>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($qrInfo['source_name'])) { ?>
<div class="card">
    <div class="card-header"><strong>Seed's Provider</strong> information</div>
    <div class="card-body">
        <div class="text-center">
            <img src="https://qrickit.com/api/qr.php?qrsize=250&d=<?=$qrInfo['hash'][$i++];?>">
        </div>
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Seed's provider name</dt>
                <dd class="col-sm-8"><?=$qrInfo['source_name'];?></dd>
                <dt class="col-sm-4">Seed's provider description</dt>
                <dd class="col-sm-8"><?=$qrInfo['source_des'];?></dd>
                <dt class="col-sm-4">Seed's name </dt>
                <dd class="col-sm-8"><?=$qrInfo['seed_name'];?></dd>
                <dt class="col-sm-4">Seed's description </dt>
                <dd class="col-sm-8"><?=$qrInfo['seed_des'];?></dd>
            </dl>
        </div>
    </div>
</div>
<?php } ?>
<?php if($_SESSION['user']['role'] != "Anonymous") { ?>
<div class="card">
    <div class="card-header"> <strong>Write</strong> Feedback </div>
    <div class="card-body">
    <form id="frmChange" class="form-horizontal" action="./?controller=rating&action=add" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <input type="hidden" id="hash" name="hash" value="<?=$qrInfo['hash'][0];?>"/>
            <div class="col-md-9">
                <input type="hidden" name="rating" id="rating" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" value="5"/>
            </div>
            <input type="hidden" id="rate" name="rate" value="5"/>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Feedback</label>
            <div class="col-md-9">
                <textarea class="form-control" id="feedback" name="feedback" required></textarea>
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
<?php } ?>
<script src="assets/node_modules/bootstrap/dist/js/bootstrap-rating.min.js"></script>
<?php } ?>