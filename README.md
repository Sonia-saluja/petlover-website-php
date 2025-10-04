# Pet Lovers Website

A comprehensive pet shop management system built with PHP and MySQL, featuring a customer-facing website and an admin panel for managing pets, orders, and inventory.

## Description

This project is a full-featured pet shop website that allows customers to browse and view information about various pets including birds, dogs, and cats. The website includes sections for services, gallery, blog posts, pricing, and contact information. The backend admin panel enables administrators to manage products (pets), view and update order statuses, and handle inventory.

The project is based on a Colorlib template and includes both frontend and backend functionalities.

## Features

### Frontend
- **Home Page**: Hero section with featured pets and services overview
- **About Us**: Company information and mission statement
- **Services**: Detailed information about pet care services for birds, dogs, and cats
- **Gallery**: Photo gallery showcasing various pets
- **Blog**: Articles about pet care, veterinary advice, and pet-related topics
- **Pricing**: Information about pet pricing and packages
- **Contact**: Contact form and information

### Backend (Admin Panel)
- **Admin Login**: Secure authentication for administrators
- **Product Management**: Add, edit, delete, and view pets/products
- **Order Management**: View customer orders, update order status
- **Inventory Management**: Track product availability and status

## Tech Stack

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Framework**: Bootstrap
- **Libraries**: jQuery, Owl Carousel, Magnific Popup
- **Server**: Apache (via XAMPP)

## Installation

1. **Prerequisites**:
   - XAMPP (or any Apache server with PHP and MySQL)
   - PHP 7.0 or higher
   - MySQL 5.6 or higher

2. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/pet-lovers-website.git
   cd pet-lovers-website
   ```

3. **Setup XAMPP**:
   - Copy the project folder to `C:\xampp\htdocs\`
   - Start XAMPP Control Panel
   - Start Apache and MySQL services

4. **Database Setup**:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `pet_shop_management`
   - Import the `pet.sql (2).sql` file from the project root

5. **Configuration**:
   - Update database connection settings in `backend/config/dbcon.php` if needed
   - Default admin credentials: username: `admin`, password: `1234`Sonia-saluja

6. **Access the Website**:
   - Frontend: http://localhost/pet-lovers-website/
   - Admin Panel: http://localhost/pet-lovers-website/backend/admin/

## Database Schema

The project uses three main tables:

- `admininfo`: Stores administrator account information
- `tblcnp`: Contains pet/product information (name, age, price, description, image, status)
- `tblorders`: Manages customer orders (customer details, product ID, quantity, status, etc.)

## Usage

### For Customers
- Browse the website to learn about available pets and services
- View pet gallery and blog posts
- Contact the shop via the contact form

### For Administrators
- Login to the admin panel
- Add new pets/products with images and details
- Edit existing product information
- View and manage customer orders
- Update order statuses (new, completed, etc.)

## File Structure

```
pet-lovers-website/
├── backend/
│   ├── admin/
│   │   ├── index.php
│   │   ├── add_product.php
│   │   ├── view_product.php
│   │   └── ...
│   ├── config/
│   │   └── dbcon.php
│   └── includes/
├── frontend/
│   └── includes/
├── js/
├── images/
├── scss/
├── PHPmailer/
├── index.php
├── about.php
├── services.php
├── gallery.php
├── contact.php
├── pet.sql (2).sql
└── README.md
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is based on a Colorlib template. Please refer to the original template's license for usage restrictions.

**Important**: Removing copyright information without purchasing a license will result in suspension of your hosting and/or domain name(s). For more information, visit [Colorlib License](https://colorlib.com/wp/licence/).

## Contact

For questions or support, please contact the development team or refer to the contact form on the website.
