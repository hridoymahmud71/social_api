### Environment Setup
 *Laravel 8* was used for development and **php 7.4** was used in the local environment.

### Api documentation
```https://www.getpostman.com/collections/d9f1f4bfc94e2d0c0c80```

Api documentation can be found in the shareable link above. Please import to postman from this link

### Migration
Run ```php artisan migrate:fresh --seed```
### How to run ?
Locally simply run the file by  ```php artisan serve```
If you deploy in a domain like ```mydomain.com``` make sure you set the root path upto **public** folder . So your path should be like ```/path/to/your_project/public```
Configure the env accordingly