<?php
    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../src/Tamagotchi.php';

    session_start();

    if(empty($_SESSION['pet'])) {
        $_SESSION['pet'] = NULL;
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__ . '/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('tamagotchi.html.twig', array( 'pet' => Tamagotchi::getPet() ));
    });

    $app->post('/tamagotchi', function() use ($app) {
        $tamagotchi = new Tamagotchi($_POST['name']);
        $tamagotchi->save();

        return $app->redirect('/');
    });

    $app->post('/delete', function() use ($app) {
        Tamagotchi::deletePet();

        return $app->redirect('/');
    });

    $app->post('/feed', function() use ($app) {
        $tamagotchi = Tamagotchi::getPet();
        $tamagotchi->setFood($tamagotchi->getFood() + 5);

        return $app->redirect('/');
    });

    $app->post('/play', function() use ($app) {
        $tamagotchi = Tamagotchi::getPet();
        $tamagotchi->setAttention($tamagotchi->getAttention() + 5);

        return $app->redirect('/');
    });

    $app->post('/sleep', function() use ($app) {
        $tamagotchi = Tamagotchi::getPet();
        $tamagotchi->setRest($tamagotchi->getRest() + 5);

        return $app->redirect('/');
    });

    $app->post('/time', function() use ($app) {
        $tamagotchi = Tamagotchi::getPet();
        $tamagotchi->setFood($tamagotchi->getFood() - 5);
        $tamagotchi->setAttention($tamagotchi->getAttention() - 5);
        $tamagotchi->setRest($tamagotchi->getRest() - 5);

        if ($tamagotchi->isDead()) {
            return $app['twig']->render('dead.html.twig', array( 'pet' => Tamagotchi::getPet() ));
        } else {
            return $app->redirect('/');
        }
    });


    return $app;
?>
