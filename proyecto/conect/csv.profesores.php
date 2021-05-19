<?php 
include 'conexion.php';
$sql="select tbl_professor.id_professor, tbl_professor.nom_prof, tbl_professor.cognom1_prof,tbl_professor.cognom2_prof,tbl_professor.telf,tbl_professor.email_prof,tbl_dept.codi_dept from tbl_professor inner join tbl_dept on tbl_professor.dept=tbl_dept.id_dept;";
$resultados = $conexion->query($sql);

if($resultados){
        echo "Nombre;Primer Apellido;Segundo Apellido;Telefono;Email;Departamento\n";
	while($csv  = $resultados->fetch_object()){
            echo $csv->nom_prof.";";
            echo $csv->cognom1_prof.";";
            echo $csv->cognom2_prof.";";
            echo $csv->telf.";";
            echo $csv->email_prof.";";
            echo $csv->codi_dept."\n.";
	}
}

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=profesorado.csv;');
?>