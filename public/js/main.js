$(document).ready(function(){
    // Update user information modal
  $('.edit-btn-user').on('click', function(){
    $('#updateEmployee').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
      return $(this).text();
    }).get();
    // console.log(data);

    $('#update_id').val(data[0]);
    $('#firstName').val(data[1]);
    $('#lastName').val(data[2]);
    $('#email').val(data[3]);
    $('#password').val(data[4]);
    $('#position_id:selected').val(data[5]);
    $('#department_id:selected').val(data[6]);
    $('#manager').val(data[7]);
    $('#startDate').val(data[8]);
  });
  // Update department information modal
  $('.edit-btn-department').on('click', function() {
    $('#updateDepartment').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
      return $(this).text();
    }).get();
  //  console.log(data);

    $('#update_id').val(data[0]);
    $('#dname').val(data[1]);
  });

  // Search department information
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myData ").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }); 
});


// How to calculate startDate and endDate of leave request
function dateDiff() { 
  var startDate = document.getElementById('startDate').value;
  var endDate = document.getElementById('endDate').value;
  var startPeriod = document.getElementById('timeToStart').value;
  var endPeriod = document.getElementById('timeToEnd').value;
  
  var dateToStart = new Date(startDate);
  var dateToEnd = new Date(endDate);
  var getDateTime = dateToEnd.getTime() - dateToStart.getTime();
  var days = getDateTime/(1000 * 60 * 60 * 24);
  var period = 0;
if(startPeriod == 1) {
  if(endPeriod == 1){
    period = 0.5;
  }else{
    period = 1;
  }  
}else {
  if(endPeriod == 1){  
    period = 0;
  }else{
    period = 0.5;
  }
}
if(startDate > endDate){
  $('#danger').html('<div class="alert alert-danger"><strong>Error! </strong>End date cannot be before start date.</div>');
}else if(startDate == endDate && startPeriod == 2 && endPeriod == 1){
  $('#danger').html('<div class="alert alert-danger"><strong>Error! </strong>Start date and end date cannot be selected in the past.</div>');
}else{
  document.getElementById("duration").value = (days + period)+" days";
  $('#danger').html('');
}
  return false;
}

// manage the leave request
//Reject and Accept leave request
var id = document.getElementsByClassName('hide');
function beforeAccept(id1,id2,id3,id4) {
    document.getElementById(id1).style.display = 'block';
    document.getElementById(id2).style.display = 'none';
    document.getElementById(id3).style.display = 'none';
    document.getElementById(id4).style.display = 'block';
}
function beforeReject(id1,id2,id3,id4) {
    document.getElementById(id1).style.display = 'block';
    document.getElementById(id2).style.display = 'none';
    document.getElementById(id3).style.display = 'none';
    document.getElementById(id4).style.display = 'block';
}
function undo(id1,id2,id3,id4,id5) {
    document.getElementById(id1).style.display = 'block';
    document.getElementById(id2).style.display = 'block';
    document.getElementById(id3).style.display = 'none';
    document.getElementById(id4).style.display = 'none';
    document.getElementById(id5).style.display = 'none';
}


