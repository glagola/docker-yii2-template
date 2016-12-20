#!/bin/bash

if [ $# -eq 0 ]; then
    echo "No arguments provided"
    exit 1
fi

CONTAINER="$(docker ps -q -f "name=php-fpm")"

if [[ -z $CONTAINER ]]; then
  echo "Please start PHP container first"
  exit 1
fi

docker exec -it -u $(id -u):$(id -g) $CONTAINER php "$@"
