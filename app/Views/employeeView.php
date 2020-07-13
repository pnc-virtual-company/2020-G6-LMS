<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/menu') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">

			<div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1">
                            <i class="material-icons text-success" data-toggle="tooltip" title="Search" data-placement="left">search</i>
                        </span>
                    </div>
                    <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
                </div><br>
				<h3 class="font-weight-bolder"> Employee </h3>

					<div class="text-right">
								<a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createEmployee">
									<i class="material-icons float-left" data-toggle="tooltip" title="Add Department!" data-placement="left">add</i>&nbsp;Create
								</a>
					</div><br>

						<table class="table table-borderless table-hover">
        			<tr>
						<th>FirsnName</th>
						<th>LastName</th>
						<th>Department</th>
						<th>Position</th>
						<th>StartDate</th>
						<th>Status</th>
					</tr>
					<tr>
						<td class="pizzaName">Sophorn</td>
						<td>Morn</td>
						<td >Training</td>
						<td >WEB Trainer</td>
						<td >20/2/2020</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updateEmployee"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Employee!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteEmployee"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Employee!" data-placement="right">delete</i></a>
						</td>
					</tr>
          			<tr>
						<td class="pizzaName">Sophorn</td>
						<td>Morn</td>
						<td >Training</td>
						<td >WEB Trainer</td>
						<td >20/2/2020</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updateEmployee"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Employee!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteEmployee"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Employee!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td class="pizzaName">Sophorn</td>
						<td>Morn</td>
						<td >Training</td>
						<td >WEB Trainer</td>
						<td >20/2/2020</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updateEmployee"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Employee!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteEmployee"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Employee!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td class="pizzaName">Sophorn</td>
						<td>Morn</td>
						<td >Training</td>
						<td >WEB Trainer</td>
						<td >20/2/2020</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updateEmployee"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Employee!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteEmployee"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Employee!" data-placement="right">delete</i></a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

<!-- delete employee -->

<div class="modal fade" id="deleteEmployee">
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
					    <p> Are you sure you want to remove the selected Employee?</p>
				    </div>
			        <a data-dismiss="modal" class="closeModal">DON'T REMOVE</a>
		 	            &nbsp;
		            <input type="submit" value="REMOVE" class="createBtn text-warning">
                </form>
            </div>
        </div>
    </div>
</div>
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
			<form  action="/" method="post">
				<div class="form-group">
              		<input type="text" class="form-control" placeholder="First name" name= "firstname">
				</div>
				<div class="form-group">
              		<input type="text" class="form-control" placeholder="Last name" name= "lastname">
				</div>
				<div class="form-group">
                    <select id="select" class="form-control">
                        <option value="" disabled selected> Department </option>
                        <option value="Training"> Training Team </option>
                        <option value="Education"> Education Team </option>
                        <option value="Admin"> Admin Team </option>
                    </select>
                </div>
				<div class="form-group">
                    <select id="select" class="form-control">
                        <option value="" disabled selected> Position </option>
                        <option value="Web Trainer"> Web Trainer </option>
                        <option value="Web Coordinator"> Web Coordinator </option>
                        <option value=" IT Admin"> IT Admin </option>
                    </select>
                </div>
				<div class="row">
                    <div class="col-3-sm" style="padding-left: 12px;">
                        <div class="form-group">
                            <label class="font-weight-bolder"> Start Date: </label>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <input type="date" class="form-control" style="display:flex;justify-content:flex-start;width:370px">
                        </div>
                    </div>
                </div>
				<a data-dismiss="modal" class="closeModal">DISCARD</a>
        			&nbsp;
        		<a href="" type ="submit" value = "CREATE" class="text-warning">CREATE</a>
      			<!-- <input type="submit" value="CREATE" class="text-info"> -->
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
			<form  action="/" method="post">
				<div class="form-group">
              		<input type="text" class="form-control" placeholder="First name" name= "firstname">
				</div>
				<div class="form-group">
              		<input type="text" class="form-control" placeholder="Last name" name= "lastname">
				</div>
				<div class="form-group">
                    <select id="select" class="form-control">
                        <option value="" disabled selected> Department </option>
                        <option value="Training"> Training Team </option>
                        <option value="Education"> Education Team </option>
                        <option value="Admin"> Admin Team </option>
                    </select>
                </div>
				<div class="form-group">
                    <select id="select" class="form-control">
                        <option value="" disabled selected> Position </option>
                        <option value="Web Trainer"> Web Trainer </option>
                        <option value="Web Coordinator"> Web Coordinator </option>
                        <option value=" IT Admin"> IT Admin </option>
                    </select>
                </div>
				<div class="row">
                    <div class="col-3-sm" style="padding-left: 12px;">
                        <div class="form-group">
                            <label class="font-weight-bolder"> Start Date: </label>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <input type="date" class="form-control" style="display:flex;justify-content:flex-start;width:370px">
                        </div>
                    </div>
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
