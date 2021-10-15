<?php

include 'includes/header.php';

interface TransporteInterfaz {
    public function getinfo(): string;
    public function getRuedas(): int;
}


class Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad) {
    }

    public function getInfo(): string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas(): int {
        return $this->ruedas;
    }
}

class Automovil extends Transporte implements TransporteInterfaz{
    public function __construct(protected int $ruedas, protected int $capacidad,protected string $color ) {
        parent::__construct($ruedas,$capacidad);
    }
    public function getInfo(): string {
        return "El Automovil tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y es de color". $this->color;
    }

}

echo "<pre>";
var_dump($auto=new Automovil(4,5,'Rojo'));
echo "</pre>";


include 'includes/footer.php';
