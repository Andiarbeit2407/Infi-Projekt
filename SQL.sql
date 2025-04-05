CREATE TABLE `buchung` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `kunde_id` INT NOT NULL,
    `parkplatz_id` INT NOT NULL,
    `startzeit` DATETIME NOT NULL,
    `endzeit` DATETIME NOT NULL,
    `buchungszeit` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`kunde_id`) REFERENCES `kunde`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`parkplatz_id`) REFERENCES `parkplatz`(`id`) ON DELETE CASCADE
);

CREATE TABLE `kunde` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `vorname` VARCHAR(50) NOT NULL,
    `nachname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `telefonnummer` VARCHAR(20) NOT NULL,
    `registrierungsdatum` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `parkplatz` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `standort` VARCHAR(255) NOT NULL,
    `kapazitaet` INT NOT NULL,
    `preis_pro_stunde` DECIMAL(4,2) NOT NULL,
    `verfuegbar` BOOLEAN NOT NULL DEFAULT TRUE
);

INSERT INTO `kunde` (`vorname`, `nachname`, `email`, `telefonnummer`)
VALUES 
('Max', 'Müller', 'max.mueller@example.com', '0123456789'),
('Anna', 'Schmidt', 'anna.schmidt@example.com', '0234567890'),
('Lukas', 'Meier', 'lukas.meier@example.com', '0345678901'),
('Sophie', 'Klein', 'sophie.klein@example.com', '0456789012'),
('Leon', 'Fischer', 'leon.fischer@example.com', '0567890123');

INSERT INTO `parkplatz` (`standort`, `kapazitaet`, `preis_pro_stunde`, `verfuegbar`)
VALUES 
('Parkhaus Zentrum', 100, 2.50, TRUE),
('Parkhaus Nord', 80, 2.00, TRUE),
('Parkplatz West', 50, 1.50, TRUE),
('Parkplatz Ost', 30, 1.00, TRUE),
('Parkhaus Süd', 120, 3.00, TRUE);

INSERT INTO `buchung` (`kunde_id`, `parkplatz_id`, `startzeit`, `endzeit`)
VALUES 
(1, 1, '2025-03-24 08:00:00', '2025-03-24 12:00:00'),
(2, 2, '2025-03-24 09:00:00', '2025-03-24 11:00:00'),
(3, 3, '2025-03-24 10:00:00', '2025-03-24 13:00:00'),
(4, 4, '2025-03-24 11:00:00', '2025-03-24 14:00:00'),
(5, 5, '2025-03-24 12:00:00', '2025-03-24 15:00:00');
