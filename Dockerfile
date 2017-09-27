FROM   php:7.1-apache

EXPOSE 80

COPY   . /var/www/html/

RUN    mkdir /var/www/html/sutrarelations
RUN    mkdir /var/www/html/json

RUN    mkdir /var/www/html/Data/allsutrani
RUN    tar -zxvf /var/www/html/Data/allsutrani.tar.gz -C /var/www/html/Data/allsutrani
RUN    tar  zxvf /var/www/html/Data/dhaatupatha.tgz
