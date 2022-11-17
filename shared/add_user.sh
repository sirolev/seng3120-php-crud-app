#!/bin/bash

mysql << EOF
-- create user and grant all privileges
create user "$1"@'%' identified by "$2";
grant all privileges on *.* to "$1"@'%';
create user "$1"@'0.0.0.0' identified by "$2";
grant all privileges on *.* to "$1"@'0.0.0.0';

-- flush privileges so new users and privileges are active
FLUSH PRIVILEGES;
EOF