<<<<<<< HEAD
<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('info.html', []);
=======
<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('info.html', []);
>>>>>>> efba46876a1d77ba8b06926a03f314919d4e38cf
?>