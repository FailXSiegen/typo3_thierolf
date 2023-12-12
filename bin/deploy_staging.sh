#!/usr/bin/env bash
echo "[INFO] Deploy to staging";
docker compose exec typo3 /bin/bash -c "apt-get update && apt-get install rsync && apt-get install acl"
docker compose exec typo3 /bin/bash -c "vendor/bin/dep deploy staging"