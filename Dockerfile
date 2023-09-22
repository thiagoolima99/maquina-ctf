FROM ubuntu:20.04

#RUN apt update

#Install basic programs
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y \
    apache2 \
    curl \
    php \
    iputils-ping \
    python \
    php-mysql \
    net-tools \
    less \
    sudo \
    vim \
    cron \
    nano \
    netcat \
    wget

#cron
COPY files/mycron /etc/cron.d/mycron
RUN chmod 0644 /etc/cron.d/mycron
COPY files/website.txt /var/opt/website.txt
RUN crontab /etc/cron.d/mycron

#Root Password
RUN echo "root:root" | chpasswd

#Permissions
RUN chown -R www-data:www-data /var/www/html

#Apache2 Config
COPY files/000-default.conf /etc/apache2/sites-enabled/000-default.conf

#Pacientes
COPY files/pacientes.xlsx /root/pacientes.xlsx

#User
RUN useradd -rm -d /home/ti -s /bin/bash -u 1001 ti
RUN chown ti:ti /var/opt/website.txt
RUN chmod 660 /var/opt/website.txt

#Zip
COPY files/info.zip /tmp
RUN chown ti:ti /home/ti/info.zip
RUN chmod 744 /tmp/info.zip

#Exposed Ports
EXPOSE 80

#Start
COPY files/start.sh /tmp/
CMD /bin/bash /tmp/start.sh
