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
</head>

<body>


    <div class="container mt-3">
        <h2>Select Menu</h2>
        
        <form action="" method="POST">
            
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
            <br>


          
        </form>
    </div>
    <div class="container mt-3">
    <table id="show" class="table">
        
    </table>
    </div>
    <div class="container mt-3">
    <a class="btn btn-primary" href="entry.php">New Entry</a>
    </div>



    <script>
        $(document).ready(function(){
            $('#roundId').change(function(){
                var r_id= $(this).val();
                $.get('students.php',{id:r_id},function(data,status){
                    $('#show').html(data);
                });
            });
        });

    </script>

</body>

</html>