# Tib-Assessment

This repository contains the completed technical assessment for the Open Source Software Developer position at TIB.

## Repository Contents
- Complete implementation of the requested task
- Detailed documentation in this `README.md` file
- Supporting files

## Table of Contents
1. [Introduction](#introduction)
2. [Setup Instructions](#setup-instructions)
3. [Execution Guide](#execution-guide)
4. [Technical Approach](#technical-approach)
5. [Dependencies](#dependencies)
6. [Configuration](#configuration)
7. [Testing and Validation](#testing-and-validation)
8. [License](#license)

---

## Introduction

This repository contains the implementation of the requested technical assessment for the Open Source Software Developer position at TIB. The solution includes a full working example with detailed documentation, which will guide you through setting up the environment, running the solution, and understanding the technical approach.

### Features Implemented:
- A Laravel-based web application for managing patient medication data.
- Dynamic filtering of patients based on gender and age group with specific medication intake times.
- Data displayed in an intuitive table format with relevant details such as patient name, age, medicine, and intake time.

---

## Setup Instructions

To get started with the solution, follow the steps below to set up your environment.

### Prerequisites

Before you begin, make sure you have the following software installed on your machine:

- **PHP (7.4 or higher)**: Required for running the backend.
- **Composer**: PHP dependency manager to install project dependencies.
- **MySQL / MariaDB**: For setting up the database (or any other compatible database).
- **Node.js and NPM**: For frontend dependencies (if applicable).
- **Docker** (optional): If you prefer using Docker for containerization.

### Step 1: Clone the Repository

Clone this repository to your local machine using the following command:

```bash
    git clone https://github.com/sadiqnoorw/Tib-Assessment.git
    cd Tib-Assessment
```


## Step 2: Install PHP Dependencies
Run the following command to install PHP dependencies using Composer:

```bash
    composer install
```

Step 3: Install JavaScript Dependencies
If your project includes frontend assets, install the necessary JavaScript dependencies:

```bash
    npm install
```

Step 4: Configure Environment Variables
Create a .env file by copying the .env.example file:

```bash
    cp .env.example .env
```
Update the .env file with the correct environment configurations, such as database credentials and other settings.

Step 5: Set Up the Database
Run the migration command to create the database tables:

```bash
    php artisan migrate
```
If you need to seed the database with sample data, you can run:

```bash
    php artisan db:seed
```
Execution Guide
After setting up the environment, you can execute the solution.

Step 1: Serve the Application
To serve the application locally, run:

```bash
    php artisan serve
```
This will start a local development server. By default, the application will be accessible at:

```bash
    http://127.0.0.1:8000
```
Step 2: Access the Solution
Open the browser and navigate to the corresponding routes based on the task requirements. For example:

Female Adults with 8pm Medications: http://127.0.0.1:8000/female-adults-8pm

Male Infants with 8am Medications: http://127.0.0.1:8000/male-infants-8am

Step 3: Verify Output
The data should be displayed according to the filtering and categorization logic you've implemented (e.g., medications by time and patient group).

Technical Approach
Overview
The solution was built using the Laravel framework for the backend with MySQL/MariaDB as the database. For frontend rendering, Blade templates were used with Bootstrap for styling. The logic implemented follows best practices for handling Eloquent relationships and pivot data, ensuring the correct filtering of patient medications based on time and age grou

Key Features
Eloquent Relationships: Utilized Laravel's Eloquent ORM for handling relationships between Patient, Medicine, and MedicineIntake models.

Pivot Table Handling: The pivot table stores additional information like intake_time and dosage, which is accessed and displayed in the views.

Data Filtering: The solution dynamically filters patients based on age group, gender, and medicine intake time.


Dependencies
The solution uses the following major dependencies:

Laravel (PHP Framework)

Composer (PHP Dependency Manager)

Bootstrap (CSS Framework)

MySQL/MariaDB (Database)
