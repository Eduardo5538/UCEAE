<?php
    class clsInsert{
       
        private $titulo;
        private $modalidade;
        private $periodo;
        private $desc;
        private $preco;
        private $acessibilidade; 
        

        public function setValues($_titulo, $_modalidade, $_periodo, $_desc, $_preco, $_acessibilidade){
            include "../conection.php";
            $this->titulo = $_titulo;
            $this->modalidade = $_modalidade;
            $this->periodo = $_periodo;
            $this->desc = $_desc;
            $this->preco = $_preco;
            $this->acessibilidade = $_acessibilidade;
        }
        public function Inserir(){
            include "conection.php";
            $titulo = $this->titulo;
            $modalidade = $this->modalidade;
            $periodo = $this->periodo;
            $desc = $this->desc;
            $preco = $this->preco;
            $acessibilidade = $this->acessibilidade;
            
            try{
            $inserir = $conexao->prepare("insert into cursos (titulo, modalidade, periodo, descr, preco, acessibilidade, CNPJ) values (?,?,?,?,?,?,?)");
            $inserir->bindParam(1,$titulo);
            $inserir->bindParam(2,$modalidade);
            $inserir->bindParam(3,$periodo);
            $inserir->bindParam(4,$desc);
            $inserir->bindParam(5,$preco);
            $inserir->bindParam(6,$acessibilidade);
            $inserir->bindParam(7, $_SESSION['CNPJ']);


            $inserir->execute();
            if($inserir->rowCount() > 0)
            {
                $modalidade = "";
                $periodo = "";
                $desc = "";
                $preco = "";
                $acessibilidade = "";   
                return header("location:paginaInst.php");
            }
            // capturando um possível erro durando a realização do código
            else
            {
                return "Erro ao efetuar o cadastro dos cursos!";
            }
            }
            // capturando uma possível excessão no código
            catch(PDOException $erro)
            {
                $retorno = "$erro: ".$erro->getMessage();
            }
            return header("location:paginaInst.php");
        }
    }
?>