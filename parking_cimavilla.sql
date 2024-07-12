/* Creación de la base de datos y uso */
DROP DATABASE IF EXISTS parking_cimavilla;

CREATE DATABASE IF NOT EXISTS parking_cimavilla;

ALTER DATABASE parking_cimavilla DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE parking_cimavilla;

/* Tabla de clients */
DROP TABLE IF EXISTS clients;

CREATE TABLE
    clients (
        id INT PRIMARY KEY AUTO_INCREMENT,
        client_name VARCHAR(200) NOT NULL,
        client_surname VARCHAR(200) NOT NULL,
        client_phone VARCHAR(50) NOT NULL,
        client_email VARCHAR(200) UNIQUE NOT NULL,
        client_document_type VARCHAR(100) NOT NULL COMMENT 'DNI, Passport, NIE, CIF',
        client_document_number VARCHAR(30) UNIQUE NOT NULL,
        client_direction VARCHAR(200) NOT NULL,
        client_region VARCHAR(200) NOT NULL,
        client_country VARCHAR(200) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    clients (
        client_name,
        client_surname,
        client_phone,
        client_email,
        client_document_type,
        client_document_number,
        client_direction,
        client_region,
        client_country
    )
VALUES
    (
        "Main",
        "Test",
        "600000001",
        "admin@mail.com",
        "DNI",
        "12345678A",
        "C/ de Admin, 1",
        "Master",
        "Everywhere"
    ),
    (
        "User1",
        "Test",
        "600000002",
        "user1@mail.com",
        "DNI",
        "12345678B",
        "C/ de User1, 2",
        "User",
        "Everywhere"
    );

/* Tabla de roles */
DROP TABLE IF EXISTS roles;

CREATE TABLE
    roles (
        id INT PRIMARY KEY AUTO_INCREMENT,
        role_type VARCHAR(50) NOT NULL COMMENT 'Admin, User'
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    roles (role_type)
VALUES
    ("Admin"),
    ("User");

/* Tabla de users */
DROP TABLE IF EXISTS users;

CREATE TABLE
    users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_client INT NOT NULL,
        id_role INT NOT NULL,
        username VARCHAR(30) UNIQUE NOT NULL,
        hashedPassword VARCHAR(200) NOT NULL,
        /* email VARCHAR(200) UNIQUE NOT NULL, */
        /* birthday DATE NOT NULL */
        FOREIGN KEY (id_client) REFERENCES clients (id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_role) REFERENCES roles (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    users (
        id_client,
        id_role,
        username,
        hashedPassword /* , email, birthday */
    )
VALUES
    (
        1,
        1,
        "Admin",
        "1234" /* , "admin@mail.com", "2001/07/23", */
    ),
    (
        1,
        2,
        "User1",
        "1234" /* , "user1@mail.com", "2002/03/07", */
    );

/* Tabla de user_cars */
DROP TABLE IF EXISTS user_cars;

CREATE TABLE
    user_cars (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_user INT NOT NULL,
        car_registration_plate VARCHAR(10) UNIQUE NOT NULL,
        car_brand VARCHAR(100) NOT NULL,
        car_model VARCHAR(100) NOT NULL,
        car_color VARCHAR(50) NOT NULL,
        FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    user_cars (
        id_user,
        car_registration_plate,
        car_brand,
        car_model,
        car_color
    )
VALUES
    (1, "1234ABC", "Unique", "Infinite", "Gray"),
    (2, "5678DEF", "Parsi", "Infinite", "Brown");

/* Tabla de user_sessions */
DROP TABLE IF EXISTS user_sessions;

CREATE TABLE
    user_sessions (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_user INT NOT NULL,
        session_datetime DATETIME NOT NULL,
        session_status VARCHAR(20) NOT NULL COMMENT 'LOG IN, LOG OUT',
        FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/* Tabla de client_banks */
DROP TABLE IF EXISTS client_banks;

CREATE TABLE
    client_banks (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_client INT NOT NULL,
        iban VARCHAR(35) UNIQUE NOT NULL,
        swift_bic VARCHAR(11) NOT NULL,
        FOREIGN KEY (id_client) REFERENCES clients (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    client_banks (id_client, iban, swift_bic)
VALUES
    (1, "ES6621000418401234567891", "AAMAESMM"),
    (2, "ES7100302053091234567895", "ALCLESMM");

/* Tabla de client_paypals */
DROP TABLE IF EXISTS client_paypals;

CREATE TABLE
    client_paypals (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_client INT NOT NULL,
        paypal_info VARCHAR(150) NOT NULL COMMENT 'email or username of PayPal',
        FOREIGN KEY (id_client) REFERENCES clients (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    client_paypals (id_client, paypal_info)
VALUES
    (1, "admin@paypal.com"),
    (2, "user1@paypal.com");

/* Tabla de client_cards */
DROP TABLE IF EXISTS client_cards;

CREATE TABLE
    client_cards (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_client INT NOT NULL,
        card_holder_name VARCHAR(150) NOT NULL,
        card_number VARCHAR(16) UNIQUE NOT NULL,
        card_cvv VARCHAR(3) UNIQUE NOT NULL,
        card_expiration_date DATE NOT NULL,
        isPrincipal TINYINT (1) NOT NULL COMMENT '1=true, 0=false',
        FOREIGN KEY (id_client) REFERENCES clients (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    client_cards (
        id_client,
        card_holder_name,
        card_number,
        card_cvv,
        card_expiration_date,
        isPrincipal
    )
VALUES
    (
        1,
        "Admin Master Main",
        "5540500001000004",
        "989",
        "2027/01/01"
    ),
    (
        2,
        "User1 User Use",
        "5020470001370055",
        "787",
        "2027/02/02"
    );

/* Tabla de rates */
DROP TABLE IF EXISTS rates;

CREATE TABLE
    rates (
        id INT PRIMARY KEY AUTO_INCREMENT,
        rates_type VARCHAR(100) NOT NULL COMMENT "Tarifa por dia, Tarifa por minuto",
        rates_day_price DECIMAL(10, 2) NOT NULL COMMENT 'Tarifa por día 18€',
        rates_min_price DECIMAL(10, 3) NOT NULL COMMENT 'Tarifa por minuto 0.029€'
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/* Tabla de discounts */
DROP TABLE IF EXISTS discounts;

INSERT INTO
    rates (rates_type, rates_day_price, rates_min_price)
VALUES
    ("Tarifa por día", 18.00),
    ("Tarifa por minuto", 0.029);

CREATE TABLE
    discounts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        discount_type VARCHAR(100) NOT NULL COMMENT 'Little 1.5%, Web 2%, Normal 3%, Especial 5%,',
        discount_percentage DECIMAL(10, 3) COMMENT '0.015, 0.02, 0.03, 0.5',
        discount_fixed DECIMAL(10, 2) COMMENT 'Mini Fixed 0.03cents/hour, Maxi Fixed 0.07cents/hour'
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    discounts (
        discount_type,
        discount_percentage,
        discount_fixed
    )
VALUES
    ("Little", 0.015, 0),
    ("Web", 0.02, 0),
    ("Normal", 0.03, 0),
    ("Especial", 0.05, 0),
    ("Mini Fixed", 0.00, 0.03),
    ("Maxi Fixed", 0.00, 0.07);

/* Tabla de payment_methods */
DROP TABLE IF EXISTS payment_methods;

CREATE TABLE
    payment_methods (
        id INT PRIMARY KEY AUTO_INCREMENT,
        payment_method VARCHAR(100) NOT NULL COMMENT 'Card, PayPal, Bizum, Bank Transfer, Crypto, Cash'
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    payment_methods (payment_method)
VALUES
    ("Card"),
    ("PayPal"),
    ("Bizum"),
    ("Bank Transfer"),
    ("Crypto"),
    ("Cash");

/* Tabla de taxes */
DROP TABLE IF EXISTS taxes;

CREATE TABLE
    taxes (
        id INT PRIMARY KEY AUTO_INCREMENT,
        tax_type VARCHAR(100) NOT NULL COMMENT 'Normal 21%, Reducido 10%, Superreducido 4%',
        tax_percentage DECIMAL(10, 2) NOT NULL COMMENT '0.21, 0.10, 0.04'
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    taxes (tax_type, tax_percentage)
VALUES
    ("Normal 21%", 0.21),
    ("Reducido 10%", 0.10),
    ("Surperreducido 4%", 0.04);

/* Tabla de reservations */
DROP TABLE IF EXISTS reservations;

/** TODO: ACABAR ESTO ******************************************************************************/

CREATE TABLE
    reservations (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_client INT NOT NULL,
        id_payment_method INT NOT NULL,
        id_rate INT NOT NULL,
        reservation_start_datetime DATETIME NOT NULL,
        reservation_end_datetime DATETIME NOT NULL,
        reservation_status VARCHAR(70) NOT NULL COMMENT 'Cancelled, Confirmed, Processing',
        reservation_price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (id_client) REFERENCES clients (id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_payment_method) REFERENCES payment_methods (id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_rate) REFERENCES rates (id) ON DELETE CASCADE ON UPDATE CASCADE,
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    reservations (
        id_client,
        id_payment_method,
        reservation_datetime,
        reservation_status,
        reservation_price
    )
    /* Tabla de reservation_details */
DROP TABLE IF EXISTS reservation_details;

CREATE TABLE
    reservation_details (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_reservation INT NOT NULL,
        id_discount INT NOT NULL,
        id_tax INT NOT NULL,
        subtotal DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (id_reservation) REFERENCES reservations (id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_discount) REFERENCES discounts (id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_tax) REFERENCES taxes (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
