# Project Documentation: Anease Skincare

## 1. Project Overview
**Anease Skincare** is a premium e-commerce platform built with Laravel, designed to provide a personalized shopping experience for skincare enthusiasts. Beyond standard e-commerce features, the platform integrates a diagnostic tool to help users identify their skin type and receive tailored product recommendations.

---

## 2. Technology Stack
- **Backend Framework**: Laravel (PHP)
- **Frontend Engine**: Blade Templating with Bootstrap 5
- **Database**: MySQL
- **Interactivity**: Vanilla JavaScript & jQuery
- **Icons**: Bootstrap Icons
- **Payment Integration**: eSewa (integrated), Cash on Delivery (COD)

---

## 3. Key Features

### 🛍️ E-Commerce Core
- **Product Management**: Dynamic product catalog with categories (Oily, Dry, Normal, Sensitive, Combination).
- **Shopping Cart**: Real-time quantity updates and session-based persistence for authenticated users.
- **Wishlist**: Users can save products for later, accessible via their profile.
- **Checkout System**: Secure checkout flow supporting multiple payment methods.

### 🔬 Personalization Tools
- **Skin Type Finder**: A multi-step questionnaire that calculates the user's skin type based on their answers.
- **Skin Concern Recommendation**: Rule-based engine that suggests specific products and skincare routines (including step-by-step images) based on user concerns like acne, pigmentation, or aging.
- **Ideal Routine Infographics**: Visual guides tailored to the user's detected skin type.

### 📊 Admin Management
- **Dashboard**: High-level overview of total users, products, revenue, and recent orders.
- **Month Filtering**: Advanced statistics filtering to track business growth over specific periods.
- **Customer Management**: View and track user growth and checkout history.
- **Product CMS**: Add, edit, and delete products directly from the admin panel.

### 📞 Support & Interaction
- **Help Center**: Integrated contact system for user inquiries.
- **Floating Chat Widget**: Quick-access help icon available on all pages to guide users to support.
- **Responsive Design**: Fully optimized for mobile, tablet, and desktop viewing.

---

## 4. Architecture & Directory Structure

### 📁 Core Directories
- `app/Http/Controllers`: Contains logic for business operations (SuchiController, AuthController, PaymentController).
- `app/Models`: Database structure definitions (User, Product, Cart, Wishlist, Order, Contact).
- `resources/views`: UI components and page layouts (main, home, product, recommendation, skin_concern, admin/*).
- `routes/web.php`: Application URL mapping and middleware protection.
- `public/assets`: Storage for product images and routine infographics.

---

## 5. Database Schema
- **Users**: Stores user profiles, authentication data, and roles (Admin/User).
- **Products**: Detailed product information including descriptions, prices, and categories.
- **Carts/Wishlists**: Relationship tables linking users to their selected products.
- **Orders**: Tracks transaction history, payment status (Success/Failure/COD), and amounts.
- **Contacts**: Stores messages and inquiries submitted via the Help Center.

---

## 6. Security & Best Practices
- **Role-Based Access Control (RBAC)**: Admin routes are protected by a dedicated middleware to ensure only authorized personnel can access sensitive data.
- **CSRF Protection**: All forms are secured against Cross-Site Request Forgery.
- **Password Hashing**: User credentials are encrypted using industry-standard algorithms.

---

## 7. Setup & Installation
1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Configure `.env` with database credentials.
4. Run `php artisan migrate` to set up tables.
5. Launch the server using `php artisan serve`.

---

**Developed for**: Anease Skincare  
**Version**: 1.0.0  
**Last Updated**: May 2026
