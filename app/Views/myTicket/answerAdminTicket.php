<?php echo view('template/menu/adminMenu');?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Responder Ticket</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    
    <?php foreach($chamado as $ch)?>

    <div class="container">
		<div class="row">
			<div class="col-8 m-auto">
			
				<div class="row">
					<div class="col mb-3">
						<h1 class="display-4 text-center">Chamado N°<?php echo $ch->id ?></h1><br>
						<div class="alert alert-success d-none mb-0" role="alert">0</div>
					</div>
                  </div>

                  <div class="row">

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Usuário</strong>
                            </div>
                            <div class="card-body">
                            <?php echo $ch->nome ?>
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Status</strong>
                            </div>
                            <div class="card-body">
                                <?php echo label_status($ch->status) ?>
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Data</strong>
                            </div>
                            <div class="card-body">
                              <?php echo date('d/m/Y H:i:s', strtotime($ch->data_criacao)); ?>
                            </div>
                          </div>
                    </div>

                  </div><!-- .row -->
                  
                  <div class="card mt-3">
                    <div class="card-header">
                      <strong>Título</strong>
                    </div>
                    <div class="card-body">
                        <?php echo $ch->titulo ?>
                    </div>
                  </div>

                  <div class="card mt-3">
                    <div class="card-header">
                      <strong>Descrição</strong>
                    </div>
                    <div class="card-body">
                      <?php echo $ch->descricao ?>
                    </div>

                  </div><!-- .row -->

<div class="text-center mt-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success m-auto btn-lg" data-toggle="modal" data-target="#exampleModal">
        Responder e atualizar Chamado
    </button>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Responder e atualizar Chamado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form action="" method="POST">

                <div class="form-row">
                    <div class="col-12 mb-2">
                      <label for="" class="">Resposta</label>
                      <textarea name="txtResposta" class="form-control form-control-lg" style="min-height: 250px;" placeholder="Resposta"></textarea>
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="col-12 mb-2">
                        <label for="" class="">Status</label>
                        <select name="txtStatus" class="form-control form-control-lg">
                          <option value=""></option>
                          <option value="Pendente">Pendente</option>
                          <option value="Aguardando">Aguardando</option>
                          <option value="Resolvido">Resolvido</option>
                          <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                  </div>

                <div class="form-row">
                  <div class="col-12 col-md-8">
                    <button class="btn btn-dark w-100 mt-3" id="btnInsert">Atualizar</button>
                  </div>

                  <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-danger w-100 mt-3" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>

              </form>

        </div><!-- .modal-body -->
      </div>
    </div>
  </div>




                  
                  <hr>

                  <h3 class="mb-3">Histórico</h3>

                  <!-- inicio repetição -->

                  <div class="row">

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Usuário Resposta</strong>
                            </div>
                            <div class="card-body">
                                Fabricio
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Status</strong>
                            </div>
                            <div class="card-body">
                                <span class="badge badge-success w-100">Resolvido</span>
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Data</strong>
                            </div>
                            <div class="card-body">
                                13/04/2020 15h30
                            </div>
                          </div>
                    </div>

                  </div><!-- .row historico chamados -->

                  <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <strong>Resposta</strong>
                    </div>
                    <div class="card-body">
                        A expressão Lorem ipsum em design gráfico e editoração é um texto padrão em latim utilizado na produção gráfica para preencher os espaços de texto em publicações para testar e ajustar aspectos visuais antes de utilizar conteúdo real
                    </div>
                  </div>

                  <!-- fim repetição -->

                  <!-- inicio repetição -->

                  <div class="row">

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Usuário Resposta</strong>
                            </div>
                            <div class="card-body">
                                Fabricio
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Status</strong>
                            </div>
                            <div class="card-body">
                                <span class="badge badge-warning w-100">Pendente</span>
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                              <strong>Data</strong>
                            </div>
                            <div class="card-body">
                                13/04/2020 15h30
                            </div>
                          </div>
                    </div>

                  </div><!-- .row historico chamados -->

                  <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <strong>Resposta</strong>
                    </div>
                    <div class="card-body">
                        A expressão Lorem ipsum em design gráfico e editoração é um texto padrão em latim utilizado na produção gráfica para preencher os espaços de texto em publicações para testar e ajustar aspectos visuais antes de utilizar conteúdo real
                    </div>
                  </div>

                  <!-- fim repetição -->
			
			</div>
		</div><!-- .row -->
    </div><!-- .container -->

</main>

<?php echo view('template/footer');?>