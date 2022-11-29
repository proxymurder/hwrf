# node/Dockerfile
# NodeJS base image
FROM node:alpine as base

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# NodeJS application image 
FROM base as app

RUN mkdir -p /home/node/app
WORKDIR /home/node/app

# Install global npm dependencies
RUN npm install -g \
    npm \
    npm-check-updates

USER node

CMD ["npm", "run", "dev"]

# NodeJS ws image
FROM base as ws

RUN mkdir -p /home/node/ws
WORKDIR /home/node/ws

# Install global npm dependencies
RUN npm install -g \
    npm \
    npm-check-updates \
    nodemon

USER node

CMD ["node", "server.js"]