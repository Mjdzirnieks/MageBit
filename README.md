# 📝 Laravel TODO App

A simple TODO application built with Laravel to manage tasks efficiently.

## 🚀 Features
- Create, Read, Update, and Delete (CRUD) tasks
- MySQL database integration
- User authentication (if needed)
- Bootstrap-styled views
- Docker support (optional)

---

## 🔧 Installation

### **1️⃣ Clone the Repository**
```bash
git clone https://github.com/Mjdzirnieks/MageBit.git
cd MageBit

### **2️⃣ Install Dependencies**
composer install
npm install

### **3️⃣ Set Up the Environment*
cp .env.example .env
php artisan key:generate

### **4️⃣ Set Up the Database*

DB_CONNECTION=mysql
DB_HOST=db  # This should be 'db' because that's the name of the MySQL service in Docker
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=todo_user
DB_PASSWORD=todo_password

php artisan migrate --seed

### **5️⃣ Start the Application*
php artisan serve

### ** Visit http://127.0.0.1:8000/tasks to use the app. or http://localhost:8000/ *

### ** 🏗 Project Structure
app/Models/Task.php - Defines the Task model

app/Http/Controllers/TaskController.php - Handles CRUD operations

resources/views/tasks/ - Blade templates for UI

routes/web.php - Defines the application routes

Running with Docker (Optional)
If you prefer using Docker:
docker-compose up -d
*
