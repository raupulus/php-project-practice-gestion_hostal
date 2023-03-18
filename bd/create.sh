#!/bin/sh
sudo -u postgres dropdb --if-exists hostal
sudo -u postgres createdb -O hostal hostal

sudo -u postgres dropuser --if-exists hostal
psql -U postgres -c "CREATE USER hostal PASSWORD 'hostal' SUPERUSER;"

LINE="localhost:5432:*:hostal:hostal"
FILE=~/.pgpass
if [ ! -f $FILE ]
then
    touch $FILE
    chmod 600 $FILE
fi
if ! grep -qsF "$LINE" $FILE
then
    echo "$LINE" >> $FILE
fi


