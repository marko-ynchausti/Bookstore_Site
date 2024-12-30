BEGIN TRANSACTION;

CREATE TABLE websitedata(
   id SERIAL PRIMARY KEY,
   website_name VARCHAR(90),
   website_version VARCHAR(20),
   website_owner VARCHAR(20)
);

INSERT INTO websitedata (website_name,website_version,website_owner)
VALUES
('Bookstore', '0.1', 'Marko_Ynchausti');


-- Create the AUTHORS table
CREATE TABLE authors (
    author_id SERIAL PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth DATE
);

-- Insert the data
INSERT INTO authors (first_name, last_name, date_of_birth) VALUES
('Marko', 'Gronkowski', '2001-11-11'),
('Isaac', 'Garza', '2002-02-23'),
('Emiliano', 'Rickerson', '1996-03-12'),
('Gabriel', 'Gunnerson', '1996-06-20'),
('Lucy', 'Brucey', '2003-09-18'),
('Gaby', 'Rockhold', '1993-12-14'),
('Nancy', 'Pellerson', '1978-01-15'),
('Rick', 'Nickelback', '2000-04-19'),
('Nathan', 'Graythan', '1997-05-19'),
('Israel', 'Adesanya', '1999-08-20'),
('Finny', 'Winnie', '1988-03-23');

-- Verify the data
SELECT * FROM authors;


-- Create enum type to accept predefined values

CREATE TYPE genre AS ENUM (
    'educational',
    'sci-fi',
    'horror',
    'historical',
    'mystery',
    'comedy',
    'sports'
);

CREATE TABLE books (
    book_id   SERIAL    PRIMARY KEY,
    bookname  VARCHAR   NOT NULL,
    bookgenre genre     NOT NULL,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES authors(author_id)
);

INSERT INTO books (bookname, bookgenre, author_id)
VALUES
('How To Pass Database Theory and Design At LC', 'educational',  1),
('Destiny 2 Ultimate Beginner''s Guide',         'educational',  2),
('Journey to the Center of the Universe',        'sci-fi',       3),
('The Never-Ending Halloween Night',             'horror',       4),
('The World Before Computers',                   'historical',   5),
('Are We Alone?',                                'mystery',      6),
('How to Tell the Funniest Joke',                'comedy',       8),
('First Ship to Mars',                           'sci-fi',       7),
('The Origin of my Last Name',                   'comedy',       9),
('How it Feels to Face Anderson Silva',          'sports',      10),
('The Art of Being Scary Despite One''s Name',   'educational', 11);

SELECT bookname, bookgenre, first_name, last_name, authors.author_id
FROM books
LEFT JOIN authors USING(author_id)
WHERE bookgenre = 'educational';


-- ENUMS used for the type of user we have
CREATE TYPE user_type AS ENUM('admin', 'stduser');

-- Generates the users table
CREATE TABLE IF NOT EXISTS users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(120) UNIQUE NOT NULL,
    password VARCHAR NOT NULL,
    email VARCHAR(250) NOT NULL,
    role  user_type NOT NULL
);



COMMIT;
