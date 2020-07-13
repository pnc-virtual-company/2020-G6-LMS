<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/menu') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
                <div class="input-group md-form form-sm form-1 pl-0 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1">
                            <i class="material-icons text-success" data-toggle="tooltip" title="Search" data-placement="left">search</i>
                        </span>
                    </div>
                    <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
                </div>
                <br>
				<div class="text-right">
                    <a href="" class="btn btn-info btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createDepartment">
                        <i class="material-icons float-left" data-toggle="tooltip" title="Add Department!" data-placement="left">add</i>&nbsp;Create
					</a>
                </div>
                <h4 class="font-weight-bolder"> Departments </h4>
                <br>
				<table class="table table-borderless table-hover">

					<tr>
						<td> Training and education team </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateDepartment"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Department!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteDepartment"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Department!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> External relation team </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateDepartment"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Department!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteDepartment"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Department!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> Admin and finance team </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateDepartment"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Department!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteDepartment"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Department!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> Selection team </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateDepartment"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Department!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteDepartment"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Department!" data-placement="right">delete</i></a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

<!-- ========================================START Model DELETE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="deleteDepartment">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bolder"> Remove items? </h4>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="/" method="post">
				    <div class="form-group">
					    <p style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected departments?</p>
				    </div>
			        <a data-dismiss="modal" class="closeModal">DON'T REMOVE</a>
		 	            &nbsp;
					<a href="" type ="submit" value = "DELETE" class="text-warning">DELETE</a>
                </form>
            </div>
        </div>
    </div>
</div>
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
			    <form  action="/" method="post">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Department name">
				    </div>
			        <a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	            &nbsp;
					<a href="" type ="submit" value = "CREATE" class="text-warning">CREATE</a>
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
			    <form  action="/" method="post">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Department name">
				    </div>
			        <a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	            &nbsp;
					<a href="" type ="submit" value = "UPDATE" class="text-warning">UPDATE</a>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- =================================END MODEL UPDATE==================================================== -->
<?= $this->endSection() ?>
