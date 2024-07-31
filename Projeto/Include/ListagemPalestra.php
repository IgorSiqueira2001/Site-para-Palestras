<?php
    
    $resultados="";

    foreach($palestra as $p){
        $resultados.='<tr>';
        $resultados.='<td>'.$p->id.'</td>
                      <td>'.$p->titulo.'</td>
                      <td>'.$p->data.'</td>
                      <td>'.$p->hora.'</td>
                      <td>'.$p->palestrante.'</td>

                      <td>
                         <a href="CadaPalestra.php?id='.$p->id.'">
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
                <td>Título</td>
                <td>Data</td>
                <td>Hora</td>
                <td>Palestrante</td>
               </tr>
            </thead>
      
        <tbody>
             <?=$resultados?>
        </tbody>
       </table>

   </section>    
</div>
</main>