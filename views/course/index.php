
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Courses <a href="./?controller=course&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:30%">Name</th>
                  <th class="text-center align-middle" style="width:10%">Number of Trainee</th>
                  <th class="text-center align-middle" style="width:20%">Category</th>
                  <th class="text-center align-middle" style="width:35%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($courses as $course) { ?>
				<tr>
					<td class="text-center align-middle">
						<div><?=$course->id;?> <div>
					</td>
					<td class="align-middle">
						<div><?=$course->name;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$course->traineeNumber;?><div>
					</td>
					<td class="align-middle">
						<div><?=$course->categoryName;?><div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=course&action=list_unassign&id=<?=$course->id?>"><button class="btn btn-success" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Add Trainee
	                    </button></a>
	                    <a href="./?controller=course&action=list_assign&id=<?=$course->id?>"><button class="btn btn-warning" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Remove Trainee
	                    </button></a>
						<a href="./?controller=course&action=show&id=<?=$course->id?>"><button class="btn btn-primary" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Update
	                    </button></a>
	                    <a href="./?controller=course&action=delete&id=<?=$course->id?>"><button class="btn btn-danger" type="button">
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