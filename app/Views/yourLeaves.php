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
                </div>
                <br>
				<div class="text-right">
                    <a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createYourLeave">
                        <i class="material-icons float-left" data-toggle="tooltip" title="Add Your Leave!" data-placement="left"></i>&nbsp;Request a leave
					</a>
                </div>
                <h4 class="font-weight-bolder"> Your Leave requests </h4>
                <br>
				<table class="table table-borderless table-hover">
                    <tr>
                        <th> Start date </th>
                        <th> End date </th>
                        <th> Duration </th>
                        <th> Type </th>
                        <th> Status </th>
                        <th>  </th>
                    </tr>
					<tr>
						<td> 25/05/2005 </td>
                        <td> 25/05/2005 </td>
                        <td> 1day </td>
                        <td> Vacation </td>
                        <td> <span class="badge badge-info"> Requested </span> </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateYourLeave"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Your Leave!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteYourLeave"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Your Leave!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> 25/05/2005 </td>
                        <td> 25/05/2005 </td>
                        <td> 2day </td>
                        <td> Training </td>
                        <td> <span class="badge badge-danger"> Cancelled </span> </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateYourLeave"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Your Leave!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteYourLeave"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Your Leave!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
                        <td> 25/05/2005 </td>
                        <td> 25/05/2005 </td>
                        <td> 0.5day </td>
                        <td> Vacation </td>
                        <td> <span class="badge badge-danger"> Rejected </span> </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateYourLeave"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Your Leave!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteYourLeave"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Your Leave!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
                        <td> 25/05/2005 </td>
                        <td> 25/05/2005 </td>
                        <td> 1day </td>
                        <td> Vacation </td>
                        <td> <span class="badge badge-success"> Accepted </span> </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updateYourLeave"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Your Leave!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deleteYourLeave"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Your Leave!" data-placement="right">delete</i></a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model DELETE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="deleteYourLeave">
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
					    <p style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected your leave?</p>
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
<div class="modal fade" id="createYourLeave">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bolder"> Create a request </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="/" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bolder" id="label"> Start Date: </label>
					                <input type="date" class="form-control">
				                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bolder" id="label"> End Date: </label>
					                <input type="date" class="form-control">
				                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="select" class="form-control">
                                        <option value="" disabled selected> Select time... </option>
                                        <option value="Morning"> MORNING </option>
                                        <option value="Afternoon"> AFTERNOON </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="select" class="form-control">
                                        <option value="" disabled selected> Select time... </option>
                                        <option value="Morning"> MORNING </option>
                                        <option value="Afternoon"> AFTERNOON </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Duration">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select id="select" class="form-control">
                                        <option value="" disabled selected> Leave Type... </option>
                                        <option value="Paid leave"> Paid leave </option>
                                        <option value="Sick leave"> Sick leave </option>
                                        <option value="Un paid leave"> Un paid leave </option>
                                        <option value="Wedding leave"> Wedding leave </option>
                                        <option value="Maternity leave"> Maternity leave </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" placeholder="Comment"></textarea>
                                </div>
                            </div>
                        </div>
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
<div class="modal fade" id="updateYourLeave">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bolder"> Edit a request </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="/" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bolder" id="label"> Start Date: </label>
					                <input type="date" class="form-control">
				                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bolder" id="label"> End Date: </label>
					                <input type="date" class="form-control">
				                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="select" class="form-control">
                                        <option value="" disabled selected> Select time... </option>
                                        <option value="Morning"> MORNING </option>
                                        <option value="Afternoon"> AFTERNOON </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="select" class="form-control">
                                        <option value="" disabled selected> Select time... </option>
                                        <option value="Morning"> MORNING </option>
                                        <option value="Afternoon"> AFTERNOON </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Duration">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select id="select" class="form-control">
                                        <option value="" disabled selected> Leave Type... </option>
                                        <option value="Paid leave"> Paid leave </option>
                                        <option value="Sick leave"> Sick leave </option>
                                        <option value="Un paid leave"> Un paid leave </option>
                                        <option value="Wedding leave"> Wedding leave </option>
                                        <option value="Maternity leave"> Maternity leave </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" placeholder="Comment"></textarea>
                                </div>
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
