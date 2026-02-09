# Product Requirements Document (PRD) - Donor Darah V2

## 1. Project Overview
**Donor Darah V2** is a **Self-Service Donor Kiosk System**. It is designed to be used directly by blood donors at the donation site (or via a public web portal) to register themselves, update their data, and obtain a queue number for their donation. The system eliminates the need for staff to manually enter data, streamlining the flow and reducing waiting times.

## 2. Goals & Objectives
*   **Self-Service**: Enable donors to independently register and join the queue.
*   **Ease of Use**: Provide a simple, intuitive, and touch-friendly interface suitable for kiosk usage.
*   **Speed**: Minimize the time defined for registration to keep the queue moving.
*   **Modernization**: Replace legacy PHP code with a robust Laravel 12+ backend.
*   **Security**: Ensure donor data privacy and secure processing.

## 3. Technology Stack
*   **Backend**: Laravel 12.x (PHP 8.2+)
*   **Frontend**: Blade Templates, Tailwind CSS (Mobile-first / Touch-friendly design)
*   **Database**: SQLite (Development), MySQL (Production)
*   **PDF Generation**: `barryvdh/laravel-dompdf` (For digital or printed queue tickets)

## 4. Functional Requirements

### 4.1. Donor Identification (Search)
*   **User Story**: As a donor, I want to identify myself using my birth date so I can access my record or register.
*   **Flow**:
    1.  Donor approaches the kiosk/device.
    2.  Selects their **Birth Date** (Day, Month, Year).
    3.  Taps **"Cari / Masuk" (Search/Enter)**.
    4.  **Result**:
        *   **Found**: Shows a list of donors with that birth date (to handle duplicates). Donor selects their name.
        *   **Not Found**: Displays a "Data Not Found" message with a prominent **"Daftar Baru" (Register New)** button.

### 4.2. New Donor Registration
*   **User Story**: As a new donor, I want to register my details quickly so I can get a queue number.
*   **Fields**:
    *   Name (Required)
    *   Gender (Male/Female)
    *   Birth Date (Pre-filled from search)
    *   Address (Required)
    *   Phone, Occupation (Optional/Required based on policy)
*   **Flow**:
    1.  Donor taps "Register New".
    2.  Fills in the simplified form.
    3.  Taps **"Simpan" (Save)**.
    4.  System creates the record and automatically proceeds to the "Confirmation/Queue" step.

### 4.3. Donor Confirmation & Queueing
*   **User Story**: As a returning donor, I want to confirm my details and get a queue number.
*   **Flow**:
    1.  After identifying (or registering), the donor sees their details.
    2.  Donor can update changed information (e.g., new address or phone number).
    3.  Donor answers mandatory health questions (e.g., "Are you fasting?").
    4.  Donor taps **"Ambil Nomor Antrian" (Get Queue Number)**.
    5.  System generates a queue entry.

### 4.4. Queue Ticket (Output)
*   **User Story**: As a donor, I want to see my queue number so I know when my turn is.
*   **Output**: A digital screen (and optional PDF printout) showing:
    *   **Queue Number (Big & Bold)**
    *   Donor Name
    *   Date & Time
    *   Estimated waiting time (Optional future feature)
*   **Action**: Screen auto-refreshes or redirects back to Home after a timeout for the next user.

## 5. UI/UX Guidelines (Kiosk specific)
*   **Large Buttons**: Targets should be easy to tap on touchscreens.
*   **High Contrast**: Text should be readable in various lighting conditions.
*   **Minimal Input**: Use dropdowns and predefined options where possible to reduce typing.
*   **Instant Feedback**: Clear success messages and loading states.

## 6. Database Schema

### `donors` Table
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | BigInt (PK) | Unique ID |
| `name` | String | Donor Name |
| `birth_date` | Date | Birth Date |
| `gender` | Enum | 'male', 'female' |
| `address` | Text | Full address |
| `phone` | String | Contact number |
| `occupation` | String | Job title |
| `donor_card_number` | String | Legacy card number |
| `total_donations` | Integer | Count of donations |
| `last_donor_date` | Date | Last donation |
| `created_at` | Timestamp | |
| `updated_at` | Timestamp | |

### `queues` Table
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | BigInt (PK) | Queue Number |
| `donor_id` | BigInt (FK) | Foreign Key to `donors` |
| `created_at` | Timestamp | Queue time |
| `updated_at` | Timestamp | |

## 7. Future Roadmap
*   **Self-Check-in Kiosk**: Integration with card readers/barcode scanners for faster ID.
*   **WhatsApp Notification**: Send queue number and status updates via WhatsApp.
*   **Queue Display**: Separate "TV Mode" page to display currently called numbers.
