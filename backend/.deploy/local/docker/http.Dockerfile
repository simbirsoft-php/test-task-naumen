ARG VERSION
FROM nginx:${VERSION}-alpine

# fix timezone
ARG TIMEZONE
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo ${TIMEZONE} > /etc/timezone \
    && date

ARG UPSTREAM
RUN echo -e "\
upstream php-fpm {\n\
    server ${UPSTREAM}:9000;\n\
}"\
> /etc/nginx/conf.d/upstream.conf
