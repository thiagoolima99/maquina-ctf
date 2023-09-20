<?php 
  
  include "GenericDAO.php";

  class AtendimentoDAO extends GenericDAO{
    
    public function ConsultaAtendimento(){
        return parent::selectAll("SELECT * FROM atendimento");
    }

    public function PacienteAtendimento($idp){
        $query = "SELECT nome FROM paciente WHERE idpaciente = $idp";
        $row = parent::selectAll($query)->fetch(PDO::FETCH_OBJ);
        $nome = $row->nome;
        return $nome;
    }

    public function DadosPaciente($cpf){
      $query = "SELECT idpaciente, nome FROM paciente WHERE cpf = $cpf";
      return parent::selectAll($query);
    }

    public function CadastroAtendimento($pac,$desc,$usuario){
      
      $query = "INSERT INTO atendimento (emissao, idpaciente, usuario, descprontuario) 
               VALUES(NOW(),'$pac','$usuario','$desc')";

      return parent::saveAll($query);
   }

   public function CadastroAtendimentoArquivo($pac,$desc,$usuario,$prontuario){
    
    $desc = $desc ?? 'base';

    $query = "INSERT INTO atendimento (emissao, idpaciente, usuario, descprontuario,prontuario) 
             VALUES(NOW(),'$pac','$usuario','$desc','$prontuario')";

    return parent::saveAll($query);
 }

   public function IdAtendimento($id){
    return parent::select("SELECT * FROM atendimento WHERE idatendimento = ?",[1 =>$id ]);
   }

   public function AtualizaAtendimento($at, $desc){

    $query =  "UPDATE atendimento SET descprontuario = '$desc' WHERE idatendimento = $at";
    
    return parent::updateAll($query);
 }


  }
?>



