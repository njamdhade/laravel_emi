# EMI Processing System in Laravel

This Laravel project implements an EMI (Equated Monthly Installment) processing system that adheres to the **Repository and Service Pattern** for separation of concerns and maintainable code.

## Features

### Loan Details Management:
- A form to calculate Loan EMI.
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

