<?php

class Product {
    //propriedades 

    public $id;
    public $image;
    public $name;
    public $price;

        //método construtor

        function __construct ($id, $image, $nome, $price){
            $this->id = $id;
            $this->image = $image;
            $this->nome = $nome;
            $this->price = $price;



        }
            //Métodos (Funções)

        function setPrice($price){
            $this->price = $price;
        }


        function getPrice(){
            echo $this->price;
        }

        //Fim,criando nome

        function setName($name){
            $this->name = $name;
        }
        
        function getName(){
            echo $this->nome;
        }

        
}

?>