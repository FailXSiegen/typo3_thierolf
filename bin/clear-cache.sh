#!/usr/bin/env bash
echo "[INFO] Clearing TYPO3 cache and fix folder structure";
docker-compose exec typo3 /bin/bash -c "php vendor/bin/typo3cms cache:flush"
docker-compose exec typo3 /bin/bash -c "php vendor/bin/typo3cms install:fixfolderstructure"
docker-compose exec typo3 /bin/bash -c "chown -R www-data:www-data var/*"
