request
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
				<h3 class="font-weight-bolder"> Leave requests submitted to me </h3>
					
					<table class="table table-borderless table-hover">
        			<tr>
						<th>Employee</th>
						<th>StartDate</th>
						<th>EndDate</th>
						<th>Duration</th>
						<th>Type</th>
						<th></th>
					</tr>

					<?php foreach($LeaveDate as $leave) :?>
						<?php if($leave['user_id'] == session()->get('u_id')) :?>

							<tr>
								<td><?= $leave['firstName']," ",$leave['lastName']?></td>
								
								<td><?= $leave['start_date']?></td>
								<td><?= $leave['end_date']?></td>
								<td><?= $leave['duration']?></td>
								<td><?= $leave['leave_type']?></td>
								
								<td>
									<div class="row">
										<a href="<?= base_url('email')?>" onclick="beforeAccept('afterAccept','accept','reject','undo'); return false;" class="btn1 btn btn-primary btn-sm" id="accept">Accept</a>
										<a href="<?= base_url('email')?>"onclick="beforeReject('afterReject','accept','reject','undo'); return false;"class="btn1 btn btn-outline-primary btn-sm" id="reject">Reject</a>
										<span class = "float-left" id="afterAccept"style="display: none;" >Accepted</span>
										<span class = "float-left" id="afterReject"style="display: none;">Rejected</span>
										<a><i class="material-icons text-danger font-weight-bolder "style="display: none; cursor: pointer;" id="undo"onclick = "undo('accept','reject','afterAccept','afterReject','undo');">replay</i></a>
									</div>
								</td>
							</tr>
						<?php endif;?>
                    <?php endforeach;?>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>
<?= $this->endSection() ?>
