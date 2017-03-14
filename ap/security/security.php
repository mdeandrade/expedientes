<?php
if(!isset($_SESSION['id_usuario']) or !isset($_SESSION['id_usuario'])){

	header("Location:".full_url."/ap/errors_pages/login_required.php");	
} 
