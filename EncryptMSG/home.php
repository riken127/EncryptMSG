<?php 
  session_start();

  if (isset($_SESSION['username'])) {
  	# ficheiro de ligação à base de dados
  	include 'app/db.conn.php';
	include 'app/crypto.php';
  	include 'app/helpers/user.php';
  	include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';

  	# receber dados do utilizador através do user.php
  	$user = getUser($_SESSION['username'], $conn);

  	#receber dados do utilizador através do conversations.php
  	$conversations = getConversation($user['user_id'], $conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EncryptMSG - Home</title>
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

</head>
<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
			 
    <div class="p-2 w-400
                rounded shadow-sm">
    	<div>
    		<div class="d-flex
    		            mb-3 p-3 bg-light.bg-gradient
			            justify-content-between
			            align-items-center">
    			<div class="d-flex
    			            align-items-center">
    			    <img src="uploads/<?=$user['p_p']?>"
    			         class="w-25 rounded-circle">
                    <h2 class="fs-xs m-3 h3"><?=$user['username']?></h2> 

    			</div>
				<a href="settings.php"
				   class="btn btn-light"><i class="fa-solid fa-gears"></i></a>
				&nbsp;
    			<a href="logout.php"
    			   class="btn btn-dark">Sair</a>
    		</div>

    		<div class="input-group mb-3">
    			<input type="text"
    			       placeholder="Procurar..."
    			       id="searchText"
    			       class="form-control">
    			<button class="btn btn-primary" 
    			        id="serachBtn">
    			        <i class="fa fa-search"></i>	
    			</button>       
    		</div>
    		<ul id="chatList"
    		    class="list-group mvh-50 overflow-auto">
    			<?php if (!empty($conversations)) { ?>
    			    <?php 

    			    foreach ($conversations as $conversation){ ?>
	    			<li class="list-group-item x-4 y-4">
	    				<a href="chat.php?user=<?=$conversation['username']?>"
	    				   class="d-flex
	    				          justify-content-between
	    				          align-items-center p-2">
	    					<div class="d-flex
	    					            align-items-center">
	    					    <img src="uploads/<?=$conversation['p_p']?>"
	    					         class="w-10 rounded-circle">
	    					    <h3 class="fs-xs m-2">
	    					    	<?=$conversation['name']?><br>
                      <small>
                        <?php 
                          echo  decryptthis(lastChat($_SESSION['user_id'], $conversation['user_id'], $conn), $key);
                        ?>
                      </small>
	    					    </h3>            	
	    					</div>
	    					<?php if (last_seen($conversation['last_seen']) == "Active") { ?>
		    					<div title="online">
		    						<div class="online"></div>
		    					</div>
	    					<?php } ?>
	    				</a>
	    			</li>
    			    <?php } ?>
    			<?php }else{ ?>
    				<div class="alert alert-info 
    				            text-center">
					   <i class="fa fa-comments d-block fs-big"></i>
                       Ainda não tem uma conversa, comece uma.
					</div>
    			<?php } ?>
    		</ul>
    	</div>
    </div>
	  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
      
      // procura
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // procura com botão
       $("#serachBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


      /** 
      
	  update do last seen do utilizador logado a cada 5 segundos
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      update a cada 10 segundos
      **/
      setInterval(lastSeenUpdate, 10000);

    });
</script>
</body>
</html>
<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>