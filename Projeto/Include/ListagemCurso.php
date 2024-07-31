<?php
    
    $resultados="";

    foreach($curso as $c){
        $resultados.='<tr>';
        $resultados.='<td>'.$c->idcurso.'</td>
                      <td>'.$c->nome.'</td>
                      <td>'.$c->cargahoraria.'</td>

                      <td>
                         <a href="CadaCurso.php?idcurso='.$c->idcurso.'">
                            <button type="button" class="btn btn-primary">Editar</button>
                         </a></td>';
                        
        $resultados.='</tr>';
                      
    }

?>

<main>

    <div class="container">
    <section>
        <table class='table table-striped mt-3' >
            <thead><tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Carga Horária</td>
               </tr>
            </thead>
      
        <tbody>
             <?=$resultados?>
        </tbody>
       </table>

   </section>    
</div>
</main>