<?php

$arquivo = $_FILES['arquivo'];


if (isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {

    $nomearquivo = md5(time()) . rand(0, 99).'.pdf';
    move_uploaded_file($arquivo['tmp_name'], 'arquivos/' . $nomearquivo);

    echo "Arquivo enviado com sucesso!!!";


}
