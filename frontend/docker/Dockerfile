FROM node:8

RUN apt update
RUN apt install -y zip unzip nginx

RUN mkdir /app
WORKDIR /app

COPY default.conf /etc/nginx/conf.d/
RUN rm -rf /etc/nginx/sites-enabled/default
RUN rm -rf /etc/nginx/sites-available/default

EXPOSE 80

COPY start.sh /usr/local/bin/start.sh
RUN chmod 755 /usr/local/bin/start.sh
CMD ["/bin/bash", "/usr/local/bin/start.sh"]
