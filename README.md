# slimstack

Configuration for Wordpress, PHP, and NGINX. Based on [SlickStack](https://github.com/littlebizzy/slickstack)

## Prerequisites

- PHP 8+
- NGINX
- nginx-extras
- certbot

## Overview

This configuration sets up PHP to run over TCP port 9000. NGINX will use FastCGI cache to bypass PHP on all frontend pages. The cache gets purged automatically by the clear-caches mu-plugin

## Instructions

- Run certbot if you haven't already
- Rename your existing config files on the server (e.g. rename /etc/nginx/nginx.conf to /etc/nginx/nginx.original-conf)
- Be sure original filenames do not end with .conf, or they may still get included in some cases
- Copy files from /nginx and /php into the respective locations on the server
- In php/8.1/php.ini, replace all instances @PROJECT_ROOT
- In nginx/nginx.conf, find and replace all instances of @SITE_TLD
- In nginx/sites/production.conf, find and replace all instances of @SITE_DOMAIN, @SITE_DOMAIN_EXCLUDING_WWW, and @PROJECT_ROOT
- Copy wordpress/wp-config-production.php into your-project-root/wp-config.php
- In the wp-config, edit the database connection, replace all instances of @SITE_DOMAIN, @WP_DEFAULT_THEME, and @PROJECT_ROOT
- Copy wordpress/mu-plugins to your-project-root/wp-content/mu-plugins
- Verify all "include" directives 
- Certbot generated some nginx config. Find it and put it in /etc/nginx/conf.d/letsencrypt.conf
- Certbot does not generate the "ssl_trusted_certificate" directive. Modify that in /etc/nginx/conf.d/letsencrypt.conf
- Certbot's generated config has a line to include a config file. Comment that one out