# Run a update and upgrade
apt-get -y update && apt-get -y upgrade;

# Remove any pending packages
apt-get -y autoremove;

# Check rpl dependency
if ! type "$rpl" > /dev/null; then
    apt-get -y install rpl
fi

# Install Mysql server and client
apt-get -y install mysql-server mysql-client;

# Install Apache2
apt-get -y install apache2;

# Add PHP PPA
add-apt-repository ppa:ondrej/php;
add-apt-repository universe;

# Install PHP 7.4
apt-get -y install php7.4 libapache2-mod-php7.4 php7.4-mysql php7.4-common php7.4-gd php7.4-mbstring php7.4-fpm php7.4-json php7.4 php7.4-xml php7.4-xmlrpc php7.4-intl php7.4-curl php7.4-zip php7.4-imagick;

# Install phpmyadmin and its dependencies
#apt-get -y install phpmyadmin php7.1-mbstring php7.0-mbstring php5.6-mbstring php-gettext;

# --------- End Installs ---------


# Enable proxy_fcgi module
a2enmod proxy_fcgi setenvif;

# Enable php7.0-fpm configuration as default (not PHP 5.6 and PHP 7.1 but this can switched easily if needed)
a2enconf php7.0-fpm;

# Update user targeting default PHP 7.0/7.1/5.6 FPM
rpl "www-data" $2 /etc/php/7.1/fpm/pool.d/www.conf;
rpl "www-data" $2 /etc/php/7.0/fpm/pool.d/www.conf;
rpl "www-data" $2 /etc/php/5.6/fpm/pool.d/www.conf;
rpl "www-data" $2 /etc/apache2/envvars;

# Restart apache2 service
systemctl restart apache2;

# Enable mod modules
a2enmod ssl
a2enmod headers
a2enmod rewrite

# Enable conf mudules
a2enconf ssl-params

# Enable site modules
a2ensite default-ssl

# SSL-parameters
cat > /etc/apache2/conf-available/ssl-params.conf << ENDOFFILE
SSLCipherSuite EECDH+AESGCM:EDH+AESGCM:AES256+EECDH:AES256+EDH
SSLProtocol All -SSLv2 -SSLv3 -TLSv1 -TLSv1.1
SSLHonorCipherOrder On
Header always set X-Frame-Options DENY
Header always set X-Content-Type-Options nosniff
SSLCompression off
SSLUseStapling on
SSLStaplingCache "shmcb:logs/stapling-cache(150000)"
SSLSessionTickets Off
ENDOFFILE

cp /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf.bak;

# Reload PHP 7.4 FPM
service php7.4-fpm reload;

ufw allow "Apache Full";

systemctl restart apache2;

echo "You have successfully installed LAMP";