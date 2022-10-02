FROM node:alpine

#Install dependencies
RUN apk update
RUN apk add --no-cache \
    inotify-tools \
    git 

# Install/Update npm global dependencies
RUN npm install -g npm-check-updates npm