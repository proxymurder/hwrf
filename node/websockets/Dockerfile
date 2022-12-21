FROM node:alpine
USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

WORKDIR /home/node/ws

# Install global npm dependencies
RUN npm install -g \
    npm \
    npm-check-updates \
    nodemon

RUN mkdir -p /home/node/ws

USER node

CMD ["node", "server.js"]