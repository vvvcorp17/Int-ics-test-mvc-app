use test_database;

CREATE TABLE IF NOT EXISTS message (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    body text NOT NULL,
    PRIMARY KEY (id)
);
