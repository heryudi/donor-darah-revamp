# Donor Darah V2

A modern **Self-Service Blood Donor Kiosk System** rewritten in Laravel. This application allows donors to independently register, update their data, and generate queue numbers for blood donation events.

## 📖 Documentation
For a detailed overview of the project's requirements, features, and architecture, please refer to the **[Product Requirements Document (PRD)](PRD.md)**.

## 🚀 Getting Started

### Prerequisites
*   PHP 8.2 or higher
*   Composer
*   Node.js & npm (optional, for asset bundling if not using CDN)
*   SQLite (for local development) or MySQL

### Installation

1.  **Clone the repository** (if you haven't already):
    ```bash
    git clone <your-repo-url>
    cd donor-darah-v2
    ```

2.  **Install PHP dependencies**:
    ```bash
    composer install
    ```

3.  **Environment Setup**:
    *   Copy the `.env.example` file to `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Generate the application key:
        ```bash
        php artisan key:generate
        ```
    *   Configure your database in `.env`. By default, it is set to use SQLite. 
        *   If using SQLite, create the database file:
            ```bash
            touch database/database.sqlite
            ```

4.  **Run Migrations**:
    ```bash
    php artisan migrate
    ```

### Running the Application

start the local development server:

```bash
php artisan serve
```

The application will be accessible at `http://127.0.0.1:8000`.

## 🧪 Testing

To run the automated feature tests:

```bash
php artisan test
```

## 🛠 Tech Stack
*   **Framework**: Laravel 12
*   **Language**: PHP 8.2+
*   **Frontend**: Blade, Tailwind CSS
*   **Database**: SQLite / MySQL
*   **PDF**: dompdf

## 📄 License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
