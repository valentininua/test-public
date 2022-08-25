CREATE
EXTENSION IF NOT EXISTS "uuid-ossp";
CREATE
EXTENSION IF NOT EXISTS "pgcrypto";

create table coin
(
    -- uuid can not be auto increment
    uuid       uuid        default gen_random_uuid(),
    currency   varchar(10)               not null,
    driver     varchar(32)               not null,
    amount     float                     not null,
    created_at TIMESTAMPTZ default NOW() not null
);

create unique index coin_uuid_uindex
    on coin (uuid);

alter table coin
    add constraint coin_pk
        primary key (uuid);

