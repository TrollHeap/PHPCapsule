CREATE TABLE IF NOT EXISTS users (
    id            INTEGER PRIMARY KEY AUTOINCREMENT,
    username      TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    role          TEXT NOT NULL DEFAULT 'employee', -- 'admin' ou 'employee'
    email         TEXT NOT NULL,
    created_at    DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS articles (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    titre       TEXT NOT NULL,
    description TEXT NOT NULL,
    date_event  DATE NOT NULL,    -- stocke YYYY-MM-DD mais utilise seulement MM-DD côté app ou requête
    hours       TIME NOT NULL,    -- juste HH:MM:SS
    lieu        TEXT,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    author_id   INTEGER NOT NULL,
    author      TEXT,
    FOREIGN KEY(author_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table pour les messages de contact
CREATE TABLE IF NOT EXISTS contacts (
    id         INTEGER PRIMARY KEY AUTOINCREMENT,
    nom        TEXT NOT NULL,
    email      TEXT NOT NULL,
    message    TEXT NOT NULL,
    ip         TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password_hash, role, email) 
VALUES ('admin', '$2y$12$DdRaR1i6wNQbPGxbmgeB9OvAnhSzFvN98/wIBdO3w0Qcqsu62BMEy','admin', 'admin@example.org');

INSERT INTO articles (titre, description, date_event, hours, lieu, image, author_id)
VALUES
  ('Réunion mensuelle', 'Présentation des avancées du projet', '2025-08-01', '18:00:00', 'Salle des fêtes', NULL, 1),
  ('Atelier alimentation durable', 'Initiation à la cuisine locale et responsable.', '2025-08-15', '14:00:00', 'Centre social', NULL, 1),
  ('Assemblée générale', 'AG annuelle de lassociation.', '2025-09-10', '17:00:00', 'Mairie de Morlaix', NULL, 1);
