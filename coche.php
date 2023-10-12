<?php

class Coche {
    // Propiedades
    public $marca;
    public $modelo;

    // Constructor
    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    // Método para mostrar la información del coche
    public function mostrarInformacion() {
        echo "Marca: {$this->marca}, Modelo: {$this->modelo}";
    }
}

// Crear una instancia de la clase Coche
$miCoche = new Coche("Toyota", "Camry");

// Llamar al método para mostrar la información del coche
$miCoche->mostrarInformacion();

?>
