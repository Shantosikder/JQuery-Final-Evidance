<?php $db = new mysqli('localhost','root','','ajax_select_show_data'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>Upzila info</title>
</head>
<body>

	<script>

		$(document).ready(function(){
			$('#divid').change(function(){
				var id = $(this).val();
				//alert(id);
				$.get('get_districts.php',{divid:id},function(data){
					$('#distid').html(data);
				});

			});

			$('#distid').change(function(){
				var id = $(this).val();
				//alert(id);
				$.get('get_upazilas.php',{dist_id:id},function(data){
					$('#upzid').html(data);
				});

			});

			$('#upzid').change(function(){
				var id = $(this).val();
				//alert(id);
				$.get('get_upazilainfo.php',{upz_id:id},function(data){
					$('#show_upz').text(data);
				});

			});
		})
		
	</script>

	<h2>Division Wise Upzila Information:</h2>

	<form>

		<?php 
		$data = $db->query("SELECT * FROM divisions");
		 ?>

		<select name="" id="divid">

			<option disabled selected>Select Division</option>

			<?php while($row = $data->fetch_object()){ ?>

				<option value="<?php echo $row->id; ?>"> <?php echo $row->divName; ?> </option>

			<?php } ?>

		</select>

		<select name="" id="distid">
			<option>Select District</option>
		</select>

		<select name="" id="upzid">
			<option value="">Select Upzila</option>
		</select><br>

		<textarea name="" id="show_upz" cols="50" rows="10"></textarea>
	</form>

</body>
</html>