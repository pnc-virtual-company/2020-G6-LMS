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
      $('#startDate').val(data[7]);
  })
});