#  HelpDesk Pro

> This is a **university mini project** built to satisfy academic requirements.
> It is not a production-ready application. The goal was to respect the given
> specifications and demonstrate core Laravel concepts — not to build a
> complete professional system.

A web-based IT support ticket management system built with **Laravel 10**,
**Bootstrap 5**, and **MySQL** — developed as part of a university course
in **Computer Systems Development**.

---

## Project Context

This project was built under a specific set of rules and requirements given
by the university. Every decision made — from the database structure to the
pages and features — was guided by those requirements.

I am aware this project can be improved in many ways:
- Role-based access control
- Ticket assignment workflow
- Search and filtering
- Notifications
- API support

These were intentionally left out because they were outside the scope of
the requirements. Given more time and freedom, the architecture would be
significantly different and more complete.

---

## Features (as required)

- Submit and track support tickets
- Priority levels: Critical, High, Medium, Low
- Status tracking: Open, In Progress, Resolved, Closed
- Ticket assignment to agents
- User and Agent management
- Category management
- Profile editing with optional password update
- Clean sidebar navigation
- Responsive UI with Bootstrap 5

---

## Tech Stack

| Layer        | Technology              |
|--------------|-------------------------|
| Backend      | Laravel 10 (PHP)        |
| Frontend     | Bootstrap 5 (via CDN)   |
| Database     | MySQL                   |
| Auth         | Custom (no Breeze)      |
| Templating   | Blade                   |
| Architecture | MVC                     |

---

## Database Structure

- `users` — stores admins, agents, and users
- `categories` — ticket categories (Network, Hardware, Software)
- `tickets` — support tickets with status, priority, and assignment

---

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/helpdesk-pro.git

# 2. Enter the project
cd helpdesk-pro

# 3. Install dependencies
composer install

# 4. Copy environment file
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Configure your database in .env
DB_DATABASE=helpdesk_pro
DB_USERNAME=root
DB_PASSWORD=your_password

# 7. Run migrations and seed
php artisan migrate --seed

# 8. Start the server
php artisan serve
```

---

## Default Login

| Email               | Password | Role  |
|---------------------|----------|-------|
| admin@helpdesk.com  | password | Admin |
| agent1@helpdesk.com | password | Agent |
| john@helpdesk.com   | password | User  |

---

## Note

This project represents what I was able to build within the constraints
of a university assignment. It follows the MVC pattern, applies Laravel
best practices where possible, and delivers all required features.

It is shared publicly to document the learning journey — not as a
reference for production use.

---

## License

This project is open source and available for everyone.
