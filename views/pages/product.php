<?php if($productInfo==0){?>
    <div class="alert alert-danger" role="alert">You have scanned a fake product! Please try again or contact authors for further details!</div>
<?php } else{?>
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
<div class="card">
    <div class="card-header"><strong>Product</strong> information</div>
    <div class="card-body">
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Product name</dt>
                <dd class="col-sm-8"><?=$productInfo['product_name'];?></dd>
                <dt class="col-sm-4">Product description</dt>
                <dd class="col-sm-8"><?=$productInfo['product_des'];?></dd>
                <dt class="col-sm-4">Product's release date </dt>
                <dd class="col-sm-8"><?=$productInfo['product_create'];?></dd>
                <dt class="col-sm-4">Product's plant date </dt>
                <dd class="col-sm-8"><?=$productInfo['create_at'];?></dd>
                <dt class="col-sm-4">Product's harvest date </dt>
                <dd class="col-sm-8"><?=$productInfo['update_at'];?></dd>
                <dt class="col-sm-4">Product's average temperature (°C) </dt>
                <dd class="col-sm-8"><?=$productInfo['avg_tem'];?></dd>
                <dt class="col-sm-4">Product's average humidity (%)</dt>
                <dd class="col-sm-8"><?=$productInfo['avg_hum'];?></dd>
                <dt class="col-sm-4">Product's average soil's humidity (%)</dt>
                <dd class="col-sm-8"><?=$productInfo['avg_humS'];?></dd>
                <dt class="col-sm-4">Product's seed's name </dt>
                <dd class="col-sm-8"><?=$productInfo['seed_name'];?></dd>
                <dt class="col-sm-4">Product's seed's description </dt>
                <dd class="col-sm-8"><?=$productInfo['seed_des'];?></dd>

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
                <dd class="col-sm-8"><?=$productInfo['store_name'];?></dd>
                <dt class="col-sm-4">Store description</dt>
                <dd class="col-sm-8"><?=$productInfo['store_des'];?></dd>
                <dt class="col-sm-4">Product's imported amount </dt>
                <dd class="col-sm-8"><?=$productInfo['quantity'];?></dd>
                </dl>
        </div>

        <!--<td class="" style="">
            <div class="form-group"><strong>Store</strong> name: </div>
            <div class="form-group"><strong>Store</strong> description: <?=$productInfo['store_des'];?></div>
            <div class="form-group"><strong>Imported</strong> amount: <?=$productInfo['quantity'];?></div>
        </td>-->
    </div>
</div>

<div class="card">
    <div class="card-header"><strong>Transporter</strong> information</div>
    <div class="card-body">
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Transporter name</dt>
                <dd class="col-sm-8"><?=$productInfo['transporter_name'];?></dd>
                <dt class="col-sm-4">Transporter description</dt>
                <dd class="col-sm-8"><?=$productInfo['transporter_des'];?></dd>
            </dl>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><strong>Farm</strong> information</div>
    <div class="card-body">
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Farm name</dt>
                <dd class="col-sm-8"><?=$productInfo['farm_name'];?></dd>
                <dt class="col-sm-4">Farm description</dt>
                <dd class="col-sm-8"><?=$productInfo['farm_des'];?></dd>
            </dl>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><strong>Seed's Provider</strong> information</div>
    <div class="card-body">
        <div class="bd-example">
            <dl class="row">
                <dt class="col-sm-4">Seed's provider name</dt>
                <dd class="col-sm-8"><?=$productInfo['source_name'];?></dd>
                <dt class="col-sm-4">Seed's provider description</dt>
                <dd class="col-sm-8"><?=$productInfo['source_des'];?></dd>
            </dl>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header"> <strong>Write</strong> Feedback </div>
    <div class="card-body">
    <form id="frmChange" class="form-horizontal" action="./?controller=rating&action=add" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <input type="hidden" id="productid" name="productid" value="<?=$productInfo['product_id'];?>"/>
            <div class="col-md-9">
                <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" value="5"/>
            </div>
            <input type="hidden" id="rate" name="rate" value="5"/>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-md-3 col-form-label">Quantity:</label>
            <div class="col-md-9">
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
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
            document.getElementById('rate').value = $('input').rating('rate');
            document.getElementById('frmChange').submit();
        }
    </script>
    </div>
</div>
<script src="assets/node_modules/bootstrap/dist/js/bootstrap-rating.min.js"></script>
<?php } ?>