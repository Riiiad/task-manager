CREATE TABLE tx_taskhub_domain_model_task (
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    due_date int(11) DEFAULT '0' NOT NULL,
    is_done tinyint(1) unsigned DEFAULT '0' NOT NULL,
    reminder_date int(11) DEFAULT '0' NOT NULL,
		slug varchar(255) NOT NULL DEFAULT '',
);

