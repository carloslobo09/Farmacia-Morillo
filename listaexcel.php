<?php 
function getlistaexcel()
{
  $mysqli = getConnexion();
  $query = 'SELECT insumos.*,insumos.nombre as nombrei,presentacion.nombre as nombrep, presentacion.* FROM insumos INNER JOIN presentacion ON presentacion.id_pre=insumos.id_pre ORDER BY nombrei asc' ;
  return $mysqli->query($query);
}