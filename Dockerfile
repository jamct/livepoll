FROM node:9

WORKDIR /usr/livepoll

COPY ./src .
RUN npm install --quiet --production

EXPOSE 8080
CMD [ "node", "server.js" ]