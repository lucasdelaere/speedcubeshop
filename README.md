# SpeedCubeShop

## Installation Laravel Project 
### Make sure you have:
- composer and node.js installed on your machine
-  wamp/mamp/xamp installed (or any other software for running apache/myqsl/php servers) 

### Installation:
1. git clone repo 
2. cd into project
3. npm install 
4. composer install
5. Copy .env.example to **.env** and put all necessary settings inside mail, database, stripe...
6. php artisan key:generate 
7. Open project in editor and DELETE assets folder completely inside public folder if it exists (public/assets) 
8. php artisan storage:link (setting storage link for images) 
9. Start your wamp, mamp or xamp server 
10. Create inside the server your databasename 
11. php artisan migrate:fresh --seed 
12. npm run dev 
13. php artisan serve (then click on localhost)
