#!/usr/bin/env bash
echo "[INFO] Initialise a new TYPO3 project";
docker-compose up -d --build;
echo "[INFO] Waiting 15 sec for the database to start...";
sleep 15;
echo "[INFO] Installing TYPO3";
docker-compose exec typo3 /bin/bash -c "touch public/FIRST_INSTALL";
docker-compose exec typo3 /bin/bash -c "composer install";
docker-compose exec typo3 /bin/bash -c "chown -R www-data:www-data .";
echo "[INFO] Import database schema";
docker-compose exec typo3 /bin/bash -c "vendor/bin/typo3cms database:updateschema";
echo "[INFO] Create admin user";
docker-compose exec typo3 /bin/bash -c "vendor/bin/typo3cms backend:createadmin --username=admin --password=12345678";
echo "[INFO] Project is ready";
