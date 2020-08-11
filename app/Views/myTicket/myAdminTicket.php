<?php echo view('template/menu/adminMenu');?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meus Chamados</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
	<br>
	<table class="table mt-4">
	    <thead class="thead-dark">
			<tr>
			    <th scope="col">N°</th>
			    <th scope="col">Título</th>
			    <th scope="col">Data</th>
			    <th scope="col">Satus</th>
			    <th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($chamados as $chamado):?>
            <tr>
                <th scope="row"><?php echo $chamado->id ?></th>
                <td><?php echo $chamado->titulo?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($chamado->data_criacao));?></td>
                <td><span class="badge badge-warning w-100"><?php echo $chamado->status ?></span></td>
                <td class="text-right">
                    <a href="Tickets/responderAdmin/<?php echo $chamado->id ?>" class="btn btn-primary">Responder</a>
                    <a href="chamados/excluir/<?php echo $chamado->id ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
		</tbody>
	</table>
</main>
<?php echo view('template/footer');?>