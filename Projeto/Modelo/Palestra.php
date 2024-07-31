<?php

    namespace Modelo;

    use \Banco\Database;
    use \PDO;

    class Palestra{
        public $id;
        public $titulo;
        public $data;
        public $hora;
        public $palestrante;  
            
        public function cadastrar(){
            $objDatabase = new Database('palestra');
            $id = $objDatabase->insert([
                'id' => $this->id,
                'titulo' => $this->titulo,
                'data' => $this->data,
                'hora' => $this->hora,
                'palestrante' =>$this->palestrante,
            ]);
        }

        public function excluir(){
            return (new Database('palestra'))->delete('id=' . $this->id);
        }
           
        public function alterar(){
            return (new Database('palestra'))->update('id=' . $this->id,[
                'id' => $this->id,
                'titulo' => $this->titulo,
                'data' => $this->data,
                'hora' => $this->hora,
                'palestrante' =>$this->palestrante,
            ]);
        }

        public function listar($where=null, $order=null, $limit=null){
            return(new Database('palestra'))->select($where, $order, $limit)
            ->fetchALL(PDO::FETCH_CLASS, self::class);
        }

        public static function getPalestraCodigo($idpalestra)
        {
            return (new Database('palestra'))->select('id=' . $idpalestra)
                ->fetchObject(self::class);
        }
    }
?>