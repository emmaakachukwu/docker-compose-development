#!/bin/bash

docker-compose up -d

docker exec app.frontend composer i && php artisan storage:link && chmod -R 777 storage
docker exec app.backend composer i && php artisan migrate && chmod -R 777 storage

cd frontend && cp .env.example .env
cd backend && cp .env.example .env
