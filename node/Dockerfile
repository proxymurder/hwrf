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

USER node

# Install npm dependencies
RUN npm install -g npm npm-check-updates

RUN mkdir -p /home/node/app
WORKDIR /home/node/app

CMD ["npm", "run", "dev"]

# NodeJS ws image
FROM base as ws

USER node

# Install npm dependencies
RUN npm install -g nodemon npm npm-check-updates

RUN mkdir -p /home/node/ws
WORKDIR /home/node/ws

CMD ["node", "server.js"]