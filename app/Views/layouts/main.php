<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LMS APP </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .hide{
            opacity:0;
            display:none;
        }
        .dropdown{
            margin-left: 550px;
        }
    </style>
</head>
<body>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
    
            // Update department information modal
            $('.edit-btn-position').on('click', function() {
            $('#updatePosition').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            //  console.log(data);

            $('#update_id').val(data[0]);
            $('#pname').val(data[1]);
            });
            
        });

    </script>

    <script>
        function preventBack (){
            window.history.forward();
        }
        setTimeout("preventBack()", 0);

        window.onunload= function () {null};
    </script>

<script src="<?= base_url('js/main.js') ?>"></script>
    <?= $this->renderSection('content') ?>
</body>
</html>
