#!/bin/sh
while true; do
    inotifywait -e modify /home/step/site.crt
    nginx -s reload
done
