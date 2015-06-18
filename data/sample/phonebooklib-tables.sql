PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "contact" (
    id INTEGER NOT NULL PRIMARY KEY,
    title VARCHAR(4) NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NULL,
    address VARCHAR(2000) NULL,
    phone VARCHAR(20) NULL,
    notes VARCHAR(2000) NULL,
    avatar VARCHAR(255) NULL,
    created_at VARCHAR(20) NOT NULL,
    updated_at VARCHAR(20) NULL
);
COMMIT;
