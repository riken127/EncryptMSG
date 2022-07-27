<?php  
session_start();

# verificar se o nome de utilizador e a palavra-passe foram recebidos no POST.
if(isset($_POST['username']) &&
   isset($_POST['password'])){

   # ficheiro de ligação à base de dados.
   include '../db.conn.php';
   
   # receber data do POST e guardar em duas variáveis.
   $password = $_POST['password'];
   $username = $_POST['username'];
   
   #verificar se os campos tão vazios.
   if(empty($username)){
      # String com mensagem de erro.
      $em = "O campo Nome de Utilizador é um campo de caráter obrigatório.";

      # redirecionar para a página 'index.php' com mensagem de erro.
      header("Location: ../../index.php?error=$em");
      exit;
   }else if(empty($password)){
      # String com mensagem de errro.
      $em = "O campo Palavra-passe é um campo de caráter obrigatório.";

      # redirecionar para a página 'index.php' com mensagem de erro.
      header("Location: ../../index.php?error=$em");
      exit;
   }else {
      $sql  = "SELECT * FROM 
               users WHERE username=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);

      # Verificar se o Nome de Utilizador Existe!
      if($stmt->rowCount() === 1){
        # Buscar os dados do utilizador
        $user = $stmt->fetch();

        # Verificar se ambos os nomes são exatamente iguais.
        if ($user['username'] === $username) {
           
           # Verificar a palavra-passe encriptada.
          if (password_verify($password, $user['password'])) {

            # Login efetuado com sucesso!
            # Criar a SESSION.
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_id'] = $user['user_id'];

            # Redirecionar para a página 'home.php'.
            header("Location: ../../home.php");

          }else {
            # String com mensagem de erro.
            $em = "Palavra-passe ou Nome de Utilizador incorreto(s)";

            # Redirecionar para o 'index.php' com mensagem de erro.
            header("Location: ../../index.php?error=$em"); 
            exit;
          }
        }else {
          # String com mensagem de erro.
          $em = "Palavra-passe ou Nome de Utilizador incorreto(s)";
          # Redirecionar para o 'index.php' com mensagem de erro.
          header("Location: ../../index.php?error=$em");
          exit;
        }
      } else {
        
        $em = "O Nome de Utilizador escrito não exite";

        header("Location: ../../index.php?error=$em");
        exit;
      }            
   }
}else {
  header("Location: ../../index.php");
  exit;
}