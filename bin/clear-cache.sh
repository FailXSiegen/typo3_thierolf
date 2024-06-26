#!/usr/bin/env bash
echo "[INFO] Clearing TYPO3 cache and fix folder structure";
docker-compose exec typo3 /bin/bash -c "php vendor/bin/typo3 cache:flush"
docker-compose exec typo3 /bin/bash -c "php vendor/bin/typo3 install:fixfolderstructure"
docker-compose exec typo3 /bin/bash -c "chown -R www-data:www-data var/*"
