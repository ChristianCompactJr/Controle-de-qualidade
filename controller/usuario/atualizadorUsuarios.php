<?php
    include_once '../../model/Usuario.php';
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['usuario']) || $_SESSION['usuario']->getAdmin() == false)
    {
        die();
    }

    include_once '../../dao/UsuarioDAO.php';
    $dao = new UsuarioDAO();
    try
    {
        switch ($_POST['campo']) 
        {
            case 'login':
                $dao->AtualizarLogin($_POST['id'], $_POST['novo']);
                break;
            case 'nome':
                $dao->AtualizarNome($_POST['id'], $_POST['novo']);
                break;
            case 'email':
                $dao->AtualizarEmail($_POST['id'], $_POST['novo']);
                break;
                case 'senha':
                $dao->AtualizarSenha($_POST['id'], $_POST['novo']);
                break;
            case 'admin':
                $dao->AtualizarAdmin($_POST['id'], $_POST['novo']);
                break;
        }
        echo "sucesso";
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
?>