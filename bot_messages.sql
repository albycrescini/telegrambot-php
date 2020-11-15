CREATE TABLE `bot_messages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `chatID` int NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
