CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    country_id INT,
    FOREIGN KEY (country_id) REFERENCES countries(id)
);

INSERT INTO users (firstname, lastname, country_id) VALUES 
('Ivan', 'Horvat', 1),
('Ana', 'Nikolić', 2),
('John', 'Doe', 4),
('Sarah', 'Smith', 5);
