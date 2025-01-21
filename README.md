# Laravel Tutorial Task Management System


## Requirements

- PHP 8.1+
- Composer
- Docker & Docker Compose (for Laravel Sail)
- Node.js & npm (for frontend assets)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ercanakca/x-tms
   cd x-tms
   ```

2. Copy the `.env.example` file to `.env` and configure your environment variables:

   ```bash
   cp .env.example .env
   ```

3. Install dependencies using Composer:

   ```bash
   composer install
   ```

4. Install frontend dependencies using npm:

   ```bash
   npm install
   ```

5. Set up Laravel Sail (Docker-based development environment):

   ```bash
   ./vendor/bin/sail up -d
   ```

6. Run the following Sail commands to set up the application:

   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate
   ./vendor/bin/sail npm run dev
   ```

7. Access the application in your browser at `http://localhost`.
