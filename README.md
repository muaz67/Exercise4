# Exercise4 – PHP & MySQL Student Database

This is a simple PHP web application to manage student records using a MySQL database.

## 🔧 Functions

- View all students
- Edit student details (Race, Gender, Image)
- Search students by Race or Gender
- Upload and display student image

## 🛠 How to Run

1. Start XAMPP (Apache + MySQL)
2. Place this folder inside:
C:\xampp\htdocs\Exercise4

css
Copy
Edit
3. Create a MySQL database:
webengineering_task

sql
Copy
Edit
4. Create `student` table and insert sample data:
```sql
CREATE TABLE student (
  Matric VARCHAR(10) PRIMARY KEY,
  Name VARCHAR(100),
  Email VARCHAR(100),
  Race VARCHAR(20),
  Gender VARCHAR(10),
  Image VARCHAR(255)
);

INSERT INTO student (Matric, Name, Email) VALUES
('12121', 'Norhayati Binti Harun', 'hayati@hotmail.com'),
('12455', 'Rina Binti Samsuri', 'rina@yahoo.com'),
('13267', 'Nian Lee Nee', 'leenee@yahoo.com'),
('13323', 'Aakash a/l Rajesh', 'aakash@gmail.com'),
('13356', 'Ng Ai Bee', 'aibee@hotmail.com'),
('14128', 'Vasanthi a/p Kumar', 'vasanthi@gmail.com'),
('15980', 'Fadhil Bin Abu', 'fadhil@yahoo.com');
Open browser and go to:

bash
Copy
Edit
http://localhost/Exercise4/list.php
📁 Files
list.php – View and search students

edit.php – Edit form for student

update.php – Save changes to database

/uploads/ – Folder to store images

yaml
Copy
Edit

---
