# 🎓 EduLearn - E-Learning Web Application

A full-featured E-Learning platform built with **Laravel** and **Bootstrap 5**. The application features authentication, course management, student enrollment system, user/admin roles, and a dedicated **Admin Dashboard**.

---

## ✨ Key Features

### 🔐 Authentication & Roles
- **User Authentication:** Login and Registration system (`login.blade.php`, `register.blade.php`).
- **Middleware Security:** Custom Middleware (`AdminMiddleware`, `UserMiddleware`) to protect routes based on user roles.

### 👨‍💼 Admin Dashboard
- **Statistics Overview:** Real-time counters for Total Courses, Students, Registrations, and Unique Instructors using SQL `DISTINCT`.
- **Enrollment Management:** Real-time viewing and deletion of student course enrollments.
- **Dynamic Badges:** Automated course difficulty indicators (`Beginner`, `Intermediate`) using string normalization (`trim` & `strtolower`).

### 🎓 Student & Visitor Portal
- **Interactive Home Page:** Browse available courses (`index.blade.php`, `welcome.blade.php`).
- **Course Catalog:** Dedicated course listing views (`courses` folder).

---

## 🛠️ Tech Stack

- **Backend Framework:** PHP 8.x / Laravel 10.x
- **Frontend Architecture:** Blade Templates, Bootstrap 5, FontAwesome Icons
- **Database:** SQLite (`database.sqlite`) / MySQL supported
- **Architecture:** Model-View-Controller (MVC) Pattern

---

## 📁 Key Project Files & Architecture

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/ (DashboardController, CourseController, EnrollmentController, AuthController, HomeController)
│   │   └── Middleware/ (AdminMiddleware, UserMiddleware)
└── Models/ (Course, Enrollment, User)
resources/
└── views/
    ├── admin/       # Admin Control Panel Views
    ├── courses/     # Course Listing & Detail Views
    ├── user/        # User Profile & Dashboard Views
    ├── layouts/     # Shared Components (Header, Footer, Layouts)
    └── auth views   # login, register, welcome, index
routes/
└── web.php          # Application HTTP Routes
