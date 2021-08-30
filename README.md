# Invoy Backend engineering assignment
Design a simple chat server with just two endpoints.

The first endpoint allows a client to submit a single chat message. Parameters should include a user, timestamp and the chat message.

The second endpoint can be used to retrieve the previous chat log up to a timestamp for a given user, with parameters for the user and the timestamp. Feel free to use any language or stack but be prepared to explain your solution and design choices. Adding persistence to your chat server is a plus.

## Getting Started

Copy .env.example to .env

### Start up

    docker-compose --env-file .env up --build

### Connect to bash

    docker-compose exec lumen sh
    docker exec -ti `docker ps | grep chat-server_lumen | awk '{ print $1}'` sh

### Run migration

    php artisan migrate

### Connect to database

    docker-compose exec db sh
    docker exec -ti `docker ps | grep mysql:8.0 | awk '{ print $1}'` mysql -uadmin -psecret
    mysql -uroot -proot

### Curl host

    curl localhost:8000