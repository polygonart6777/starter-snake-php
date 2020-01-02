# starter-snake-php

A simple [Battlesnake AI](http://battlesnake.io) written in PHP. 

Visit [https://github.com/battlesnakeio/community/blob/master/starter-snakes.md](https://github.com/battlesnakeio/community/blob/master/starter-snakes.md)
for API documentation and instructions for running your AI.

This is a bare-bones PHP Battlesnake AI with no frameworks or external dependencies.
[Composer](https://getcomposer.org/) is recommended for PHP dependencies if you wish to include external libraries during development. 

A minimal `composer.json` file _is_ included in the project in order to enable deployments on Heroku.
[Heroku deployments](https://devcenter.heroku.com/articles/deploying-php) are configured to use the 
nginx webserver with all requests routed to the index.php file in the root of the project.

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

#### Requirements

* PHP 7.3 installed ([installation guide](https://www.colinodell.com/blog/201812/how-install-php-73)).  7.3 is the currently supported version on Heroku.
* Ability to [deploy PHP apps to Heroku](https://devcenter.heroku.com/articles/getting-started-with-php)

## Running the snake locally

1. [Fork this repo](https://github.com/battlesnakeio/starter-snake-php/fork).

1. Clone repo to your development environment:
    ```
    git clone git@github.com:<your github username>/starter-snake-php.git
    ```
1. Start the [PHP built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php):
    ```
    php -S localhost:8080
    ```
1. Test your snake by sending a POST request with a JSON body to it with cURL
    ```
    curl -XPOST -H 'Content-Type: application/json' -d '{"hello": "world"}' http://localhost:8080/start
    ```

## Deploying to Heroku

1. Create a new Heroku app:
    ```
    heroku create [APP_NAME]
    ```
1. Deploy code to Heroku servers:
    ```
    git push heroku master
    ```
1. Open Heroku app in browser:
    ```
    heroku open
    ```
    or visit [http://APP_NAME.herokuapp.com](http://APP_NAME.herokuapp.com).
1. View server logs with the `heroku logs` command:
    ```
    heroku logs --tail
    ```

## Questions?

Email [battlesnake@sendwithus.com](mailto:battlesnake@sendwithus.com), or tweet [@send_with_us](http://twitter.com/send_with_us).
