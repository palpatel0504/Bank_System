# 💸 Basic Banking System

A simple yet elegant **Web Application** to simulate money transfers between users. This is a dynamic banking system where users can view balances, initiate transactions, and track transfer history in real time.

---

## 📌 Project Overview

This system allows users to:

- View all users and their account balances.
- Transfer money from one user to another.
- View transaction history.
- Keep the database updated in real-time.

It uses **dummy data for 10+ users**, with additional users and transactions added dynamically.

---

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript  
- **Backend**: PHP 7+  
- **Database**: MySQL  
- **Tool**: phpMyAdmin

---

## 🗃️ Database Design

### 1. `user` Table  
Stores the details of each user:

| id | name         | email                | balance |
|----|--------------|----------------------|---------|
| 1  | Prasad       | prasad@gmail.com     | 50000   |
| 2  | Safal        | safal@gmail.com      | 200000  |
| 3  | Parth        | parth@gmail.com      | 50000   |
| ...| ...          | ...                  | ...     |

### 2. `transaction` Table  
Records all transfers:

| sno | sender     | receiver   | balance | datetime            |
|-----|------------|------------|---------|---------------------|
| 1   | pal        | Swastika   | 1500    | 2025-05-08 22:58:42 |
| 2   | riya patel | pal        | 999     | 2025-05-08 23:01:39 |

---

## 🔁 Website Flow
Home Page → View All Users → Select & View One User → Transfer Money → Select Receiver → View Updated Balances → View Transaction History

---

## 📸 Screenshots

### 📍 Homepage
<img width="1440" alt="Screenshot 2025-05-08 at 11 28 57 PM" src="https://github.com/user-attachments/assets/5d69d0e4-c296-46b7-bba4-3e95be29f1b7" />

### create user
<img width="1440" alt="Screenshot 2025-05-08 at 11 29 41 PM" src="https://github.com/user-attachments/assets/8dd9090e-23fa-4c62-88e6-3fa127c3129d" />

### transaction history
<img width="1320" alt="Screenshot 2025-05-08 at 11 30 25 PM" src="https://github.com/user-attachments/assets/5141946d-bc4a-46ae-ad4b-9ef203bd1841" />

### 👥 Users Table  
<img width="1093" alt="Screenshot 2025-05-08 at 11 26 49 PM" src="https://github.com/user-attachments/assets/4f0c3397-b466-4879-b2f0-49a3b5919468" />

### 🔄 Transactions Table  
<img width="928" alt="Screenshot 2025-05-08 at 11 27 15 PM" src="https://github.com/user-attachments/assets/3e7d9af8-e39d-471a-ab50-c551a84570e9" />

---

## 🚀 How to Run

1. Clone or download this repository.
2. Place it in your `htdocs` folder (`XAMPP`) or `www` folder (`WAMP`).
3. Start **Apache** and **MySQL** from XAMPP/WAMP.
4. Open **phpMyAdmin** and import the `sparks_bank.sql` file to create the `banking_system` database.
5. Visit in your browser:  
   [http://localhost/bank](http://localhost/bank)
6. You're all set! 🎉

---
---

## 📌 Future Enhancements

- Add user authentication (login/signup)
- Send email confirmations for each transaction
- Add filter/search for users and transactions
- Show profile pictures for users

---

## 🙌 Author

Developed by **JENISH , PAL , RIYA **  
---


> ⚠️ This is a simulation project meant for learning and demonstration only.



