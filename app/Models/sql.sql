CREATE DATABASE fancytodo;
-- sita kroc bus log in tabula, jeb lietotaju tabula !!!!
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL
);

-- Uzdevumu tabula
CREATE TABLE Tasks (
    TaskID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Title VARCHAR(100) NOT NULL,
    Description TEXT,
    Deadline DATE,
    Status ENUM('Pabeigts', 'Nepabeigts') DEFAULT 'Nepabeigts',
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Projektu tabula
CREATE TABLE Projects (
    ProjectID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Title VARCHAR(100) NOT NULL,
    Description TEXT,
    Deadline DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Kategoriju tabula (papildu funkcionalitāte)
CREATE TABLE Categories (
    CategoryID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Name VARCHAR(100) NOT NULL,
    Description TEXT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Uzdevumu-kategoriju  tabula (kroc te ir pateiksts ka tiek izveidots TaskCategories, kas laus uzdevumiem but saistitiem)
CREATE TABLE TaskCategories (
    TaskID INT,
    CategoryID INT,
    PRIMARY KEY (TaskID, CategoryID),
    FOREIGN KEY (TaskID) REFERENCES Tasks(TaskID),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

-- izveido kroc tabulu "Priorities", kas tiks izmantota kroc, lai glabatu informaciju

CREATE TABLE Priorities (
    PriorityID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(50) NOT NULL
);

-- ar so SQL funciju mes varesim izveidot ta ka konkretiem uzd cilveks var pieskit prioritati

CREATE TABLE TaskPriorities (
    TaskID INT,
    PriorityID INT,
    PRIMARY KEY (TaskID),
    FOREIGN KEY (TaskID) REFERENCES Tasks(TaskID),
    FOREIGN KEY (PriorityID) REFERENCES Priorities(PriorityID)
);

-- Atgādinājumu tabula jeb prosta varesi pateicoties remainderID,UserID pievienot atgadinajumus.
CREATE TABLE Reminders (
    ReminderID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    TaskID INT,
    ReminderDateTime DATETIME NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (TaskID) REFERENCES Tasks(TaskID)
);
