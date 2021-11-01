create table cards
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255)                       not null,
    description text                               not null,
    category    varchar(255)                       not null,
    deadline    datetime                           not null,
    created_at  datetime default CURRENT_TIMESTAMP not null,
    updated_at  datetime                           null on update CURRENT_TIMESTAMP
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table notifications
(
    id              char(36)        not null
        primary key,
    type            varchar(255)    not null,
    notifiable_type varchar(255)    not null,
    notifiable_id   bigint unsigned not null,
    data            text            not null,
    read_at         timestamp       null,
    created_at      timestamp       null,
    updated_at      timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index notifications_notifiable_type_notifiable_id_index
    on notifications (notifiable_type, notifiable_id);

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table reports
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255)                       not null,
    description text                               not null,
    main_text   text                               not null,
    created_at  datetime default CURRENT_TIMESTAMP not null,
    updated_at  datetime                           null on update CURRENT_TIMESTAMP
)
    collate = utf8mb4_unicode_ci;

create table users
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255)                       not null,
    surname     varchar(255)                       not null,
    email       varchar(255)                       not null,
    password    varchar(255)                       null,
    google_id   varchar(255)                       null,
    facebook_id varchar(255)                       null,
    created_at  datetime default CURRENT_TIMESTAMP not null,
    updated_at  datetime                           null on update CURRENT_TIMESTAMP
)
    collate = utf8mb4_unicode_ci;

create table documents
(
    id               bigint unsigned auto_increment
        primary key,
    name             varchar(255)                       not null,
    description      text                               null,
    url              varchar(255)                       not null,
    author_id        bigint unsigned                    not null,
    last_user_opened bigint unsigned                    null,
    last_time_opened datetime                           null,
    created_at       datetime default CURRENT_TIMESTAMP not null,
    updated_at       datetime                           null on update CURRENT_TIMESTAMP,
    constraint documents_author_id_foreign
        foreign key (author_id) references users (id),
    constraint documents_last_user_opened_foreign
        foreign key (last_user_opened) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table projects
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255)                       not null,
    description text                               not null,
    author_id   bigint unsigned                    not null,
    created_at  datetime default CURRENT_TIMESTAMP null,
    updated_at  datetime                           null on update CURRENT_TIMESTAMP,
    constraint projects_author_id_foreign
        foreign key (author_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table boards
(
    id         bigint unsigned auto_increment
        primary key,
    project_id bigint unsigned                    not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    updated_at datetime                           null on update CURRENT_TIMESTAMP,
    constraint boards_project_id_foreign
        foreign key (project_id) references projects (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table boards_cards
(
    id         bigint unsigned auto_increment
        primary key,
    board_id   bigint unsigned                    not null,
    card_id    bigint unsigned                    not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    updated_at datetime                           null on update CURRENT_TIMESTAMP,
    constraint boards_cards_board_id_foreign
        foreign key (board_id) references boards (id)
            on delete cascade,
    constraint boards_cards_card_id_foreign
        foreign key (card_id) references cards (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table projects_documents
(
    id          bigint unsigned auto_increment
        primary key,
    project_id  bigint unsigned                    not null,
    document_id bigint unsigned                    not null,
    created_at  datetime default CURRENT_TIMESTAMP not null,
    updated_at  datetime                           null on update CURRENT_TIMESTAMP,
    constraint projects_documents_document_id_foreign
        foreign key (document_id) references documents (id)
            on delete cascade,
    constraint projects_documents_project_id_foreign
        foreign key (project_id) references projects (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table projects_reports
(
    id         bigint unsigned auto_increment
        primary key,
    project_id bigint unsigned                    not null,
    report_id  bigint unsigned                    not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    updated_at datetime                           null on update CURRENT_TIMESTAMP,
    constraint projects_reports_project_id_foreign
        foreign key (project_id) references projects (id)
            on delete cascade,
    constraint projects_reports_report_id_foreign
        foreign key (report_id) references reports (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table projects_users
(
    id         bigint unsigned auto_increment
        primary key,
    project_id bigint unsigned                    not null,
    user_id    bigint unsigned                    not null,
    role       varchar(255)                       null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    updated_at datetime                           null on update CURRENT_TIMESTAMP,
    constraint projects_users_project_id_foreign
        foreign key (project_id) references projects (id)
            on delete cascade,
    constraint projects_users_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table users_cards
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned                    not null,
    card_id    bigint unsigned                    not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    updated_at datetime                           null on update CURRENT_TIMESTAMP,
    constraint users_cards_card_id_foreign
        foreign key (card_id) references cards (id)
            on delete cascade,
    constraint users_cards_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

