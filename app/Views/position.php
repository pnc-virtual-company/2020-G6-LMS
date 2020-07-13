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
                    <a href="" class="btn btn-info btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPosition">
                        <i class="material-icons float-left" data-toggle="tooltip" title="Add Position!" data-placement="left">add</i>&nbsp;Create
					</a>
                </div>
                <h4 class="font-weight-bolder"> Position </h4>
                <br>
				<table class="table table-borderless table-hover">
					<tr>
						<td> IT Admin </td>
						<td  style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updatePosition"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Position!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deletePosition"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Position!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> WEB Trainer </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updatePosition"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Position!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deletePosition"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Position!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> WEB coordintor </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updatePosition"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Position!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deletePosition"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Position!" data-placement="right">delete</i></a>
						</td>
					</tr>
					<tr>
						<td> IT admin </td>
						<td style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updatePosition"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Position!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deletePosition"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Position!" data-placement="right">delete</i></a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model DELETE================================================ -->
	<!-- The Modal -->
<div class="modal fade" id="deletePosition">
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
					    <p style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected position?</p>
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
<div class="modal fade" id="createPosition">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Create Position </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="/" method="post">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Position name">
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
<div class="modal fade" id="updatePosition">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> Edit Position </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="/" method="post">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Position name">
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
