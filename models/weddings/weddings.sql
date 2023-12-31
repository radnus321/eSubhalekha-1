-- weddings Table
CREATE TABLE weddings (
    weddingID VARCHAR(255) NOT NULL,
    lang ENUM('as', 'bn', 'gu', 'hi', 'kn', 'ml', 'mr', 'ne', 'or', 'pa', 'ta', 'te', 'ur', 'en') DEFAULT 'en',
    domain VARCHAR(255) NOT NULL,
    weddingName VARCHAR(255) NOT NULL,
    fromRole ENUM('bride', 'groom') NOT NULL,
    brideName VARCHAR(255) NOT NULL,
    groomName VARCHAR(255) NOT NULL,
    brideQualifications VARCHAR(255),
    groomQualifications VARCHAR(255),
    brideBio VARCHAR(255),
    groomBio VARCHAR(255),
    story JSON,
    timeline JSON,
    hosts JSON,
    invitation TEXT,
    template VARCHAR(255),
    tier ENUM('na', 'basic', 'premium', 'custom') DEFAULT 'na',
    music VARCHAR(255),
    youtube VARCHAR(255),
    accommodation JSON,
    travel JSON,
    phone VARCHAR (15),
    whatsappAPIKey VARCHAR(2048),
    host VARCHAR(255) NOT NULL,
    partner VARCHAR(255),
    manager VARCHAR(255),
    createdAt DATETIME,
    status ENUM('pending', 'paid', 'live', 'completed') DEFAULT 'pending',
    FOREIGN KEY (host) REFERENCES users(userID),
    PRIMARY KEY (weddingID, lang)
);