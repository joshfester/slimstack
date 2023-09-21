# slimstack

Configuration for Wordpress, PHP, and NGINX. Based on [SlickStack](https://github.com/littlebizzy/slickstack)

## Prerequisites

PHP 8+
NGINX

## Instructions

- Rename your existing config files on the server (e.g. rename /etc/nginx/nginx.conf to /etc/nginx/nginx.original.conf)
- Copy files from /nginx and /php into the respective locations on the server
- In nginx/nginx.conf, find and replace all instances of @SITE_TLD
- In nginx/sites/production.conf, find and replace all instances of @SITE_DOMAIN and @SITE_DOMAIN_EXCLUDING_WWW
- Copy wordpress/wp-config-production.php into your-project-root/wp-config.php
- In the wp-config, edit the database connection, replace all instances of @SITE_DOMAIN and @WP_DEFAULT_THEME