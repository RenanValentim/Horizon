<?php namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\View\Exceptions\ViewException;

class Login extends BaseController
{
	public function index()
	{
		return view('login/login');
	}
    
    public function cadastro()
	{
		return view('login/cadastro');
	}

	public function acessoMain()
	{
		$dados = \Config\Services::session()->get('nivel');

		if($dados == 1)
		{
			return view('template/main/adminMain');
		}	

		if($dados == 2)
		{
			return view('template/main/tecMain');
		}

		if($dados == 3)
		{
			return view('template/main/userMain');
		}		
		
	}

	public function validaCadastro()
	{
		helper('form');

		$validation = \Config\Services::validation();

		$validation->setRules([
			'nome' => ['label' => 'Nome', 'rules' => 'required'],
			'filial' => ['label' => 'Filial', 'rules' => 'required'],
			'cargo' => ['label' => 'Cargo', 'rules' => 'required'],
			'nome' => ['label' => 'Nome', 'rules' => 'required'],
			'telefone' => ['label' => 'Telefone', 'rules' => 'required|min_length[12]'],
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
			'senha' => ['label' => 'Senha', 'rules' => 'required']
		]);

		if(! $validation->withRequest($this->request)->run())
		{
			return view('login/cadastro');
			
		}else{

			$senha = password_hash(
				$this->request->getPost('senha'),
				PASSWORD_DEFAULT,
				['cost' => 8]
			);

			$data = [
				'nome' => $this->request->getPost('nome'),
				'filial' => $this->request->getPost('filial'),
				'telefone' => $this->request->getPost('telefone'),
				'email' => $this->request->getPost('email'),
				'senha' => $senha,
				'nivel' => '3',
				'cargo' => $this->request->getPost('cargo')
			];

			$LoginModel = new LoginModel();

			if($LoginModel->save($data)){
				$this->session->setFlashdata('sucesso', 'Cadastro realizado com sucesso');
			}else{
				$this->session->setFlashdata('erro', 'Não foi possivel realizar o cadastro!');
			}
			return redirect()->to('/');
		}
	}

	public function validaLogin()
	{
		helper('form');

		$validation = \Config\Services::validation();

		$validation->setRules([
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
			'senha' => ['label' => 'Senha', 'rules' => 'required']
		]);

		if(! $validation->withRequest($this->request)->run())
		{
			return view('login/login');
			
		}else{
			
			$senha = $this->request->getPost('senha');
			$LoginModel = new LoginModel();

			$data = $LoginModel->where('email', $this-> request->getPost('email'))->find();

			if(count($data) == 0 OR count($data) > 1){
				$this->session->setFlashdata('erro','Email ou senha errado');
				return redirect()->to('/login');
			}

			if(password_verify($senha,$data[0]->senha)){
				
				$session = [
					'id' => $data[0]->id,
					'nome' => $data[0]->nome,
					'email' => $data[0]->email,
					'nivel' => $data[0]->nivel,
					'cargo' => $data[0]->cargo,
					'logged_in' => true
				];

				$this->session->set($session);

				return redirect()->to('/main');				

			}else{

				$this->session->setFlashdata('erro','Email ou senha errado');
				return redirect()->to('/login');
			
			}
		}	
	}

	public function equipeTecnica()
	{

		$sql = "SELECT * FROM users WHERE nivel = 2";
		
		$query = $this->db->query($sql);

		$data = [
			'users' => $query->getResult()
		];

		return view('template/techTeam',$data);
	}

	public function todosUsuarios()
	{
		$sql = "SELECT * FROM users";
		
		$query = $this->db->query($sql);

		$data = [
			'users' => $query->getResult()
		];

		return view('template/allUsers',$data);
	}

	public function exit()
	{
		$this->session->destroy();
		return view('login/login');
	}
}
