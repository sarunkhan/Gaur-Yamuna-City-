# GBU Website + Admin Panel + MySQL

## Requirements
- PHP 8.1+
- MySQL 8+ / MariaDB 10.6+
- Apache/Nginx with PHP
- PDO MySQL extension

## Installation
1. Create/import the database:
   `mysql -u root -p < database/schema.sql`
2. Edit `config/config.php` with your real MySQL host, database, username and password.
3. Upload the complete project to your hosting public folder.
4. Open `/admin/login.php`.
5. Demo admin:
   Email: `admin@gbu.local`
   Password: `ChangeMe@123`
6. Immediately create a real admin account and remove/change the demo account.

## Included
- Public responsive website
- Admin authentication with PHP sessions
- Password hashing
- CSRF protection
- Notices CRUD
- Courses CRUD
- Events CRUD
- Admin user creation
- MySQL database schema
- Dashboard counts
- Mobile responsive admin UI

## Production hardening
- Enable HTTPS.
- Change DB credentials and demo admin.
- Disable PHP error display in production.
- Add server-side rate limiting / login throttling.
- Add backups and role-based permissions before production use.
- Replace demo images and content with official university-approved assets.
