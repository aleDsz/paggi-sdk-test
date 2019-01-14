create table `users` (
	`id` int not null,
	`name` varchar(140) not null,
	`email` varchar(120) not null,
	`password` varchar(35) not null,
	`created_at` datetime default current_timestamp,
	`updated_at` datetime default null,
	primary key (`id`)
);

create table `cards` (
	`id` int not null,
	`user_id` int not null,
	`number` varchar(16) not null,
	`holder_name` varchar(120) not null,
	`cvv` varchar(4) not null,
	`created_at` datetime default current_timestamp,
	`updated_at` datetime default null,
	primary key (`id`, `user_id`),
	foreign key (`user_id`) references `users` (`id`)
);