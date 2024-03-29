#!/bin/bash

## install PhpMyAdmin Application

LOG_FILE="/vagrant/logs/install_myadmin.log"
MYADMIN_VERSION="5.1.1"
WWW_REP="/var/www/html/les-logis-de-beaulieu"

#Fichier config all
ALL_CONF_FILE="/vagrant/scripts/config/config_all.sh"
APT_OPT="-o Dpkg::Progress-Fancy="0" -q -y"

source $ALL_CONF_FILE

echo "START - Installation of phpMyAdmin - "$IP

echo "=> [1]: Install required packages ...."
DEBIAN_FRONTEND=$DEBIAN_FRONTEND
apt-get install $APT_OPT \
  openssl \
  php-xml \
  php-gettext \
  php-cgi \
  mariadb-client \
  >> $LOG_FILE 2>&1

echo "=> [2]: Download files"
wget -q -O /tmp/myadmin.zip \
https://files.phpmyadmin.net/phpMyAdmin/${MYADMIN_VERSION}/phpMyAdmin-${MYADMIN_VERSION}-all-languages.zip \
>> $LOG_FILE 2>&1

unzip /tmp/myadmin.zip -d ${WWW_REP} \
>> $LOG_FILE 2>&1

rm /tmp/myadmin.zip

echo "=> [3]: Configuration files for phpmyadmin  "
ln -s ${WWW_REP}/phpMyAdmin-${MYADMIN_VERSION}-all-languages ${WWW_REP}/myadmin
mkdir ${WWW_REP}/myadmin/tmp
chown www-data:www-data ${WWW_REP}/myadmin/tmp

# crypter les cookies de session de PHPMyAdmin
randomBlowfishSecret=$(openssl rand -base64 32)
sed -e "s|cfg\['blowfish_secret'\] = ''|cfg['blowfish_secret'] = '$randomBlowfishSecret'|" \
  ${WWW_REP}/myadmin/config.sample.inc.php \
  > ${WWW_REP}/myadmin/config.inc.php

# Modification du serveur hôte dans phpmyadmin
sed -i "s|'localhost'|'192.168.56.81'|" ${WWW_REP}/myadmin/config.inc.php
# Ajout de l'utilisateur et du mot de passe
sed -i "/'192.168.56.81';/a \
\$cfg['Servers'][\$i]['user'] = 'admin'; \n\
\$cfg['Servers'][\$i]['password'] = 'mdpgite';" ${WWW_REP}/myadmin/config.inc.php

echo "=> [4]: Restarting Apache..."
service apache2 restart

cat <<EOF
Service installed at http://192.168.56.80/myadmin/

Login to manage database:

username: admin
password: mdpgite

EOF

echo "END - Configuration phpMyAdmin"
