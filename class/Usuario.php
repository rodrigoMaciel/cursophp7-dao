<?php 

class Usuario
{
		private $idusuario;
		private $desclogin;
		private $descsenha;
		private $dtcadastro;

		public function getIdusuario()
		{
			return $this->idusuario;
		}

		public function setIdusuario($value)
		{
			$this->idusuario = $value;
		}

		public function getDesclogin()
		{
			return $this->desclogin;
		}

		public function setDesclogin($value)
		{
			$this->desclogin = $value;
		}

		public function getDescsenha()
		{
			return $this->descsenha;
		}

		public function setDescsenha($value)
		{
			$this->descsenha = $value;
		}

		public function getDtcadastro()
		{
			return $this->dtcadastro;
		}

		public function setDtcadastro($value)
		{
			$this->dtcadastro = $value;
		}

		public function loadById($id)
		{
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
					":ID"=>$id
			));

			if (isset($results[0])) {
				$row = $results[0];

				$this->setIdusuario($row['idusuario']);
				$this->setDesclogin($row['desclogin']);
				$this->setDescsenha($row['descsenha']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));
			}
		}

		public static function getList()
		{
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY desclogin");

		}

		public static function search($login)
		{
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios WHERE desclogin LIKE :SEARCH ORDER BY desclogin", array(":SEARCH"=>"%".$login."%"));
		}

		public function login($login, $password)
		{
			$sql = new Sql();

				$results = $sql->select("SELECT * FROM tb_usuarios WHERE desclogin = :LOGIN AND descsenha = :PASSWORD", array(
						":LOGIN"=>$login,
						"PASSWORD"=>$password
				));

				if (isset($results[0])) {
					$row = $results[0];

					$this->setIdusuario($row['idusuario']);
					$this->setDesclogin($row['desclogin']);
					$this->setDescsenha($row['descsenha']);
					$this->setDtcadastro(new DateTime($row['dtcadastro']));
				} else
				{
					throw new Exception("Login e/ou senha inválidos");
					
				}
		}

		public function __toString()
		{
			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"desclogin"=>$this->getDesclogin(),
				"descsenha"=>$this->getDescsenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			));
		}
}

 ?>