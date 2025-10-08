## **Project Overview**

An admin dashboard built with **Laravel** that allows business owners to manage invoices.

**Features:**

-   Admin authentication with profile picture.
-   Manage Customers (Create, Read, Update, Delete) with profile pictures.
-   Manage Invoices (Create, Read, Update, Delete) with status (Paid, Unpaid, Pending).
-   Dashboard with stats overview, charts, and latest records.
-   Pagination for customers and invoices tables.
-   Simple and clean UI using Blade templates.

---

## **Tech Stack**

-   **Backend:** Laravel latest, PHP 8+
-   **Database:** MySQL
-   **Frontend:** Blade Templates, css
-   **Other:** Laravel Eloquent, Factories & Seeders for fake data

---

## **Setup Instructions**

### **1️⃣ Clone the repository**

### **2️⃣ Install dependencies**

```bash
composer install
```

### **3️⃣ Set up environment variables**

-   Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

-   Configure the database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_billing
DB_USERNAME=root
DB_PASSWORD=
```

### **IMPORTANT Create Database mini_billing**

Here’s a **clear, step-by-step version** for PowerShell, keeping the password empty:

---

### **Step 1: Open PowerShell**

Make sure MySQL is installed and the path is set (or navigate to MySQL folder, e.g., `C:\xampp\mysql\bin`).

---

### **Step 2: Log in to MySQL with an empty password**

```powershell
mysql -u root -p
```

-   When prompted for a password, just press **Enter** (leave it empty).

---

### **Step 3: Create the database**

At the MySQL prompt, run:

```sql
CREATE DATABASE mini_billing;
```

-   You should see: `Query OK, 1 row affected`

---

### **Step 4: Exit MySQL**

```sql
exit;
```

---

Now the `mini_billing` database exists, ready for Laravel migrations.

---

### **4️⃣ Generate application key**

```bash
php artisan key:generate
```

### **5️⃣ Run migrations & seeders**

```bash
php artisan migrate --seed
```

> This will create all tables and add a default admin user:
>
> **Email:** `admin@example.com` > **Password:** `password123`

---

### **6️⃣ Link storage (for customer/admin pictures)**

```bash
php artisan storage:link
```

---

### **7️⃣ Run the application**

```bash
php artisan serve
```

-   Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)
-   Admin login: [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

---

## **Folder Structure Highlights**

-   `app/Models/` → Admin, Customer, Invoice models
-   `app/Http/Controllers/` → AdminAuthController, CustomerController, InvoiceController, DashboardController
-   `database/migrations/` → Table structure
-   `database/seeders/` → Default admin, fake customers & invoices
-   `resources/views/` → Blade templates for dashboard, customers, invoices

---

## **Admin Credentials**

-   **Email:** [admin@example.com](mailto:admin@example.com)
-   **Password:** password123

---
