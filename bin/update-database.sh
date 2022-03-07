#!/usr/bin/env bash
echo "[INFO] Update the database schema";
docker-compose exec typo3 /bin/bash -c "php vendor/bin/typo3cms database:updateschema";
