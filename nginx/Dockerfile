FROM nginx:alpine

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    inotify-tools

# Install certwatch
COPY ./certwatch.sh /certwatch.sh
COPY ./entrypoint.sh /entrypoint.sh

RUN chmod +x /certwatch.sh
RUN chmod +x /entrypoint.sh

# Copy ngnix conf files
COPY ./https.conf /etc/nginx/https.conf
COPY ./proxy.conf /etc/nginx/proxy.conf

ENTRYPOINT ["/entrypoint.sh"]

# Start nginx service
CMD ["nginx", "-g", "daemon off;"]