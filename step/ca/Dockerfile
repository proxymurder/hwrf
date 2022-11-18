FROM smallstep/step-cli

COPY --from=smallstep/step-ca /usr/local/bin/step-ca /usr/local/bin/step-ca
COPY --from=smallstep/step-ca /usr/local/bin/step-awskms-init /usr/local/bin/step-awskms-init

RUN apk update
RUN apk add --no-cache libcap

RUN setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/step-ca

COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

USER step

ENV CONFIGPATH="/home/step/config/ca.json"
ENV PWDPATH="/home/step/password"

COPY ./password /home/step/password

VOLUME ["/home/step"]

ENTRYPOINT ["/entrypoint.sh"]

CMD step-ca --password-file $PWDPATH $CONFIGPATH