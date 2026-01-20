CREATE TABLE IF NOT EXISTS surveys (
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    question1 TEXT NOT NULL,
    question2 TEXT NOT NULL,
    question3 TEXT NOT NULL
);
