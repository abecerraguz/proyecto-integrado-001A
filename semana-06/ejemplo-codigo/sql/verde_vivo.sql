-- =============================================================
-- Verde Vivo · base de datos de ejemplo (Semana 6)
-- Proyecto Integrado (GPD2201) · datos ficticios
-- Importar en phpMyAdmin: crear la base "verde_vivo" con cotejamiento
-- utf8mb4_general_ci, entrar a ella → pestaña Importar → este archivo.
-- =============================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS vv_mensajes;
DROP TABLE IF EXISTS vv_plantas;
DROP TABLE IF EXISTS vv_categorias;

SET FOREIGN_KEY_CHECKS = 1;

-- Categorías del catálogo
CREATE TABLE vv_categorias (
  c_id     INT AUTO_INCREMENT PRIMARY KEY,
  c_nombre VARCHAR(60) NOT NULL,
  c_slug   VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Plantas (contenido principal y dinámico del sitio)
CREATE TABLE vv_plantas (
  p_id           INT AUTO_INCREMENT PRIMARY KEY,
  p_nombre       VARCHAR(120) NOT NULL,
  p_cientifico   VARCHAR(120) DEFAULT NULL,
  p_descripcion  TEXT NOT NULL,
  p_luz          VARCHAR(120) DEFAULT NULL,
  p_riego        VARCHAR(120) DEFAULT NULL,
  p_precio       INT UNSIGNED NOT NULL,
  p_imagen       VARCHAR(255) DEFAULT NULL,
  p_categoria_id INT DEFAULT NULL,
  p_destacada    TINYINT(1) NOT NULL DEFAULT 0,
  CONSTRAINT fk_planta_categoria FOREIGN KEY (p_categoria_id)
    REFERENCES vv_categorias (c_id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Mensajes del formulario de contacto
CREATE TABLE vv_mensajes (
  m_id      INT AUTO_INCREMENT PRIMARY KEY,
  m_nombre  VARCHAR(80)  NOT NULL,
  m_correo  VARCHAR(120) NOT NULL,
  m_mensaje TEXT NOT NULL,
  m_fecha   DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos de prueba
INSERT INTO vv_categorias (c_id, c_nombre, c_slug) VALUES
(1, 'Interior', 'interior'),
(2, 'Suculentas', 'suculentas'),
(3, 'Aromáticas', 'aromaticas'),
(4, 'Exterior', 'exterior');

INSERT INTO vv_plantas (p_id, p_nombre, p_cientifico, p_descripcion, p_luz, p_riego, p_precio, p_imagen, p_categoria_id, p_destacada) VALUES
(1, 'Monstera deliciosa', 'Monstera deliciosa', 'Planta de hojas grandes y perforadas que da un aire tropical a cualquier living luminoso.', 'Luz indirecta abundante', 'Cada 7 a 10 días', 14990, 'monstera.svg', 1, 1),
(2, 'Potus', 'Epipremnum aureum', 'Colgante y muy resistente: ideal para empezar y para repisas altas.', 'Luz media o indirecta', 'Cuando la tierra esté seca', 7990, 'pothos.svg', 1, 1),
(3, 'Sansevieria', 'Dracaena trifasciata', 'Hojas erguidas y firmes. Tolera la poca luz y los olvidos de riego.', 'Poca luz a luz indirecta', 'Cada 2 a 3 semanas', 9990, 'sansevieria.svg', 1, 0),
(4, 'Echeveria', 'Echeveria elegans', 'Suculenta en forma de roseta, perfecta para ventanas soleadas y escritorios.', 'Sol directo suave', 'Cada 2 semanas, sin mojar las hojas', 3990, 'echeveria.svg', 2, 1),
(5, 'Aloe vera', 'Aloe barbadensis', 'Suculenta medicinal de hojas carnosas. Crece bien en macetas de greda.', 'Mucha luz', 'Cada 2 a 3 semanas', 5990, 'aloe-vera.svg', 2, 0),
(6, 'Cactus columnar', 'Cereus peruvianus', 'Cactus de crecimiento lento y forma escultural.', 'Sol directo', 'Una vez al mes', 6990, 'cactus.svg', 2, 0),
(7, 'Albahaca', 'Ocimum basilicum', 'Aromática de cocina. Pellizca las puntas para que crezca más frondosa.', 'Sol directo de mañana', 'Tierra siempre húmeda', 2990, 'albahaca.svg', 3, 0),
(8, 'Lavanda', 'Lavandula angustifolia', 'Arbusto aromático de flores moradas que atrae abejas al jardín.', 'Sol pleno', 'Una vez por semana en verano', 4990, 'lavanda.svg', 4, 0);
