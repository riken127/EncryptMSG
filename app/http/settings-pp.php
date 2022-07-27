<?php
/*
*Deletar a foto de perfil antiga.
*/
if (isset($_FILES['uploadpp']))
{

    include '../db.conn.php';
    $img_name = $_FILES['uploadpp']['name'];
    $tmp_name = $_FILES['uploadpp']['tmp_name'];
    $error = $_FILES['uploadpp']['error'];

    $user_id = $_POST['userID'];
    $username = $_POST['currentUsername'];
    if (empty($img_name))
    {
        $errorMessage = "É necessário fazer upload de uma imagem!";
        header("Location: ../../settings.php?Error=$errorMessage");
        exit;
    }
    
    if($error === 0)
    {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        //converter a extenção em minusculas
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs =  array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs))
        {

            $new_img_name = $username. '.'.$img_ex_lc;

            $img_upload_path = '../../uploads/'.$new_img_name;

            move_uploaded_file($tmp_name, $img_upload_path);

            $sql = "UPDATE users
                    SET p_p=?
                    WHERE user_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$new_img_name, $user_id]);

            $sql = "SELECT *
                    FROM users
                    WHERE user_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id]);
            if ($stmt->rowCount() > 0)
            {
                $user = $stmt->fetch();

                if ($user['p_p'] =! "user_default.png")
                {
                    echo $img_upload_path;
                    unlink($img_upload_path);
                }
            }
            session_start();

            session_unset();
            session_destroy();
            $Success = "A sua foto de perfil foi alterada com sucesso!";
            header("Location: ../../index.php?success=$Success");
            exit;
        }else {
            $errorMessage = "Não pode fazer upload desse tipo de arquivos";
            header("Location: ../../settings.php?Error=$errorMessage");
            exit;
        }
    }

}



?>