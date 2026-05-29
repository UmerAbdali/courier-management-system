# Courier Management System

A PHP-based courier management web application for Admin, Agent, and User workflows.

## Features

- Admin / Agent login
- Courier creation, update, delete
- Agent branch-level access
- Customer management
- Agent management
- Shipment reports and CSV export
- User registration and tracking by consignment number
- Printable tracking status

## Installation

1. Install PHP on your system.
2. Open a terminal in this folder.
3. Run `php install.php`.
4. Start the built-in PHP server:
   `php -S localhost:8000`
5. Open `http://localhost:8000` in your browser.

## Default credentials

- Admin: `admin@example.com` / `password123`
- Agent: `agent@example.com` / `agentpass`

## Notes

- The app stores data in `data/database.sqlite`.
- Run `install.php` once before using the app.
