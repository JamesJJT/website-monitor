FROM centos/httpd

RUN yum update -y \
    && yum install -y make \
    && yum install -y wget \
    && yum install -y curl \
    && yum install -y unzip \
    && yum install -y libaio \
    && yum install -y vim \
    && wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
    && wget https://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    && rpm -Uvh remi-release-7.rpm epel-release-latest-7.noarch.rpm \
    && yum install -y yum-utils \
    && yum-config-manager --enable remi-php81

# Install Oracle client
RUN wget https://download.oracle.com/otn_software/linux/instantclient/215000/oracle-instantclient-basic-21.5.0.0.0-1.el8.x86_64.rpm
RUN yum install oracle-instantclient-basic-21.5.0.0.0-1.el8.x86_64.rpm -y

RUN wget https://download.oracle.com/otn_software/linux/instantclient/215000/oracle-instantclient-devel-21.5.0.0.0-1.el8.x86_64.rpm
RUN yum install oracle-instantclient-devel-21.5.0.0.0-1.el8.x86_64.rpm -y

RUN sh -c "echo /usr/lib/oracle/21/client64/lib > /etc/ld.so.conf.d/oracle-instantclient.conf"
RUN ldconfig

#RUN yum install -y unzip php php-common php-opcache php-cli php-zip php-mysqli php-gd php-zip php-xml php-ldap php-mbstring php-devel php-pear php-oci8
RUN yum install -y php php-common php-pear php-zip php-mcrypt php-cli php-gd php-curl php-mysqlnd php-ldap php-soap php-odbc php-pdo-dblib php-xml php-oci8 php-devel
#RUN pecl install Xdebug

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && HASH="$(wget -q -O - https://composer.github.io/installer.sig)" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN yum update -y

RUN /bin/bash -c 'mkdir -p /var/log/iexeterapi/'
RUN /bin/bash -c 'chown apache:apache /var/log/iexeterapi'
RUN /bin/bash -c 'rm -f /etc/httpd/conf.d/welcome.conf'
RUN /bin/bash -c 'rm -f /etc/httpd/conf/httpd.conf'
RUN /bin/bash -c 'rm -f /etc/php.ini'
COPY ./docker/httpd.conf /etc/httpd/conf/httpd.conf
COPY ./docker/php.ini /etc/php.ini

RUN /bin/bash -c "alias pf='clear && ./vendor/bin/phpunit --filter '"
RUN /bin/bash -c "alias phpunit='vendor/bin/phpunit'"
RUN /bin/bash -c "alias p='vendor/bin/phpunit'"
RUN /bin/bash -c "alias pf='vendor/bin/phpunit --filter'"

WORKDIR /var/www/html
