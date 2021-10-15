# About
A single page chat application developed in PHP OOP, Mysql and AJAX.
## Users
email (password)
- abrazzaq@gmail.com (abrazzaq)
- john@gmail.com (john)
- sofia@gmail.com (sofia)
- sam@gmail.com (sam)


# Features

- Users can Register and login on chat system
- Non Registered users can't access chat system
- Update user status (online / offline) with ajax request
- Search Users with jquery
- Profile Update with user image
- PDO with prepared statements (Free From SQL Injection)
- No Page refresh for any task


# Configurations

- Create "chat_system" folder in htdocs or www folder
- Copy all the files into "chat_system" folder
- Configure database in config/db.php
- Replace `$project_dir = "/chat_system/"` with your project directory in config/init.php (if you have created folder with another name in htdocs)
- Replace `$project_dir = "/chat_system/"` with your htdocs folder in ajax/myajax.php
