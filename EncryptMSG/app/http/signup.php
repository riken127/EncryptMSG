<?php  

# Verificar se o Nome de Utilizador, Palavra-passe e Nome foram submetidos com sucesso.
if(isset($_POST['username']) &&
   isset($_POST['password']) &&
   isset($_POST['name'])){

   # Ficheiro de Ligação à Base de Dados
   include '../db.conn.php';
   
   # Receber os dados através do método POST e guardá-los em variaveis
   $name = $_POST['name'];
   $password = $_POST['password'];
   $username = $_POST['username'];

   # Fazer URL com os dados
   $data = 'name='.$name.'&username='.$username;

   #	Validação do Formulário
   if (empty($name)) {
   	  # String com a mensagem de erro.
   	  $em = "O campo Nome é um campo de caráter obrigatório.";

   	  header("Location: ../../signup.php?error=$em");
   	  exit;
   }else if(empty($username)){
      # String com a mensagem de erro.
   	  $em = "O campo Nome de Utilizador é um campo de caráter obrigatório.";

   	  /*
    	Redirecionar para a página 'signup.php'
		com mensagem de erro, e com os campos introduzidos
      */
   	  header("Location: ../../signup.php?error=$em&$data");
   	  exit;
   }else if(empty($password)){
   	  # String com mensagem de erro.
   	  $em = "O campo Palavra-passe é um campo de caráter obrigatório.";

   	  /*
    	Redirecionar para a página 'signup.php'
    	com mensagem de erro, e com os campos introduzidos
      */
   	  header("Location: ../../signup.php?error=$em&$data");
   	  exit;
   }else {
   	  # Verificar se o campo Nome de Utilizador está em uso
   	  $sql = "SELECT username 
   	          FROM users
   	          WHERE username=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);

      if($stmt->rowCount() > 0){
      	$em = "O nome de utilizador ($username) já está em uso.";
      	header("Location: ../../signup.php?error=$em&$data");
   	    exit;
      }else {
      	# Upload da foto de perfil.
      	if (isset($_FILES['pp'])) {
      		# receber os dados e guardar em variáveis.
      		$img_name  = $_FILES['pp']['name'];
      		$tmp_name  = $_FILES['pp']['tmp_name'];
      		$error  = $_FILES['pp']['error'];

      		# se não ocorrer nenhum erro ao fazer o upload.
      		if($error === 0){
               
               # receber a extenção da imagem e guardar em uma variável.
      		   $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

            /* 
				converter a extenção da imagem em minusculas
				e guardar numa variavel.
			*/
				$img_ex_lc = strtolower($img_ex);

			/*
				array que contem 
				os tipos de extenções permitidas.
			*/
				$allowed_exs = array("jpg", "jpeg", "png");

			/*
				Verificar se a extenção da imagem
				está presente na variavel '$allowed_exs'
			*/
			

				if (in_array($img_ex_lc, $allowed_exs)) {
				/*
					Mudar o nome da imagem para o Nome do Utilizador
				*/
					$new_img_name = $username. '.'.$img_ex_lc;

					# Criar o caminho para o diretório upload.
					$img_upload_path = '../../uploads/'.$new_img_name;

					# mover a imagem para a pasta uploads
                    move_uploaded_file($tmp_name, $img_upload_path);
				}else {
					$em = "Não pode fazer upload deste tipo de arquivos!";
			      	header("Location: ../../signup.php?error=$em&$data");
			   	    exit;
				}

      		}
      	}

      	// password hashing
      	$password = password_hash($password, PASSWORD_DEFAULT);

      	# Se o utilizador fizer upload de uma Foto de Perfil.
      	if (isset($new_img_name)) {

      		# Fazer o insert dos dados na Base de Dados.
            $sql = "INSERT INTO users
                    (name, username, password, p_p)
                    VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username, $password, $new_img_name]);
      	}else { // se o utilizador não fizer...
            # Inserir dos dados na Base de Dados.
            $sql = "INSERT INTO users
                    (name, username, password)
                    VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username, $password]);
      	}

      	# Mensagem de Sucesso!
      	$sm = "Conta criada com sucesso!";

      	# Redirecionamento para a página 'index.php' com mensagem de sucesso.
      	header("Location: ../../index.php?success=$sm");
     	exit;
      }

   }	
}else {
	header("Location: ../../signup.php");
   	exit;
}	