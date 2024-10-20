<?php

    require_once ('./aplicacion/models/model.php');

    class fabricaModel extends Model{
        
        public function getFabricas(){
            //Ejecuto la consulta
            $query = $this->db->prepare('SELECT * FROM fabrica');
            $query->execute();

            //Obtengo los datos en un arreglo de objetos
            $fabricas = $query->fetchAll(PDO::FETCH_OBJ); 
    
            return $fabricas;
        }

        public function getFabrica($id) {
            $query = $this->db->prepare('SELECT * FROM fabrica WHERE id = ?');
            $query->execute([$id]);

            $fabrica = $query->fetch(PDO::FETCH_OBJ); 
            
            return $fabrica;
        }

        public function insertFabrica($nombre, $importador, $pais, $cantidad){

            $query = $this->db->prepare('INSERT INTO fabrica(nombre, importador, pais, cantidad) VALUES (?, ?, ?, ?)');
            $query->execute([$nombre, $importador, $pais, $cantidad]);
        
            $id = $this->db->lastInsertId();
        
            return $id;
    
        }

        public function getFabricasId($id) {
            $query = $this->db->prepare('SELECT * FROM fabrica WHERE id = ?');
            $query->execute([$id]);

            $fabrica = $query->fetch(PDO::FETCH_OBJ); 
            
            return $fabrica;
        }

        public function getAllFabricas(){
            $query = $this->db->prepare('SELECT * FROM fabrica');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function eraseFab($id) {
            $deleteModelsQuery = $this->db->prepare('DELETE FROM modelo WHERE id_fabrica = ?');
            $deleteModelsQuery->execute([$id]);
        
            $query = $this->db->prepare('DELETE FROM fabrica WHERE id = ?');
            $query->execute([$id]);
        }

        public function updateFabrica($id, $nombre, $importador, $pais, $cantidad) {
            $query = $this->db->prepare('UPDATE fabrica SET nombre = ?, importador = ?, pais = ?, cantidad = ? WHERE id = ?');
            $query->execute([$nombre, $importador, $pais, $cantidad, $id]);
        }
    }

?>