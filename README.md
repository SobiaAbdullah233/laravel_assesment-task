# Laravel Assesment task 1
In laravel-product assesment I created Products CRUD and its api's
<h3> 1: For creating tables in database run this command </h3>
      php artisan migrate
<h3> 2: Start the localhost server run following command </h3>
      php artisan serve

# Laravel assesment task 2
In laravel-auth assesment I build a role and Permission and Authentication using passport auth . Open the project
<h3>1: Creating a Personal Access Client</h3> 
<p>Before application can issue personal access tokens, We will need to create a personal access client . generate client credentials  with the following command <br> </p>
  <b>php artisan passport:client --personal</b> 
  <h3>2: The below command will create tables into database using Laravel migration and seeder.</h3>
  <strong>php artisan migrate:fresh --seed</strong>
  <h3>3: Paste the PRODUCT microservice url in laravel-auth env file with following variable</h3>
  <strong>PRODUCT_MICROSERVICE_URL = 172.0.0.1:8001</strong> 
  <h3> 4: Start the localhost server run following command </h3>
  <strong>php artisan serve</strong>
  <h3>For checking the admin , manager and user roles get the credentials from UserSeeder </h3>
  




