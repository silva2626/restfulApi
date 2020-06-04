CREATE TABLE IF NOT EXISTS courses(
   id INTEGER PRIMARY KEY AUTOINCREMENT,
   name           TEXT      NOT NULL,
   teacher        TEXT      NOT NULL,
   duration       TEXT	    NOT NULL,
   rating         TEXT      NOT NULL,
   price	  TEXT 	    NOT NULL
);

