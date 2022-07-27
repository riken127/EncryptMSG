<?php
echo "MMMMMMMMMMMKc.  .;lool;.  .cKMMMMMMMMMMM\n";
echo "MMMMMMMMMM0,                ,0MMMMMMMMMM\n";
echo "MMMMMMMMMX:                  :XMMMMMMMMM\n";
echo "MMMMMWNKOc.                  .cOKXWMMMMM\n";
echo "MMNkl;..                        ..;lkNMM\n";
echo "MWd.                                .dWM\n";
echo "MMXkl;..                        ..;lkNMM\n";
echo "MMMMMWNk. .:olcc::::::::cclo:. .kNWMMMMM\n";
echo "MMMMMMMX; .kWMMMMWkllkWMMMMWk. ;XMMMMMMM\n";
echo "MMN0OOOk;  .lxkkxc.  .cxkkxl.  :kOOO0NMM\n";
echo "MWd.                                .dWM\n";
echo "MMO'                                'OMM\n";
echo "MMWx.      ..              ..      .xWMM\n";
echo "MMMNo.    .lOxc'        'cdOl     .oNMMM\n";
echo "MMMMX:     ,KMMNk'    'kNMMK,     :XMMMM\n";
echo "MMWKl.     .dWMMWx.  .xWMMWd.     .lKWMM\n";
echo "MNd.        ,KMMWo    oWMMK,        .dNM\n";
echo "Xc          .dWM0,    ,KMWo           cX\n";
echo "l            ,KWo     .dW0,            l\n";
echo ".            .d0,      ,0o             .\n";
echo "              ';       .;'              \n";
echo "                                        \n";
echo "c.                                    .c\n\n";

    echo "\n Introduza a string desejada\n\n";
    $string = fopen("php://stdin", "r"); //input

    $no = fgets($string);

    echo "\n A string dá como resultado(PASSWORD_BCRYPT):\n".password_hash($no, PASSWORD_BCRYPT);
    echo "\n A string dá como resultado(PASSWORD_DEFAULT):\n".password_hash($no, PASSWORD_DEFAULT);

?>