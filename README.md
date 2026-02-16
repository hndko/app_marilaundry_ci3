# MariLaundry 🧺

**A Modern and Efficient Laundry Management System**

MariLaundry is a comprehensive web-based application designed to streamline laundry business operations. Built with a focus on speed, reliability, and modern user experience, this platform empowers laundry owners to manage transactions, customers, services, and finances in one integrated dashboard.

---

## ✨ Key Features

### 📊 Advanced Dashboard & Analytics

- **Live KPI Tracking**: Monitor total orders, active customers, and revenue at a glance.
- **Revenue Trends**: Interactive charts showing monthly income progress.
- **Service Distribution**: Visualization of top-performing laundry services.
- **Recent Activity**: Quick view of latest orders and their status.

### 💼 Core Management

- **Transaction Entry**: Streamlined workflow for creating orders, weighing, and service selection.
- **Master Data**: Full CRUD for Customer databases and Laundry Services.
- **Finance & Expenses**: Track operational costs and maintain financial health.
- **Reporting**: Generate daily/monthly reports with PDF export capability.

### 📱 Notification System

- **WhatsApp Integration**: Automated order status updates (Ready to Pickup/Finished) sent directly to customers via Fonnte API.
- **Real-time Status**: Keep customers informed and improve service satisfaction.

### 🔒 Security & User Management

- **Role-Based Access Control (RBAC)**: Defined roles for **Super Admin, Admin, Owner, and Operator**.
- **Modern Authentication**: Secure login with password hashing and a beautiful, split-screen glassmorphism interface.
- **System Protection**: Protection for core system accounts from unauthorized modification.

---

## 🛠️ Technology Stack

| Layer              | Technology                                |
| ------------------ | ----------------------------------------- |
| **Core Framework** | PHP / CodeIgniter 3.1.13                  |
| **Database**       | MySQL (Optimized with UTF8mb4 for Emojis) |
| **Frontend UI**    | AdminLTE 3 / Bootstrap 4                  |
| **Interactive UI** | Chart.js, DataTables, SweetAlert2         |
| **Integration**    | Fonnte WhatsApp API Gateway               |
| **Tools**          | Composer, PHPUnit (Dev)                   |

---

## ⚙️ Installation & Setup

1. **Clone the repository**:

   ```bash
   git clone https://github.com/yourusername/app_marilaundry_ci3.git
   ```

2. **Configure Database**:
   - Create a database named `db_marilaundry`.
   - Import the provided SQL structure or run migrations.

3. **Install Dependencies**:

   ```bash
   composer install
   ```

4. **Environment Configuration**:
   - Update `application/config/database.php` with your DB credentials.
   - Configure WhatsApp API Key in the application settings menu.

---

## 📸 Preview

_(Structure for your portfolio screenshots)_

| Login Page                                           | Dashboard                                                    |
| ---------------------------------------------------- | ------------------------------------------------------------ |
| ![Login Redesign](assets/dist/img/preview_login.jpg) | ![Dashboard Overview](assets/dist/img/preview_dashboard.jpg) |

---

## 👨‍💻 Author

**Kyoo** - _Lead Developer_

---

> Developed with ❤️ for the Laundry Industry.
