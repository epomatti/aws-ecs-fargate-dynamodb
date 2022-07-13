# aws-elastic-beanstalk-app

## 

Setup Beanstalk config

https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/command-options-general.html#command-options-general-autoscalinglaunchconfiguration
https://automateinfra.com/2021/03/24/how-to-launch-aws-elastic-beanstalk-using-terraform/

## Local Development

```sh
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.1 -y
```

Install composer:

```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Add to path:

```sh
mv composer.phar /usr/local/bin/composer
```

Start the server:

```sh
php -S localhost:8080 -t public public/index.php
```

```sh
docker build -t beanstalk-php .
```