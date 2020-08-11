<?php echo view('template/menu/userMenu');?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar novo Chamado</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <?php my_custon_errors() ?>

    <form action="Tickets/cadastraChamado" method="POST">			
        <div class="form-row">
            <div class="col-12 mb-2">
                <label for="" class="">Título</label>
                <input type="text" name="txtTitulo" class="form-control form-control-lg" placeholder="Titulo" value="" />
            </div>
        </div>

        <div class="form-row">
            <div class="col-12 mb-2">
                <label for="" class="">Descrição</label>
                <textarea name="txtDescricao" class="form-control form-control-lg" style="min-height: 300px;" placeholder="Descrição"></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="col-12 col-md-4 mx-auto text-center mt-3">
                <button class="btn btn-dark w-100" id="btnInsert">Cadastrar</button>
            </div>
        </div>
    </form>
</main>

<?php echo view('template/footer');?>