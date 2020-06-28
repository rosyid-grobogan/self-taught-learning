# Reset Password

## Step 1: Confirm MySQL `version`
```
# we must first stop the MySQL service.
$ mysql -V
```
## Step 2: Restart MySQL with skip-grant-table
```
sudo /etc/init.d/mysql stop

# Ensure the directory /var/run/mysqld exists and correct owner set.
sudo mkdir /var/run/mysqld
sudo chown mysql /var/run/mysqld

# Now start MySQL with the --skip-grant-tables option. The & is required here.
sudo mysqld_safe --skip-grant-tables&
```

## Step 3: Change MySQL Root Password
```
# You can now log in to the MySQL root account without a password.
sudo mysql --user=root mysql

# Replace your_password_here with your own
update user set authentication_string='@4Dm1n&&B4ru' where user='root';

# Flush privileges.
mysql> flush privileges;

# Exit from MySQL
mysql> exit

# Make sure all MySQL processes are stopped before starting the service again.
sudo killall -u mysql

# Start MySQL again.
sudo /etc/init.d/mysql start
```
## Step 4: Test New Password
```
sudo mysql -p -u root

# Enter your password
```

## References
- https://devanswers.co/how-to-reset-mysql-root-password-ubuntu/