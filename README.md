# Admin Dashboard

This template is built with PHP Laravel and Vue.js for SPA web application. It's free to use and can be used by multiple bloggers.

<p align="center">
  <img src="https://github.com/islamsamy214/admin-laravel-vue-bootstrap/blob/master/public/admin-screenshot.png?raw=true" alt="Screenshot of Admin Dashboard">
</p>

## Installation Steps

1. Clone the repository.
2. Create a MySQL database with your favorite name ex:"blogs".
3. Run the following commands:

```
composer install
```

```
cat .env.example > .env
```

```
php artisan key:generate
```

4. Customize the vars in the `.env` file with your database info.
5. Run migration and seed:

```
php artisan migrate --seed
```

6. Install npm packages and build assets:

```
npm install && npm run production

```

7. Start the application:

```
php artisan serve
```

and open this URL in your browser `127.0.0.1:8000`
<<<<<<< HEAD
use this these credentials for login email: `super_admin@app.com` pass: `12345678`
=======
use this these credentials for login email: `super_admin@app.com` pass: `123456789`
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

## Development

For development, you can run:

```
npm run watch
```

or

```
npm run hot
```

## Donation

If you find this helpful, consider buying me a coffee :)

<center>

[![QR Code for Donation](https://github.com/islamsamy214/admin-laravel-vue-bootstrap/blob/master/public/bmc_qr.png?raw=true)](https://www.buymeacoffee.com/islamsamy)

</center>
