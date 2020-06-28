# Cara Install Heroku CLI

## Ubuntu 16+
```
$ sudo snap install --classic heroku
```
Ref:https://devcenter.heroku.com/articles/heroku-cli#download-and-install


# PostgreSQL Heroku
```
heroku pg:psql

select * from information_schema.tables;
```
Ref: https://stackoverflow.com/questions/24939591/how-to-get-tables-from-postgresql-in-heroku



## Install the Heroku CLI

Download and install the Heroku CLI.

If you haven't already, log in to your Heroku account and follow the prompts to create a new SSH public key.

$ heroku login

## Clone the repository

Use Git to clone marketplace-v1-0-0-m-001's source code to your local machine.

$ heroku git:clone -a marketplace-v1-0-0-m-001
$ cd marketplace-v1-0-0-m-001

## Deploy your changes

Make some changes to the code you just cloned and deploy them to Heroku using Git.

$ git add .
$ git commit -am "make it better"
$ git push heroku master


