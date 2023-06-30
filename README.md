## Introduction
- To prevent snooping and session hijacking, my host enables HTTPS. 
- The link for the deployed application is [here](https://thirdassignment-1492b719011b.herokuapp.com/).
- The login credentials for the normal user are: 
  - Email: ignacio@gmail.com 
  - Password: 12345678

- The login credentials for the admin user are: 
  - Email:ignacioamat11@gmail.com 
  - Password: 12345678

# Assignment 3

The application contains one or more features to prevent IDOR attacks. 
- An unregistered user can only view the basic laravel homepage.
- A registered user can login and view the empty dashboard and the foos page containing a table. Also, you can create, edit and delete foos that you created.

- An admin, can login and view the empty dashboard, the foos page containing a table and view the users page.
  - This user can also create a new foo, edit an existing foo, and delete a foo, even if it is not his.
  - Also the admin user can create a new user, edit an existing user, and delete a user.
