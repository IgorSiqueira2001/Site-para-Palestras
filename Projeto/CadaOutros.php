<!DOCTYPE html>
<html>
    <head>
        <style>
            .a{
                color: white;
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
                    <a href="CadaAluno.php" class="a"><button type="button" class="btn btn-success">Aluno</button></a>
                    <a href="CadaCurso.php" class="a"><button type="button" class="btn btn-success">Cursos</button></a>
                    <a href="CadaPalestra.php" class="a"><button type="button" class="btn btn-success">Palestras</button></a>
                    <a href="FrontEnd.php" class="a"><button type="button" class="btn btn-success">Home</button></a>
                </div>
                <div class="container">
                    <form action="CadaAluno.php" method="POST">
                        <label>Informe o ID do Curso:</label>
                        <input type="number" name="idcurso" value=""><br>
                        <label>Informe o nome do curso:</label>
                        <input type="text" name="nome" value=""><br>
                        <label>Informe a cargahoraria do curso:</label>
                        <input type="text" name="cargahoraria" value=""><br>
                        <input type="submit" class="btn btn-success" name="enviar" value="enviar">
                    </form>
                </div>
        </div>

        <?php
            require_once("Config.php");

            use Modelo\Curso;
            
            if(isset($_POST["idcurso"])){
                $Curso = new Curso();
                $Curso->idcurso = $_POST["idcurso"];
                $Curso->nome = $_POST["nome"];
                $Curso->cargahoraria =$_POST["cargahoraria"];
                $Curso->cadastrar();
            }            
        ?>

    </body>
</html>

