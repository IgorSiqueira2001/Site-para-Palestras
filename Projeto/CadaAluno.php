<!DOCTYPE html>
<html>
    <head>
        <style>
            .a{
                color: white;
            }
            #body{
                background-color: lightblue;
                margin: 10px 20px;
                padding: 1px 20px;
                border-top: 7px solid black;
                border-bottom: 7px solid black;
                border-radius: 5px;
            }
            #btns{
                background-color: lightblue;
                margin: 10px 20px;
                padding: 1px 40px;
                border-top: 7px solid black;
                border-radius: 5px;
                
            }
            #lb1{
                margin-left: 48px;
            }
            #lb2{
                margin-left: 26px;
            }
            #lb3{
                margin-left: 20px;
            }
            #lb4{
                margin-left: 45px;
            }
            #lb5{
                margin-left: 40px;
            }
        </style>

        <meta charset="UTF-8">
        <title>Projeto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bs-dark" text-ligth>
    <div id="topo" class="container"></div>
    <div class="container">
        <div id="btns">
                    <a href="FrontEnd.php" class="a"><button type="button" class="btn btn-success">Home</button></a>
                    <a href="CadaCurso.php" class="a"><button type="button" class="btn btn-success">Cursos</button></a>
                    <a href="CadaPalestra.php" class="a"><button type="button" class="btn btn-success">Palestras</button></a>
                    <a href="CadaOutro.php" class="a"><button type="button" class="btn btn-success">Outros</button></a>
                </div>
        </div>
                <?php 
                        require_once("Config.php");
                        use Modelo\Aluno;

                        $Aluno = new Aluno();
                        if(isset($_POST["enviar"])){
                            $valor = $_POST["enviar"];
                            if($valor=="Procurar"){
                                $id = $_POST['idaluno'];                         
                                $Aluno = Aluno::getAlunoCodigo($id);
                            }
                        }

                        if(isset($_GET["idaluno"])){
                            $id = $_GET["idaluno"];                     
                            $Aluno = Aluno::getAlunoCodigo($id);
                           
                        }
                ?>
                <div class="container">
                <br>
                    <form action="CadaAluno.php" method="POST" id="body">
                        <label id="lb1">Informe o ID do Aluno:</label>
                        <input type="number" name="idaluno" value="<?=$Aluno->idaluno?>"><br>
                        <label id="lb2">Informe o nome do Aluno:</label>
                        <input type="text" name="nome" value="<?=$Aluno->nome?>"><br>
                        <label>Informe o endereco do Aluno:</label>
                        <input type="text" name="endereco" value="<?=$Aluno->endereco?>"><br>
                        <label id="lb3">Informe a cidade do Aluno:</label>
                        <input type="text" name="cidade" value="<?=$Aluno->cidade?>"><br>
                        <label id="lb4">Informe o UF do Aluno:</label>
                        <input type="text" name="UF" value="<?=$Aluno->UF?>"><br>
                        <label id="lb5">Informe o cep do Aluno:</label>
                        <input type="text" name="cep" value="<?=$Aluno->cep?>"><br>
                        <br>
                        <input type="submit" class="btn btn-success" name="enviar" value="Enviar">
                        <input type="submit" class="btn btn-success" name="enviar" value="Alterar">
                        <input type="submit" class="btn btn-success" name="enviar" value="Excluir">
                        <input type="submit" class="btn btn-success" name="enviar" value="Procurar">
                        <input type="submit" class="btn btn-success" name="enviar" value="Listar">
                    </form>
                </div>
        </div>

        <?php
          
            
            if(isset($_POST["idaluno"])){
                $Aluno = new Aluno();
                $Aluno->idaluno = $_POST["idaluno"];
                $Aluno->nome = $_POST["nome"];
                $Aluno->endereco =$_POST["endereco"];
                $Aluno->cidade =$_POST["cidade"];
                $Aluno->UF =$_POST["UF"];
                $Aluno->cep =$_POST["cep"];
                $op = $_POST['enviar'];

                if($op == 'Enviar'){
                    $Aluno->cadastrar(); 
                }

                elseif($op == 'Alterar'){
                    $Aluno->alterar();
                }

                elseif($op == 'Excluir'){
                    $Aluno->excluir();
                }

                else{
                    $aluno=Aluno::listar();
                    include_once("Include/Listagem.php");
                }
            }            
        ?>

    </body>
</html>

