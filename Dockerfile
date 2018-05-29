FROM node:9
RUN npm install -g nodemon

WORKDIR /usr/app

COPY ./src/package.json .
RUN npm install --quiet

EXPOSE 8080
CMD [ "node", "server.js" ]