FROM node:alpine

#Install dependencies
RUN apk update
RUN apk add --no-cache \
    inotify-tools \
    git 

# Install/Update npm global dependencies
RUN npm install -g npm npm-check-updates nodemon

# Install certwatch
COPY ./certwatch.sh /certwatch.sh
COPY ./entrypoint.sh /entrypoint.sh

RUN chmod +x /certwatch.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT [ "/entrypoint.sh" ]