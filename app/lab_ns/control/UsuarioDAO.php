<?php 
  
  include "GenericDAO.php";

  class UsuarioDAO extends GenericDAO{
    
    //Consulta usuário
    public function VerificacaoUsuario($login, $senha){

      $senhav = md5($senha);

      $query =  "SELECT usuario FROM users WHERE usuario ='$login' AND senha = '$senhav'";
      
      $row = parent::selectAll($query);
      $count = $row->rowCount();
       
      return $count;
       
    }

   public function DadosUsuario($login, $senha){
      return parent::select("SELECT * FROM users WHERE usuario = ? AND senha = ?",[1 =>$login, 2=> md5($senha) ]);
   }

   public function ConsultaUsuario(){
      return parent::selectAll("SELECT id, usuario FROM users");
   }

   public function IdUsuario($id, $usuario){
      return parent::select("SELECT * FROM users WHERE usuario = ? AND id = ?",[1 =>$usuario, 2=> $id ]);
   }

   public function AtualizaUsuario($id, $senha){
      
      $senhat = md5($senha);

      $query =  "UPDATE users SET senha = '$senhat' WHERE id = $id";
      
      return parent::updateAll($query);
   }


   public function CadastroUsuario($usuario, $senha){
      
      $verify = parent::selectAll("SELECT usuario FROM users WHERE usuario='$usuario'")->rowCount();

      if($verify == 0){
         return parent::saveAll("INSERT INTO users (usuario, senha) VALUES('".$usuario."','".md5($senha)."')");
      } else {
         return false;
      }
   
   }

}
?>



