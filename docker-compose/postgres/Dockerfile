FROM postgres:alpine

RUN apk add --no-cache curl \
				nano \
				bash

COPY update_audio.sh /root/update_audio.sh
WORKDIR /root

EXPOSE 5432