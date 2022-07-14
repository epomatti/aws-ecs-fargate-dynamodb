# AWS Fargate DynamoDB

## Running

```sh
terraform init
terraform apply -auto-approve
```

## Local Development

```sh
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.1 -y
```

Install composer:
https://getcomposer.org/download/

Add to path:

```sh
mv composer.phar /usr/local/bin/composer
```

Install the dependencies:

```sh
composer install
```

Start the server:

```sh
php -S localhost:8080 -t public public/index.php
```

### Docker

```sh
docker build -t ecs-php .
docker run --rm -p 8080:8080 ecs-php
```

## Reference

https://engineering.finleap.com/posts/2020-02-20-ecs-fargate-terraform/
https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/command-options-general.html#command-options-general-autoscalinglaunchconfiguration
https://automateinfra.com/2021/03/24/how-to-launch-aws-elastic-beanstalk-using-terraform/
