FROM smallstep/step-cli

USER root

RUN mkdir -p /var/local/step

COPY script.sh /script.sh
COPY entrypoint.sh /entrypoint.sh

ADD cron/crontab /etc/crontabs/root

RUN chmod +x /entrypoint.sh /script.sh
RUN chmod 0644 /etc/crontabs/root

ENTRYPOINT ["/entrypoint.sh"]

CMD ["/usr/sbin/crond", "-l", "2", "-f"]