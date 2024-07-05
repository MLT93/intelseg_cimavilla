# Creación de la base de datos y uso
DROP DATABASE IF EXISTS InformacionMeteorologica;

CREATE DATABASE IF NOT EXISTS InformacionMeteorologica;

ALTER DATABASE InformacionMeteorologica DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE InformacionMeteorologica;

# Tabla de ubicaciones
CREATE TABLE Ubicaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    latitud DECIMAL(10, 7) NOT NULL,
    longitud DECIMAL(10, 7) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL
);

# Tabla de tipos de fenómenos meteorológicos
CREATE TABLE TiposFenomenos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

# Tabla de mediciones meteorológicas
CREATE TABLE Mediciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ubicacion_id INT,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    temperatura DECIMAL(5, 2),
    humedad DECIMAL(5, 2),
    presion DECIMAL(7, 2),
    velocidad_viento DECIMAL(5, 2),
    direccion_viento VARCHAR(50),
    precipitacion DECIMAL(5, 2),
    fenomeno_id INT,
    FOREIGN KEY (ubicacion_id) REFERENCES Ubicaciones(id),
    FOREIGN KEY (fenomeno_id) REFERENCES TiposFenomenos(id)
);

# Tabla de alertas meteorológicas
CREATE TABLE Alertas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ubicacion_id INT,
    tipo_alerta VARCHAR(100),
    descripcion TEXT,
    fecha_inicio TIMESTAMP,
    fecha_fin TIMESTAMP,
    FOREIGN KEY (ubicacion_id) REFERENCES Ubicaciones(id)
);

# Tabla de previsiones meteorológicas
CREATE TABLE Previsiones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ubicacion_id INT,
    fecha_prevision DATE,
    temperatura_min DECIMAL(5, 2),
    temperatura_max DECIMAL(5, 2),
    probabilidad_precipitacion DECIMAL(5, 2),
    fenomeno_id INT,
    FOREIGN KEY (ubicacion_id) REFERENCES Ubicaciones(id),
    FOREIGN KEY (fenomeno_id) REFERENCES TiposFenomenos(id)
);

# Ejemplo de consultas de inserción de datos

# Insertar ubicaciones
INSERT INTO Ubicaciones (nombre, latitud, longitud, pais, ciudad) VALUES
('Estación Central', -34.603722, -58.381592, 'Argentina', 'Buenos Aires'),
('Parque Natural', 40.416775, -3.703790, 'España', 'Madrid');

# Insertar tipos de fenómenos meteorológicos
INSERT INTO TiposFenomenos (nombre, descripcion) VALUES
('Lluvia', 'Precipitación de agua en forma líquida desde las nubes'),
('Nieve', 'Precipitación de agua en forma sólida desde las nubes');

# Insertar mediciones meteorológicas
INSERT INTO Mediciones (ubicacion_id, fecha_hora, temperatura, humedad, presion, velocidad_viento, direccion_viento, precipitacion, fenomeno_id) VALUES
(1, '2024-06-27 10:00:00', 20.5, 60.0, 1013.25, 15.0, 'Noroeste', 2.5, 1),
(2, '2024-06-27 10:00:00', 15.0, 50.0, 1010.00, 10.0, 'Sur', 0.0, 2);

# Insertar alertas meteorológicas
INSERT INTO Alertas (ubicacion_id, tipo_alerta, descripcion, fecha_inicio, fecha_fin) VALUES
(1, 'Tormenta', 'Posible tormenta con lluvias intensas y vientos fuertes', '2024-06-28 15:00:00', '2024-06-28 20:00:00'),
(2, 'Nieve', 'Nevadas fuertes con acumulaciones significativas', '2024-12-01 08:00:00', '2024-12-01 18:00:00');

# Insertar previsiones meteorológicas
INSERT INTO Previsiones (ubicacion_id, fecha_prevision, temperatura_min, temperatura_max, probabilidad_precipitacion, fenomeno_id) VALUES
(1, '2024-06-29', 18.0, 25.0, 80.0, 1),
(2, '2024-06-29', 12.0, 22.0, 10.0, 2);
