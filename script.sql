-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS gimnasio_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


-- Tabla de Roles
CREATE TABLE roles (
  id_rol INT AUTO_INCREMENT PRIMARY KEY,
  nombre_rol VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- Tabla de Usuarios
create table usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  id_rol INT,
  FOREIGN KEY (id_rol) REFERENCES roles(id_rol) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Tabla de Tipos de Membresía
CREATE TABLE tipos_membresia (
  id_tipo_membresia INT AUTO_INCREMENT PRIMARY KEY,
  nombre_membresia VARCHAR(100) NOT NULL,
  duracion_dias INT NOT NULL,
  precio DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB;

-- Tabla de Membresías de Usuarios
CREATE TABLE membresias (
  id_membresia INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_tipo_membresia INT NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  estado ENUM('Activa', 'Vencida', 'Pendiente') NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
  FOREIGN KEY (id_tipo_membresia) REFERENCES tipos_membresia(id_tipo_membresia) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla de Pagos
CREATE TABLE pagos (
  id_pago INT AUTO_INCREMENT PRIMARY KEY,
  id_membresia INT NOT NULL,
  monto DECIMAL(10, 2) NOT NULL,
  fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  metodo_pago VARCHAR(50),
  FOREIGN KEY (id_membresia) REFERENCES membresias(id_membresia) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla de Clases
CREATE TABLE clases (
  id_clase INT AUTO_INCREMENT PRIMARY KEY,
  nombre_clase VARCHAR(100) NOT NULL,
  id_entrenador INT,
  horario DATETIME NOT NULL,
  capacidad_maxima INT NOT NULL,
  FOREIGN KEY (id_entrenador) REFERENCES usuarios(id_usuario) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Tabla de Inscripciones a Clases
CREATE TABLE inscripciones_clases (
  id_inscripcion INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_clase INT NOT NULL,
  fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
  FOREIGN KEY (id_clase) REFERENCES clases(id_clase) ON DELETE CASCADE,
  UNIQUE(id_usuario, id_clase) -- Evita que un usuario se inscriba dos veces en la misma clase
) ENGINE=InnoDB;

-- Tabla de Asistencia a Clases
CREATE TABLE asistencia_clases (
  id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
  id_inscripcion INT NOT NULL,
  fecha_entrada DATETIME NOT NULL,
  fecha_salida DATETIME,
  FOREIGN KEY (id_inscripcion) REFERENCES inscripciones_clases(id_inscripcion) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insertar roles básicos
INSERT INTO roles (nombre_rol) VALUES ('Administrador'), ('Entrenador'), ('Miembro');

-- Insertar tipos de membresía básicos
INSERT INTO tipos_membresia (nombre_membresia, duracion_dias, precio) VALUES
('Mensual', 30, 50.00),
('Trimestral', 90, 135.00),
('Anual', 365, 500.00);