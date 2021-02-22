WARNING check log file people.json (problème de droit www-data)

# my_shop
16022021/php09 add_users.php

sudo mysql -u root -p
mysql> source PHP_D09_base-test.sql

Restart Apache 2 web server, enter:
# /etc/init.d/apache2 restart
OR
$ sudo /etc/init.d/apache2 restart
OR
$ sudo service apache2 restart
// http://localhost/Rendu/my_shop/ex_01/inscription.php


windows + shift + up/down (déplacer une fenetre dans ubuntu)
window + droite/gauche (centrer droite ou gauche)
ctrl + alt + up/down (déplacer dans les bureau)


sudo vim /etc/php/7.4/mods-available/xdebug.ini
zend_extension=xdebug.so
xdebug.remote_enable=1
xdebug.remote_port=9000
xdebug.idekey=PHPSTORM
xdebug.show_error_trace=1
xdebug.remote_autostart=1


Technical point
category recursivity
the flexibility of the search bar results
grouping of search criteria in a single search bar(parsing of the user query)
