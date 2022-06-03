-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 02:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ontheway`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminsId` int(200) NOT NULL,
  `adminsFirstname` varchar(200) NOT NULL,
  `adminsLastname` varchar(200) NOT NULL,
  `adminsEmail` varchar(200) NOT NULL,
  `adminsAid` varchar(200) NOT NULL,
  `adminsPwd` varchar(500) NOT NULL,
  `adminsImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminsId`, `adminsFirstname`, `adminsLastname`, `adminsEmail`, `adminsAid`, `adminsPwd`, `adminsImage`) VALUES
(1, 'Tahmid', 'Shahriar', 'tahmidshahriar.bd@gmail.com', 'admin001', '$2y$10$elx50.W1oasKoC8vX0DE3OaGxTPiizOcr/GnWGO0LfB/OgWBl/vYW', 'a.png'),
(2, 'Faria Islam', 'Leha', 'faria@gmail.com', 'admin002', '$2y$10$Lzh3Y0iL4Bl8hH.JtDePx.Eexjkt.2WAz2aXpmLTIhwkYlTziEU.2', 'a.png'),
(3, 'Monjurul', 'Arif', 'monjurulopu95@gmail.com', 'admin003', '$2y$10$TyzjVcsQdW.z.JaM.7APVeEjs9gVGv8CXo.GKRay2.YMxPfdOiA3i', 'a.png');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `bbankId` int(11) NOT NULL,
  `bbankName` varchar(200) NOT NULL,
  `bbankAddress` varchar(200) NOT NULL,
  `bbankWebsite` varchar(200) NOT NULL,
  `bbankcontno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`bbankId`, `bbankName`, `bbankAddress`, `bbankWebsite`, `bbankcontno`) VALUES
(1, 'Bangladesh Red Crescent Society', '7, 5 Aurangajeb Rd, Dhaka', 'http://www.bdrcs.org/', '02-9139940'),
(2, 'Bangladesh Blood Bank and Transfusion Center', '12,, 22 Babar Rd, Dhaka', 'https://www.bdspecializedhospital.com/department/bshl-blood-bank', '01850-077185'),
(3, 'Mukti Blood Bank', '54 (1st Floor), Bir-uttuam A.M. Shafiullah Road, Free School St, Dhaka 1205', 'https://mukti-blood-bank.business.site/?utm_source=gmb&utm_medium=referral', '01981-526285'),
(4, 'Lions Club Blood Bank', 'Lions Bhaban, Begum Rokeya Avenue, 1207, Dhaka', 'https://lionshospital.org/', '0811-0894'),
(5, 'Quantum Blood Bank', '1/1 Pioneer Road (Ground Floor); Segunbagicha,Kakrail; Dhaka - 1000; Dhaka, Bangladesh', 'http://www.quantummethod.org.bd/', '01714010869'),
(6, 'Retina Blood Bank', '2 \\KA \\ 5, Nowab Habibullah Road, Shahbag,\r\nDhaka', '', ' 02-9663853'),
(7, 'Alif Blood Bank And Transfusion Centre', '44/11, West Panthapath, Opposite Shamrita Hospital, Dhaka 1205', '', '01712-392923'),
(8, 'Oriental Blood Bank', '2B/30, SEL Green Centre, Green Road, Dhanmondi, Dhaka 1205', '', '01812-700053'),
(9, 'Ideal Blood Bank', '53 Naya Paltan, Dhaka', 'http://www.idealbloodbank.com.bd/', '01988-877800');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctorId` int(11) NOT NULL,
  `doctorName` varchar(200) NOT NULL,
  `doctorUsername` varchar(200) NOT NULL,
  `doctorDesignation` varchar(200) NOT NULL,
  `doctorContactNo` varchar(200) NOT NULL,
  `doctorEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctorId`, `doctorName`, `doctorUsername`, `doctorDesignation`, `doctorContactNo`, `doctorEmail`) VALUES
(1, 'Dr Shofiqul Islam Bhuiyan', '[doctor]shofiqul001', 'Oncologist', '+8801700000000', 'shofiqul@gmail.com'),
(2, 'Dr Khadiza Islam Bhuiyan', '[doctor]khadizal001', 'Gynecologist', '+8801900000000', 'khadiza@gmail.com'),
(3, 'Dr. Hossain Mohammad Selim', '[doctor]hmselim001', 'Alternative Homeopathy Medicine Specialist', '+8801711424704', 'hm.selim@gmail.com'),
(4, 'Dr. Md. Moniruzzaman', '[doctor]moniruzzaman001', 'Homeopathy Specialist', '+8801521234793', 'dmmrz@gmail.com'),
(5, 'Dr. ATM Asaduzzaman', '[doctor]asaduzzaman001', 'Skin, Allergy & Sexual Diseases Specialist', '+8801914499496', 'drasadz@yahoo.com'),
(6, 'Dr. Mir M. Siddiq', '[doctor]siddiq001', 'Skin Specialist & Laser Surgeon', '+8801822990324', 'drsiddiq57@yahoo.com'),
(7, 'Prof. Dr. Akram Ullah Sikder', '[doctor]akrmullah001', 'Dermatology & Venereology Specialist', '+8801744898934', 'akramullah53@gmail.com'),
(8, 'Dr. Golam Mahfuz Rabbani', '[doctor]gmrabbani001', 'Cardiology Specialist', '+8801711113221', 'gmrabbani87@yahoo.com'),
(9, 'Prof. Dr. KMHS Sirajul Haque', '[doctor]sirajul001', 'Clinical Cardiology Specialist', '+88029670295', 'sirajulhq91@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medId` int(200) NOT NULL,
  `medName` varchar(100) NOT NULL,
  `medType` varchar(40) NOT NULL,
  `medCompany` varchar(100) NOT NULL,
  `medQuantity` varchar(200) NOT NULL,
  `medPrice` float NOT NULL,
  `medDescription` text NOT NULL,
  `medSideEffects` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medId`, `medName`, `medType`, `medCompany`, `medQuantity`, `medPrice`, `medDescription`, `medSideEffects`) VALUES
(1, 'Napa', 'tablet', 'Beximco Pharmaceuticals Ltd.', '100 unit', 80, 'This aracetamol is indicated for fever, common cold and influenza, headache, toothache, earache, bodyache, myalgia, neuralgia, dysmenorrhoea, sprains, colic pain, back pain, post-operative pain, postpartum pain, inflammatory pain and post vaccination pain in children. It is also indicated for rheumatic & osteoarthritic pain and stiffness of joints.', 'Side effects of this paracetamol are usually mild, though haematological reactions including thrombocytopenia, leucopenia, pancytopenia, neutropenia, and agranulocytosis have been reported. Pancreatitis, skin rashes, and other allergic reactions occur occasionally.'),
(2, 'Adovas', 'Syrup', 'Square Pharmaceuticals Ltd.', '100 ml', 65, 'his herbal cough syrup liquefies phlegm. It soothes irritation of the throat. Helps to relieve hoarseness. It is a remedy for all types of cough such as dry irritable cough, allergic & smokers cough', 'This syrup is proven as safe. It is well tolerated. In high dose diarrhea, vomiting may occur.'),
(3, 'Methotrax', 'Tablet', 'Delta Pharma Ltd.', '30 unit', 450, 'Methotrexate is indicated in the treatment of gestational choriocarcinoma, chorioadenoma destruens and hydatidiform mole. Methotrexate is used in maintenance therapy in combination with other chemotherapeutic agents. Methotrexate is used alone or in combination with other anticancer agents in the treatment of breast  cancer, epidermoid cancers of the head and neck, advanced mycosis fungoides (cutaneous T cell lymphoma), and lung cancer, particularly squamous cell and small cell types. Methotrexate is also used in combination with other chemotherapeutic agents in the treatment of advanced stage non-Hodgkin\'s lymphomas.', 'Ulceration of the mouth and GI disturbances (e.g. stomatitis and diarrhoea), bone marrow depression, hepatotoxicity, renal failure, skin reactions, alopecia, ocular irritation, arachnoiditis in intrathecal use, megaloblastic anaemia, osteoporosis, precipitation of diabetes, arthralgias, necrosis of soft tissue and bone, anaphylaxis, impaired fertility.'),
(4, 'Esoral', 'Tablet', 'Eskayef Pharmaceuticals Ltd.', '30 Unit', 240, 'Esomeprazole is a proton pump inhibitor that suppresses gastric acid secretion by specific inhibition of the H+/K+ ATPase in the gastric parietal cell. Esomeprazole (S-isomer of omeprazole) is the first single optical isomer of proton pump inhibitor, provides better acid control than racemic proton pump inhibitors.', 'Side effects reported with Esomeprazole include headache, diarrhea and abdominal pain.'),
(5, 'Esoral', 'IV Injection', 'Eskayef Pharmaceuticals Ltd.', '40 mg vial', 90, 'Esomeprazole is a proton pump inhibitor that suppresses gastric acid secretion by specific inhibition of the H+/K+ ATPase in the gastric parietal cell. Esomeprazole (S-isomer of omeprazole) is the first single optical isomer of proton pump inhibitor, provides better acid control than racemic proton pump inhibitors.', 'Side effects reported with Esomeprazole include headache, diarrhea and abdominal pain.'),
(6, 'Tufnil', 'Tablet', 'Eskayef Pharmaceuticals Ltd.', '40', 400, 'It is used specifically for relieving the pain of migraine headache and also recommended for use as an analgesic in post-operative pain and fever.', 'Dysuria especially in males, diarrhoea, nausea epigastric pain, vomiting, dyspepsia, erythema, headache, tremor, euphoria, fatigue, pulmonary infiltration & haematuria. Potentially fatal: Blood dyscrasias and hepatitis.'),
(7, 'Loratin', 'tablet', 'Square Pharmaceuticals Ltd.', '100', 301, 'Loratadine tablet provides fast, effective relief from the symptoms of seasonal allergic rhinitis, perennial allergic rhinitis and skin allergies including chronic urticaria. It is also effective in alleviating symptoms of allergic rhinitis such as sneezing, nasal discharge, itching, ocular itching and burning. Nasal and ocular sign and symptoms are relieved rapidly after oral administration. Loratadine tablet is also indicated in idiopathic urticaria. In children over 2 years Loratadine tablet is indicated for the symptomatic relief of seasonal allergic rhinitis and allergic skin conditions such as urticaria, nettlerash.', 'During controlled clinical studies the incidence of adverse events, including sedation and anticholinergic effects observed with 10 mg Loratadine was comparable to that observed with placebo. Studies on the effect of Loratadine on actual driving performance, and on tests of cognitive and psychomotor functioning have shown it to be comparable to placebo.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `orderDate` varchar(40) NOT NULL,
  `orderTime` varchar(100) NOT NULL,
  `customerId` varchar(40) NOT NULL,
  `orderedItems` varchar(200) NOT NULL,
  `totalPrice` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderDate`, `orderTime`, `customerId`, `orderedItems`, `totalPrice`, `status`) VALUES
(13, '2021-05-16', '18:06:26', 'tahmid001', ' Adovas x 3 Loratin x 2 Napa x 3', '1035', 'delivered'),
(31, '2021-05-16', '20:29:10', 'tahmid001', ' Adovas x 1 Loratin x 1 Methotrax x 1 Napa x 1', '895', 'delivered'),
(32, '2021-05-16', '20:30:56', 'tahmid001', ' Napa x 1 Tufnil x 1 Loratin x 1', '780', 'delivered'),
(68, '2021-05-19', '06:32:20', 'faria001', ' Adovas x 1 Esoral (injection) x 1 Loratin x 1', '455', 'pending'),
(69, '2021-05-19', '06:33:55', 'faria001', ' Tufnil x 2 Napa x 4', '1120', 'pending'),
(70, '2021-05-19', '06:35:07', 'arif001', ' Loratin x 1 Esoral (tablet) x 1 Adovas x 1', '605', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `quora`
--

CREATE TABLE `quora` (
  `commId` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `qa` text NOT NULL,
  `qadate` varchar(100) NOT NULL,
  `qatime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quora`
--

INSERT INTO `quora` (`commId`, `username`, `qa`, `qadate`, `qatime`) VALUES
(74, 'faria001', 'Hello', '2021-05-18', '00:00:04'),
(75, 'tahmid001', 'how are you feeling today?', '2021-05-18', '14:17:22'),
(76, 'testuser001', 'Hello there! My question is to Dr. ATM Asaduzzaman sir. I have blemishes and wrinkles. What can I do to feel better?', '2021-05-19', '06:18:50'),
(77, '[doctor]asdz001', 'Dear testuser001, please give up any bad habits like smoking or consuming tobacco. It will help. Besides start getting treatments like  Retinoids,  Glycolic acid peels etc. Thank you.', '2021-05-19', '06:22:37'),
(78, 'testuser001', 'Thank you very much sir for your tips', '2021-05-19', '06:23:55'),
(79, 'arif001', 'thank you both for using our service', '2021-05-19', '06:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, ' Napa', 'MED101', 'product-images/napa.jpg', 80.00),
(2, ' Adovas', 'MED102', 'product-images/adovas.jpg', 65.00),
(3, ' Methotrax', 'MED103', 'product-images/methotrax.gif', 450.00),
(4, ' Esoral (tablet)', 'MED104', 'product-images/esoraltablet.jpg', 240.00),
(5, ' Tufnil', 'MED105', 'product-images/tufnil.jpg', 400.00),
(6, ' Esoral (injection)', 'MED106', 'product-images/esoralinjection.jpg', 90.00),
(7, ' Loratin', 'MED107', 'product-images/loratin.jpg', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(100) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `usersEmail` varchar(30) NOT NULL,
  `usersUid` varchar(30) NOT NULL,
  `usersPwd` varchar(500) NOT NULL,
  `usersImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `firstname`, `lastname`, `usersEmail`, `usersUid`, `usersPwd`, `usersImage`) VALUES
(1, 'Tahmid', 'Shahriar', 'tahmid@gmail.com', 'tahmid001', '$2y$10$5DWwfPCVjF1dXdjKyRpsGeT9.slVAl5asvdmCYWfEIEQd/P7LYS8G', 'Etrigan.jpg'),
(2, 'Faria Islam', 'Leha', 'faria@gmail.com', 'faria001', '$2y$10$LLap.RpvNPNX.n3sswnXKOa06bTr3LXAlwzDDlC12/CIASD8rUmru', 'LiaW 20190531_203606.jpg'),
(3, 'Monjurul', 'Arif', 'arif@gmail.com', 'arif001', '$2y$10$t9.eXQEGFZWrNjq4srCrTu2yACCOYlOXygzZb8isrUs7XMTKtQcWy', 'dp.png'),
(4, 'Dr Khadiza Islam', 'Bhuiyan', 'khadiza@gmail.com', '[Doctor]khadiza001', '$2y$10$f3iWBI6VoWbD0VwPZWWile4783N/E1BHzb.eTB4Vh4I29iZ5OCvii', 'dp.png'),
(5, 'Dr Shofiqul Islam', 'Bhuiyan', 'shofiqul@gmail.com', '[Doctor]shofiqul001', '$2y$10$.zjjG.F/NAp/t4pSPMY4.uBXVTkiL0UPxRtwSuFn6bJ3zA8tQOPsa', 'dp.png'),
(8, 'Dr. ATM ', 'Asaduzzaman', 'drasadz@yahoo.com', '[doctor]asdz001', '$2y$10$hA3qJU/0JpXUZXeE6sexBeASsYDZvzAnrZhEq9a.u623A2Q07xvuC', 'dp.png'),
(9, 'Tony', 'Stark', 'tony@gmail.com', 'testuser001', '$2y$10$ENOGhlm/losca.3iatiuwu8BJoAQgdlcnFqbMoNn8T4K.GJB73oDq', 'dp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminsId`),
  ADD UNIQUE KEY `adminsAid` (`adminsAid`);

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`bbankId`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctorId`),
  ADD UNIQUE KEY `doctorUsername` (`doctorUsername`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `quora`
--
ALTER TABLE `quora`
  ADD PRIMARY KEY (`commId`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`),
  ADD UNIQUE KEY `usersUid` (`usersUid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminsId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloodbank`
--
ALTER TABLE `bloodbank`
  MODIFY `bbankId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `quora`
--
ALTER TABLE `quora`
  MODIFY `commId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
