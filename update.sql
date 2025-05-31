-- Add new tables for inverted index functionality

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(100) NOT NULL,
  `idf` float NOT NULL DEFAULT 0,
  `doc_frequency` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `term` (`term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `inverted_index`
--

CREATE TABLE `inverted_index` (
  `term_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `tf` float NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`term_id`,`paper_id`,`position`),
  KEY `paper_id` (`paper_id`),
  CONSTRAINT `inverted_index_ibfk_1` FOREIGN KEY (`term_id`) REFERENCES `terms` (`term_id`) ON DELETE CASCADE,
  CONSTRAINT `inverted_index_ibfk_2` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`p_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
