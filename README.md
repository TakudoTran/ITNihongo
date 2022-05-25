
## Make sure that u have already installed composer, or download it here https://getcomposer.org/
  ## Step1: In phpmyadmin, Create a new database for project: (example: itnihongo (utf8mb4_general_ci)) 
  ## Step2: Go to htdocs/this_project folder then open git Bash here
   ### - Run command: composer install
   ### - Run command: cp .env.example .env (or: copy .env.example .env)
   ### Open: .env -> edit: DB_DATABASE (exp: DB_DATABASE=itnihongo)
   ### - Run command: php artisan key:generate
   ### - Run command: php artisan migrate
   ### - Run command: php artisan storage:link
   ### - Run command: php artisan db:seed
  ## Step3: Run command: php artisan serve
        
default available user: test@gmail.com, password: test 

