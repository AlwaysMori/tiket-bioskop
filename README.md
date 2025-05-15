<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Tiket Bioskop (Movie Ticket System)

A web application for movie ticket booking and management.

## Project Overview

This is a Laravel-based web application for booking movie tickets online. The system allows users to browse movies, check showtimes, and purchase tickets.

## Technologies Used

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL (assumed)
- **Authentication**: Laravel's built-in authentication

## Project Structure

```
d:\Joki\tiket-bioskop\
├── app/                      # Application code
│   ├── Console/              # Artisan commands
│   ├── Exceptions/           # Exception handlers
│   ├── Http/                 # Controllers, Middleware, Requests
│   │   ├── Controllers/      # Application controllers
│   │   ├── Middleware/       # HTTP middleware
│   │   └── Requests/         # Form requests
│   ├── Models/               # Eloquent models
│   └── Providers/            # Service providers
├── bootstrap/                # Application bootstrap files
├── config/                   # Configuration files
├── database/                 # Database migrations and seeds
│   ├── factories/            # Model factories
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── public/                   # Publicly accessible files
│   ├── css/                  # Compiled CSS
│   ├── js/                   # Compiled JavaScript
│   └── images/               # Public images
├── resources/                # Uncompiled assets
│   ├── css/                  # CSS source files
│   ├── js/                   # JavaScript source files
│   └── views/                # Blade templates
│       ├── components/       # Reusable UI components
│       │   └── hero-alt.blade.php  # Alternative hero section
│       ├── layouts/          # Layout templates
│       └── pages/            # Page templates
├── routes/                   # Application routes
│   ├── web.php               # Web routes
│   ├── api.php               # API routes
│   └── channels.php          # Broadcasting channels
├── storage/                  # Application storage
├── tests/                    # Test cases
├── vendor/                   # Composer dependencies
├── .env                      # Environment variables
├── composer.json             # Composer dependencies
├── package.json              # NPM dependencies
└── README.md                 # Project documentation
```

## API Endpoints

### Authentication
- `POST /api/auth/register` - Register a new user
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout
- `GET /api/auth/user` - Get authenticated user info

### Movies
- `GET /api/movies` - List all movies
- `GET /api/movies/{id}` - Get movie details
- `GET /api/movies/showing` - Get currently showing movies
- `GET /api/movies/upcoming` - Get upcoming movies
- `POST /api/movies` - Add a new movie (admin)
- `PUT /api/movies/{id}` - Update movie details (admin)
- `DELETE /api/movies/{id}` - Delete a movie (admin)

### Showtimes
- `GET /api/showtimes` - List all showtimes
- `GET /api/showtimes/{id}` - Get showtime details
- `GET /api/movies/{id}/showtimes` - Get showtimes for a specific movie
- `POST /api/showtimes` - Add a new showtime (admin)
- `PUT /api/showtimes/{id}` - Update showtime details (admin)
- `DELETE /api/showtimes/{id}` - Delete a showtime (admin)

### Theaters
- `GET /api/theaters` - List all theaters
- `GET /api/theaters/{id}` - Get theater details
- `GET /api/theaters/{id}/showtimes` - Get showtimes for a specific theater

### Bookings
- `GET /api/bookings` - Get user's bookings
- `GET /api/bookings/{id}` - Get booking details
- `POST /api/bookings` - Create a new booking
- `DELETE /api/bookings/{id}` - Cancel a booking

### Seats
- `GET /api/showtimes/{id}/seats` - Get available seats for a showtime
- `POST /api/seats/reserve` - Reserve seats for a booking

### Reviews
- `GET /api/movies/{id}/reviews` - Get reviews for a movie
- `POST /api/movies/{id}/reviews` - Add a review for a movie
- `PUT /api/reviews/{id}` - Update a review
- `DELETE /api/reviews/{id}` - Delete a review

## Features

- User registration and authentication
- Browse available movies
- View movie details and showtimes
- Book and purchase tickets
- User dashboard to manage bookings

## Installation

1. Clone the repository
   ```
   git clone [repository-url]
   ```
2. Install PHP dependencies
   ```
   composer install
   ```
3. Install NPM dependencies
   ```
   npm install
   ```
4. Create and configure .env file
   ```
   cp .env.example .env
   php artisan key:generate
   ```
5. Configure your database in .env
6. Run migrations and seeders
   ```
   php artisan migrate --seed
   ```
7. Compile assets
   ```
   npm run dev
   ```
8. Start the development server
   ```
   php artisan serve
   ```

## Usage

Visit `http://localhost:8000` in your browser to access the application.

## License

[MIT License](LICENSE)

## Notes

This README is based on limited information and should be updated with complete project details as they become available.
