-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'QuantumDoe42', '$2y$10$l/AS2WF5QFhX4V2OpTSNq.D1P/EV/FEn7X/NIHzRe.eT.ianoiwm.');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(1, 1, 'Globe Bank', 1, 0, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/about us.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>About Globe Bank</h1>\n  <p>Our mission at Globe Bank International is simple: To serve every coordinate in every hemisphere as if it were our own. From the beginning, it\'s been our goal to incorporate world-class services with an unmatched level of responsiveness and thoughtfulness, no matter what your level of banking need. </p>\n\n  <p>Globe Bank International (NYSE: GBI), founded in 1950, is one of the newer financial institutions widely active in the world financial market. Despite our youth, we have a history solidly built on hard work, common-sense business practices, empowering investments, and an unyielding dedication to excellence.</p>\n\n  <p>We currently operate in 42 countries and have nearly 130,000 employees. Our client base is in the millions, from individuals to worldwide conglomerates, and our assets total approximately $1.8 trillion. Learn more about our services and our history, and let us know how we can work together to help you.</p>\n\n</div>\n'),
(2, 1, 'History', 2, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/history.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>History</h1>\n  <p>Founded in 1950 by brothers Otis and Isaac Bott, Globe Bank launched as a community financial institution with a fervent mission to help small businesses get their footing in the new economy of Postwar England. While the promise of prosperity was rampant, it was unfortunate that those willing to help with financial backing were understandably cautious and scarce.</p>\n\n  <p>The Botts believed in the power of community and ingenuity, so much so that several organizations, even to this day, credit the brothers for both their initial formation and their continued success. Among those businesses in the early days is what we now know as The Landon Hotel chain. As others repeatedly turned down requests for financing from its passionate, but inexperienced founder, Arthur Landon, the Botts appreciated and supported Landon\'s verve and vision. What started as a single hotel in London\'s West End, backed by Globe Bank, is now an impressive hotel empire that thrives in cities all around the world.</p>\n\n  <p>More recently, Globe Bank International has received acclaim for its high-profile investment in Winged Achene Technologies, giving it the means to expand from a small specialty helicopter blade company to a transnational rotorcraft resource, expanding not only the company\'s financial horizons, but creating several thousand sustainable jobs in three cities.</p>\n\n  <p>The Botts\' keen instincts for solid investments grew just as swiftly as those companies it supported. In 1974, it moved its home office from London to Washington D.C. to better serve its growing clientele, and changed its name to Globe Bank International. Globe Bank International rapidly became key in corporate, commercial, and investment banking in the United States and internationally, assisting in intercontinental and domestic asset management and growth.</p>\n\n  <p>Still, at its core, Globe Bank International remains a community bank, focusing on the specific needs of individuals and organizations in each community in which its branches are located. Today, Globe Bank is overseen by Otis Bott, President, alongside his son, Gerald Bott, CEO. They have successfully maintained the values and ideals of the family business, despite the bank\'s tremendous growth over the last half century.</p>\n\n</div>\n'),
(3, 1, 'Leadership', 3, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/leadership.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Leadership</h1>\n\n  <h2>Board of Directors</h2>\n  <ul>\n    <li>Robert Otis Bott, President</li>\n    <li>Sarah M. Bott</li>\n    <li>Alisha Bryan</li>\n    <li>Henry Terry</li>\n    <li>Meredith Jewel Coffey</li>\n    <li>Jesse Gould</li>\n    <li>Lea Sheryl Rodriquez</li>\n    <li>Joseph Riley</li>\n    <li>Martin Stephens</li>\n    <li>Jimmie Frank</li>\n  </ul>\n\n  <h2>Executive Team</h2>\n  <ul>\n    <li>Gerald Bott,&nbsp;Chairman and Chief Executive Officer</li>\n    <li>Stewart Talley, Chief Risk Officer</li>\n    <li>Judson Phillips, General Counsel</li>\n    <li>Naomi Ballard, VP Human Resources</li>\n    <li>Dominique Stein, Asset Management CEO </li>\n    <li>Cantby Bott, Chief Financial Officer</li>\n    <li>Frederic Owen, Commercial Banking CEO</li>\n    <li>Freeman McConnell, Corporate & Investment Bank CEO</li>\n    <li>Saul Hunt, Consumer & Community Banking CEO</li>\n    <li>Cheri Karla Mann, Chief Operating Officer</li>\n  </ul>\n\n</div>\n'),
(4, 1, 'Contact Us', 4, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/contact.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n\n<div id=\"content\">\n  <h1>Contact Us</h1>\n  <p>We\'re available 24 hours a day, 7 days a week for all your customer service needs.</p>\n  <ul>\n    <li><a href=\"#\">General banking</a></li>\n    <li><a href=\"#\">Online banking</a></li>\n    <li><a href=\"#\">Mobile banking</a></li>\n    <li><a href=\"#\">Report fraud</a></li>\n  </ul>\n\n</div>\n'),
(5, 2, 'Banking', 1, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/banking.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Banking</h1>\n  <h2>Branch, ATM, and Online Banking </h2>\n  <p>Bank from anywhere around the globe! With hundreds of branches and even more ATMs, it\'s almost guaranteed that you\'re within a short walk or drive from one of our locations. We go beyond the typical banking hours with our secure online banking services. If you need to manage or move your money, your accounts are available 24 hours a day. </p>\n\n  <ul>\n    <li><a href=\"#\">Find a branch</a></li>\n\n    <li><a href=\"#\">Find an ATM</a></li>\n\n    <li><a href=\"#\">Learn about online banking</a></li>\n\n    <li><a href=\"#\">Learn about Bott Bill Pay</a></li>\n  </ul>\n\n</div>\n'),
(6, 2, 'Credit Cards', 2, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/creditcards.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Credit Cards</h1>\n  <p>Our credit card program has been redesigned to help everyone build and improve their credit rather than sink deep into debt. With variable rates that suite your financial profile and needs, we grow with you, rather than against you.</p>\n  <ul>\n    <li><a href=\"#\">Compare our credit cards</a></li>\n    <li><a href=\"#\">Cash back credit cards</a></li>\n    <li><a href=\"#\">Rewards cards</a></li>\n    <li><a href=\"#\">Check your credit score</a></li>\n    <li><a href=\"#\">Transfer a balance</a></li>\n  </ul>\n</div>\n'),
(7, 2, 'Mortgages', 3, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/homeloans.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Mortgages</h1>\n  <p>People shouldn\'t have to buy the farm before they buy the farm. We believed that in 1950, and we believe that today. A home&mdash;whether a farm or condo or anything in between&mdash;is a place where you should feel safe and secure, not afraid that your mortgage is going to drain you of all happiness. Our home loan and home equity professionals take the time to discuss all options, and combine our pre-approval screening with financial forecasts so you know exactly what you can afford for your first or next home.</p>\n  <ul>\n    <li><a href=\"#\">Check current mortgage rates</a></li>\n    <li><a href=\"#\">Check current refinance rates</a></li>\n    <li><a href=\"#\">Learn how to buy a home</a></li>\n    <li><a href=\"#\">Learn how to refinance</a></li>\n    <li><a href=\"#\">Mortgage rate calculator</a></li>\n  </ul>\n</div>\n'),
(8, 3, 'Checking', 1, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/bizchecking.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Business Checking</h1>\n  <p>Options abound when it comes to selecting a Globe Bank business checking account. With so many choices, it might seem daunting to select the account that\'s right for your business. However, our talented customer service team is always available to help, whether in person, by phone, or online. Take a peek at some of our options, and when you\'re ready to get started, give us a shout.</p>\n\n  <ul>\n    <li><a href=\"#\">Compare our checking accounts</a></li>\n    <li><a href=\"#\">What you\'ll need to open an account</a></li>\n    <li><a href=\"#\">How to choose the right checking account for your business</a></li>\n    <li><a href=\"#\">Accounts with no monthly service fee</a></li>\n    <li><a href=\"#\">Order checks</a></li>\n  </ul>\n\n</div>\n'),
(9, 3, 'Loans', 2, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/bizloans.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Business Loans</h1>\n  <p>Businesses need upkeep to stay profitable in a competitive market. Whether you need to purchase new equipment, have plans for an expansion, or want to remodel your facility, Globe Bank can help you finance your vision.</p>\n  <ul>\n    <li><a href=\"#\">Compare our business term loans</a></li>\n    <li><a href=\"#\">Learn about SBA loan options</a></li>\n    <li><a href=\"#\">Estimate monthly payments</a></li>\n    <li><a href=\"#\">Check your application status</a></li>\n  </ul>\n\n</div>\n'),
(10, 3, 'Merchant Services', 3, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/merchant.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Merchant Services</h1>\n  <p>Whether onsite, online, or on-the-go, your business needs to be nimble in processing payments. We\'ve got the experience to navigate the ever-changing world of payment processing technology. We\'ll make it easy for you to get started with a merchant account, so you can start taking payments almost immediately. </p>\n  <ul>\n    <li><a href=\"#\">Compare our merchant accounts</a></li>\n    <li><a href=\"#\">Credit card processing options</a></li>\n    <li><a href=\"#\">Accepting mobile payments</a></li>\n    <li><a href=\"#\">POS systems</a></li>\n  </ul>\n\n</div>\n'),
(11, 5, 'Financing', 1, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/financing.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Financing</h1>\n  <p>From simple loans to long-term financing for sustained corporate growth, our advisors are here to help with a comprehensive selection of solutions and products to build your business.</p>\n  <ul>\n    <li><a href=\"#\">Lines of credit</a></li>\n    <li><a href=\"#\">Asset-based loans</a></li>\n    <li><a href=\"#\">Real estate loans</a></li>\n    <li><a href=\"#\">Employee stock ownership plans</a></li>\n  </ul>\n\n</div>\n'),
(12, 5, 'Investments', 2, 1, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/investments.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Investments and Asset Management</h1>\n  <p>We\'ll guide you through the global market like no one else can—from global liquidity, real estate securities, hedge funds, and more. We\'ll help you understand investment risk, dealing with inflation and soft economies, as well as asset allocation and regulatory requirements.</p>\n  <ul>\n    <li><a href=\"#\">Investments for insurance companies</a></li>\n    <li><a href=\"#\">Pension fund investments</a></li>\n    <li><a href=\"#\">Investment goals for non-profits and charitable institutions</a></li>\n    <li><a href=\"#\">Educational establishments investments and endowments</a></li>\n    <li><a href=\"#\">Social and environmental impact of investments</a></li>\n  </ul>\n\n</div>\n'),
(13, 5, 'Treasury Services', 3, 0, '<div id=\"hero-image\">\n  <img src=\"images/page_assets/treasury.png\" width=\"900\" height=\"200\" alt=\"\" />\n</div>\n\n<div id=\"content\">\n  <h1>Treasury Services</h1>\n  <p>Let Globe Bank be your co-CFO. We\'ll help you improve cash flow, improve efficiency, streamline payroll and payment processing, and help you to build a leaner, cleaner organization.</p>\n  <ul>\n    <li><a href=\"#\">Collections and cash applications</a></li>\n    <li><a href=\"#\">Deposit and account management options</a></li>\n    <li><a href=\"#\">Payment processing</a></li>\n    <li><a href=\"#\">Payroll procedures</a></li>\n    <li><a href=\"#\">Fraud protection</a></li>\n    <li><a href=\"#\">Liquidity management</a></li>\n    <li><a href=\"#\">International expansion</a></li>\n    <li><a href=\"#\">Healthcare program management</a></li>\n  </ul>\n\n</div>\n');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'About Globe Bank', 1, 1),
(2, 'Consumer', 2, 1),
(3, 'Small Business', 3, 0),
(5, 'Commercial', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
