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
(1, 1, 'Techno1ogy', 1, 0, '<div id="hero-image">\n  <img src="images/page_assets/about us.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>About Techno1ogy</h1>\n  <p>At Techno1ogy, our mission is to empower the world through innovative technology and digital transformation. Since our founding, we have strived to deliver cutting-edge solutions with a personal touch, helping individuals and organizations thrive in a connected world.</p>\n  <p>Techno1ogy, established in 2002, has rapidly grown into a global leader in technology services, with a presence in over 30 countries and a diverse team of 80,000 professionals. Our commitment to excellence, creativity, and integrity drives us to deliver outstanding results for our clients and partners.</p>\n  <p>Discover more about our journey, our values, and how we can help you shape the future with technology.</p>\n</div>\n'),
(2, 1, 'Our Story', 2, 1, '<div id="hero-image">\n  <img src="images/page_assets/history.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Our Story</h1>\n  <p>Techno1ogy was founded by visionary engineers John Doe and Jane Doe, who believed technology should be accessible and transformative for everyone. Starting from a small garage in Austin, Texas, they built a company that now powers digital experiences for millions worldwide.</p>\n  <p>Key milestones include the launch of our AI-driven platform in 2008, our expansion into Europe and Asia in 2012, and our recent acquisition of GreenSpark Innovations, a leader in sustainable tech. Our growth is fueled by a passion for solving real-world problems and a culture of collaboration.</p>\n  <p>Today, Techno1ogy is led by a diverse team, continuing the founders\' legacy of innovation and social responsibility.</p>\n</div>\n'),
(3, 1, 'Leadership', 3, 1, '<div id="hero-image">\n  <img src="images/page_assets/leadership.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Leadership</h1>\n  <h2>Board of Directors</h2>\n  <ul>\n    <li>John Doe, Chairperson</li>\n    <li>Jane Doe</li>\n    <li>Alex Smith</li>\n    <li>Chris Johnson</li>\n    <li>Pat Taylor</li>\n    <li>Sam Morgan</li>\n    <li>Casey Lee</li>\n    <li>Jordan Brown</li>\n    <li>Jamie White</li>\n    <li>Taylor Green</li>\n  </ul>\n  <h2>Executive Team</h2>\n  <ul>\n    <li>Jane Doe, Chief Executive Officer</li>\n    <li>John Doe, Chief Technology Officer</li>\n    <li>Alex Smith, Chief Financial Officer</li>\n    <li>Chris Johnson, Chief Operating Officer</li>\n    <li>Pat Taylor, Chief Innovation Officer</li>\n    <li>Sam Morgan, VP of Human Resources</li>\n    <li>Casey Lee, VP of Global Strategy</li>\n    <li>Jordan Brown, General Counsel</li>\n  </ul>\n</div>\n'),
(4, 1, 'Contact Us', 4, 1, '<div id="hero-image">\n  <img src="images/page_assets/contact.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Contact Us</h1>\n  <p>Our support team is available 24/7 to assist you with any questions or technical issues.</p>\n  <ul>\n    <li><a href="#">Customer Support</a></li>\n    <li><a href="#">Technical Assistance</a></li>\n    <li><a href="#">Product Inquiries</a></li>\n    <li><a href="#">Report a Security Issue</a></li>\n  </ul>\n</div>\n'),
(5, 2, 'Personal Accounts', 1, 1, '<div id="hero-image">\n  <img src="images/page_assets/banking.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Personal Accounts</h1>\n  <h2>Digital Banking for Everyone</h2>\n  <p>Manage your finances anytime, anywhere with Techno1ogy\'s secure digital banking platform. Enjoy seamless access to your accounts, instant transfers, and personalized insights to help you reach your financial goals.</p>\n  <ul>\n    <li><a href="#">Open an account</a></li>\n    <li><a href="#">Mobile banking app</a></li>\n    <li><a href="#">24/7 support</a></li>\n    <li><a href="#">Learn about our security features</a></li>\n  </ul>\n</div>\n'),
(6, 2, 'Smart Cards', 2, 1, '<div id="hero-image">\n  <img src="images/page_assets/creditcards.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Smart Cards</h1>\n  <p>Experience the next generation of credit with Techno1ogy Smart Cards. Powered by AI, our cards adapt to your spending habits, offer real-time rewards, and help you build credit responsibly.</p>\n  <ul>\n    <li><a href="#">Compare Smart Cards</a></li>\n    <li><a href="#">Cashback and rewards</a></li>\n    <li><a href="#">AI-powered spending insights</a></li>\n    <li><a href="#">Check your credit score</a></li>\n    <li><a href="#">Balance transfer options</a></li>\n  </ul>\n</div>\n'),
(7, 2, 'Home Tech Loans', 3, 1, '<div id="hero-image">\n  <img src="images/page_assets/homeloans.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Home Tech Loans</h1>\n  <p>Upgrade your living space with Techno1ogy Home Tech Loans. Whether you\'re buying your first smart home or renovating with the latest technology, our flexible loans make it easy and affordable.</p>\n  <ul>\n    <li><a href="#">Check current rates</a></li>\n    <li><a href="#">Apply for a loan</a></li>\n    <li><a href="#">Home automation tips</a></li>\n    <li><a href="#">Refinance options</a></li>\n    <li><a href="#">Loan calculator</a></li>\n  </ul>\n</div>\n'),
(8, 3, 'Business Accounts', 1, 1, '<div id="hero-image">\n  <img src="images/page_assets/bizchecking.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Business Accounts</h1>\n  <p>Techno1ogy offers a range of business accounts designed for startups, small businesses, and entrepreneurs. Enjoy dedicated support, online account management, and tools to help your business grow.</p>\n  <ul>\n    <li><a href="#">Compare business accounts</a></li>\n    <li><a href="#">What you need to open an account</a></li>\n    <li><a href="#">No monthly service fee options</a></li>\n    <li><a href="#">Order business checks</a></li>\n  </ul>\n</div>\n'),
(9, 3, 'Growth Loans', 2, 1, '<div id="hero-image">\n  <img src="images/page_assets/bizloans.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Growth Loans</h1>\n  <p>Fuel your business expansion with Techno1ogy Growth Loans. From equipment purchases to scaling operations, our flexible financing options are tailored to your needs.</p>\n  <ul>\n    <li><a href="#">Compare loan options</a></li>\n    <li><a href="#">Startup funding</a></li>\n    <li><a href="#">Estimate monthly payments</a></li>\n    <li><a href="#">Check application status</a></li>\n  </ul>\n</div>\n'),
(10, 3, 'Payment Solutions', 3, 1, '<div id="hero-image">\n  <img src="images/page_assets/merchant.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Payment Solutions</h1>\n  <p>Accept payments anywhere with Techno1ogy Payment Solutions. Our platform supports online, in-store, and mobile transactions, making it easy for your business to get paid.</p>\n  <ul>\n    <li><a href="#">Compare payment options</a></li>\n    <li><a href="#">Mobile payment support</a></li>\n    <li><a href="#">POS systems</a></li>\n    <li><a href="#">Fraud protection</a></li>\n  </ul>\n</div>\n'),
(11, 5, 'Venture Funding', 1, 1, '<div id="hero-image">\n  <img src="images/page_assets/financing.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Venture Funding</h1>\n  <p>Techno1ogy\'s Venture Funding team helps startups and innovators secure the capital they need to bring new ideas to life. Explore our funding programs and connect with our advisors.</p>\n  <ul>\n    <li><a href="#">Apply for funding</a></li>\n    <li><a href="#">Meet our advisors</a></li>\n    <li><a href="#">Startup resources</a></li>\n    <li><a href="#">Portfolio companies</a></li>\n  </ul>\n</div>\n'),
(12, 5, 'Tech Investments', 2, 1, '<div id="hero-image">\n  <img src="images/page_assets/investments.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Tech Investments</h1>\n  <p>Invest in the future with Techno1ogy\'s tech-focused investment strategies. We offer guidance on venture capital, private equity, and sustainable investments for individuals and organizations.</p>\n  <ul>\n    <li><a href="#">Investment opportunities</a></li>\n    <li><a href="#">Sustainable investing</a></li>\n    <li><a href="#">Portfolio management</a></li>\n    <li><a href="#">Educational resources</a></li>\n  </ul>\n</div>\n'),
(13, 5, 'Automation & Security', 3, 0, '<div id="hero-image">\n  <img src="images/page_assets/treasury.png" width="900" height="200" alt="" />\n</div>\n\n<div id="content">\n  <h1>Automation & Security</h1>\n  <p>Enhance your organization\'s efficiency and safety with Techno1ogy\'s automation and security solutions. From cash flow management to advanced cybersecurity, we help you stay ahead.</p>\n  <ul>\n    <li><a href="#">Cash flow automation</a></li>\n    <li><a href="#">Payment processing</a></li>\n    <li><a href="#">Payroll solutions</a></li>\n    <li><a href="#">Cybersecurity services</a></li>\n    <li><a href="#">International expansion</a></li>\n  </ul>\n</div>\n');

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
(1, 'About Techno1ogy', 1, 1),
(2, 'Personal Solutions', 2, 1),
(3, 'Business Services', 3, 1),
(5, 'Innovation', 4, 1);

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
