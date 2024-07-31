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
                        <a href="CadaAluno.php" class="a"><button type="button" class="btn btn-success">Aluno</button></a>
                        <a href="FrontEnd.php" class="a"><button type="button" class="btn btn-success">Home</button></a>
                        <a href="CadaPalestra.php" class="a"><button type="button" class="btn btn-success">Palestras</button></a>
                        <a href="CadaOutro.php" class="a"><button type="button" class="btn btn-success">Outros</button></a>
        </div>
        <?php 
            require_once("Config.php");
            use Modelo\Curso;

            $Curso = new Curso();
            if(isset($_POST["enviar"])){
                $valor = $_POST["enviar"];
                if($valor=='Procurar'){
                    $id = $_POST['idcurso'];                         
                    $Curso = Curso::getCursoCodigo($id);
                }
            }

            if(isset($_GET["idcurso"])){
                $id = $_GET["idcurso"];                     
                $Curso = Curso::getCursoCodigo($id);
            }
        ?>
        <br>
        <div class="container" id="body">
            <form action="CadaCurso.php" method="POST">
                <label>Informe o ID do Curso:</label>
                <input type="number" name="idcurso" value="<?=$Curso->idcurso?>"><br>
                <label>Informe o nome do curso:</label>
                <input type="text" name="nome" value="<?=$Curso->nome?>"><br>
                <label>Informe a cargahoraria do curso:</label>
                <input type="text" name="cargahoraria" value="<?=$Curso->cargahoraria?>"><br>
                <input type="submit" class="btn btn-success" name="enviar" value="Enviar">
                <input type="submit" class="btn btn-success" name="enviar" value="Alterar">
                <input type="submit" class="btn btn-success" name="enviar" value="Excluir">
                <input type="submit" class="btn btn-success" name="enviar" value="Procurar">
                <input type="submit" class="btn btn-success" name="enviar" value="Listar">
            </form>
        </div>

                <?php                   
                    if(isset($_POST["idcurso"])){
                        $Curso = new Curso();
                        $Curso->idcurso = $_POST["idcurso"];
                        $Curso->nome = $_POST["nome"];
                        $Curso->cargahoraria = $_POST["cargahoraria"];
                        $op = $_POST["enviar"];

                        if($op == 'Enviar'){
                            $Curso->cadastrar(); 
                        }
                        elseif($op == 'Alterar'){
                            $Curso->alterar();
                        }
                        elseif($op == 'Excluir'){
                            $Curso->excluir();
                        }
                        else{
                            $curso=Curso::listar();
                            include_once("Include/ListagemCurso.php");
                        }

                    }            
                ?>
        </div>
    </body>
</html>

