
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">List Trainee <a href="./?controller=trainee&action=show"><button class="btn btn-primary" type="button">
          <i class="fa fa-plus-square-o"></i>&nbsp;Add
        </button></a></div>
      <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="text-center align-middle" style="width:5%">ID</th>
                  <th class="text-center align-middle" style="width:20%">Name</th>
                  <th class="text-center align-middle" style="width:10%">DOB</th>
                  <th class="text-center align-middle" style="width:15%">Email</th>
                  <th class="text-center align-middle" style="width:20%">Address</th>
                  <th class="text-center align-middle" style="width:10%">TOEIC Score</th>
                  <th class="text-center align-middle" style="width:20%">Action</th>
                </tr>
              </thead>
              <tbody>
				<?php foreach ($trainees as $trainee) { ?>
				<tr>
					<td class="text-center align-middle">
						<div><?=$trainee->id;?> <div>
					</td>
					<td class="align-middle">
						<div><?=$trainee->name;?><div>
					</td>
					<td class="align-middle">
						<div><?=$trainee->dob;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$trainee->email;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$trainee->address;?><div>
					</td>
					<td class="text-center align-middle">
						<div><?=$trainee->toeicScore;?><div>
					</td>
					<td class="text-center align-middle">
						<a href="./?controller=trainee&action=show&id=<?=$trainee->id?>"><button class="btn btn-primary" type="button">
	                      <i class="fa fa-pencil-square-o"></i>&nbsp;Update
	                    </button></a>
	                    <a href="./?controller=trainee&action=delete&id=<?=$trainee->id?>"><button class="btn btn-danger" type="button">
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