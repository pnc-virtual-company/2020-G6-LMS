<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/menu') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="input-group md-form form-sm form-2 pl-0">
  					<input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
  					<div class="input-group-append">
    					<span class="input-group-text red lighten-3" id="basic-text1">
							<i class="material-icons text-success" data-toggle="tooltip" title="Search!" data-placement="left">search</i>
						</span>
  					</div>
				</div>
                <br>
				<div class="text-right">
                    <a href="" class="btn btn-info btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPosition">
                        <i class="material-icons float-left" data-toggle="tooltip" title="Add Position!" data-placement="left">add</i>&nbsp;CREATE
					</a>
                </div>
                <h4 class="font-weight-bolder"> Position </h4>
                <br>
				<table class="table table-borderless table-hover">
				<!-- show data on url -->
				<?php foreach($positionData as $position):?>
					<tr>
						<td class="hide"> <?= $position['p_id'] ?> </td>
						<td><?= $position['pname']?></td>
						<td  style="display:flex;justify-content:flex-end">
							<a href="" data-toggle="modal" data-target="#updatePosition" class="edit-btn-position"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Position!" data-placement="left">edit</i></a>
							<a href="" data-toggle="modal" data-target="#deletePosition<?= $position['p_id'];?>"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete Position!" data-placement="right">delete</i></a>
						</td>
					</tr>
				<?php endforeach;?>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model DELETE================================================ -->
	<!-- The Modal -->
<?php foreach($positionData as $position): ?>
<div class="modal fade" id="deletePosition<?= $position['p_id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bolder"> Remove items? </h4>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body text-right">
			    <form  action="remove/<?= $position['p_id']?>" method="post">
				    <div class="form-group">
					    <p style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected position?</p>
				    </div>
			        <a data-dismiss="modal" class="closeModal">DON'T REMOVE</a>
		 	            &nbsp;
					<input type ="submit" value = "REMOVE" class="text-warning" style="border:none;background:white;">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
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
			    <form  action="<?= base_url('addPosition')?>" method="post">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Position name" name="pname">
				    </div>
			        <a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	            &nbsp;
					<input type ="submit" value = "CREATE" class="text-warning" style="border:none;background:white;">
					
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
			    <form  action="<?= base_url("updatePosition") ?>" method="post">
				<input type="hidden" name="position_id" id="update_id">
				    <div class="form-group">
					    <input type="text" class="form-control" placeholder="Position name" name="pname" id="pname">
				    </div>
			        <a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	            &nbsp;
					<input type ="submit" value = "UPDATE" class="text-warning" style="border:none;background:white;">
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- =================================END MODEL UPDATE==================================================== -->
<?= $this->endSection() ?>
