<nav class="navbar navbar-expand-lg bg-info navbar-dark" style="height: 45px;">
  <!-- Links -->
  <ul class="navbar-nav">
    <div class="navbar">
      <li class="nav-item">
        <a class="nav-link text-white" href="yourLeave"> Your Leaves </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="leave"> Leaves </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="employee"> Employees </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="position"> Positions </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="department"> Departments </a>
      </li>

      <!-- Dropdown -->
      <div class="drop">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
          <?php $username = strstr(session()->get('email'),'@',true) ?>
              <?= $username ?>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item font-weight-bolder" href="profile" data-toggle="modal" data-target="#viewProfile"> Profile </a>
            <a class="dropdown-item font-weight-bolder" href="logout"> Log Out </a>
          </div>
        </li>
      </div>
    </div>
  </ul>
</nav>
<br>

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
  

