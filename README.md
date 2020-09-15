# User Login 
*Check path in Postman*
This is a *POST* request helps you login to the API to get **Authentication Token**.
You have to submit a form with the following keys:-
- **email*** - A valid Email Address of the User
- **password*** - The user's password

Returns JSON containing:-
- **User data** and **Auth Token**


# Register User 
*Check path in Postman*
This is a *POST* request helps you register new user to the API to get **Authentication Token**.
You have to submit a form with the following keys:-
- **name*** - A valid name of the User
- **email*** - A valid Email Address of the User
- **password*** - The user's password
- **confirm*** - The user's password

Returns JSON containing:-
- **User data** and **Auth Token**


# Show User Profile 
*Check path in Postman*
This is a *GET* request helps you request authenticated user info from the API.
You have to send **Auth Token** in the *Authorization Bearer*
Returns JSON containing:-
- **User data**

# All other Requests follow the same partern!
##### I have exported the Postman collection and Environment with the project files.
##### Check the folder **__Postman Exports**