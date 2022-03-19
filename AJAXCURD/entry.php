<?php
$db = new mysqli("localhost", "root", "", "ajax");

$sql = "SELECT * FROM round";

$data = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .btn1{
          margin-bottom: 1000px;

        }
    </style>
</head>

<body>


     <a class="btn btn-primary btn1" style="float: right" href="ajax.php">Select Page</a>
                
    <div class="container mt-3">
        <form method="post" action="">
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name.">
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email.">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone.">
            <input type="radio" name="gender" class="gender" value="Male">Male
            <input type="radio" name="gender" class="gender" value="Female">Female
            <select id="roundId" class="form-select" name="sellist1">
                <option value="" selected disabled>select one</option>
                <?php
                while ($row = $data->fetch_object()) {
                ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->round; ?></option>
                <?php
                }
                ?>
            </select>
            <button type="button" id="submit" class="btn btn-primary mt-3">Submit</button>


               
        </form>
    </div>
    <div class="action"></div>
    <br><br><br>

    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var gender = $("input[name='gender']:checked").val();
                var round_id = $('#roundId').val();

                $.post('submit.php', {
                    name: name,
                    email: email,
                    phone: phone,
                    gender: gender,
                    round_id: round_id
                }, function(data, status) {
                    $('.action').text(data);
                });

            });
        });
    </script>

</body>

</html>