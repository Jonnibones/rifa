<?php

    session_start();

    //Verifica se os números foram selecionados e/ou se o usuário está logado e executa as ações de acordo com o status do usuário
    if(isset($_SESSION['numeros']) and isset($_SESSION['dados_user']))
    {
        header('Location:http://localhost/rifa2/pagamento');
    }
    else
    {
        $_SESSION['sweet'] = true;
        header("Location:http://localhost/rifa2/rifas?id=".$_GET['id']."&cont=".$_GET['cont']); 
    }

?>