# Chat Server API

A simple chat server with just two endpoints.

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

## Requests

### Create chat message
    curl --location --request POST 'http://localhost:8000/api/v1/chat' \
    --header 'Content-Type: application/json' \
    --data-raw '{
    "user": "joe",
    "timestamp": "2020-8-23 10:13:22",
    "message": "hi"
    }'
    
    {
        "user": "bob",
        "timestamp": "2020-8-23 10:13:22",
        "message": "hello",
        "updated_at": "2021-08-23T07:51:43.000000Z",
        "created_at": "2021-08-23T07:51:43.000000Z",
        "id": 1
    }

### Read chat message
    curl --location --request GET 'http://localhost:8000/api/v1/chat/user/joe/timestamp/2020-8-31'

    [
        {
            "id": 2,
            "user": "joe",
            "timestamp": "2020-08-23 10:13:23",
            "message": "hi",
            "created_at": "2021-08-24T21:35:56.000000Z",
            "updated_at": "2021-08-24T21:35:56.000000Z"
        }
    ]
