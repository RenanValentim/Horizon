<!-- Carrega o template header da pasta template-->
<?php echo view('template/headerLogin')?>

<div class="sidenav">
    <div class="login-main-text">
        <h2>Bem vindo</h2>
        <p>Realize o login para continuar ou Cadastre-se</p>
    </div>
</div>
<div class="main">
    
    <form action="login/validaLogin" method="POST">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <?php my_custon_errors() ?>
                <form>
                    <div class="form-group">
                        <label><b>Insira seu E-mail</b></label>
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label><b>Insira sua Senha</b></label>
                        <input type="password" name="senha"class="form-control" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-dark">Login</button>
                    <a href="/cadastro" class="btn btn-secondary">Cadastre-se</a>
                </form>
                
            </div>
        </div>
    </form>    
</div>