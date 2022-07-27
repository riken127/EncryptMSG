<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncryptMSG - Ajuda</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="css/style.css">
	<link rel="stylesheet" 
	      href="css/override.css">
	<link rel="stylesheet" 
	      href="css/master.css">
  <link rel="stylesheet"
        href="css/style-landIn.css">
	<link rel="icon" 
        href="img/user-secret-solid.svg">
        
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/d7e729f164.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom 
                    shadow p-3 mb-5 bg-body rounded">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <i class="fa fa-user-secret fa-2xl" aria-hidden="true"></i>   EncryptMSG
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="landIn.php" class="nav-link px-2 link-secondary">Home</a></li> <!-- //! qual página estamos?  -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Download
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="download-nativo.php">Nativo</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="download-mobile.php">Mobile</a></li>
          </ul>
        </li>
        <li><a href="help.php" class="nav-link px-2 link-dark  fw-bold">Ajuda</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="index.php">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        </a>
<a href="signup.php">
        <button type="button" class="btn btn-primary">Registo</button>
</a>

      </div>
    </header>
  </div>
<br>
<br>
  <!-- //? Secção de apresentação -->
        <h1 class="fw-bold junteseanos-text">Precisa de ajuda?</h1>
<br>
<br>
<hr style="width:127px; margin: auto;" />
<br>
<br>
<br>
<br>
  <div class="container">
<div class="m-4 
            w-95
            my-auto">
    <div class="accordion" id="myAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">1. Como funciona a aplicação?</button>									
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <p>Crie uma conta, adicione um amigo, e comece uma conversa!</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">2. Como mandar mensagens?</button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <h4>Aplicação Desktop</h4>
                        <p>Execute a aplicação e faça login (ou registo se ainda não tiver conta). Adicione um utilizador ao qual queira mandar mensagem, selecione a text box e escreva a mensagem desejada, em seguida clique no butão com o avião de papel.</p>
                        <h4>Aplicação Web</h4>
                        <p>Entre no website e faça login com a sua conta clique com o butão esquerdo do rato na barra de pesquisa e escreva o nome do utilizador ao qual deseja mandar mensagem, em seguida clique no utilizador, selecione o utilizador na página home e mande a mensagem desejada.</p>
                        <h4>Aplicação Mobile</h4>
                        <p>Faça o download da aplicação mobile, em seguida abra a aplicação e faça login (isto se ainda não tiver uma conta) após isto adicione um utilizador e envie uma mensagem.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">3. Estou a obter um erro, o que devo fazer?</button>                     
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <p>Se um erro acontecer sem qualquer justificativa mande-nos um email, com uma screenshot do mesmo.</p>
                </div>
            </div>
        </div>
                <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseFour">4. Como trocar a palavra-passe/Nome de Utilizador/Foto de Perfil?</button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <p>
                      Após fazer login clique no ícone "<i class="fa-solid fa-gears fa-2x"></i>" após fazer isso, faça as atualizações desejadas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<hr style="width:127px; margin: auto;" />
<br>
<br>
    <!-- //* Fotter -->
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3">
    © 2022 Copyright:
    <a class="text-dark" href="#">EncryptMSG.net</a><br>
    <a class="text-dark" href="#">EncryptMSG@gmail.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>