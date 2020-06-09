<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script>
            function validarSenha(){
                var senha = document.FormSenha.HTML_senha.value;
                var confSenha = document.FormSenha.HTML_confsenha.value;
                
                if(senha != confSenha){
                    alert("As senhas não conferem.");
                    document.FormSenha.HTML_senha.focus();
                    return false;
                }
                
                
                return true;
                
            }
        </script>
    </head>

    <body>   
        <div class="container">
            <center>
                <div class="col-md-6 border"style="margin-top:100px;">
                    <form action="../Control/UsuariosControl.php" method="post" name="FormSenha" onsubmit="return validarSenha();">
                        <p>
                            Preencha corretamente os dados abaixo para efetuar o cadastro no sistema
                        </p>

                        <div class="form-group">
                            <input type="text" name="HTML_nome" placeholder="Nome Completo" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="HTML_email" placeholder="Digite seu e-mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="HTML_senha" placeholder="Digite sua senha" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="HTML_confsenha" placeholder="Confirme a senha" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="HTML_telefone" placeholder="Telefone (apenas números)" class="form-control">
                        </div>

                        <div class="form-group" style="text-align:right;">
                            <input type = "hidden" name="acao" value="2">
                            <button type="submit" class="btn btn-primary">Cadastrar Dados</button> 
                        </div>
                    </form>
                </div>
            </center>
        </div>

    </body>   


</html>