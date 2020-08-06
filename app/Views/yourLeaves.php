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
            <i class="material-icons text-success" data-toggle="tooltip" title="Search!"
              data-placement="left">search</i>
          </span>
        </div>
      </div>
      <br>

      <!-- setting message when error or success create employee's leave request -->
      <?php if(session()->get('success')): ?>
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= session()->get('success') ?>
      </div>

      <?php endif ?>
      <!-- alert message success if user incorrect information-->
      <?php if(session()->get('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= session()->get('error')->listErrors() ?>
      </div>
      <?php endif ?>
      <!-- end setting  -->

      <div class="text-right">
        <a href="" class="btn btn-info btn-sm text-white font-weight-bolder" data-toggle="modal"
          data-target="#createYourLeave">
          <i class="material-icons float-left" data-toggle="tooltip" title="Add Your Leave!"
            data-placement="left"></i>&nbsp;REQUEST A LEAVE
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
          <th> </th>
        </tr>

        <?php foreach($yourLeaveData as $yourLeave):?>
        <tr>
          <td><?= $yourLeave['start_date']?></td>
          <td><?= $yourLeave['end_date']?></td>
          <td><?= $yourLeave['duration']?></td>
          <td><?= $yourLeave['leave_type']?></td>

          <td> <span class="badge badge-info"> Requested </span> </td>
          <td style="display:flex;justify-content:flex-end">
          <?php if(session('role') == 'Admin' || session('role') == 'HR'): ?>
            <a href="" data-toggle="modal" data-target="#deleteYourLeave<?= $yourLeave['leave_id']?>"><i class="material-icons text-danger"
                data-toggle="tooltip" title="Delete Your Leave!" data-placement="right">delete</i></a>
          <?php endif;?>
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
<?php foreach($yourLeaveData as $yourLeave) :?>
  <div class="modal fade" id="deleteYourLeave<?= $yourLeave['leave_id']?>">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bolder"> Remove items? </h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-right">
          <form action="<?= base_url("removeYourLeave/". $yourLeave['leave_id']) ?>" method="post">
            <div class="form-group">
              <p style="display:flex;justify-content:flex-start"> Are you sure you want to remove the selected your leave?
              </p>
            </div>
            <a data-dismiss="modal" class="closeModal">DON'T REMOVE</a>
            &nbsp;
            <input type ="submit" value = "DELETE" class="text-warning" style="border:none;background:white;">
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach;?>
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
        <form action="<?= base_url("addYourLeave")?>" method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label class="control-label float-left" for="datepicker-start">Start Date:</label>
                <input type="date" id="startDate" name="start_date" etw-date="" data-date-format=" DD-YY-MM"
                  class="form-control"">
              </div>
              <div class=" form-group">
                <select class="form-control" id="timeToStart" name="time_start" onchange="dateDiff();">
                  <option value="1">Morning</option>
                  <option value="2">Afternoon</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label class="control-label float-left" for="datepicker-start">End Date:</label>
                <input type="date" id="endDate" name="end_date" etw-date="" data-date-format=" DD-YY-MM"
                  class="form-control" onchange="dateDiff();">
              </div>
              <div class="form-group">
                <select class="form-control" id="timeToEnd" name="time_end" onchange="dateDiff();">

                  <option value="1">Morning</option>
                  <option value="2">Afternoon</option>
                </select>`
              </div>
            </div>
          </div>
          <!-- input duration -->
          <div class="form-group">
            <p><strong>Doration: </strong><input type="text" id="duration" name="duration"
                style="border: none; background-color: white;" onchange=""></p>
            <p id="danger"></p>
          </div>
          <!-- select leave type -->
          <div class="form-group">
            <select class="form-control" id="leave_type" name="leave_type">
              <option disabled>select leave type...</option>
              <option value="paid">Paid leave</option>
              <option value="sick">Sick leave</option>
              <option value="unpaid">Un paid leave</option>
              <option value="wedding">Wedding leave</option>
              <option value="maternity">Maternity leave</option>
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Comment"></textarea>
          </div>
          <a data-dismiss="modal" class="btn closeModal">DISCARD</a>
          &nbsp;
          <input type="submit" value="SUBMIT" class="btn text-warning">
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- =================================END MODEL CREATE==================================================== -->
<?= $this->endSection() ?>