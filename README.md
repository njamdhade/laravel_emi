# TO avoid Installation Just Download and extract following link
https://drive.google.com/drive/folders/1QH3CwhvQJtk_q2SuLsqnnxSJ9kPU8bYq?usp=sharing


## OR
 continue with git clone

# EMI Processing System in Laravel

This Laravel project implements an EMI (Equated Monthly Installment) processing system that adheres to the **Repository and Service Pattern** for separation of concerns and maintainable code.

## Features

### Loan Details Management:
- Dynamic EMI generation based on loan details.
 

### Dynamically Create EMI Details Table:
- Based on loan details, dynamically create a table with month-wise EMI columns using raw SQL queries.

### User Authentication:
- Basic authentication implemented using Laravel's built-in Auth system.

## Installation

1. **Clone the repository**:

    ```bash
    git clone https://github.com/njamdhade/laravel_emi.git
    ```

2. **Install dependencies**:

    ```bash
    composer install
    ```

3. **Run migrations and seed the database**:

    ```bash
    php artisan migrate --seed
    ```

4. **Serve the application**:

    ```bash
    php artisan serve
    ```

5. **S application**:

    ```bash
    php artisan serve
    ```


5. **npm dev environment**:

    ```bash
    npm install && npm run dev
    ```

## SCREEN SHOTS
### Login Page

<img src='https://github.com/njamdhade/laravel_emi/blob/main/public/laravel_emi_screenshots/1_login_page.png' />

### Loan Details Page

<img src='https://github.com/njamdhade/laravel_emi/blob/main/public/laravel_emi_screenshots/2_loan_details_page.png' />

### EMI details page Before Processing data

<img src='https://github.com/njamdhade/laravel_emi/blob/main/public/laravel_emi_screenshots/3_emi_details_before_process_data.png' />

### EMI details page After Processing data

<img src='https://github.com/njamdhade/laravel_emi/blob/main/public/laravel_emi_screenshots/4_emi_details_after_process_data.png' />



