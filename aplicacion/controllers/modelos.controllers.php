<?php
    require_once './aplicacion/models/modelo.model.php';
    require_once './aplicacion/view/modelos.view.php';

class modelosControllers{
    private $models;
    private $view;

    public function __construct() {
        $this->models = new modelosModel(); // Inicializa la propiedad con una instancia de fabricaModel
        $this->view = new modelosView(); // Asegúrate de inicializar también la vista si es necesario
    }


    public function showModelos(){
        $modelos = $this->models->getModelos();
        return $this->view->showModelos($modelos);
    }

    public function showModeloDetails($id_zapatilla) {
        $modelo = $this->models->getModelo($id_zapatilla);
        if ($modelo) {
            return $this->view->showdetailModelo($modelo);
        }
    }
}