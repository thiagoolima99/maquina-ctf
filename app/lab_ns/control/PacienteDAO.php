<?php 
  
  include "GenericDAO.php";

  class PacienteDAO extends GenericDAO{
    
   public function CadastroPaciente($nome,$telefone,$cpf,$cep,$endereco){

      $verify = parent::selectAll("SELECT nome FROM paciente WHERE cpf='$cpf'")->rowCount();

      if($verify == 0){

         $query = "INSERT INTO paciente (nome, telefone, endereco, emissao, statusp, cpf,cep) 
               VALUES('$nome','$telefone','$endereco',now(),'S','$cpf','$cep')";

         return parent::saveAll($query);

      } else {
         return false;
      }
   
   }

   public function ConsultaPaciente(){
      return parent::selectAll("SELECT * FROM paciente");
   }

   public function IdPaciente($idp){
      return parent::select("SELECT * FROM paciente WHERE idpaciente = ?",[1 => $idp ]);
   }

   public function AtualizaPaciente($cep,$endereco,$status,$id){
      
      $query =  "UPDATE paciente SET cep = '$cep', endereco = '$endereco', statusp = '$status'
                  WHERE idpaciente = $id";

      return parent::updateAll($query);
   }

}
?>



