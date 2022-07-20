#!/bin/bash

curl -sS https://www.litres.ru/static/ds/audio_all.xml.gz > audio_all.xml.gz && \
gunzip audio_all.xml.gz      
echo 'Распаковали архив'

printf 'CREATE TABLE xmldata AS SELECT
xml $$' > update.sql
cat audio_all.xml >> update.sql
printf '$$ AS data;' >> update.sql

printf 'BEGIN;' >> update.sql
printf 'TRUNCATE audio_book;' >> update.sql
printf 'INSERT INTO audio_book SELECT xmltable.*
  FROM xmldata,
       XMLTABLE('"'"'//yml_catalog/shop/offers/offer'"'"'
                PASSING data
                COLUMNS id int PATH '"'"'@id'"'"', 
                        available bool PATH '"'"'@available'"'"', 
                        "url" varchar(2047), 
                        "price" float, 
                        "currencyId" varchar(255), 
                        "categoryId" int, 
                        "picture" varchar(2047), 
                        "author" varchar(255), 
                        "name" varchar(255), 
                        "publisher" varchar(255), 
                        "series" text, 
                        "ISBN" varchar(255), 
                        "performed_by" varchar(255), 
                        "format" varchar(255), 
                        "description" text, 
                        "downloadable" bool, 
                        "age" int, 
                        "lang" varchar(255), 
                        formats varchar(255) PATH '"'"'param[@name = "Форматы"]'"'"', 
                        fragment varchar(2047) PATH '"'"'param[@name = "Фрагмент"]'"'"', 
                        "litres_isbn" varchar(255), 
                        "genres_list" text  
                        );' >> update.sql

printf 'COMMIT;' >> update.sql
printf 'DROP TABLE xmldata;' >> update.sql

psql -U $POSTGRES_USER -d $POSTGRES_DB -f update.sql

rm audio_all.xml
