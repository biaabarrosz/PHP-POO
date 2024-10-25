<?php

class Pessoa {
    private $nome;
    private $idade;
    private $sexo;

    public function fazerAniver(){
        $this->idade++;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getIdade(){
        return $this->idade;
    }
    public function setIdade($idade){
        $this->idade = $idade;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function __construct($no, $id){
        $this->setNome($no);
        $this->setIdade($id); 
    }
}

class Livro implements Publicacao {
    private $titulo;
    private $autor;
    private $totPaginas;
    private $pagAtual;
    private $aberto;
    private $leitor;

    public function detalhes() {
        echo "Título: " . $this->getTitulo() . "<br>";
        echo "Autor: " . $this->getAutor() . "<br>";
        echo "Total de Páginas: " . $this->getTotPaginas() . "<br>";
        echo "Página Atual: " . $this->getPagAtual() . "<br>";
        echo "Leitor: " . $this->getLeitor()->getNome() . "<br>";
    }

    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getTotPaginas(){
        return $this->totPaginas;
    }
    public function setTotPaginas($totPaginas){
        $this->totPaginas = $totPaginas;
    }
    public function getPagAtual(){
        return $this->pagAtual;
    }
    public function setPagAtual($pagAtual){
        $this->pagAtual= $pagAtual;
    }
    public function getAberto(){
        return $this->aberto;
    }
    public function setAberto($aberto){
        $this->aberto = $aberto;
    }
    public function getLeitor(){
        return $this->leitor;
    }
    public function setLeitor($leitor){
        $this->leitor = $leitor;
    }
    public function abrir(){
        $this->aberto = true;
    }
    public function fechar(){
        $this->aberto = false;
    }
    public function folhear($p){
        if($p > $this->totPaginas){
            $this->pagAtual = 0;
        } else {
            $this->pagAtual = $p;
        }
    }
    public function avancarPag(){
        $this->pagAtual++;
    }
    public function voltarPag(){
        $this->pagAtual--;
    }
    public function __construct($ti, $au, $lei, $tp){
        $this->setTitulo($ti);
        $this->setAutor($au); 
        $this->setLeitor($lei);
        $this->setTotPaginas($tp);
        $this->setPagAtual(0); // Inicia na primeira página
        $this->fechar(); // O livro começa fechado
    }
}

interface Publicacao {
    public function abrir();
    public function fechar();
    public function folhear($p);
    public function avancarPag();
    public function voltarPag();
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
    $P1 = new Pessoa("Bianca", 20);
    $L1 = new Livro("Acotar", "Sarah J Maas", $P1, 400);

    $L1->detalhes();
    echo"<br>";
    print_r($P1);
    ?>
</body>
</html>
