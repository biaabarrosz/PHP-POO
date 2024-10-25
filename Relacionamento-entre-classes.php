<?php
Interface Pessoa {
    public function Apresentar();
    public function status();
    public function ganharLuta();
    public function perderLuta();
    public function empatarLuta();
}

class Lutador implements Pessoa{
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNacionalidade(){
        return $this->nacionalidade;
    }
    public function setNacionalidade($nacionalidade){
        $this->nacionalidade = $nacionalidade;
    }
    public function getIdade(){
        return $this->idade;
    }
    public function setIdade($idade){
        $this->idade= $idade;
    }
    public function getAltura(){
        return $this->altura;
    }
    public function setAltura($altura){
        $this->altura= $altura;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->peso = $peso;
        $this->setCategoria();
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria(){
        if ($this->getPeso() < 52.2){
            $this-> categoria = "inválido";
        }
        elseif ($this->getPeso()<= 70.3){
            $this-> categoria = "categoria: LEVE";
        } 
        elseif ($this->getPeso()<=83.9){
            $this-> categoria = "categoria: MÉDIO";
        }
        elseif($this->getPeso()<=120.2){
            $this->categoria = "categoria: PESADO";
        } else {
            $this->categoria = "Inválido";
        }
    }
    public function getVitorias(){
        return $this->vitorias;
    }
    public function setVitorias($vitorias){
        $this->vitorias = $vitorias;
    }
    public function getDerrotas(){
        return $this->derrotas;
    }
    public function setDerrotas($derrotas){
        $this->derrotas = $derrotas;
    }
    public function getEmpates(){
        return $this->empates;
    }
    public function setEmpates($empates){
        $this->empates = $empates;
    }
    public function __construct($no, $na, $id, $al, $pe, $vi, $de, $em){
        $this->setNome($no);
        $this->setIdade($id);
        $this->setAltura($al);
        $this->setPeso($pe);
        $this->setVitorias($vi);
        $this->setDerrotas($de);
        $this->setEmpates($em);
    }
    public function ganharLuta(){
        $this->setVitorias($this->getVitorias() + 1);
    }
    public function perderLuta(){
        $this->setDerrotas($this->getDerrotas() + 1);
    }
    public function empatarLuta(){
        $this->setEmpates($this->getEmpates() + 1);
    }
    public function apresentar(){
        echo"Lutador: ".$this->getNome();
        echo"Origem: ".$this->getNacionalidade();
        echo"Idade: ".$this->getIdade();
        echo $this->getAltura()." m de altura";
        echo "Pesando ".$this->getPeso()." KG";
        echo "Ganhou: ".$this->getVitorias();
        echo "Perdeu: ".$this->getDerrotas();
        echo "Empatou: ".$this->getEmpates();
        echo "<br>";
    }
    public function status(){
        echo $this->getNome();
        echo "É um peso ".$this->getCategoria();
        echo $this->getVitorias()." vitórias";
        echo $this->getDerrotas()." derrotas";
        echo $this->getEmpates()." empates";
    }
}
class Luta{
    private $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;

    public function getDesafiado(){
        return $this->desafiado;
    }
    public function setDesafiado($desafiado){
        $this->desafiado = $desafiado;
    }
    public function getDesafiante(){
        return $this->desafiante;
    }
    public function setDesafiante($desafiante){
        $this->desafiante = $desafiante;
    }
    public function getRounds(){
        return $this->round;
    }
    public function setRounds($rounds){
        $this->rounds = $rounds;
    }
    public function getAprovada(){
        return $this->aprovada;
    }
    public function setAprovada($aprovada){
        $this->aprovada = $aprovada;
    }

    public function marcarLuta($primeiro, $segundo){
        if($primeiro->getCategoria() == $segundo->getCategoria() && $primeiro != $segundo){
            $this->aprovada = true;
            $this->desafiado = $primeiro;
            $this->desafiante = $segundo;
        } else {
            $this->aprovada = false;
            $this->desafiado = null;
            $this->desafiante = null;
        }
    }
    public function lutar(){
        if ($this->aprovada = true){
            $this->desafiado->apresentar();
            $this->desafiante->apresentar();
            $vencedor = rand(0,2);
            switch($vencedor){
                case 0:
                echo "Empatou!";
                $this->desafiado->empatarLuta();
                $this->desafiante->empatar();
                break;

                case 1:
                     echo $this->desafiado->getNome()." ganhou!";
                     $this->desafiado->ganharLuta();
                     $this->desafiante->perderLuta();
                break;

                case 2:
                    echo $this->desafiante->getNome()." ganhou!";
                    $this->desafiante->ganharLuta();
                    $this->desafiado->perderLuta();
            }
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
    <?php
    $primeiro = new Lutador("Pretty Boy", "França", 31, 1.75, 68.9, 11, 2, 1);
    $primeiro->status();

    $segundo = new Lutador("Rod", "Brasil", 29, 1.80, 67.3, 14, 5, 3);
    $segundo->status();

    $UEC01 = new Luta();
    $UEC01->marcarLuta($primeiro, $segundo);
    $UEC01->lutar();
    ?>
</body>
</html>
