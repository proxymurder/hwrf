FROM node:alpine as base

USER root

# Install container dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# Vuejs app container
FROM base as app

USER node

# Install npm dependencies
RUN npm install -g npm npm-check-updates

RUN mkdir -p /home/node/app
WORKDIR /home/node/app

CMD ["npm", "run", "dev"]

# Websocket container
FROM base as ws

USER node

# Install npm dependencies
RUN npm install -g nodemon npm npm-check-updates

RUN mkdir -p /ws
WORKDIR /ws

CMD ["node", "server.js"]