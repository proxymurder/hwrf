FROM node:alpine

#Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# Install/Update npm global dependencies
RUN npm install -g npm npm-check-updates