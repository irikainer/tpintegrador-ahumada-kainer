<?php
require_once './clases/Repositorio.php';
require_once 'Campeon.php';
require_once 'clases/usuario/Usuario.php';
require_once 'clases/usuario/RepositorioUsuario.php';

class RepositorioCampeon extends Repositorio
{
    public function getAll(Usuario $usuario)
    {
        $idUsuario = $usuario->getId();
        $q = "SELECT id, nombre, linea, tipo, calificacion FROM campeones WHERE idUsuario = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $idUsuario);
        //Guardo los campos que me trajo el select en variables
        $query->bind_result($id, $nombre, $linea, $tipo, $calificacion);

        if ($query->execute()) {
            $listaCampeones = array();
            //Fetch da falso cuando ya no haya más campeones
            while ($query->fetch()) {
                $listaCampeones[] = new Campeon($nombre, $linea, $id, $calificacion, $tipo, $usuario);
            }
            return $listaCampeones;
        }
        return false;
    }

    public function getOne($id)
    {
        $q = "SELECT nombre, linea, tipo, calificacion, idUsuario FROM campeones WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $id);
        //Guardo los campos que me trajo el select en variables
        $query->bind_result($nombre, $linea, $tipo, $calificacion, $idUsuario);

        if ($query->execute()) {
            if ($query->fetch()) {
                $repoUsuario = new RepositorioUsuario();
                return new Campeon($nombre, $linea, $id, $calificacion, $tipo, $idUsuario);
            }
        }
        return false;
    }

    public function create(Campeon $campeon)
    {
        $q = "INSERT INTO campeones (nombre, linea, tipo, calificacion, idUsuario) VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);
        $query->bind_param(
            //Indico el tipo de parámetro de que voy a mandar
            "sssii",
            $campeon->getNombreCampeon(),
            $campeon->getLineaCampeon(),
            $campeon->getTipoCampeon(),
            $campeon->getCalificacion(),
            $campeon->getIdUsuario(),
        );

        if ($query->execute()) {
            // Retornamos el id del usuario recién insertado.
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

    public function delete(Campeon $campeon)
    {
        $id = $campeon->getId();
        $q = "DELETE FROM campeones WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $id);

        return ($query->execute());
    }

    public function editar(Campeon $campeon)
    {
        $id = $campeon->getId();
        $calificacion = $campeon->getCalificacion();
        $q = "UPDATE campeones SET calificacion = ? WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("ii", $calificacion, $id);

        return ($query->execute());
    }
}
