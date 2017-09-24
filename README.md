
# Docker in Motion from Manning Publications

Welcome to the Github repository for [Docker in Motion]('https://livevideo.manning.com')

- [Get the course]('http://bit.ly/2vvz2sA')
- [Watch how this was made]('https://www.youtube.com/watch?v=ldhZuwkJME0&list=PLZdsdjcJ44WW7BRBe6C0VhRJZO-dow-Pw&index=5')
- [Subscribe to HowToCodeWell YouTube channel]('http://bit.ly/2wf9ufB')
- [Web server images](#web-server-images)
  -  [Pull the web server image](#pull-the-web-server-image)
  -  [Build the web server image](#build-the-web-server-image)
- [Database images](#database-images)
  -  [Pull a database server image](#pull-a-database-server-image)
  -  [Build the database container](#build-the-database-container)
  -  [Run the database container](#run-the-database-container)
  -  [Rebuild the database](#rebuild-the-database)

## Web server images

Web server images can be found on the [Docker hub]('https://hub.docker.com/r/howtocodewell/manning-webserver-01/tags/')

You can either pull the Docker image or build it

### Pull the web server image:

```$ docker pull howtocodewell/manning-webserver-01:<tag>  ```

### Build the web server image:


```
$ cd code/apache/
$ docker build -t webserver . 
 ```

## Database images

Database server images can be found on the [Docker hub]('https://hub.docker.com/r/howtocodewell/manning-database-01/tags/')

You can either pull the Docker image or build it

### Pull a database server image

```$ docker pull howtocodewell/manning-database-01:<tag>  ```

### Build the database container

```
$ cd code/mysql/
$ docker build -t mysql-server . 
 ```

## Run the database container

```$ docker run --name mysql -e MYSQL_ROOT_PASSWORD=<password>  -d mysql-server ```

## Rebuild the database

Log into the MYSQL container

```$ docker exec -it mysql mysql -u root -p```

Enter password

Run the rebuild script from within the container

```mysql> source /schemas/rebuild.sql```