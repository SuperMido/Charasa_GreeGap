
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> <strong>Approval</strong> list </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($unapprovedProduct as $source) { ?>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header"><strong>Approvement request</strong></div>
                                <div class="card-body">
                                    <div class="bd-example">
                                        <dl class="row">
                                            <dt class="col-sm-12">Store name:</dt>
                                            <dd class="col-sm-12"><?=$source["store_name"];?></dd>
                                            <dt class="col-sm-12">Store description:</dt>
                                            <dd class="col-sm-12"><?=$source["store_des"];?></dd>
                                            <dt class="col-sm-12">Item name:</dt>
                                            <dd class="col-sm-12"><?=$source["transport_name"];?></dd>
                                            <dt class="col-sm-12">Item description:</dt>
                                            <dd class="col-sm-12"><?=$source["transport_des"];?></dd>
                                            <dt class="col-sm-12">Item quantity:</dt>
                                            <dd class="col-sm-12"><?//$source["quantity"];?></dd>
                                            <dt class="col-sm-12">Item's create date: </dt>
                                            <dd class="col-sm-12"><?=$source["create_at"];?></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <!--<td id="genHash" class="text-center align-middle" action="#" method="post" enctype="multipart/form-data">-->
                                    <a href="./index.php?controller=transport&action=approve&id=<?=$source["product_id"];?>"><button type="button" class="btn btn-primary">
                                            Approve
                                        </button></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>

    </div>
</div>



