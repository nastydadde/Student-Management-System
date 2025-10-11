# Student Management System

A comprehensive web-based Student Management System built by Team 818 that helps educational institutions manage students, track attendance, monitor results, and maintain records efficiently.

## 📋 Table of Contents
- [Features](#features)
- [Screenshots](#screenshots)
- [User Roles](#user-roles)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Demo Credentials](#demo-credentials)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)

## ✨ Features

### Core Functionality
- **Student Management**: Add, edit, and delete student records
- **Attendance Tracking**: Monitor and manage student attendance
- **Results Management**: Track and manage semester results
- **Follow-Up History**: Keep track of student follow-ups and interactions
- **Email Notifications**: Automated email notifications for important events
- **Report Generation**: Generate detailed PDF reports
- **CSV Import/Export**: Bulk import and export student data
- **Contact Management**: Maintain contact information for students

### Dashboard Features
- Real-time overview of total students
- Pending follow-ups tracker
- Quick access to all major functions
- User-friendly interface with sidebar navigation

## 📸 Screenshots

### Dashboard View
![Dashboard](https://raw.githubusercontent.com/Nisarg-Vekariya/Student-Management-System/main/screenshots/dashboard.png)
*Main dashboard showing system overview and quick access features*

### Students Management
![Students List](https://raw.githubusercontent.com/Nisarg-Vekariya/Student-Management-System/main/screenshots/students.png)
*Student listing page with search, filter, and action options*

## 👥 User Roles

### 1. Super Admin
- **Full System Access**: Complete control over all system features
- **Bulk Operations**: Delete all students, import/export CSV files
- **Admin Management**: Create and manage other admin accounts
- **System Configuration**: Modify system-wide settings

### 2. Admin (Teacher)
- **View Access**: Can view all student data
- **Basic Operations**: Add and edit individual student records
- **Reports**: Generate and download reports
- **Limited Permissions**: Cannot perform bulk deletions or system modifications

## 🛠️ Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: Laravel (PHP Framework)
- **Database**: MySQL
- **Additional Libraries**: 
  - PDF generation for reports
  - CSV parsing for import/export
  - Laravel built-in authentication system

## 📦 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Nisarg-Vekariya/Student-Management-System.git
   cd Student-Management-System
   ```

2. **Install dependencies**
   ```bash
   # Install PHP dependencies via Composer
   composer install
   
   # Install Node dependencies for frontend assets
   npm install
   ```

3. **Configure Environment**
   ```bash
   # Create .env file from example
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Configure Database**
   ```bash
   # Create a MySQL database named 'student_management' (or your preferred name)
   
   # Update .env file with your database credentials:
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=student_management
   # DB_USERNAME=your_username
   # DB_PASSWORD=your_password
   ```

5. **Configure Email Settings**
   ```bash
   # Update .env file with your email configuration for notifications:
   # MAIL_MAILER=smtp
   # MAIL_HOST=smtp.gmail.com
   # MAIL_PORT=587
   # MAIL_USERNAME=your_email@gmail.com
   # MAIL_PASSWORD=your_app_password
   # MAIL_ENCRYPTION=tls
   # MAIL_FROM_ADDRESS=your_email@gmail.com
   # MAIL_FROM_NAME="${APP_NAME}"
   
   # Note: For Gmail, use App Password instead of regular password
   # Generate App Password: Google Account Settings > Security > 2-Step Verification > App passwords
   ```

6. **Run Migrations**
   ```bash
   # Run database migrations to create tables
   php artisan migrate
   
   # Seed the database with initial data (if seeders exist)
   php artisan db:seed
   ```

6. **Build Frontend Assets**
   ```bash
   # Compile assets
   npm run dev
   
   # Or for production
   npm run production
   ```

7. **Run the application**
   ```bash
   # Start Laravel development server
   php artisan serve
   
   # Application will be available at http://localhost:8000
   ```

8. **Access the application**
   ```
   Open browser and navigate to: http://localhost:8000
   ```

## 🚀 Usage

### Getting Started
1. Login using the demo credentials provided below
2. Navigate through the dashboard to access different modules
3. Use the sidebar menu for quick navigation

### Key Operations

#### Managing Students
- Click on "Students" in the sidebar
- Use "Add Student" button to add new records
- Search and filter students using the provided options
- Edit or delete individual records using action buttons

#### Importing Data
- Navigate to Students section
- Click "Import CSV" button
- Select properly formatted CSV file
- Review and confirm the import

#### Generating Reports
- Go to "Student Report" or "Download Reports" section
- Select required filters
- Click generate to create PDF reports

### System Requirements
- **PHP**: >= 7.4 or 8.0+
- **Composer**: Latest version
- **MySQL**: >= 5.7
- **Node.js**: >= 14.x
- **NPM**: >= 6.x
- **SMTP Email Service**: Gmail or other email provider with App Password support

## 🔑 Demo Credentials

### Super Admin Access
- **Email**: team.818x@gmail.com
- **Password**: team@818

### Admin (Teacher) Access
- *Contact super admin to create teacher accounts*

## 📁 Project Structure

```
Student-Management-System/
│
├── app/                # Laravel application core
│   ├── Http/          # Controllers, Middleware, Requests
│   ├── Models/        # Eloquent models
│   └── Providers/     # Service providers
│
├── database/          # Database files
│   ├── migrations/    # Database migrations
│   ├── seeders/       # Database seeders
│   └── factories/     # Model factories
│
├── public/            # Publicly accessible files
│   ├── css/          # Stylesheets
│   ├── js/           # JavaScript files
│   └── images/       # Images and assets
│
├── resources/         # Resources and views
│   ├── views/        # Blade templates
│   ├── css/          # Raw CSS files
│   └── js/           # Raw JavaScript files
│
├── routes/            # Application routes
│   ├── web.php       # Web routes
│   └── api.php       # API routes
│
├── storage/           # File storage
│   └── app/          # Application files
│
├── tests/             # Automated tests
├── .env.example       # Environment configuration example
├── composer.json      # PHP dependencies
├── package.json       # Node.js dependencies
└── README.md         # Project documentation
```

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Contribution Guidelines
- Follow existing code style
- Add comments for complex logic
- Update documentation for new features
- Test thoroughly before submitting PR

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Team 818

Developed with ❤️ by Team 818

### Contact
- **Email**: team.818x@gmail.com
- **GitHub**: [Nisarg-Vekariya](https://github.com/Nisarg-Vekariya)

## 🙏 Acknowledgments

- Thanks to all contributors who have helped shape this project
- Special thanks to our mentors and advisors
- Inspired by modern educational management needs

---

**Note**: This is an educational project developed for learning purposes. For production use, please ensure proper security measures and data protection compliance.
