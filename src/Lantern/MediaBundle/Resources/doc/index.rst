Sickbeard Schema

CREATE TABLE db_version (
    db_version INTEGER
);

CREATE TABLE history (
    action   NUMERIC,
    date     NUMERIC,
    showid   NUMERIC,
    season   NUMERIC,
    episode  NUMERIC,
    quality  NUMERIC,
    resource TEXT,
    provider TEXT
);

CREATE TABLE info (
    last_backlog NUMERIC,
    last_tvdb    NUMERIC
);

CREATE TABLE tv_shows (
    show_id           INTEGER PRIMARY KEY,
    location          TEXT,
    show_name         TEXT,
    tvdb_id           NUMERIC,
    network           TEXT,
    genre             TEXT,
    runtime           NUMERIC,
    quality           NUMERIC,
    airs              TEXT,
    status            TEXT,
    flatten_folders   NUMERIC,
    paused            NUMERIC,
    startyear         NUMERIC,
    tvr_id            NUMERIC,
    tvr_name          TEXT,
    air_by_date       NUMERIC,
    lang              TEXT,
    last_update_tvdb  NUMERIC,
    rls_require_words TEXT,
    rls_ignore_words  TEXT
);
CREATE UNIQUE INDEX idx_tvdb_id ON tv_shows (tvdb_id);

CREATE TABLE tv_episodes (
    episode_id   INTEGER PRIMARY KEY,
    showid       NUMERIC, -- FOREIGN KEY TO tv_shows.show_id
    tvdbid       NUMERIC,
    name         TEXT,
    season       NUMERIC,
    episode      NUMERIC,
    description  TEXT,
    airdate      NUMERIC,
    hasnfo       NUMERIC,
    hastbn       NUMERIC,
    status       NUMERIC,
    location     TEXT,
    file_size    NUMERIC,
    release_name TEXT
);
CREATE INDEX idx_tv_episodes_showid_airdate ON tv_episodes(showid,airdate);
CREATE INDEX idx_showid ON tv_episodes (showid);

Couchpotato Schema

CREATE TABLE file (
    id INTEGER NOT NULL, 
    path VARCHAR(255) NOT NULL, 
    part INTEGER, 
    available BOOLEAN, 
    type_id INTEGER, 
    PRIMARY KEY (id), 
    CONSTRAINT file_type_id_fk FOREIGN KEY(type_id) REFERENCES filetype (id), 
    UNIQUE (path), 
    CHECK (available IN (0, 1))
);
CREATE INDEX ix_file_type_id ON file (type_id);

