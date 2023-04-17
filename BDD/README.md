# Databases, Datas & Users
## Test set

### **Accounts** & **Unlock activities** are:

| Account | Unlock activities                       |
| :-----: | :-------------------------------------: |
| Prime   | *Medium activities* + CrossFit & HIIT\* |
| Medium  | *Basic activities* + Yoga & Pilates     |
| Basic   | Musculation, Cardio-training & Gym      |

_\*(High-Intensity Interval Training)_

## Command line install

Connect and execute `.sql` file.
Your mysql not found? [look here](MysqlNotFound.com)

1. Open terminal: 
```sh
    mysql -h [ip_server] -P [port_service] -u [sql_user] -p
```

2. Once connected to your mysql or mariadb server, import your sql file to run it:
```sh
    > source [your_file_path.sql]
```

### Exemple

* My **server** is on localhost: `127.0.0.1`.
* My mysql server is on the default **port**: `3306`.
* I use the **user** `root`.
* My **password** is the default one: `none` (don't write that :D)
* My `.sql` **file** is in my current directory `./file.sql`.

```sh 
    mysql -h 127.0.0.1 -P 3306 -u root -p
    Enter password: # Set nothing and tap `Enter` case
    > source ./file.sql
```

## FAST WAY INSTALL 🕊️

```sh 
    mysql -h 127.0.0.1 -P 3306 -u root -p

    source ./BDD_MySportReservation.sql
    exit
```