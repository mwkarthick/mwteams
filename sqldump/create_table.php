CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,  
  `name` varchar(100) NOT NULL,  
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
ALTER TABLE `teams`
  ADD UNIQUE KEY `UNIQ_UNAME` (`name`);
COMMIT;  

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `supervisors` ADD UNIQUE KEY `UNIQ_UNAME` (`name`);
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;



CREATE TABLE `team_supervisors` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,    
  `supervisor_id` int(11) NOT NULL,
  `team_code` varchar(50) NOT NULL,  
  `supervisor_code` varchar(50) NOT NULL,  
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `team_supervisors`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `team_supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*** 20.08.2021****/
CREATE TABLE `target_production` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,    
  `team_code` varchar(50) NOT NULL,  
  `target_value` decimal(10,2) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `target_production`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `target_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  CREATE TABLE `target_purchase` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,    
  `team_code` varchar(50) NOT NULL,  
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `target_purchase`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `target_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  CREATE TABLE `target_purchase_line` (
  `id` int(11) NOT NULL,
  `target_purchase_id` int(11) NOT NULL,
  `product_code` varchar(220) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `target_value` decimal(10,2) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `target_purchase_line`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `target_purchase_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  CREATE TABLE `target_production` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,    
  `team_code` varchar(50) NOT NULL,  
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `target_production`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `target_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  CREATE TABLE `target_production_line` (
  `id` int(11) NOT NULL,
  `target_production_id` int(11) NOT NULL,
  `product_code` varchar(220) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `target_value` decimal(10,2) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `target_production_line`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `target_production_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;