# social-public-platform
Admin panel to post articles.
Ability to add one or more photos to the article.
Tag Articles
Frontend to list and display article.
Your application should consist of the followings.

Database migrations and seeds (Use Faker library to create dummy data)
CRUD and Resource Controllers
Form Validation and Requests
Bootstrap as a CSS framework.


PHP version: 8.1

The steps are as follows for project setup:

1.	git clone https://github.com/sudesh-agrawal/social-publishing-platform.git
2.	cd [clone directory name]
3.	Copy .env.example file as .env file on root folder.
4.	Create database.
5.	Set up DB_DATABASE (Database name), DB_USERNAME (Database user name), DB_PASSWORD (Database password) in .env file.

Now run this command in your terminal:

6.	composer install
7.	npm install
8.	php artisan migrate
9.	php artisan db:seed
10.	php artisan storage:link
11.	php artisan key:generate
12.	php artisan serve

Login Details:
Url: https://yourdomain.com/login
User: admin@gmail.com
Pass: 123456
