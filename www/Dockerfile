FROM nginx:alpine

RUN apk add inotify-tools

COPY certwatch.sh /certwatch.sh
COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /certwatch.sh
RUN chmod +x /entrypoint.sh

# Certificate watcher and nginx
ENTRYPOINT ["/entrypoint.sh"]

CMD ["nginx", "-g", "daemon off;"]