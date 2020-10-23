
<h2>Storyclash Test</h2>

This is a task for back-end and front-end

<h3>Introduction</h3>
You can see the online version here:
  <a href="http://storyclash123.herokuapp.com/" target="_blank">click here</a> (it is n't available any more)

<b>Note</b>: The application may be loaded slowly because it is one of free hosts
<hr />
<h4> Technical</h4>  
Used techniques are presented in the following:

Language:
<ul>
<li>PHP 7.2.*</li>
<li>CSS3</li>
<li>JS</li>
<li>HTML5</li>
</ul>

Framework and Library:
<ul>
<li>Laravel version 8.*</li>
</ul>

tools:
<ul>
<li>Docker</li>
<li>Compose</li>
<li>Git</li>
</ul>

Other:
<ul>
<li>PHPUnit</li>
<li>Object orinted</li>
<li>SOLID</li>
<li>facade, seeder, service provider, commands,  in Laravel </li>
</ul>
<hr />


 
<h3>install</h3> 
 
 <h4>install with docker</h4>
 1. Clone the source code from github repository. To do that open terminal and type the following command:
  
  <code>
    git clone https://github.com/Javad-Alirezaeyan/Storyclash.git
    </code>
          
 2. Then, open the  orderProduct directory with command: 
 
 <code>cd Storyclash </code>
  
  and run the following commands  to build nginx, php and laravel project to the containers of docker
    
  <code>
        sudo docker-compose up -d
  </code>
      
 
    
 3. Now, the necessary files and software has been installed on your computer. Type the following code to see container on docker service:
 
 <code>
    docker container ps
 </code>
 
you should see something like the following  text after running the above command:


 
    CONTAINER ID        IMAGE                          COMMAND                  CREATED             STATUS              PORTS                              NAMES
    2bc0256875fb        phpmyadmin/phpmyadmin:latest   "/docker-entrypoint.…"   37 minutes ago      Up 37 minutes       0.0.0.0:8180->80/tcp               storyclash2_phpmyadmin_1
    8ddc30cf66a2        mysql:5.7.22                   "docker-entrypoint.s…"   37 minutes ago      Up 37 minutes       3306/tcp, 0.0.0.0:3307->3307/tcp   db
    05b90f921953        digitalocean.com/php           "docker-php-entrypoi…"   37 minutes ago      Up 37 minutes       9000/tcp                           app
    93c21ba5682e        nginx:alpine                   "/docker-entrypoint.…"   37 minutes ago      Up 37 minutes       0.0.0.0:8000->80/tcp               webserver
  
 
 
 As a final step,  visit http://your_server_ip:8000 in the browser. If you install it in local  <a target="_blank" href="http://http://127.0.0.1:8000" > http://127.0.0.1:8000</a>

 <h4>install without docker</h4>
 To install without docker, you must have been installed the following:
 <ul>
   <li>Web server(Nginx or Apache2)</li>
   <li>PHP 7.2+</li>
   <li>MySql</li>
 </ul>
 
 1. Clone the source code from github repository. To do that open terminal and type the following command:
   
 
     git clone https://github.com/Javad-Alirezaeyan/Storyclash.git
    
           
  2. Then, open the  orderProduct directory with command: 
  
    cd Storyclash 
  
  3. configure the .env file(specially the configuration of database) 

  4. Then, run the following command to install the project(as default this command inserts some default 
  records to the database): 
    
    php artisan storyclash:install
  
  As a final step,  visit http://your_server_ip:8000 in the browser. 

##screenshots


![alt text](https://github.com/Javad-Alirezaeyan/Storyclash/blob/master/screenshots/1.png)

