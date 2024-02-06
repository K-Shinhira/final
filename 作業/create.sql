CREATE TABLE IF NOT EXISTS categories(
    category_id INT auto_increment,
    category_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(category_id)
);

CREATE TABLE IF NOT EXISTS items(
    item_id INT auto_increment,
    title VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    watched BOOLEAN NOT NULL DEFAULT FALSE,
    rating DECIMAL(3, 2) DEFAULT 0,
    PRIMARY KEY(item_id),
    FOREIGN KEY(category_id) REFERENCES categories(category_id)
);