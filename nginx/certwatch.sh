#!/bin/sh
while true; do
    inotifywait -e modify /home/step/renewer/site.crt
    nginx -s reload
done
