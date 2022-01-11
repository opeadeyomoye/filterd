<?php

/**
 * @var \Cake\Core\Container $container
 * @var \App\Application $this
 */

use App\Form\Form;
use App\Form\SignupForm;
use App\MongoDbClientFactory;
use Cake\Routing\Router;
use MongoDB\Database;

$request = Router::getRequest();

// Forms -- should probably move these to a `FormsServiceProvider` later
// make form objects injectable to controller methods.
$container->add(SignupForm::class);

// set request data on form objects so controller methods don't have to.
$container
    ->inflector(Form::class)
    ->invokeMethod('setData', [
        $request
            ? (array)($request->getData())
            : []
    ]);


/**
 * Other?
 */
$container->addShared(Database::class, fn () => MongoDbClientFactory::get());
