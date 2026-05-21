# Blog-management-system with AJAX Filtering

A responsive Blog Management System built using PHP, MySQL, HTML, CSS, JavaScript, jQuery, and AJAX.  
The project allows admins to manage blogs dynamically through a secure dashboard while users can browse, search, and filter blogs without page reloads.  
It includes category-wise filtering, date filtering, rich text editing, image uploads, and a fully responsive frontend for both mobile and desktop devices.  
The system uses AJAX and jQuery for smooth user experience and real-time filtering.  
This project was developed as part of the JobYaari Developer Assessment.

---

## 🚀 Live Website

Frontend Homepage:  
https://barshablog.infinityfreeapp.com

Admin Dashboard:  
https://barshablog.infinityfreeapp.com/admin/dashboard.php

Admin Panel:  
https://barshablog.infinityfreeapp.com/admin/login.php

Add Blog Page:  
https://barshablog.infinityfreeapp.com/admin/add-blog.php

---

##  Admin Credentials

Email: admin@gmail.com  
Password: admin123

---

##  Features

### Frontend Features
- Responsive blog listing page
- Dynamic blogs fetched from MySQL database
- Blog detail page
- AJAX search functionality
- AJAX category filter
- AJAX date filter
- Read More functionality
- Mobile & laptop responsive UI
- Loading state during AJAX requests
- Empty state UI when no blogs found

### Admin Features
- Admin login/logout system
- Add new blogs
- Edit existing blogs
- Delete blogs
- Upload blog images
- Rich text editor (CKEditor)
- Add headings, bullet points, bold text, tables, etc.
- Category management support

---

##  Tech Stack

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- jQuery
- AJAX
- CKEditor
- InfinityFree Hosting

---

##  Project Structure

```bash
Blog-management-system/
│
├── admin/
├── ajax/
├── assets/
│   ├── css/
│   ├── js/
│   └── uploads/
│
├── config.php
├── index.php
├── blog.php
├── database.sql
└── README.md
```

---

##  Setup Instructions

### 1. Clone Repository

```bash
git clone https://github.com/barsha20061001/Blog-management-system
```

### 2. Move Project

Move the project folder inside:

```bash
C:\xampp\htdocs\
```

### 3. Start XAMPP

Start:
- Apache
- MySQL

### 4. Create Database

Open:

```bash
http://localhost/phpmyadmin
```

Create database:

```bash
jobyaari_blog_db
```

### 5. Import Database

Import the provided:

```bash
database.sql
```

file into phpMyAdmin.

### 6. Configure Database

Update `config.php` with your database credentials if needed.

### 7. Run Project

Open:

```bash
http://localhost/Blog-management-system/
```

---

##  Main Functionalities

- Blog CRUD Operations
- AJAX Filtering Without Page Reload
- Rich Text Blog Editor
- Dynamic MySQL Integration
- Fully Responsive Design
- Image Upload System

---

##  Deployment

The project is deployed using InfinityFree hosting.

---

## 👨‍💻 Developer

Developed by Barsha Mondal . 
