<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/menu') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="input-group md-form form-sm form-2 pl-0">
  					<input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search" id="search">
  					<div class="input-group-append">
    					<span class="input-group-text red lighten-3" id="basic-text1">
							<i class="material-icons text-success" data-toggle="tooltip" title="Search!" data-placement="left">search</i>
						</span>
  					</div>
				</div>
                <br>
				<div class="text-right">
                    <a href="" class="btn btn-info btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createDepartment">
                        <i class="material-icons float-left" data-toggle="tooltip" title="Add Department!" data-placement="left">add</i>&nbsp;CREATE
					</a>
                </div>
                <h4 class="font-weight-bolder"> Departments </h4>
                <br>
				<table class="table table-borderless table-hover">

					<?php foreach($departmentData as $department): ?>

						<tbody id="myData">
							<tr class="edit_hover_class">
								<td class="hide"><?= $department['d_id'] ?></td>
								<td> <?= $department['dname'] ?> </td>
								<td style="display:flex;justify-content:flex-end">
									<a href="" data-toggle="modal" data-target="#updateDepartment" class="edit-btn-department"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Department!" data-placement="left">edit</i></a>
									<a href="" data-toggle="modal" data-target="#deleteDepartment<?= $department['d_id'] ?>"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Department!" data-placement="right">delete</i></a>
								</td>
							</tr>
						</tbody>

					<?php endforeach; ?>

				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

<!-- ========================================START Model DELETE================================================ -->

	<!-- The Modal -->
<?php foreach($departmentData as $department): ?>
<div class="modal fade" id="deleteDepartment<?= $department['d_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bolder"> Remove items? </h4>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="removeDepartment/<?= $department['d_id'] ?>" method="post">
				    <div class="form-group">
					    <p style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected departments?</p>
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
<!-- =================================END MODEL DELETE==================================================== -->


<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="createDepartment">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Create department </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="<?= base_url("addDepartment") ?>" method="post">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Department name" name="dname">
						<!-- alert message success if user incorrect information-->
						<?php if(session()->get('error')): ?>
							<span class="text-danger errorText"> <?= session()->get('error')->listErrors() ?> </span>
						<?php endif ?>
				    </div>
			        <a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	            &nbsp;
					<input type="submit" value="CREATE" class="text-warning added">
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- =================================END MODEL CREATE==================================================== -->


  <!-- ========================================START Model UPDATE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="updateDepartment">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Edit department </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
				<form  action="<?= base_url("updateDepartment") ?>" method="post">
				<input type="hidden" name="department_id" id="update_id">
				    <div class="form-group">
						<input type="text" class="form-control" placeholder="Department name" name="dname" id="dname">
						<!-- alert message success if user incorrect information-->
						<?php if(session()->get('error')): ?>
							<span class="text-danger errorText"> <?= session()->get('error')->listErrors() ?> </span>
						<?php endif ?>
				    </div>
			        <a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	            &nbsp;
					<input type="submit" value="UPDATE" class="text-warning added">
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- =================================END MODEL UPDATE==================================================== -->
<?= $this->endSection() ?>