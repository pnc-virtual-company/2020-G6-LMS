
    <nav class="navbar navbar-expand-lg navbar-light bg-info"> 
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('yourLeave')?>"> Your Leaves </a>
              </li>

              <?php if(session('role') == 'Admin' || session('role') == 'HR' || session('role') == 'Manager'): ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="<?= base_url('leave')?>"> Leaves </a>
                </li>
              <?php endif ?>

              <?php if(session('role')== 'Admin' || session('role') == 'HR'):?>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('employee')?>"> Employees </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('position')?>"> Positions </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('department')?>"> Departments </a>
                  </li>
              <?php endif ?>
            </ul>
            <ul class="navbar-nav pr-5">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php $username = strstr(session()->get('email'),'@',true) ?>
                    <?= $username ?>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item font-weight-bolder" href="<?= base_url('profile')?>" data-toggle="modal" data-target="#viewProfile"> Profile </a>
                  <a class="dropdown-item font-weight-bolder" href="<?= base_url('logout')?>"> Log Out </a>
                </div>
              </li>
            </ul>
        </div>
    </nav>


<!-- ================================================================== -->

<div class="modal fade" id="viewProfile">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> My information</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body ">
                  <table class="table table-borderless table-hover">
                        <tr>
                          <th>First name</th>
                          <td>Ronan</td>
                        </tr>
                        <tr>
                          <th>Last name</th>
                          <td>OGOR</td>
                        </tr>
                        <tr>
                          <th>Department</th>
                          <td>Training and education</td>
                        </tr>
                        <tr>
                          <th>Position</th>
                          <td>WEB Coordinator</td>
                        </tr>
                        <tr>
                          <th>Start date</th>
                          <td>25/11/2019</td>
                        </tr>
                  </table>
            </div>
        </div>
    </div>
</div>
  


<!-- ================================================================== -->
