# Laradockの設定要約

<br>
<br>

## 1. ディレクトリ構成
```

$ git clone https://github.com/Laradock/laradock.git -b v9.6
```

<br>
<br>

## 1. LaradockをGitでダウンロード
```

$ git clone https://github.com/Laradock/laradock.git -b v9.6
```
<br>
<br>

## 2. Laradockの.env変更点
```
###########################################################
###################### General Setup ######################
###########################################################

### Paths #################################################

# Point to the path of your applications code on your host
APP_CODE_PATH_HOST=../demo-test-laravel/

# Choose storage path on your machine. For all storage systems
DATA_PATH_HOST=../data

### Docker compose files ##################################

# Define the prefix of container names. This is useful if you have multiple projects that use laradock to have seperate containers per project.
COMPOSE_PROJECT_NAME=laradock

### PHP Version ###########################################

# Select a PHP version of the Workspace and PHP-FPM containers (Does not apply to HHVM).
# Accepted values: 7.4 - 7.3 - 7.2 - 7.1 - 7.0 - 5.6
PHP_VERSION=7.3

###########################################################
################ Containers Customization #################
###########################################################


### NGINX #################################################

NGINX_HOST_HTTP_PORT=80
NGINX_HOST_HTTPS_PORT=443
NGINX_HOST_LOG_PATH=./logs/nginx/
NGINX_SITES_PATH=./nginx/sites/
NGINX_PHP_UPSTREAM_CONTAINER=php-fpm
NGINX_PHP_UPSTREAM_PORT=9000
NGINX_SSL_PATH=./nginx/ssl/


### MYSQL #################################################

MYSQL_VERSION=5.7
MYSQL_DATABASE=tweet_third
MYSQL_USER=bird
MYSQL_PASSWORD=secret
MYSQL_PORT=3306
MYSQL_ROOT_PASSWORD=root
MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d

```