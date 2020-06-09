<meta charset="utf-8">

<?php
require_once "../Model/Projetos.php";
require_once "../Model/Tarefas.php";
require_once "../DAO/ProjetosDAO.php";
require_once "../DAO/TarefasDAO.php";
session_start();

$proj = $_GET['proj'];
$tar = $_GET['cod'];

$tmpTarefa = TarefasDAO::consultarTarefa($tar);
$tmpProjeto = ProjetosDAO::consultarProjeto($proj);

$responsavel = $tmpProjeto->getEmailUsuario();
$responsavelTar = $tmpTarefa->getEmailUsuario();

if ($tmpTarefa->getStatus() == 0) {
    $status = "Incompleta";
} else {
    $status = "Finalizada";
}
?>
<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
 <?php
            include "NavTopoUI.php";
        ?>      
        <div class="container" style="margin-top: 10px;">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4><?=$tmpProjeto->getNome();?></h4>
                </div>
                <div class="card-body">

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5> <?= $tmpTarefa->getNome(); ?> - <?= ProjetosDAO::corrigirData($tmpTarefa->getData()); ?> </h5>                       
                        </div>
                        <div class="card-body">

                            <?= $tmpTarefa->getDescricao(); ?><br>
                            Status: <b><?= $status; ?></b>                            
                            <?php
                            if($_SESSION['email'] ==  $responsavel){
                            ?>
                            <a href="../Control/TarefasControl.php?acao=5&tar=<?=$tar?>&proj=<?=$proj?>" class="btn btn-danger float-right">
                                Excluir Tarefa
                            </a>
                            <a href="../Control/TarefasControl.php?acao=3&tar=<?=$tar?>&status=<?=$tmpTarefa->getStatus();?>&proj=<?=$proj?>" class="btn btn-warning float-right">
                                Alterar Status
                            </a>
                            <?php
                            }                       
                            ?>
                            
                        </div>                               
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-success text-white">
                                     Enviar Mensagem 
                                </div>
                                <div class="card-body">
                                    
                                    <form action="../Control/UsuariosControl.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="HTML_email" value="<?=$responsavelTar?>">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="HTML_msg" class="form-control"></textarea>
                                        </div> 
                                        <div class="form-group">
                                            <input type="hidden" name="acao" value="5">
                                            <button type="submit" class="form-control btn btn-primary">Enviar</button>
                                        </div> 
                                    </form>                                    
                                                               
                                </div>                               
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-warning text-white">
                                    Arquivos
                                </div>
                                <div class="card-body">
                                    <?php
                                        $arquivos = TarefasDAO::listarArquivos($tar);
                                    ?>   
                                    <div class="row">
                                    <?php    for($i=0; $i<count($arquivos); $i++){?>
                                        
                                            <div class ="col-md-3 text-center">
                                                <a href="../../files/<?=$arquivos[$i]->getNome();?>" target="_blank">
                                                    <i class="fa fa-file fa-2x"></i> 
                                                    <br>
                                                <?=$arquivos[$i]->getNome();?>                                                    
                                                </a>
                                                <a href="../Control/TarefasControl.php?acao=4&proj=<?=$proj;?>&tar=<?=$tar;?>&arq=<?=$arquivos[$i]->getCodigo();?>">
                                                    <i class="fa fa-times fa-lg text-danger"></i>
                                                </a>
                                            </div>
                                    
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <hr>
                                    <form action="EnviaArquivoUI.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" class="form-control-sm" name="HTML_arquivo">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="proj" value="<?=$proj ?>">
                                            <input type="hidden" name="tar" value="<?=$tar?>">
                                            <button type="submit" class="btn btn-dark text-white">
                                                Enviar
                                            </button>
                                        </div>
                                            
                                    </form>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>

</html>
