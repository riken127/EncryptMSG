<?php 
  session_start();

  if (isset($_SESSION['username'])) {

  	include 'app/db.conn.php';
  	include 'app/helpers/user.php';

  	$user = getUser($_SESSION['username'], $conn);

  	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EncryptMSG - Definições de <?=$user['name']?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="css/style.css">
	<link rel="stylesheet" 
	      href="css/override.css">
	<link rel="stylesheet" 
	      href="css/master.css">
	<link rel="icon" href="img/user-secret-solid.svg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/d7e729f164.js" crossorigin="anonymous"></script>
	        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">

    <div class="p-2 w-650
                rounded shadow p-5 mb-10 bg-white rounded">

    	<div>
    		<div class="d-flex
    		            mb-3 p-3 bg-light.bg-gradient
			            justify-content-between
			            align-items-center">
    			<div class="d-flex
    			            align-items-center">
     	<a href="home.php"
    	   class="fs-4 link-dark">&#8592;</a>&nbsp; &nbsp;
				<i class="fa-solid fa-gears fa-2x"></i>
                				&nbsp; &nbsp;
                <h5>Definições de <?=$user['name']?></h5>
    			</div>

				&nbsp;
    		</div>
							  				<?php if (isset($_GET['Error'])) { ?>
	 			<div class="alert alert-warning" role="alert">
			  	<?php echo htmlspecialchars($_GET['Error']);} ?>
						  </div>

<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Alterar Nome de Utilizador</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Alterar Foto de Perfil</button>
    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Alterar Palavra-passe</button>
  </div>

<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">

	<div>
			
            <div class="bg-light.bg-gradient
                    justify-content-between
    		        align-items-center">

					<form action="app/http/settings-username.php" method="POST">

				</div>
					<p>Username Atual:&nbsp;<b> <?=$user['username']?></b></p>
					
  					<div class="col-xs-6">
    					<input type="text" class="form-control" id="InputUsername" placeholder="Nome de Utilizador" name="username" value="">
						<input type="hidden" id="currentUsername" name="currentUsername" value="<?=$user['name']?>">
						<input type="hidden" id="userID" name="userID" value="<?=$user['user_id']?>">
  					</div>
  		</div>
		  <br>

		  			<div class="d-flex align-items-end flex-column">
						  <button type="submit" 
		          value="submit" name="submit" class="btn btn-outline-dark justify-content-end" >
				  <i class="fa-solid fa-floppy-disk"></i>
		          </button>
		</form>

	</div>
	
</div>

<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
					<form action="app/http/settings-pp.php" method="POST" enctype="multipart/form-data">
			<div class="input-group">
				<div class="d-flex align-items-center flex-column">

				<img src="uploads/<?=$user['p_p']?>"
     				class="w-15 rounded-circle">
					<h4>Imagem</h4>
  					<label class="btn btn-outline-dark" for="upload">
    					<input id="upload" type="file" class="d-none" name="uploadpp">
    						<i class="fa-solid fa-upload"></i>
						</label>
  				</div>
		</div>	
					<br>
					<div class="d-flex align-items-end flex-column">
					<input type="hidden" id="userID" name="userID" value="<?=$user['user_id']?>">
					<input type="hidden" id="currentUsername" name="currentUsername" value="<?=$user['username']?>">
		        	<button type="submit" 
		          value="submit" name="submit" class="btn btn-outline-dark justify-content-end" >
				  <i class="fa-solid fa-floppy-disk"></i>
		          </button>
		</form>										
				</div>

</div>


<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
					<form action="app/http/settings-password.php" method="POST">
	<div>
			<div class="d-flex
                    bg-light.bg-gradient
                    justify-content-between
    		        align-items-center">
					<div class="col-xs-4">

    					<input name="password"type="password" class="form-control" id="palavraPasse" aria-describedby="passwordHelp" placeholder="Palavra-passe">
						<br>
						<input name="confPassword"type="password" class="form-control" id="confirmarPalavraPasse" aria-describedby="passwordHelp" placeholder="Confirmar Palavra-passe">

  					</div>

</div>
					<br>
					<div class="d-flex align-items-end flex-column">
							<input type="hidden" id="userID" name="userID" value="<?=$user['user_id']?>">
					<input type="hidden" id="currentUsername" name="currentUsername" value="<?=$user['name']?>">
							<button type="submit" 
							value="submit" name="submit" class="btn btn-outline-dark justify-content-end" >
							<i class="fa-solid fa-floppy-disk"></i>
							</button>
		</form>				

</div>
</div>
</div>

</div>

</body>
</html>
<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>