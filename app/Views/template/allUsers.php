<?php echo view('template/menu/adminMenu');?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Equipe Tecnica</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
	<table class="table mt-4">
	    <thead class="thead-dark">
			<tr>
			    <th scope="col">Nº</th>
                <th scope="col">Tecnico</th>
                <th scope="col">Cargo</th>
                <th scope="col">Nivel</th>
                <th scope="col">Ações</th> 
			</tr>
		</thead>
		<tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <th scope="row"><?php echo $user->id ?></th>
                    <td><?php echo $user->nome ?></td>
                    <td><?php echo $user->cargo?></td>
                    <td><?php echo $user->nivel ?></td>
                    <td class="text-right">
                        <a href="editar.html" class="btn btn-dark">Editar</a>
                        <a href="">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
		</tbody>
	</table>
</main>
<?php echo view('template/footer');?>