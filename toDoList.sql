create database toDoList;

use toDoList;

create table lists
	(
	id int auto_increment primary key,
	name varchar(50) NOT NULL,
	parent int
	);
ALTER table lists Add constraint UK unique (name);