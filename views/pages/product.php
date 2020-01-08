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
                <dt class="col-sm-4">Product's average temperature </dt>
                <dd class="col-sm-8"><?=$productInfo['avg_tem'];?></dd>
                <dt class="col-sm-4">Product's average humidity </dt>
                <dd class="col-sm-8"><?=$productInfo['avg_hum'];?></dd>
                <dt class="col-sm-4">Product's average soil's humidity </dt>
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