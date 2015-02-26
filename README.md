Badminton
=========

This repo is used for my project concerning a web portal about my badminton peer group, mainly used for matchmaking and visualization of stats

Installation
===

1. Install vagrant
2. After cloning the repository run vagrant up
3. Install composer
4. Run composer install
5. Use src/AppBundle/Resources/mysql/badminton.sql as first dummy dataset into your database on the vagrant machine
6. Change document root in vagrant box in /etc/apache2/sites-enabled/000-default.conf to /var/www/web/
7. Restart apache with sudo apache2ctl restart
