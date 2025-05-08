# 💰 Basic Banking System

A dynamic and responsive **Web Application** designed to simulate the transfer of money between multiple users. This project demonstrates core banking operations such as viewing users, transferring funds, and viewing transaction history — all managed through an intuitive and clean interface.

---

## 🔧 Tech Stack Used

### 🖥 Front-End:
- HTML5
- CSS3
- Bootstrap 5
- JavaScript

### ⚙️ Back-End:
- PHP

### 🗃 Database:
- MySQL

---

## 📂 Database Structure

### 1. **Users Table**
Stores basic customer information:
- `id` (Primary Key)
- `name`
- `email`
- `balance`

### 2. **Transaction Table**
Logs every money transfer with:
- `sno` (Primary Key)
- `sender`
- `receiver`
- `balance` (Amount transferred)
- `datetime` (Auto-recorded timestamp)

---

## 🔄 Flow of the Website

> **Home Page**  
> → **View All Users**  
> → **Select and View User Details**  
> → **Click on 'Transfer Money'**  
> → **Choose a Receiver and Enter Amount**  
> → **Confirm Transaction**  
> → **Redirect to All Users Page**  
> → **View Transfer History**  

---

## 👥 Features

- View all customers and their details
- Select a user and initiate money transfers
- Dynamically update account balances
- Prevent negative or invalid transfers
- Track transaction history with timestamps
- Mobile-friendly, responsive layout

---

## 🚀 How to Run Locally

1. **Install XAMPP** (or WAMP) and start `Apache` & `MySQL`.
2. Place the project folder inside:  
