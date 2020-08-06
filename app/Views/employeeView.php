<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/menu') ?>
    <div class="container mt-5">
		<div class="row">
			
			<div class="col-12">

				<div class="input-group md-form form-sm form-2 pl-0">
  					<input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search" id="search">
  					<div class="input-group-append">
    					<span class="input-group-text red lighten-3" id="basic-text1">
							<i class="material-icons text-success" data-toggle="tooltip" title="Search!" data-placement="left">search</i>
						</span>
  					</div>
				</div><br>
				<!-- alert message when in correct information -->
				<?php if(session()->get('success')): ?>
					<div class="alert alert-success alert-dismissible fade show" >
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?= session()->get('success') ?>
					</div>
				<?php endif ?>
                  <!-- ..................................................... -->
				<!-- alert message when in incorrect information -->

				<?php if(session()->get('error')): ?>
					<div class="alert alert-danger alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?= session()->get('error')->listErrors() ?>
					</div>
				<?php endif ?>
				<h3 class="font-weight-bolder"> Employee </h3>

					<div class="text-right">
								<a href="" class="btn btn-info btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createEmployee">
									<i class="material-icons float-left" data-toggle="tooltip" title="Add Department!" data-placement="left">add</i>&nbsp;CREATE
								</a>
					</div><br>

				<table class="table table-borderless table-hover">
        			<tr>
						<th class="hide"> id </th>
						<th>First Name</th>
						<th>Last Name</th>
						<th class="hide">email</th>
						<th class="hide">Password</th>
						<th>Position</th>
						<th>Department</th>
						<th>Manager</th>
						<th>Start Date</th>
						
					</tr>
					<?php foreach($userData as $user): ?>
						
						<tbody id="myData">
						<tr class="edit_hover_class">
							<td class="hide"> <?= $user['u_id'] ?> </td>
							<td> <?= $user['firstName'] ?> </td>
							<td> <?= $user['lastName'] ?> </td>
							<td class="hide"> <?= $user['email'] ?> </td>
							<td class="hide"> <?= $user['password'] ?> </td>
							<td> <?= $user['pname'] ?> </td>
							<td> <?= $user['dname'] ?> </td>
							<td> <?= $user['manager'] ?> </td>
							<td> <?= $user['startDate'] ?> </td>
							<td style="display:flex;justify-content:flex-end">
								<a href="" data-toggle="modal" data-target="#updateEmployee" class=" edit-btn-user"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Employee!" data-placement="left">edit</i></a>
								<a href="" data-toggle="modal" data-target="#deleteEmployee<?= $user['u_id'] ?>"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Employee!" data-placement="right">delete</i></a>
							</td>
						</tr>
						</tbody>

					<?php endforeach ?>
          			
				</table>
			</div>
			
		</div>
	</div>

<!-- ========================================START Model DELETE================================================ -->

<?php foreach($userData as $user): ?>
<div class="modal fade" id="deleteEmployee<?= $user['u_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bolder"> Remove items? </h4>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="<?= base_url("removeUser/". $user['u_id']) ?>" method="post">
				    <div class="form-group">
					    <p  style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected Employee?</p>
				    </div>
			        <a data-dismiss="modal" class="closeModal">DON'T REMOVE</a>
		 	            &nbsp;
					<input type="submit" value="REMOVE" class="text-warning added">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="createEmployee">
    <div class="modal-dialog">
      	<div class="modal-content">
      
			<!-- Modal Header -->
			
        	<div class="modal-header">
          		<h3 class="modal-title font-weight-bolder">Create Employee</h3>
        	</div>
        
        	<!-- Modal body -->
        	<div class="modal-body text-right">
				<form  action="<?= base_url("addUser") ?>" method="post" enctype="multipart/form-data">
					<div class="container">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="First name" name= "firstName">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Last name" name= "lastName">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<select class="form-control" name="position">
										<option value="" selected disabled>Position...</option>
										<?php foreach($positionData as $position): ?>
											<option value="<?= $position['p_id'] ?>"><?= $position['pname'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<select class="form-control" name="department">
										<option value="" selected disabled>Department...</option>
										<?php foreach($departmentData as $department): ?>
											<option value="<?= $department['d_id'] ?>"><?= $department['dname'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="email" name= "email">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="password" name= "password">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="manager" name= "manager">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="file" name="profile">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label class="font-weight-bolder mt-2" id ="date"> Start Date </label>
									<input type="date" class="form-control" name="startDate">
								</div>
							</div>
						</div>
						<a data-dismiss="modal" class="closeModal">DISCARD</a>
        					&nbsp;
						<input type="submit" value="CREATE" class="text-warning added">
					</div>
        		</form>
      		</div>
	 	</div>
  	</div>
</div>

  <!-- =================================END MODEL CREATE==================================================== -->

  <!-- ========================================START Model UPDATE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="updateEmployee">
    <div class="modal-dialog">
      	<div class="modal-content">
      
        	<!-- Modal Header -->
        	<div class="modal-header">
          		<h3 class="modal-title font-weight-bolder">Update Employee</h3>
        	</div>
        
        	<!-- Modal body -->
        	<div class="modal-body text-right">
				<form  action="<?= base_url("updateUser") ?>" method="post">
					<input type="hidden" name="user_id" id="update_id">
					<div class="container">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="First name" name= "firstName" id="firstName" >
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Last name" name= "lastName" id="lastName">
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<select class="form-control" name="position" id="position_id">
										<option value="" selected disabled>Position...</option>
										<?php foreach($positionData as $position): ?>
											<option value="<?= $position['p_id'] ?>"><?= $position['pname'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<select class="form-control" name="department" id="department_id">
										<option value="" selected disabled>Department...</option>
										<?php foreach($departmentData as $department): ?>
											<option value="<?= $department['d_id'] ?>"><?= $department['dname'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="email" name= "email" id="email">
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="manager" name= "manager" id="manager">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label class="font-weight-bolder mt-2" id ="date"> Start Date </label>
									<input type="date" class="form-control" name="startDate" id="startDate">
								</div>
							</div>
							
						</div>
						<a data-dismiss="modal" class="closeModal">DISCARD</a>
        					&nbsp;
						<input type="submit" value="UPDATE" class="text-warning added">
					</div>
        		</form>
      		</div>
	 	</div>
  	</div>
</div>

  <!-- =================================END MODEL UPDATE==================================================== -->
<?= $this->endSection() ?>