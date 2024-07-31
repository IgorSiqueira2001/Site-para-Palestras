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
                    <a href="CadaCurso.php" class="a"><button type="button" class="btn btn-success">Cursos</button></a>
                    <a href="FrontEnd.php" class="a"><button type="button" class="btn btn-success">Home</button></a>
                    <a href="CadaOutro.php" class="a"><button type="button" class="btn btn-success">Outros</button></a>
                </div>
                </div>
                <?php 
                        require_once("Config.php");
                        use Modelo\Palestra;

                        $Palestra = new Palestra();
                        if(isset($_POST["enviar"])){
                            $valor = $_POST["enviar"];
                            if($valor=="Procurar"){
                                $idpalestra = $_POST['id'];                         
                                $Palestra = Palestra::getPalestraCodigo($idpalestra);
                            }
                        }

                        if(isset($_GET["id"])){
                            $id = $_GET["id"];                     
                            $Palestra = Palestra::getPalestraCodigo($idpalestra);
                           
                        }
                ?>
                <br>
                <div class="container">
                    <div id="body">
                    <form action="CadaPalestra.php" method="POST">
                        <label>Informe o ID da palestra:</label>
                        <input type="number" name="id" value="<?=$Palestra->id?>"><br>
                        <label>Informe o titulo da palestra:</label>
                        <input type="text" name="titulo" value="<?=$Palestra->titulo?>"><br>
                        <label>Informe a data da palestra:</label>
                        <input type="text" name="data" value="<?=$Palestra->data?>"><br>
                        <label>Informe a hora da palestra:</label>
                        <input type="text" name="hora" value="<?=$Palestra->hora?>"><br>
                        <label>Informe o palestrante:</label>
                        <input type="text" name="palestrante" value="<?=$Palestra->palestrante?>"><br>
                        <input type="submit" class="btn btn-success" name="enviar" value="Enviar">
                        <input type="submit" class="btn btn-success" name="enviar" value="Alterar">
                        <input type="submit" class="btn btn-success" name="enviar" value="Excluir">
                        <input type="submit" class="btn btn-success" name="enviar" value="Procurar">
                        <input type="submit" class="btn btn-success" name="enviar" value="Listar">
                    </form>
                </div>
                </div>
        </div>

        <?php            
            if(isset($_POST["id"])){
               
                $Palestra = new Palestra();
                $Palestra->id = $_POST["id"];
                $Palestra->titulo = $_POST["titulo"];
                $Palestra->data = $_POST["data"];
                $Palestra->hora =$_POST["hora"];
                $Palestra->palestrante =$_POST["palestrante"];
                $op = $_POST["enviar"];

                if($op == 'Enviar'){
                    $Palestra->cadastrar();   
                }

                elseif($op == 'Alterar'){
                    $Palestra->alterar();
                }

                elseif($op == 'Excluir'){
                    $Palestra->excluir();
                }

                else{
                    $palestra=Palestra::listar();
                    include_once("Include/ListagemPalestra.php");
                }
            }            
        ?>

    </body>
</html>

