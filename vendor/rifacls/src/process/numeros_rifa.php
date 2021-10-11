<?php

    session_start(); 

    //Verifica se a variável passada está definida(se um número foi clicado)
    if(isset($_GET['num']))
    {
        //Variável recebe cada valor(número) passado via GET
        $_SESSION['numeros'][] = $_GET['num'];

        //Variáveis para mensagens de ação
        $_SESSION['msg-num'] = "Número selecionado!";
        $_SESSION['alert-num'] = "success";

        //Esvazia a variável passada via GET
        unset($_GET['num']);
    }

    //Verifica se a variável passada está definida(se o botão cancelar foi clicado)
    if(isset($_GET['cancelar']))
    {
        ////Verifica se a algum número não foi selecionado
        if(!isset($_SESSION['numeros']))
        {
            $_SESSION['msg-num'] = "Nenhum número selecionado!";
            $_SESSION['alert-num'] = "warning";
            
        }
        else
        {
            //Esvazia a variável com os números selecionados
            unset($_SESSION['numeros']);
            

            //Variáveis para mensagens de ação
            $_SESSION['msg-num'] = "Números cancelados!";
            $_SESSION['alert-num'] = "primary"; 
        }    
        
    }

    //Redireciona de volta para a mesma página com os mesmos valores via GET
    header("Location:http://localhost/rifa2/rifas?id=".$_GET['id']."&cont=".$_GET['cont']);

    

   

   
    
?>