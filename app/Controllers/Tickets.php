<?php namespace App\Controllers;

use \App\Models\ChamadoModel;

class Tickets extends BaseController
{
	public function abreChamado()
	{
		$dados = \Config\Services::session()->get('nivel');

		if($dados == 1)
		{
			return view('openTicket/adminTicket');
		}	

		if($dados == 2)
		{
			return view('openTicket/tecTicket');
		}

		if($dados == 3)
		{
			return view('openTicket/userTicket');
		}		
	}

	public function meusChamados()
	{
		$dados = \Config\Services::session()->get('nivel');

		$id = $this->session->get('id');
		$sql = "SELECT * FROM chamados WHERE id_usuario = {$id}";
		
		$query = $this->db->query($sql);

		$data = [
			'chamados' => $query->getResult()
		];

		if($dados == 1)
		{
			return view('myTicket/myAdminTicket',$data);
		}	

		if($dados == 2)
		{
			return view('myTicket/myTecTicket',$data);
		}

		if($dados == 3)
		{
			return view('myTicket/myUserTicket',$data);
		}		
	}

	public function todosChamados()
	{

		$sql = "SELECT * FROM chamados";
		
		$query = $this->db->query($sql);

		$data = [
			'chamados' => $query->getResult()
		];
		
		return view('myTicket/allTickets',$data);
	}

	public function cadastraChamado()
	{
		helper('form');

		$validation = \Config\Services::validation();

		$validation->setRules([
			'txtTitulo' => ['label' => 'Titulo', 'rules' => 'required'],
			'txtDescricao' => ['label' => 'Descricao', 'rules' => 'required']
		]);

		if(! $validation->withRequest($this->request)->run())
		{
			echo view('openTicket/userTicket');
			
		}else{
			
			$dataCriacao = date('Y-m-d H:i:s');
			$idUsuario =  $this->session->get('id');

			$data = [
				'id_usuario' => $idUsuario,
				'titulo' =>$this->request->getPost('txtTitulo'),
				'descricao' => $this->request->getPost('txtDescricao'),
				'dataCricao' => $dataCriacao,
				'status' => 'Pendente'
			];

			$ChamadoModel = new ChamadoModel();

			if($ChamadoModel->save($data)){
				$idChamado = $ChamadoModel->InsertID();

				$historico = [
					'id_chamado' => $idChamado,
					'id_usuario' => $idUsuario,
					'resposta' => '',
					'status' => 'Pendente',
					'data_criacao' => $dataCriacao
				];

				$builder = $this->db->table('historico');
				$builder->insert($historico);

				$this->session->setFlashdata('sucesso','Chamado cadastrado com sucesso. Numero do chamado: id_chamado');
			}else{
				$this->session->setFlashdata('erro','Não foi possivel realizar o cadastro do chamado!!');
			}

			return redirect()->to('/ticket');
		}
	}

	public function responderAdmin($id)
	{	
		$ChamadoModel = new ChamadoModel();
					
		$chamado = $ChamadoModel->select('chamados.id, chamados.titulo, chamados.descricao, chamados.data_criacao, chamados.status, users.nome')
								->join('users', 'users.id = chamados.id_usuario')
								->where('chamados.id', $id)
								->find();

		$data = [
			'chamado' => $chamado
		];

		return view('myTicket/answerAdminTicket',$data);
	}

	public function responderTec($id)
	{	
		$ChamadoModel = new ChamadoModel();
		
		$chamado = $ChamadoModel->select('chamados.id, chamados.titulo, chamados.descricao, chamados.data_criacao, chamados.status, users.nome')
								->join('users', 'users.id = chamados.id_usuario')
								->where('chamados.id', $id)
								->find();

		$data = [
			'chamado' => $chamado
		];

		return view('myTicket/answerTecTicket',$data);
	}

	public function responderUser($id)
	{	
		$ChamadoModel = new ChamadoModel();
		$idUsuario = $this->session->get('id');
		
		$chamado = $ChamadoModel->select('chamados.id, chamados.titulo, chamados.descricao, chamados.data_criacao, chamados.status, users.nome')
								->join('users', 'users.id = chamados.id_usuario')
								->where('chamados.id', $id)
								->where('chamados.id_usuario', $idUsuario)
								->find();

		$data = [
			'chamado' => $chamado
		];

		return view('myTicket/answerUserTicket',$data);
	}
}
