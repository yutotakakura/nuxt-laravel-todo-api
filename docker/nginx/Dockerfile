FROM nginx:1.23-alpine

ENV TZ=UTC

# nginx config file
# local
# COPY ./conf/local/*.conf /etc/nginx/conf.d/

# ecs
COPY ./conf/ecs/*.conf /etc/nginx/conf.d/

WORKDIR /var/www/html