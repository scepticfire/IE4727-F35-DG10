--Table 1: Books
CREATE TABLE books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    language VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2)
);

--Table 2: Genres (store all unique genre names)
CREATE TABLE genres (
    genre_id INT AUTO_INCREMENT PRIMARY KEY,
    genre_name VARCHAR(100) UNIQUE NOT NULL
);

--Table 3: Join table (book-genre relationships)
CREATE TABLE book_genres (
    book_id INT,
    genre_id INT,
    FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES genres(genre_id) ON DELETE CASCADE,
    PRIMARY KEY (book_id, genre_id)
);