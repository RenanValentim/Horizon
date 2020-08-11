<!-- Carrega o template header da pasta template-->
<?php echo view('template/headerLogin')?>

<div class="sidenav">
    <div class="login-main-text">
        <h2>Cadastre-se</h2>
        <p>Realize seu cadastro para poder continuar</p>
    </div>
</div>
<div class="main">
    
    <form action="login/validaCadastro" method="POST">
        <div class="col-md-6 col-sm-12">
            <div class="register-form">
                <form>
                    <div class="form-group">
                        <label><b>Insira seu Nome e Sobrenome</b></label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                    </div>
		            <div class="form-group">
                        <label><b>Insira sua Filial</b></label>
                        <input type="text" name="filial" class="form-control" placeholder="Filial">
                    </div>
                    <div class="form-group">
                        <label><b>Insira seu Cargo</b></label>
                        <input type="text" name="cargo" class="form-control" placeholder="Cargo">
                    </div>
                    <div class="form-group">
                        <label><b>Insira seu Telefone</b></label>
                        <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                    </div>
                    <div class="form-group">
                        <label><b>Insira um Email</b></label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label><b>Insira sua Senha</b></label>
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                    <a href="/login" class="btn btn-dark">Voltar</a>
                </form>
            </div>
        </div>
        <div class="listErro">
            <?php echo \Config\Services::validation()->listErrors()?>
        </div>
    </form>
</div>