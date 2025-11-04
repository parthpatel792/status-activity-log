# 🧾 Laravel StatusActivityLog

A lightweight Laravel package to automatically log model activities and status changes with user, IP, and timestamp details.

---

## 🚀 Installation

```bash
composer require yourgithubname/status-activity-log


⚙️ Setup

After installation, run migrations:

php artisan migrate
php artisan db:seed --class="StatusActivityLog\\Database\\Seeders\\StatusSeeder"


(Optional) publish migrations if you want to modify them:

php artisan vendor:publish --tag="status-activity-log"
