<script type="text/javascript">
	var mode = localStorage.getItem('mode') || '';
    localStorage.setItem('mode','');
    var started = localStorage.getItem('started') || '';
    localStorage.setItem('started','');
</script>
<?php	
	session_start();
	session_destroy();

	header('Location:snake.php');
?>
