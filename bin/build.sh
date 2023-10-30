#!/usr/bin/env bash
echo "[INFO] Running a composer update";
docker-compose exec typo3 /bin/bash -c "COMPOSER_MEMORY_LIMIT=-1 php /usr/local/bin/composer update";
docker-compose exec typo3 /bin/bash -c "chmod -R 775 *"
docker-compose exec typo3 /bin/bash -c "chmod -R 775 ."
docker-compose exec typo3 /bin/bash -c "chgrp -R www-data *"
docker-compose exec typo3 /bin/bash -c "chgrp -R www-data ."