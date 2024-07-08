# Creación de la base de datos y uso
DROP DATABASE IF EXISTS parking_cimavilla;

CREATE DATABASE IF NOT EXISTS parking_cimavilla;

ALTER DATABASE parking_cimavilla DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE parking_cimavilla;

# Tabla de clients
CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_name VARCHAR (200) NOT NULL,
    client_surname VARCHAR (200) NOT NULL,
    client_phone VARCHAR (50) NOT NULL,
    client_email VARCHAR (200) UNIQUE NOT NULL,
    client_document_type VARCHAR (100) NOT NULL,
    client_document_number VARCHAR (30) UNIQUE NOT NULL,
    client_direction VARCHAR (200) NOT NULL,
    client_region VARCHAR (200) NOT NULL,
    client_country VARCHAR (200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de roles
CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_type VARCHAR (50) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de cars
CREATE TABLE cars (
    id INT PRIMARY KEY AUTO_INCREMENT,
    car_registration_plate VARCHAR (100) UNIQUE NOT NULL,
    car_brand VARCHAR (100) NOT NULL,
    car_model VARCHAR (100) NOT NULL,
    car_color VARCHAR (50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    id_role INT NOT NULL,
    id_car INT NOT NULL,
    username VARCHAR (30) UNIQUE NOT NULL,
    email VARCHAR (200) NOT NULL,
    hashedPassword VARCHAR (200) NOT NULL,
    birthday DATE NOT NULL,
    FOREIGN KEY (id_client) REFERENCES clients(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_role) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_car) REFERENCES cars(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de user_sessions
CREATE TABLE user_sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    session_datetime DATETIME NOT NULL,
    session_status VARCHAR (20) NOT NULL COMMENT 'LOG IN, LOG OUT',
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de banks
CREATE TABLE banks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    iban VARCHAR (35) UNIQUE NOT NULL,
    swift_bic VARCHAR (11) NOT NULL,
    FOREIGN KEY (id_client) REFERENCES clients(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de paypals
CREATE TABLE paypals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    paypal_info VARCHAR (150) NOT NULL COMMENT 'email or username of PayPal',
    FOREIGN KEY (id_client) REFERENCES clients(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de cards
CREATE TABLE cards (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    card_holder_name VARCHAR (150) NOT NULL,
    card_number VARCHAR (16) UNIQUE NOT NULL,
    card_cvv VARCHAR (3) UNIQUE NOT NULL,
    card_expiration_date DATE NOT NULL,
    isPrincipal TINYINT(1) NOT NULL COMMENT '1=true, 0=false',
    FOREIGN KEY (id_client) REFERENCES clients(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de fees
CREATE TABLE fees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fee_type VARCHAR (100) NOT NULL,
    day_price DECIMAL (10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de discounts
CREATE TABLE discounts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    discount_percentage DECIMAL (10, 2) NOT NULL COMMENT 'Example: 3%, 2%, 1.5%'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de payment_methods
CREATE TABLE payment_methods (
    id INT PRIMARY KEY AUTO_INCREMENT,
    payment_method VARCHAR (100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de taxs
CREATE TABLE taxs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tax_type VARCHAR (100) NOT NULL COMMENT 'IVA, ecc...',
    tax DECIMAL (10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Tabla de reservations
CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    id_payment_method INT NOT NULL,
    id_tax INT NOT NULL,
    reservation_datetime DATETIME NOT NULL,
    reservation_status VARCHAR (70) NOT NULL COMMENT 'Cancelled, Confirmed, Processing',
    total_price DECIMAL (10, 2) NOT NULL,
    FOREIGN KEY (id_client) REFERENCES clients(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_payment_method) REFERENCES payment_methods(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_tax) REFERENCES taxs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


# Tabla de reservation_details
CREATE TABLE reservation_details (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_reservation INT NOT NULL,
    id_fee INT NOT NULL,
    id_discount INT NOT NULL,
    reservation_start_datetime DATETIME NOT NULL,
    reservation_end_datetime DATETIME NOT NULL,
    subtotal DECIMAL (10, 2) NOT NULL,
    FOREIGN KEY (id_reservation) REFERENCES reservations(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_fee) REFERENCES fees(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_discount) REFERENCES discounts (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;