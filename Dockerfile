FROM php:7.4-fpm

RUN bash -c "sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list && apt update && apt-get install -y zlib1g-dev && apt-get install -y libzip-dev && docker-php-ext-install zip"

RUN bash -c "apt-get -y update && apt-get -y upgrade && apt-get -y install zip"
