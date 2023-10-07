<?php
class Alumno extends Persona
{

  public static function insertAlumno($object)
  {
    $insertAlumn = ("INSERT INTO alumno (nombre, apellido, dni, fecha_nacimiento) VALUES ('$object->nombre','$object->apellido','$object->dni','$object->fechaNacimiento')");

    return $insertAlumn;
  }

  public static function insertRol($object)
  {
    $insertRol = ("INSERT INTO rol_persona (dni,rol) VALUES ('$object->dni','Alumno')");
    return $insertRol;
  }

  public static function listarAlumnos()
  {
    $listarAlumnos = ("SELECT * FROM alumno ORDER BY apellido ASC");
    return $listarAlumnos;
  }
  public static function listarAlumnosConAsistencias()
  {
    $listarQuery = ("SELECT ast.id,a.dni,a.nombre,a.apellido,ast.fecha_asistencia,r.rol FROM ((alumno AS a INNER JOIN asistencia as ast ON a.dni=ast.dni) INNER join rol_persona AS r ON a.dni=r.dni) ORDER BY a.apellido ASC, a.nombre, ast.fecha_asistencia");
    return $listarQuery;
  }

  public static function deleteAlumno($dni)
  {
    $deleteQuery = ("DELETE FROM alumno WHERE dni = '$dni'");
    return $deleteQuery;
  }
  public static function getAlumno($dni)
  {
    $getQuery = ("SELECT * FROM alumno WHERE dni = '$dni'");
    return $getQuery;
  }
  public static function updateAlumno($nombre, $apellido, $dni, $fechaNacimiento)
  {
    $updateQuery = ("UPDATE alumno SET nombre = '$nombre', apellido = '$apellido', dni = '$dni', fecha_nacimiento = '$fechaNacimiento' WHERE dni = '$dni'");
    return $updateQuery;
  }
  public static function contarAsistencias()
  {
    $contarQuery = ("SELECT al.dni, al.nombre, al.apellido, r.rol,COUNT(*) AS Asistencias FROM ((asistencia AS a INNER JOIN alumno AS al ON al.dni=a.dni) INNER JOIN rol_persona AS r ON al.dni=r.dni) GROUP BY  al.dni, al.nombre, al.apellido, r.rol ORDER BY al.apellido ASC");
    return $contarQuery;
  }

  /*public static function contarAsistenciasEspecifico($dni)
  {
    $contarEspecificoQuery = ("SELECT COUNT(*) FROM alumnos as a INNER JOIN asistencias as asis on a.dni=asis.dni WHERE a.dni='$dni'");
    return $contarEspecificoQuery;
  }*/

  public static function insertarAsistencia($dni, $fecha)
  {
    $insertarAsistencia = ("INSERT INTO asistencia (id,dni,fecha_asistencia) VALUES (null,'$dni','$fecha')");
    return $insertarAsistencia;
  }

  public static function traerParametroAsistencias(){
    $diasQuery = ("SELECT dias_clases from parametros");
    return $diasQuery;
  }
}
?>