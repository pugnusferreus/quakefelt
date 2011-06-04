## Summary
Crowd sourced earthquake intensity maps provide disaster managers with real-time information on the intensity
of earthquakes while also giving earthquake researchers valuable data to help estimate the shaking from future earthquakes.
The goal is to create a smartphone app that will allow users to report earthquake shaking intensity and building damage information
via their smartphone.

## Prerequisites
* PHP 5.2.4
* Apache 2
* MySQL


## How to install
1. run `git clone git@github.com:pugnusferreus/quakefelt.git`
2. `cd quakefelt`
3. Assuming that your Apache directory is in "/etc/apache2/" , run `sudo cp /your/quakefelt/directory/quakefelt /etc/apache2/other/quakefelt.conf`
4. `vim /etc/apache2/other/quakefelt.conf` and modify the configuration paths accordingly.
5. Go to your quakefelt directory and run `chmod 777 cache`.
6. Make sure you have /etc/php.ini . If not, you might want to run `sudo cp /etc/php.ini.default /etc/php.ini`