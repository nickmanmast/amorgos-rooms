# Amorgos Rooms

An educational accommodation directory prototype for Amorgos, Greece, built in 2024 with PHP, MySQL, HTML, CSS and JavaScript.

The project was developed collaboratively as coursework for a web applications course. Accommodation information is demo data and should not be used for real travel or booking decisions. This repository preserves an early learning project with incomplete features and known limitations.

## Project scope

- Accommodation information pages and name-based database search.
- User registration, email activation, login and logout code.
- A contact / reservation request form with database storage and email notifications.
- Client-side and server-side form validation code.

These features describe the original implementation scope. They have not been revalidated on a current environment.

## Technology

- HTML and CSS
- JavaScript
- PHP with MySQLi
- MySQL / MariaDB
- PHPMailer for SMTP email

## Local setup

1. Install a local PHP web server and MySQL / MariaDB, for example through XAMPP.
2. Place the application files in the server's document root, in a folder named `amorgos-rooms-php`.
3. Start the web server and database server.
4. Create a database named `amorgos_rooms_db` and import the project's SQL dump. In the original archive this is named `amorgos_rooms_db (1).sql`.
5. Configure the database connections in the PHP backend files. The original code assumes `localhost`, user `root`, an empty password and database `amorgos_rooms_db`; adapt these values to your local environment.
6. Configure SMTP in `contactBackEnd.php` and `sign-upBackEnd.php`, using private local configuration or environment variables. Do not commit real SMTP credentials.
7. Update the activation URL in `sign-upBackEnd.php` to match your local server. The original code contains a fixed local network address.
8. Open `http://localhost/amorgos-rooms-php/index.html`.

The original archive includes PHPMailer under `vendor/`, but does not include a root `composer.json` or `composer.lock`. Preserve the bundled dependency and its license files until dependency installation is configured with Composer.

Email-dependent flows need working SMTP configuration. The original registration code and SQL schema also require review before assuming registration works; see the limitations below.

## Database

The supplied SQL dump defines three tables:

- `rooms`: accommodation entries; the original dump includes sample rows.
- `users`: user accounts and activation fields.
- `reservation`: contact / reservation request details.

The original dump contains inserts for `rooms` only. Any future sample dataset should use fictional information and exclude real accounts, password hashes, activation tokens and reservation details.

## Known limitations and future improvements

- The administration area and accommodation page creation workflow are incomplete.
- Location dropdown filtering is not implemented.
- The backend builds SQL queries with user input; queries should use prepared statements.
- Password handling uses MD5 and should be migrated to `password_hash()` and `password_verify()`.
- Registration inserts values without naming columns, and their order does not match the supplied `users` schema.
- The reservation handler contains duplicate insert paths that need review.
- Database and SMTP configuration should be centralized outside committed source code.
- Activation links should use a configurable base URL.

This is a historical educational prototype and requires further work before use with real users or public deployment.

## Hosting

GitHub hosts the source code. Running the full application requires a PHP runtime, a database server and SMTP configuration. GitHub Pages cannot execute the PHP backend.

## Credits

Developed collaboratively by Nikolas Mastrapas and Panagiotis Stathousis. Both contributors are credited in the original coursework documentation.

Third-party libraries retain their respective licenses. Image sources and reuse permissions should be documented separately before redistribution.
