<?php 
include 'conexion.php';
$sql="select tbl_alumne.id_alumne, tbl_alumne.dni_alu, tbl_alumne.nom_alu, tbl_alumne.cognom1_alu,tbl_alumne.cognom2_alu,tbl_alumne.telf_alu,tbl_alumne.email_alu,tbl_classe.codi_classe from tbl_alumne inner join tbl_classe on tbl_alumne.classe=tbl_classe.id_classe";
$resultados = $conexion->query($sql);

if($resultados){
        echo "DNI;Nombre;Primer Apellido;Segundo Apellido;Telefono;Email;Clase\n";
	while($r  = $resultados->fetch_object()){
		echo $r->dni_alu.";";
		echo $r->nom_alu.";";
		echo $r->cognom1_alu.";";
		echo $r->cognom2_alu.";";
		echo $r->telf_alu.";";
                echo $r->email_alu.";";
                echo $r->codi_classe."\n.";
	}
}

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=alumnos.csv;');
?>