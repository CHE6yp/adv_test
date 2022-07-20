FROM postgres:alpine

RUN apk add --no-cache curl \
				nano \
				bash \
				supervisor

RUN echo "0  2  *  *  *  /root/update_audio.sh" > /etc/crontabs/root
RUN mkdir /etc/supervisor.d

COPY postgres_cron.ini /etc/supervisor.d/postgres_cron.ini
COPY update_audio.sh /root/update_audio.sh

WORKDIR /root
EXPOSE 5432
ENTRYPOINT ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]