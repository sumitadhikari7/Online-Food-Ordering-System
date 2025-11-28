# Online Food Ordering System (FoodZone)

A PHP + MySQL desktop application for small restaurants or food outlets.  
It allows admins to manage food items and view orders, while customers can place orders without logging in using session

> **Note:** This version is **desktop-only**. Mobile responsiveness will be added in a future update.

---

## Features
- Customer can place orders by entering name, location, and food items  
- Admin login with MD5-hashed credentials  
- Admin can add, edit, or remove food items  
- Admin can view all orders  
- Admin can view messages from customers via contact form  
- Simple dashboard with live order statistics
- When a customer adds food items to their order, the items are stored in PHP sessions until they submit the order.
- This allows the customer to select multiple items without immediately saving each one to the database.
- Once the order is submitted, it is saved to the orders and order_items tables in MySQL.
- No login is required for customers; sessions ensure that the order persists while they navigate the site.
- Customers can track their orders using the phone number they provide while placing an order.

---

## Tech Stack
- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** Apache (XAMPP)

---
