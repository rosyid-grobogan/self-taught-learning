#CHEAT POSTGRES LINUX

# Start
Masuk ke akun postgres di server
$ sudo -i -u postgres
Akses prompt Postgres
$ psql
Keluar dari prompt
$ \q


\l		// show db
\c testdb;	// choose db	
\dt		// show tables


## Query
#Select
SELECT * FROM table;



References
https://www.tutorialspoint.com/postgresql/postgresql_select_database.htm

# WINDOWS
C:\PostgreSQL\bin>psql -h localhost -U postgres