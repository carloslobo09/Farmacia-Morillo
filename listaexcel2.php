<?php 
function getlistaexcel()
{
  $mysqli = getConnexion();
  date_default_timezone_set('America/Buenos_Aires');
  $fechaactual = date('Y-m-d');
  $query = "SELECT ue.*, sum(unide) as suma,insumos.nombre,now() as actual FROM ue INNER JOIN insumos ON insumos.id_ins=ue.id_ins where fecha='".$fechaactual."' GROUP BY id_ins ORDER BY nombre asc";
  return $mysqli->query($query);
}