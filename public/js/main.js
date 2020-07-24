$(document).ready(function(){
    
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
    
});