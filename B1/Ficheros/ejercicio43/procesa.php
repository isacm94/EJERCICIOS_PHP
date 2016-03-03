<?php
if(! $_POST)
	include 'form.php';
	
else{
	if (is_uploaded_file($_FILES['archivo1']['tmp_name'])){
		
		$nombreDirectorio= "./";//carpeta en la que está
		$idUnico = time();
		$nombreFichero= $idUnico. "-" . $_FILES['archivo1']['name'];
		
		move_uploaded_file($_FILES['archivo1']['tmp_name'],$nombreDirectorio.$nombreFichero);
		
		echo "<p>Se ha subido correctamente el fichero</p>";
		
		if (file_exists($nombreFichero)) {
			
			echo "<h1>Mostrando fichero:</h1>";
			
			$ext = substr($nombreFichero, strrpos($nombreFichero, '.') + 1); // extension
			
			if($ext == 'jpg')
				header('content-type: image/'.$ext);
			
			readfile($nombreFichero);
			exit;
		}
		
	}
		
	else
		echo "<p>No se ha podido subir el fichero</p>";
	
	
	
	
} 
	