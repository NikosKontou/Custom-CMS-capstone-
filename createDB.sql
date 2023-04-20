create table category_properties
(
    visibility      tinyint(2) auto_increment
        primary key,
    visibility_name varchar(255) not null
);

create table categories
(
    id            int auto_increment
        primary key,
    category_name varchar(255) not null,
    visibility    tinyint(2)   not null,
    ordering      tinyint      not null,
    constraint categories_fk0
        foreign key (visibility) references category_properties (visibility)
);

create table site_properties
(
    id         int auto_increment
        primary key,
    `key`      varchar(255)         not null,
    value      varchar(255)         null,
    visibility tinyint(2) default 1 not null
);

create table users
(
    id            int auto_increment
        primary key,
    user_name     varchar(30)  not null,
    user_password varchar(255)  not null,
    access_level  int default 0 not null,
    constraint user_name
        unique (user_name)
);

create table articles
(
    id           int auto_increment
        primary key,
    title        varchar(255)         not null,
    body         mediumtext           not null,
    category_id  int                  not null,
    created_by   int                  not null,
    created_time datetime             not null,
    last_edit    datetime             not null,
    header_image varchar(255)         null,
    promoted     tinyint(1) default 0 null,
    constraint articles_fk0
        foreign key (category_id) references categories (id),
    constraint articles_fk1
        foreign key (created_by) references users (id)
);

INSERT INTO site_properties (`key`,value,visibility) VALUES
	 ('Facebook',null,1),
	 ('Instagram',null,1),
	 ('email',null,1),
	 ('site_name',null,1),
	 ('site_color',null,1),
	 ('site_logo',null,1),
	 ('site_slogan',null,1),
	 ('address',null,1),
	 ('Twitter',null,1),
	 ('phone',null,1);

INSERT INTO site_properties (`key`,value,visibility) VALUES
	 ('site_info',null,1),
	 ('accent_color',null,1);

