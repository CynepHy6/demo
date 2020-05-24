FROM postgres:11.7-alpine
USER postgres
RUN ( echo "local all all trust" >> /var/lib/postgresql/data/pg_hba.conf \
    && echo "host all all 127.0.0.1/32 trust" >> /var/lib/postgresql/data/pg_hba.conf; \
)
