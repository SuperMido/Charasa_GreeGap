
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Topic <a href="./?controller=topic&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:35%">Name</th>
                  <th class="text-center align-middle" style="width:20%">Trainer</th>
                  <th class="text-center align-middle" style="width:20%">Course</th>
                  <th class="text-center align-middle" style="width:20%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($topics as $topic) { ?>
				<tr>
					<td class="text-center align-middle">
						<div><?=$topic->id;?> <div>
					</td>
					<td class="align-middle">
						<div><?=$topic->name;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$topic->trainerName;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$topic->courseName;?><div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=topic&action=show&id=<?=$topic->id?>"><button class="btn btn-primary" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Update
	                    </button></a>
	                    <a href="./?controller=topic&action=delete&id=<?=$topic->id?>"><button class="btn btn-danger" type="button">
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