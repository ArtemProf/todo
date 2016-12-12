# TODO App in [Yii2 & Angular 1.6](http://angularjs.org)

Using [InnoDB](http://www.mysql.com/) as a storage.

### Installation
1. Install frontend dependencies
```bash
bower update
```
2. Install backend dependencies
```bash
composer update
```
3. Create a new db, tou may use name 'todo'
4. Edit common/config/db.php

5. Run to create tables and admin account **(admin@admin.ru::root123)**
```bash
./common/yii migrate
```
6. Link your Apache or NGINX with public directory:
**frontend/web**

### Developing

Before editing run grunt, it will watch after your file 
changes and will recompile css, refresh page
```bash
$ grunt
```

Use 'todo.me' as a production alias
Use 'todo.dev' as a development alias

### Production
Remove db.local.php

### General Features
- User registration
- Remind the password
- Edit profile
- Add/edit/delete tasks
- Set task one of the New/In progress/Finished statuses

### Admin panel features
- Remove users
- Make a user as admin
- Edit/remove tasks of any user

### Packege managers
- bower
- composer
- grunt