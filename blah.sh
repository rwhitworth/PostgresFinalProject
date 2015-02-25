#!/bin/sh
psql -f remove_tables.sql
psql -f create_tables.sql
psql -f insert_values.sql
