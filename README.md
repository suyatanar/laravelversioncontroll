This is the version controlled api request by using with Laravel Framework. 
You can make a request to save the version name and timestamp in the database and also you can pull the version api request.

Configuration
-----
You can update the database connection in .env file.

Create Database
-----
Run below query to create the database and table to store the data.

`CREATE DATABASE IF NOT EXISTS version_controlled USE version_controlled;`

`CREATE TABLE IF NOT EXISTS version (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;`
