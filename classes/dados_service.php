<?php


class ImportaDados {
  private $conexao;
  private $dadosUsuario;

  public function __construct($conexao, $dadosUsuario) {
      $this->conexao = $conexao->conectar();
      $this->dadosUsuario = $dadosUsuario;
     

      
  }
  private function gerarCodigo(){
    try {
      $data = new DateTime();
      $ano = $data->format("Y");
      $sql = "SELECT MAX(SUBSTRING_INDEX(protocolo,'/',1)) as seq_numerica
           FROM ouvidoria WHERE protocolo LIKE :ano";
      $stmt = $this->conexao->prepare($sql);
      $stmt->bindValue(":ano","%/".$ano);
      $stmt->execute();
      if($stmt->rowCount() > 0){
          $retorno = $stmt->fetch();
          $id_ouvidoria = (int) $retorno['seq_numerica'];
          if($id_ouvidoria > 0){
            $id_ouvidoria++;
            return str_pad($id_ouvidoria,(4),"0", STR_PAD_LEFT)."/".$ano;
          }else
            return str_pad(1,(4),"0", STR_PAD_LEFT)."/".$ano;
      }
    } catch (PDOException $ex) {
      echo "Ouvidoria->Problema ao gerar número do protocolo";
      exit;
    }
  }

  public function Inserir() {   //create
    $protocolo =  $this->gerarCodigo();
        $query = "INSERT INTO ouvidoria (
            protocolo, nome, cpf, rg, email, cep, logradouro, numero, complemento, bairro, uf, pais, telefone_ddd, telefone_numero, celular_ddd, celular_numero, mensagem)VALUES (:protocolo, :nome, :cpf, :rg, :email, :cep, :logradouro, :numero, :complemento, :bairro, :uf, :pais, :telefone_ddd, :telefone_numero, :celular_ddd, :celular_numero, :mensagem)";
            
   

   $stmt = $this->conexao->prepare($query);

    
    $stmt->bindValue(':protocolo', $protocolo);
    $stmt->bindValue(':nome', $this->dadosUsuario->__get('nome'));
    $stmt->bindValue(':cpf', $this->dadosUsuario->__get('cpf'));
    $stmt->bindValue(':rg', $this->dadosUsuario->__get('rg'));
    $stmt->bindValue(':email', $this->dadosUsuario->__get('email'));
    $stmt->bindValue(':cep', $this->dadosUsuario->__get('cep'));
    $stmt->bindValue(':logradouro', $this->dadosUsuario->__get('logradouro'));
    $stmt->bindValue(':numero', $this->dadosUsuario->__get('numero'));
    $stmt->bindValue(':complemento', $this->dadosUsuario->__get('complemento'));
    $stmt->bindValue(':bairro', $this->dadosUsuario->__get('bairro'));
    $stmt->bindValue(':uf', $this->dadosUsuario->__get('uf'));
    $stmt->bindValue(':pais', $this->dadosUsuario->__get('pais'));
    $stmt->bindValue(':telefone_ddd', $this->dadosUsuario->__get('telefone_ddd'));
    $stmt->bindValue(':telefone_numero', $this->dadosUsuario->__get('telefone_numero'));
    $stmt->bindValue(':celular_ddd', $this->dadosUsuario->__get('celular_ddd'));;
    $stmt->bindValue(':celular_numero', $this->dadosUsuario->__get('celular_numero'));
    $stmt->bindValue(':mensagem', $this->dadosUsuario->__get('mensagem'));
    
  
    $stmt->execute();
    
    return $protocolo;
     
  }
  public function consultar($protocolo) {
    try {
      $sql = "SELECT * FROM ouvidoria WHERE protocolo = :protocolo";
      $stmt = $this->conexao->prepare($sql);
      $stmt->bindValue(":protocolo", $protocolo);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return $stmt->fetch();
      }
      //echo "Dados não localizado";
      $test = header('Location: index.html');
     

    } catch (PDOException $ex) {
      return false;
    }
  }

}


?>

