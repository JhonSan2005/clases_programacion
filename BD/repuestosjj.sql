CREATE DATABASE BD_JJ;
USE BD_JJ;


CREATE TABLE `roles` (
  `id_rol` INT NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(50),
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `usuario` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `documento` INT NOT NULL UNIQUE,
  `nombre` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `foto_perfil` VARCHAR(255) DEFAULT NULL,
  `id_rol` INT NOT NULL DEFAULT 2, -- Establece el rol de usuario por defecto a 2
  `token` VARCHAR(100) NOT NULL,
  FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `categorias` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `productos` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `nombre_producto` VARCHAR(100) NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `impuesto` DECIMAL(10,2) DEFAULT NULL,
  `stock` INT DEFAULT NULL,
  `id_categoria` INT NOT NULL,
  `descripcion` VARCHAR(1000) NOT NULL,
  `imagen_url` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) -- Relación con la tabla `categorias`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `compras` (
  `id_compras` INT NOT NULL AUTO_INCREMENT,
  `documento` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `cantidad` INT DEFAULT NULL,
  `impuesto` DECIMAL(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_compras`),
  KEY `fk_usuario_compras` (`documento`),
  KEY `fk_productos_compras` (`id_producto`),
  FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`), -- Relación con la tabla `usuario`
  FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) -- Relación con la tabla `productos`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `historial_de_compras` (
  `id_historial_de_compras` INT NOT NULL AUTO_INCREMENT,
  `id_compras` INT NOT NULL,
  `fecha` DATE DEFAULT NULL,
  `cantidad` INT DEFAULT NULL,
  PRIMARY KEY (`id_historial_de_compras`),
  KEY `fk_compras_historial_de_compras` (`id_compras`),
  FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id_compras`) -- Relación con la tabla `compras`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ventas` (
   `id_factura` INT NOT NULL AUTO_INCREMENT,
   `documento` INT,  -- Permitir que este campo sea NULL
   `id_compras` INT NOT NULL, 
   `id_producto` INT NOT NULL, 
   `id_categoria` INT NOT NULL, 
   `id_pago` INT NOT NULL,
   `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
   `descripcion` VARCHAR(255) NOT NULL,
   `estado_de_factura` ENUM('pendiente', 'pagada', 'cancelada') NOT NULL DEFAULT 'pendiente',
   `total` DECIMAL(10,2) NOT NULL CHECK (`total` >= 0),
   PRIMARY KEY (`id_factura`),
   INDEX `idx_compras_ventas` (`id_compras`),
   INDEX `idx_clientes_ventas` (`documento`),
   INDEX `idx_productos_facturas` (`id_producto`),
   INDEX `idx_categorias_facturas` (`id_categoria`),
   FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE,
   FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`) ON DELETE SET NULL, -- `SET NULL` permite que el campo sea NULL
   FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id_compras`) ON DELETE CASCADE,
   FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


insert into roles (id_rol,rol) values ('1','Admin');
insert into roles (id_rol,rol) values ('2','User');


insert into categorias (id_categoria,nombre_categoria) values ('1','Aceite');
insert into categorias (id_categoria,nombre_categoria) values ('2','Repuestos');
insert into categorias (id_categoria,nombre_categoria) values ('3','Llantas');

insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('1','Yamalube','39.999','16','30','1','Aceite de para motos de cilindraje 125cc y 250cc','1.png');
insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('2','Acetavo','45.999','16','30','1','Aceite de Sinteticio 125cc','2.png');
insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('3','Motul','44.999','16','30','1','Aceite de para motos 125cc-Cricton Fi','3.png');


insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('4','Filtro de Aire','54.999','16','30','1','Filtro maxima capacidad Cortina Plana','4.png');
insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('5','Bujia Iridum','79.999','16','30','1','Bujia Mejorada optimo rendimiento','5.png');
insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('6','Cadena KMC','56.999','16','30','1','Cadena de Cricton-Fi','6.png');

insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('7','Llantas FZL6','249.999','16','30','1','Diseñadas para brindar un agarre superior y una conducción suave','7.png');
insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('8','Llantas XTZ125','239','16','30','1','Perfectas para los terreno mas ostiles','8.png');
insert into productos (id_producto,nombre_producto,precio,impuesto,stock,id_categoria,descripcion,imagen_url) values ('9','Llantas NKD-125','199.999','16','30','1','Te brindan comodidad paar tu dia a dia conduccion suave','9.png');
















