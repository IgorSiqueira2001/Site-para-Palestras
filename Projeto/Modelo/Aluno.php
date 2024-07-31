<?php

    namespace Modelo;

    use \Banco\Database;
    use \PDO;
    
    class Aluno{
        public $idaluno;
        public $nome;
        public $endereco;
        public $cidade;
        public $UF;
        public $cep;

        public function cadastrar(){
            $objDatabase = new Database('aluno');
            $idaluno = $objDatabase->insert([
                'idaluno' => $this->idaluno,
                'nome' => $this->nome,
                'endereco' => $this->endereco,
                'cidade' => $this->cidade,
                'UF' => $this->UF,
                'cep' =>$this->cep,
            ]);
        }

        public function excluir(){
            return (new Database('aluno'))->delete('idaluno=' . $this->idaluno);
        }

        public function alterar(){
            return(new Database('aluno'))->update('idaluno=' . $this->idaluno, [
                'idaluno' => $this->idaluno,
                'nome' => $this->nome,
                'endereco' => $this->endereco,
                'cidade' => $this->cidade,
                'UF' => $this->UF,
                'cep' =>$this->cep,
            ]);
        }
        
        public function listar($where=null, $order=null, $limit=null){
            return(new Database('aluno'))->select($where, $order, $limit)
            ->fetchALL(PDO::FETCH_CLASS, self::class);
        }

        public static function getAlunoCodigo($id)
        {
            return (new Database('aluno'))->select('idaluno=' . $id)
                ->fetchObject(self::class);
        }
    }
?>