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
						<th>StartDate</th>
						<th>EndDate</th>
						<th>Duration</th>
						<th>Type</th>
						<th></th>
					</tr>
					<tr>
						<td>25/05/2020</td>
						<td>26/05/202</td>
						<td >1 day</td>
						<td >Training</td>
						
						<td>
							<button class="btn btn-primary" id="accept">Accept</button>
							<button class="btn btn-light" id="reject">Reject</button>
						</td>
					</tr>
                    <tr>
						<td>27/05/2020</td>
						<td>29/05/202</td>
						<td >1 day</td>
						<td >Vacation</td>
						
						<td>
							<p>Accepted</p>
						</td>
                    </tr>
                    <tr>
						<td>27/05/2020</td>
						<td>29/05/202</td>
						<td >1 day</td>
						<td >Vacation</td>
						
						<td>
							<button class="btn btn-primary" id="accept">Accept</button>
							<button class="btn btn-light" id="reject">Reject</button>
						</td>
                    </tr>
                    <tr>
						<td>27/05/2020</td>
						<td>29/05/202</td>
						<td >1 day</td>
						<td >Vacation</td>
						
						<td>
							<p>Rejected</p>
						</td>
                    </tr>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>
<?= $this->endSection() ?>
