
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Inprogress Topic</div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:50%">Name</th>
                  <th class="text-center align-middle" style="width:45%">Course Name</th>
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
						<div><?=$topic->courseName;?><div>
					</td>
				</tr>
				<?php } ?>
			  </tbody>
    	</table>
  	  </div>
	</div>
  </div>
</div>