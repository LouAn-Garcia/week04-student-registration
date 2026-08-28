# Student Registration System

A Laravel-based web application for registering and managing student information digitally.

---

## 1. Project Title

**Student Registration System**

---

## 2. Introduction

### Purpose of a Student Registration System

The Student Registration System is a web-based application designed to digitize the student registration process. It allows users to submit student information such as Student ID, name, email address, mobile number, date of birth, gender, program, year level, address, and profile picture through an online registration form.

The system reduces the need for paper-based registration and provides a more organized way of storing and viewing student information.

### Importance of Data Validation

Data validation ensures that the information submitted by users is complete, accurate, and follows the required format before it is stored in the database.

In this system, Laravel validation is used to check required fields, ensure that Student IDs and email addresses are unique, validate email formats, accept numeric mobile numbers, and verify that uploaded profile pictures are valid image files.

Validation helps prevent incorrect or incomplete data from entering the database and provides users with clear error messages when their input needs to be corrected.

### Role of Registration Systems in Enterprise Applications

Registration systems play an important role in enterprise applications because they provide a structured method for collecting and managing user information.

In larger organizations, registration systems can be connected to databases, authentication systems, reporting tools, administrative dashboards, and other business applications. They help reduce manual processes, improve data organization, and make information easier to retrieve and manage.

This project demonstrates fundamental enterprise application concepts such as form processing, server-side validation, database operations, file uploading, and user feedback using the Laravel framework.

## 3. Objectives

The objectives of this activity are:

* To develop a functional Student Registration System using Laravel.
* To understand how Laravel handles form submissions using Blade templates.
* To implement server-side validation for student registration data.
* To use Laravel migrations to create and manage the `students` database table.
* To understand how Laravel models interact with the database.
* To implement profile picture uploading using Laravel Storage.
* To display validation errors and success notifications to users.
* To display registered student information after successful registration.
* To understand the Laravel request lifecycle from the browser to the database and back to the user.
* To practice organizing a web application using the Model-View-Controller (MVC) architecture.

---

## 4. Laravel Request Lifecycle

The Laravel request lifecycle describes how a user's request travels through different parts of the Laravel application before a response is returned.

In the Student Registration System, the registration process follows this general flow:

```text
┌──────────────────┐
│     Browser      │
│ Student submits  │
│ registration form│
└────────┬─────────┘
         │
         ▼
┌──────────────────┐
│      Route       │
│   POST /register │
└────────┬─────────┘
         │
         ▼
┌──────────────────────┐
│      Controller      │
│  StudentController   │
│       store()        │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│      Validation      │
│ Check required fields│
│ unique, email, image │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│        Model         │
│   Student::create()  │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│       Database       │
│    students table    │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│       Response       │
│ Success page showing │
│ registered student   │
└──────────────────────┘
```

### Step-by-Step Request Flow

**1. Browser**

The process starts when the user fills out the registration form and clicks the **Register Student** button. The browser sends the form data to the Laravel application using an HTTP POST request.

**2. Route**

The request is received by the registration route defined in `routes/web.php`.

```php
Route::post('/register', [StudentController::class, 'store'])
    ->name('students.store');
```

The route directs the request to the `store()` method of `StudentController`.

**3. Controller**

The `StudentController` receives and processes the submitted information. The controller is responsible for validating the data, handling the profile picture upload, creating the student record, and returning the appropriate response.

**4. Validation**

Laravel checks the submitted information against the defined validation rules. If the information is invalid, Laravel redirects the user back to the form and provides validation error messages.

If the information is valid, the registration process continues.

**5. Model**

The `Student` model represents the `students` database table. After validation, the model is used to create a new student record.

```php
Student::create($validated);
```

**6. Database**

The validated student information is stored in the `students` table. The profile picture path is also stored in the database while the actual image file is stored using Laravel's public storage disk.

**7. Response**

After successful registration, Laravel returns a response that displays the registered student's information. The system also displays a success notification.

---

## 5. Validation Rules

Validation ensures that the information submitted by users is complete, accurate, and follows the requirements of the system. The Student Registration System uses Laravel's server-side validation before saving information to the database.

### Required Fields

The `required` rule ensures that important fields cannot be left empty.

Example:

```php
'student_id' => 'required',
'first_name' => 'required',
'last_name' => 'required',
'email' => 'required',
'mobile_number' => 'required',
'date_of_birth' => 'required',
'gender' => 'required',
'program' => 'required',
'year_level' => 'required',
'address' => 'required',
'profile_picture' => 'required',
```

**Why it is important:**

Required validation prevents incomplete student records from being submitted and stored in the database.

---

### Unique Constraints

The `unique` rule ensures that values such as Student ID and email address are not already registered.

Example:

```php
'student_id' => 'required|unique:students,student_id',
'email' => 'required|email|unique:students,email',
```

**Why it is important:**

Student IDs and email addresses should identify a specific student. Preventing duplicates helps maintain accurate and consistent records.

---

### Email Validation

The `email` rule checks whether the submitted value follows a valid email address format.

Example:

```php
'email' => 'required|email|unique:students,email',
```

**Why it is important:**

It prevents incorrectly formatted email addresses from being stored in the database.

---

### Numeric Validation

The `numeric` rule ensures that the mobile number contains numeric values.

Example:

```php
'mobile_number' => 'required|numeric',
```

**Why it is important:**

This helps ensure that the mobile number field contains an appropriate numeric value instead of letters or other invalid characters.

---

### Image Validation

The `image` rule ensures that the uploaded profile picture is recognized as an image.

The system also restricts the accepted file formats:

```php
'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
```

The rules used are:

| Rule                 | Purpose                                |
| -------------------- | -------------------------------------- |
| `required`           | Ensures a profile picture is provided  |
| `image`              | Ensures the uploaded file is an image  |
| `mimes:jpg,jpeg,png` | Limits the accepted image formats      |
| `max:2048`           | Limits the file size to 2048 KB (2 MB) |

**Why it is important:**

Image validation prevents unsupported or inappropriate file types from being uploaded and stored by the application.

---

### File Size Restrictions

The `max:2048` rule limits the uploaded profile picture to **2 MB**.

```php
'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
```

**Why it is important:**

File size restrictions help control storage usage and prevent unnecessarily large uploads from affecting application performance.

---

### Summary of Validation

The validation process helps the Student Registration System maintain reliable data by ensuring that:

* Required information is provided.
* Student IDs are unique.
* Email addresses are valid and unique.
* Mobile numbers contain numeric values.
* Profile pictures are valid image files.
* Only JPG, JPEG, and PNG images are accepted.
* Uploaded profile pictures do not exceed 2 MB.

These validation rules provide both **data integrity** and a better user experience by giving users clear feedback when their submitted information does not meet the system requirements.

## 6. Database Design

The Student Registration System uses a relational database to store student registration information. Laravel migrations are used to create and manage the database structure.

### Entity Relationship Diagram (ERD)
![Student Registration System ERD](screenshots/erd.png)
*Figure 1. Entity Relationship Diagram of the Student Registration System*

The main entity in the system is the **Student** entity. Each student has a unique Student ID and contains personal, contact, academic, and profile information.

```mermaid
erDiagram
    STUDENTS {
        bigint id PK
        varchar student_id UK
        varchar first_name
        varchar middle_name
        varchar last_name
        varchar email UK
        varchar mobile_number
        date date_of_birth
        varchar gender
        varchar program
        varchar year_level
        text address
        varchar profile_picture
        timestamp created_at
        timestamp updated_at
    }
```

The `STUDENTS` entity represents the `students` table in the database. The table currently functions as the main entity for the registration module.

### Table Structure

| Column            | Data Type | Key / Constraint | Description                               |
| ----------------- | --------- | ---------------- | ----------------------------------------- |
| `id`              | BIGINT    | Primary Key      | Unique identifier for each student record |
| `student_id`      | VARCHAR   | Unique           | Official student identification number    |
| `first_name`      | VARCHAR   | Required         | Student's first name                      |
| `middle_name`     | VARCHAR   | Nullable         | Student's middle name                     |
| `last_name`       | VARCHAR   | Required         | Student's last name                       |
| `email`           | VARCHAR   | Unique, Required | Student's email address                   |
| `mobile_number`   | VARCHAR   | Required         | Student's mobile number                   |
| `date_of_birth`   | DATE      | Required         | Student's date of birth                   |
| `gender`          | VARCHAR   | Required         | Student's gender                          |
| `program`         | VARCHAR   | Required         | Student's academic program                |
| `year_level`      | VARCHAR   | Required         | Student's current year level              |
| `address`         | TEXT      | Required         | Student's complete address                |
| `profile_picture` | VARCHAR   | Required         | Path of the uploaded profile picture      |
| `created_at`      | TIMESTAMP | Automatic        | Date and time the record was created      |
| `updated_at`      | TIMESTAMP | Automatic        | Date and time the record was last updated |

### Data Types

The database uses different data types depending on the information being stored:

* **BIGINT** is used for the primary key `id`.
* **VARCHAR** is used for text values with a defined maximum length, such as names, email, program, and profile picture paths.
* **TEXT** is used for the student's address because it may contain a longer value.
* **DATE** is used for the student's date of birth.
* **TIMESTAMP** is used for `created_at` and `updated_at`.

### Primary Key

The `id` column is the **primary key** of the `students` table.

It uniquely identifies each student record in the database. Laravel creates this column using:

```php
$table->id();
```

### Constraints

The database and Laravel validation rules help maintain data integrity.

The main constraints include:

* `id` is the primary key.
* `student_id` must be unique.
* `email` must be unique.
* `middle_name` is nullable because it is optional.
* Required student information must be provided before the record can be successfully registered.
* Profile pictures are restricted to supported image formats and a maximum file size of 2 MB.

The `student_id` and `email` columns are defined as unique in the migration:

```php
$table->string('student_id')->unique();
$table->string('email')->unique();
```

These constraints prevent duplicate Student IDs and email addresses from being stored in the database.

---

## 7. Registration Flowchart

The following flowchart illustrates the complete student registration process, starting when the user opens the registration page and ending with the student profile being displayed.

```mermaid
flowchart TD
    A([User Opens Registration Page]) --> B[Fill Out Registration Form]
    B --> C[Submit Registration]
    C --> D[Laravel Receives Request]
    D --> E[Validate Submitted Data]

    E --> F{Valid Data?}

    F -- No --> G[Display Validation Errors]
    G --> B

    F -- Yes --> H[Upload Profile Picture]
    H --> I[Save Student Information to Database]
    I --> J[Display Success Message]
    J --> K[Display Student Profile]

    K --> L([Registration Complete])
```

### Flowchart Explanation

**1. User Opens Registration Page**

The user visits the Student Registration System and opens the registration form.

**2. Fill Out Registration Form**

The user enters the required personal, contact, academic, and address information and selects a profile picture.

**3. Submit Registration**

The user clicks the **Register Student** button. The browser sends the form data to Laravel through a POST request.

**4. Laravel Receives Request**

The registration route sends the request to the `store()` method of `StudentController`.

**5. Validate Submitted Data**

Laravel checks the submitted information against the validation rules.

**6. Valid Data?**

The system determines whether all submitted information satisfies the validation requirements.

* **No:** Laravel returns the user to the registration form and displays the validation errors.
* **Yes:** The registration process continues.

**7. Upload Profile Picture**

The valid profile picture is uploaded using Laravel Storage. The actual file is stored in the application's public storage directory.

**8. Save Student Information to Database**

The validated student information and profile picture path are saved to the `students` table.

**9. Display Success Message**

The system displays a success notification informing the user that the student was registered successfully.

**10. Display Student Profile**

The registered student's information and uploaded profile picture are displayed on the student profile page.

**11. Registration Complete**

The registration process is completed successfully.

