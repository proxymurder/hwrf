# nginx/Dockerfile
# NGINX http(s) server image
FROM nginx:alpine

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    inotify-tools

# Install executables
COPY ./certwatch.sh /certwatch.sh
COPY ./docker-nginx-entrypoint /docker-nginx-entrypoint

RUN chmod +x /certwatch.sh /docker-nginx-entrypoint

# Install ngnix servers default conf
COPY ./https.conf /etc/nginx/https.conf
COPY ./proxy.conf /etc/nginx/proxy.conf

ENTRYPOINT ["/docker-nginx-entrypoint"]

CMD ["nginx", "-g", "daemon off;"]