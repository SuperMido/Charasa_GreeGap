
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Trainer <a href="./?controller=trainer&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:25%">Name</th>
                  <th class="text-center align-middle" style="width:30%">Email</th>
                  <th class="text-center align-middle" style="width:20%">Telephone</th>
                  <th class="text-center align-middle" style="width:20%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($trainers as $trainer) { ?>
				<tr>
					<td class="text-center align-middle">
						<div><?=$trainer->id;?> <div>
					</td>
					<td class="align-middle">
						<div><?=$trainer->name;?><div>
					</td>
					<td class="align-middle">
						<div><?=$trainer->email;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$trainer->telephone;?><div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=trainer&action=show&id=<?=$trainer->id?>"><button class="btn btn-primary" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Update
	                    </button></a>
	                    <a href="./?controller=trainer&action=delete&id=<?=$trainer->id?>"><button class="btn btn-danger" type="button">
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