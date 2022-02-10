#!/bin/bash

echo "--- building services ---"
docker-compose up -d

echo "--- installing frontend dependencies ---"
docker exec app.frontend bash -c "composer i; php artisan storage:link; chmod -R 777 storage"

echo "--- installing backend dependencies ---"
docker exec app.backend bash -c "composer i; php artisan migrate; chmod -R 777 storage"

echo "--- copy env ---"
cd frontend && cp .env.example .env
cd ../backend && cp .env.example .env

echo "done.. open browser at http://0.0.0.0:8088"
