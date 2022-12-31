FROM node:alpine

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# Install global npm dependencies
RUN npm install -g \
    npm \
    npm-check-updates

RUN mkdir -p /home/node/app
WORKDIR /home/node/app

USER node

CMD ["npm", "run", "dev"]