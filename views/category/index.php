
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Category <a href="./?controller=category&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:20%">Name</th>
                  <th class="text-center align-middle" style="width:45%">Description</th>
                  <th class="text-center align-middle" style="width:10%">Number of Course</th>
                  <th class="text-center align-middle" style="width:20%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($categories as $category) { ?>
				<tr>
					<td class="text-center align-middle">
						<div><?=$category->id;?> <div>
					</td>
					<td class="align-middle">
						<div><?=$category->name;?><div>
					</td>
					<td class="align-middle">
						<div><?=$category->description;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$category->courseNumber;?><div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=category&action=show&id=<?=$category->id?>"><button class="btn btn-primary" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Update
	                    </button></a>
	                    <a href="./?controller=category&action=delete&id=<?=$category->id?>"><button class="btn btn-danger" type="button">
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