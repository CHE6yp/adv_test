#!/bin/bash

curl -sS https://www.litres.ru/static/ds/audio_all.xml.gz > audio_all.xml.gz && \
gunzip audio_all.xml.gz      

# value=$(<audio_all.xml)

echo 'Распаковали'

# psql -U symfony -d symfony -c 'DROP TABLE xmldata;'
printf 'DROP TABLE xmldata;
CREATE TABLE xmldata AS SELECT
xml $$' > update.sql
cat audio_all.xml >> update.sql
printf '$$ AS data;
SELECT xmltable.*
  FROM xmldata,
       XMLTABLE('"'"'//yml_catalog/shop/offers/offer'"'"'
                PASSING data
                COLUMNS id int PATH '"'"'@id'"'"',
                        ordinality FOR ORDINALITY,
                        available bool PATH '"'"'@available'"'"',
                        "url" text,
                        "price" float,
                        "name" text)
       where name = '"'"'Плачущая скала'"'"';' >> update.sql

# printf 'DROP TABLE xmldata;
# CREATE TABLE xmldata AS SELECT
# xml $$'${value}'$$ AS data;
# SELECT xmltable.*
#   FROM xmldata,
#        XMLTABLE('"'"'//yml_catalog/shop/offers/offer'"'"'
#                 PASSING data
#                 COLUMNS id int PATH '"'"'@id'"'"',
#                         ordinality FOR ORDINALITY,
#                         available bool PATH '"'"'@available'"'"',
#                         "url" text,
#                         "price" float,
#                         "name" text)
#        where name = '"'"'Плачущая скала'"'"';' > update.sql

psql -U $POSTGRES_USER -d $POSTGRES_DB -f update.sql
