<?php

class DashboardController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache', 'auto_reload' => true,
        ]);
        $template = $twig->load('dashboard.html');

        $parameters['name'] = $_SESSION['user']['name'];

        return $template->render($parameters);
    }

    public function sair()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location:http://localhost/projetos/sistema-login');
    }
}
