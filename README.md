# 💡 Idea Project

A modern idea management platform built with Laravel, allowing users to create, organize, and share their ideas with images, links, and step-by-step instructions.

![Laravel](https://img.shields.io/badge/Laravel-13-red)
![PHP](https://img.shields.io/badge/PHP-8.4-blue)
![SQLite](https://img.shields.io/badge/Database-SQLite-green)
![License](https://img.shields.io/badge/License-MIT-yellow)

---

## ✨ Features

- 🔐 User authentication (Login & Register)
- 💡 Create and manage ideas
- 🖼️ Upload feature images
- 🔗 Add useful links to ideas
- 📝 Step-by-step implementation guides
- 📱 Responsive design for desktop and mobile
- ⚡ Fast frontend powered by Vite
- 🗄️ SQLite support for simple deployments

---

## 🛠️ Tech Stack

- **Laravel 13**
- **PHP 8.4**
- **SQLite**
- **Blade Components**
- **Tailwind CSS v4**
- **Vite**
- **Alpine.js**

---

## 🚀 Installation

Clone the repository:

```bash
git clone https://github.com/your-username/idea-project.git
cd idea-project
```

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

Create environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Create SQLite database:

```bash
touch database/database.sqlite
```

Update your `.env` file:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

Run migrations:

```bash
php artisan migrate
```

Create storage link:

```bash
php artisan storage:link
```

Build frontend assets:

```bash
npm run build
```

Start the development server:

```bash
php artisan serve
```

---

## 📦 Deployment

For production:

```bash
composer install --no-dev --optimize-autoloader
npm run build

php artisan migrate --force
php artisan storage:link

php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Environment variables:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

---

## 📂 Project Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome.

1. Fork the project
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Open a Pull Request

---

## 📄 License

This project is licensed under the MIT License.
