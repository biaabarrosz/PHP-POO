<?php

interface Controlador {
    public function ligar();
    public function desligar();  
    public function abrirMenu();
    public function fecharMenu();
    public function maisVolume();
    public function menosVolume();
    public function ligarMudo();
    public function desligarMudo();
    public function play();
    public function pause();
}

class ControleRemoto implements Controlador {
    private $volume;
    private $ligado;
    private $tocando;

    public function __construct(){
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }

    // Implementação dos métodos getter e setter
    private function getVolume(){
        return $this->volume;
    }
    private function setVolume($volume){
        $this->volume = $volume;
    }
    private function getLigado(){
        return $this->ligado;
    }
    private function setLigado($ligado){
        $this->ligado = $ligado;
    }
    private function getTocando(){
        return $this->tocando;  // Correção aqui: use $this->tocando
    }
    private function setTocando($tocando){
        $this->tocando = $tocando;
    }
    public function ligar(){
        $this->setLigado(true);
    }

    public function desligar(){
        $this->setLigado(false);
    }

    public function abrirMenu(){
        echo "Está ligado? " . ($this->getLigado() ? "SIM" : "NÃO") . "<br>";
        echo "Está tocando? " . ($this->getTocando() ? "SIM" : "NÃO") . "<br>";
        echo "Volume: " . $this->getVolume() . "<br>";
        for($i = 0; $i <= $this->getVolume(); $i+=10) {
            echo "|";
        }
        echo "<br>";
    }

    public function fecharMenu(){
        echo "Fechando menu...<br>";
    }

    public function maisVolume(){
        if($this->getLigado()){
            $this->setVolume($this->getVolume() + 1);
        }
    }

    public function menosVolume(){
        if($this->getLigado()){
            $this->setVolume($this->getVolume() - 1);
        }
    }

    public function ligarMudo(){
        if($this->getLigado() && $this->getVolume() > 0){
            $this->setVolume(0);
        }
    }

    public function desligarMudo(){
        if($this->getLigado() && $this->getVolume() == 0){
            $this->setVolume(50);
        }
    }

    public function play(){
        if($this->getLigado() && !$this->getTocando()){
            $this->setTocando(true);
        }
    }

    public function pause(){
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Projeto Controle Remoto</h1>
    <?php
    $c = new ControleRemoto();
    $c->ligar();
    $c->abrirMenu();
    ?>
</body>
</html>