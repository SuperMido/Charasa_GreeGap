
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Staff <a href="./?controller=staff&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:40%">Name</th>
                  <th class="text-center align-middle" style="width:35%">Email</th>
                  <th class="text-center align-middle" style="width:20%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($staffs as $staff) { ?>
				<tr>
					<td class="text-center align-middle">
						<div><?=$staff->id;?> <div>
					</td>
					<td class="align-middle">
						<div><?=$staff->name;?><div>
					</td>
					<td class="align-middle">
						<div><?=$staff->email;?><div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=staff&action=show&id=<?=$staff->id?>"><button class="btn btn-primary" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Update
	                    </button></a>
	                    <a href="./?controller=staff&action=delete&id=<?=$staff->id?>"><button class="btn btn-danger" type="button">
	                      <i class="fa fa-trash-o"></i>&nbsp;Delete
	                    </button></a>
					</td>
				</tr>
				<?php } ?>
			  </tbody>
    	</table>
  	  </div>
	</div>
  </div>
</div>