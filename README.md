## About JongRienTech

## How to run the backend project

1. Config the ENV in an .env file

- Database connections
- Set default admin email in variable ADMIN_EMAIL
  and default admin password in the variable ADMIN_PASSWORD
- Set CORS_ALLOWED_ORIGINS for origins that are allowed to connect through api

2. Run the 'composer intall'

3. Run 'php artisan migrate' to migrate all the migrations

4. Run 'php artisan db::seed' to seed the default data

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
