<!DOCTYPE html>
<html>
<head>
	<title></title>


</head>
<body>

	<?php 
		$attributes = array();
		echo form_open_multipart(site_url('account/users/create'), $attributes);

	?>
	<input type="file" name="upload"><button type="submit">上传</button>

	<?php 
	echo form_close()
	?>

</body>
</html>