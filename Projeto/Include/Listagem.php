<?php
    
    $resultados="";

    foreach($aluno as $a){
        $resultados.='<tr>';
        $resultados.='<td>'.$a->idaluno.'</td>
                      <td>'.$a->nome.'</td>
                      <td>'.$a->endereco.'</td>
                      <td>'.$a->cidade.'</td>
                      <td>'.$a->UF.'</td>
                      <td>'.$a->cep.'</td>

                      <td>
                         <a href="CadaAluno.php?idaluno='.$a->idaluno.'">
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
                <td>Endereço</td>
                <td>Cidade</td>
                <td>UF</td>
                <td>Cep</td>
               </tr>
            </thead>
      
        <tbody>
             <?=$resultados?>
        </tbody>
       </table>

   </section>    
</div>
</main>