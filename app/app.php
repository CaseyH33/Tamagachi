<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagachi.php";

    session_start();

    if (empty($_SESSION['list_of_tamagachis'])) {
      $_SESSION['list_of_tamagachis'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app)
    {
      return $app['twig']->render('add_tamagachi.html.twig');
    });

    $app->post("/tamagachi", function() use ($app) {
      $tamagachi = new Tamagachi($_POST['tamagachi_name']);
      $tamagachi->save();
      return $app['twig']->render('tamagachis.html.twig', array('tamagachis' => Tamagachi::getAll()));
    });

    return $app;
?>
