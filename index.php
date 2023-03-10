<?php
session_start();

use Core\Helpers\Fake;
use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

// This code will run only at the first time of using the app.
Fake::is_first_time();
// For public access

Router::get('/', 'front.index'); // Display home.php
Router::get('/front/item', 'front.single'); // Display home.php

// For web administrators
Router::get('/login', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form

// athenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard

// athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of items (HTML)
Router::get('/item', "items.single"); // Displays single item (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the items (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the items (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the item (PHP)

// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single item (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the item (PHP)



Router::redirect();
