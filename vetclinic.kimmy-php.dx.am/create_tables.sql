CREATE TABLE  owner  (
   account_id  int(6) unsigned NOT NULL auto_increment,
   firstname  varchar(255) default NULL,
   lastname  varchar(255) default NULL,
   contact_number  int(10) default NULL,
   email_address  varchar(255) default NULL,
   postal_address  varchar(255) default NULL,
   id_number  bigint(13) default NULL,
  PRIMARY KEY ( account_id )
) AUTO_INCREMENT=1;

CREATE TABLE  pet  (
   pet_id  int(6) unsigned NOT NULL auto_increment,
   account_id  int(6) unsigned NOT NULL,
   name  varchar(255) default NULL,
   animal_type  varchar(255) default NULL,
   breed  varchar(100) default NULL,
   birthdate  date default NULL,
  PRIMARY KEY ( pet_id ),
   FOREIGN KEY (account_id) REFERENCES owner(account_id) 
) AUTO_INCREMENT=1;

CREATE TABLE  visits  (
   visit_id  int(6) unsigned NOT NULL auto_increment,
   pet_id  int(6) unsigned NOT NULL,
   visit_date  date default NULL,
   visit_type  varchar(255) default NULL,
   follow_up_date  date default NULL,
  PRIMARY KEY ( visit_id ),
   FOREIGN KEY (pet_id) REFERENCES pet(pet_id) 
) AUTO_INCREMENT=1;

CREATE TABLE  admin  (
   admin_id  int(6) unsigned NOT NULL auto_increment,
   admin_fname  varchar(255) default NULL,
   admin_sname  varchar(255) default NULL,
   admin_email  varchar(255) default NULL,
   admin_con_num  varchar(100) default NULL,
   admin_password  varchar(255),
  PRIMARY KEY ( admin_id )
) AUTO_INCREMENT=1;