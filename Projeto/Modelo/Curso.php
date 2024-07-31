<?php

    namespace Modelo;

    use \Banco\Database;
    use \PDO;

    class Curso{
        public $idcurso;
        public $nome;
        public $cargahoraria;

        public function cadastrar(){
            $objDatabase = new Database('curso');
            $idcurso = $objDatabase->insert([
                'idcurso' => $this->idcurso,
                'nome' => $this->nome,
                'cargahoraria' => $this->cargahoraria,
            ]);
        }

        public function excluir(){
            return (new Database('curso'))->delete('idcurso=' . $this->idcurso);
        }

        public function alterar(){
            return(new Database('curso'))->update('idcurso=' . $this->idcurso, [
                'idcurso' => $this->idcurso,
                'nome' => $this->nome,
                'cargahoraria' => $this->cargahoraria,
            ]);
        }

        public function listar($where=null, $order=null, $limit=null){
            return(new Database('curso'))->select($where, $order, $limit)
            ->fetchALL(PDO::FETCH_CLASS, self::class);
        }

        public static function getCursoCodigo($id)
        {
            return (new Database('curso'))->select('idcurso=' . $id)
                ->fetchObject(self::class);
        }
    }
?>