drop table if exists todoitem;
drop table if exists todouser;

create table todouser (
  id int not null auto_increment,
  fname varchar(255) not null,
  lname varchar(255) not null,
  email varchar(255) not null,
  username varchar(255) not null,
  password varchar(1024) not null,
  primary key(id)
) engine=innodb;

create table todoitem (
  id int not null auto_increment,
  userId int,
  status int not null default 0,
  title varchar(1024) not null,
  expDate date,
  primary key (id),
  foreign key (userId) references todouser(id)
) engine=innodb;