
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Inprogress Courses</div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:50%">Name</th>
                  <th class="text-center align-middle" style="width:45%">Category</th>
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
					<td class="align-middle">
						<div><?=$course->categoryName;?><div>
					</td>
				</tr>
				<?php } ?>
			  </tbody>
    	</table>
  	  </div>
	</div>
  </div>
</div>