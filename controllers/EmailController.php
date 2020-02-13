<?php


class EmailController extends controller
{


    public function index()
    {
        if (!empty($_POST['email'])) {
            $dados = addslashes($_POST['email']);
            $endereco['email'] = $dados;
        }
        var_dump($endereco);
        $this->loadView('mail', $endereco);

        //  header("Location: " . BASE_URL);
    }
}
