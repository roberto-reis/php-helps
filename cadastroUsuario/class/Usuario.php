<?php

class Usuario {
    private $db;
    private $nome;
    private $email;
    protected $senha;

    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=usuarios", "root", "root");
        } catch(PDOException $e) {
            echo "ERRO: ".$e->getMessage();
            exit;
        }
        
    }

    public function setNome($nome){
        $this->nome = addslashes($nome);
    }
    public function getNome() {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = addslashes($email);
    }
    public function getEmail() {
        return $this->email;
    }
    
    public function setSenha($senha){
        $this->senha = md5(addslashes($senha));
    }
    public function getSenha() {
        return $this->senha;
    }

    // Metodo de cadastro
    public function insert() {
        $stm = $this->db->prepare(" SELECT email FROM usuarios WHERE email = :email ");
        $stm->bindValue(":email", $this->email);
        $stm->execute();
        
        if($stm->rowCount() > 0) {
            echo " Email já cadastrado! ";
        } else {
            $sql = " INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha) ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            
            if($sql->execute()) {
                $this->alert("alert-success", "Cadastro feito com sucesso!");
            } else {
                $this->alert("alert-danger", "Erro ao cadastrar!");
            }
        }

    }

    // Metodo encontrar um usuario
    public function find($id) {
        $sql = " SELECT * FROM usuarios WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    // Metodo encontar varios usuarios
    public function findAll() {
        $sql = " SELECT * FROM usuarios ";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo alterar usuarios
    public function update($id) {
        $sql = " UPDATE usuarios SET nome=:nome, email=:email WHERE id = :id ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $this->nome);
        $sql->bindValue(":email", $this->email);
        
        return $sql->execute();
    }

    // Metodo deletar usuario
    public function delete($id) {
        $sql = " DELETE FROM usuarios WHERE id = :id ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);

        return $sql->execute();
    }

    // Metodo fazer
    public function login() {
        $sql = " SELECT * FROM usuarios WHERE email=:email AND senha=:senha ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $this->email);
        $sql->bindValue(":senha", $this->senha);
        $sql->execute();

        if($sql->rowCount() > 0) {
            session_start();
            $sql = $sql->fetch();
            $_SESSION["logado"] = $sql["id"];
            header("Location: index.php");
            exit;
        } else {
            $this->alert("alert-danger", "E-mail e/ou senha não confere!");
        }

    }

    public function alert($type, $menssagem) {
        echo '<div class="alert '.$type.' alert-dismissible fade show" role="alert">
        '.$menssagem.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }


}




