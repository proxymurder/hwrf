FROM nginx:alpine

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    inotify-tools

# Install executables
COPY ./certwatch.sh /certwatch.sh
COPY ./docker-entrypoint /docker-entrypoint

RUN chmod +x /certwatch.sh /docker-entrypoint

# Install ngnix servers default conf
COPY ./https.conf /etc/nginx/https.conf
COPY ./proxy.conf /etc/nginx/proxy.conf

ENV STEPPATH=/var/local/step

ENTRYPOINT ["/docker-entrypoint"]

CMD ["nginx", "-g", "daemon off;"]