# bakeryapp

My simple website all about bakery.

## Required
1. Mysql MariaDB 14.
2. PHP >=7.2
3. Apache or Nginx server
4. Your Mental :)

## Installation

Put this project into your localhost directory or if you download manually extract first,
after that put that thing to your localhost directory.

Open your mysql, phpmyadmin the easiest way for newbie user.
1. Create database with name : `bakery_app`.
2. Make sure you already in database page, Click `Import` on the top of database detail.
3. Click `Choose File` search sql on this repos on directory `sql` and then click `bakery_app.sql`.
4. After that click Go on the bottom of page.
5. Wait until all saved on your database.

Enjoy :)

## Configuration

### Connection configuration
1. Change connection config from `config/Connection.php`,
2. Set your mysql server configuration on `$con = mysqli_connect("127.0.0.1","root","your_password","bakery_app");`, change `"root"` into your user mysql and `"your_password"` into your mysql password.

### Mysql User Settings
1. Go to phpmyadin or mysql terminal,
2. Click on bakery_app database,
3. Open users table, and then click the pencil icon on line the user field.
4. Change into your username and password what ever you want.
5. On field password click the function and select `MD5`.
6. Click `Go` for update field data.

Index : `localhost/{directory}/`
Admin : `localhost/{directory}/adm/v1/login.php`

