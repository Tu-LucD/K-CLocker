-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 12:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kclocker`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fname`, `lname`, `email`, `admin`, `username`, `password`) VALUES
(1, 'James', 'Cortez', 'jamescortez91@gmail.com', 0, 'james', 'polo'),
(2, 'James', 'Cortez', 'jamessscortezzz@gmail.com', 0, 'Jamez', 'polo'),
(3, 'Tu-Luc0', 'Duong', 'tlduong123@gmail.com', 0, 'SumyonguyClient', 'pokemon828'),
(4, 'Tu-Luc1', 'Duong', 'tlduong123@gmail.com', 1, 'SumyonguyAdmin', 'pokemon828');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_shipping` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sport` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_description`, `product_image`, `price`, `sport`, `category`) VALUES
(1, 'Adidas NMD_R1 Shoes', 'Run with it. These adidas NMD_R1 Shoes are a little technical and a lot street smart. Their midsole plugs flash back to the \'80s, but the knit upper, full-length cushioned midsole and EVA inserts are 100 percent fashion forward.', 'images/product1.jpg', '170.00', 'Running', 'Footwear'),
(2, 'CCM Jetspeed Pro Grip Hockey Stick', 'The CCM Jetspeed Pro Senior Hockey Stick is a great option no matter what position you play because of the hybrid kickpoint that delivers powerful slap shots and accurate quick release wrist shots. The Jetspeed Shaft offers a smooth transition area to maximize bending and transfer energy from the blade to the puck - to the back of the net.', 'images/product2.jpg', '99.99', 'Hockey', 'Equipment'),
(3, 'Wilson Advantage Adult L3 Tennis Racquet ', 'Wilson Advantage Adult L3 Tennis Racquet is extra long for extended reach, has an extra-large head for greater power on the court, and a V-Matrix technology for a larger sweet spot.', 'images/product3.jpg', '25.99', 'Tennis', 'Equipment'),
(4, 'Adidas Pro Model 2G Shoes', 'These Adidas shoes deliver a lightweight and flexible fit to keep you comfortable for all-day play. Lace up in foot support designed for everyday hoops.', 'images/product4.jpg', '130.00', 'Basketball', 'Footwear'),
(5, 'Mavis 350 - Nylon Shuttlecocks (Pack of 6) ', 'The Yonex Mavis 350 nylon shuttlecocks are designed to have a similar flight time as a feather shuttlecock. They give an accurate and durable performance so you can enjoy the play, game after game.', 'images/product5.jpg', '14.44', 'Badminton', 'Equipment'),
(6, 'Spalding NBA Street Basketball - Size 7', 'The sound of the dribble, the soft, magnetic grip, the clear conscience of determination - the athlete and the NBA Street Basketball compete to excel and achieve. Become one with this superior basketball, constructed with products and technology made to last.', 'images/product6.jpg', '24.99', 'Basketball', 'Equipment'),
(7, 'FIVB Approved FLISTATEC Volleyball', 'Molten\'s FIVB Approved FLISTATEC Volleyball has gained international recognition and acclaim as a top choice for elite athletes around the globe. As the official volleyball of USA Volleyball, the National Collegiate Athletic Association (NCAA®), and NORCECA, you can expect exceptional, top-of-the-line performance from the FLISTATEC. The original panel design and contrasting colors makes it easier to track the ball\'s rotation, increasing visibility for players and spectators alike. Its textured microfiber composite cover enhances grip, resulting in more accurate overhand passing and setting. By optimizing the air current around the ball and reducing turbulence, Molten\'s patented FLISTATEC Flight Stability Technology delivers the control and consistency athletes demand with every contact.', 'images/product7.jpg', '85.98', 'Volleyball', 'Equipment'),
(8, 'Nike Lean - Adjustable Smartphone Armband', 'The Nike Lean Adjustable smartphone armband keeps your device close during workout.', 'images/product8.jpg', '18.74', 'Running', 'Accessories'),
(9, 'Nike Swoosh Wristband - Pink', 'Nike Swoosh Wristbands are the perfect accessory on and off the court.', 'images/product9.jpg', '9.00', 'Tennis', 'Accessories'),
(10, 'Bauer Nexus N2700 Senior Hockey Skates', 'Get an edge on your opponent with the Nexus 2700 Skate featuring the TUUK LIGHTSPEED EDGE holder for an increased attack angle and tighter turns. Lightweight memory foam ankle padding gives you a comfortable fit and feel.', 'images/product10.jpg', '174.97', 'Hockey', 'Footwear'),
(11, 'CCM Tacks 9040 Junior Hockey Skates', 'Start your hockey career off on the right track with Tacks 9040 by CCM. The Brushed Micro Fiber Liner provides close comfort with high resistance to wear while the 5mm felt tongue gives you great protection.', 'images/product11.jpg', '51.97', 'Hockey', 'Footwear'),
(12, 'CCM Fitlite Senior Hockey Helmet', 'The CCM Fitlite helmet features an engineered subshell created for lightweight protection. Designed to help manage multiple types of impacts by integrating CCM’s ground-breaking R.E.D. System to its innovative comfort liner. The CCM Fitlite helmet combines the advantage of a fully customizable lightweight fit with innovation in safety and protection.\r\n\r\nScientists indicate that brain injuries and concussions are mainly due to linear and rotational accelerations of the brain. No hockey helmet can prevent or eliminate the risk of head injury, including concussions.', 'images/product12.jpg', '89.98', 'Hockey', 'Equipment'),
(13, 'CCM Fitlite 3DS Junior Hockey Helmet Combo', 'Bring custom fit and performance to your young hockey star’s game with the helmet specifically designed for players 7 to 11 years old. The CCM Fitlite 3DS Junior Hockey Helmet Combo uses science based age specific protection to address how and where young players are most likely to get injured. This advanced protection, along with a personalized fit and easy adjustments make this the perfect junior hockey helmet that will grow with the player.', 'images/product13.jpg', '79.99', 'Hockey', 'Equipment'),
(14, 'Shock Doctor Senior Core Hockey Pant w/ BioFlex Cu', 'Stay safe and comfortable every time you take the ice this season in the Shock Doctor™ Core Hockey Pant with BioFlex™ Cup. The BioFlex™ Cup is vented for breathability and uses a gel perimeter for comfort while the anti-microbial, moisture-wicking fabrics keep you cool, dry and odor-free. To keep your hockey socks in place, the Core Hockey Pant comes with four folding hook-and-loop tabs.', 'images/product14.jpg', '44.99', 'Hockey', 'Equipment'),
(15, 'TOUR Hockey Adult Code 1 Roller Hockey Hip Pads', 'The TOUR Hockey® Adult Code 1 Roller Hockey Hip Pads are designed for the player who wants that wearing nothing feeling while still having protection. Vented fabric in strategic areas keep air moving and the player cool and dry. Ultra-comfort waistband and anti-abrasion interior stitching provide maximum comfort when playing.', 'images/product15.jpg', '44.99', 'Hockey', 'Equipment'),
(16, 'Renfrew Neon Hockey Tape', 'Keep your hockey stick in top condition this season with Renfrew™ Hockey Blade Tape. Optimal for use on one-piece composite hockey sticks, this bright hockey sports tape is a polyester/cotton blended cloth with a natural rubber adhesive that improves the stick blade’s durability and protects it from abrasion caused during play. Renfrew™ Neon Hockey Tape does not leave residue on your stick blade upon removal.', 'images/product16.jpg', '4.99', 'Hockey', 'Accessories'),
(17, 'Green Biscuit Original Training Puck', 'Perfect passing and stick handling skills anywhere on any surface with the original Green Biscuit™ training puck. This off-ice practice puck is designed to withstand and reduce friction and vibration on rough surfaces like concrete and asphalt. The Green Biscuit® is perfect for athletes of all ages and skill levels.', 'images/product17.jpg', '10.99', 'Hockey', 'Equipment'),
(18, 'CCM Senior Jetspeed Edge Ice Hockey Shoulder Pads', 'Embrace the physical aspects of the game as you challenge the opposition along the boards and in front of goal while wearing the CCM® Senior Jetspeed Edge Ice Hockey Shoulder Pads. Optimized for full range of motion that’s ideal for agile players, the Jetspeed Edge Pads offer a close-fitting, low-profile design for an incredibly responsive feel, while PE caps at the shoulder, spine, and bicep manage impact for consistent support.', 'images/product18.jpg', '59.99', 'Hockey', 'Equipment'),
(19, 'CCM Senior Premier P2.9 Ice Hockey Goalie Pads', 'Stop the puck in style with the CCM Senior Premier P2.9 Ice Hockey Goalie Pads. CCM’s lightest pads provide you with maximum protection, style and comfort.', 'images/product19.jpg', '849.99', 'Hockey', 'Equipment'),
(20, 'CCM Straight Certified Ice Hockey Helmet Visor', 'Designed for optical accuracy, the CCM® Certified Straight Visor features anti-scratch and anti-fog technology so you don’t lose sight of the puck.', 'images/product20.jpg', '79.99', 'Hockey', 'Equipment'),
(21, 'CCM Senior RBZ 150 Padded Roller Hockey Shirt', 'Get the upper body protection your roller hockey game needs every time you lace ‘em up with the RBZ 150 Padded Roller Hockey Shirt. Using a form-fit, the RBZ 150 shirt allows for mobility. Lightweight stretch mesh with moisture-wicking technology in the CCM® RBZ 150 Padded Roller Hockey Shirt helps to keep you cool and dry when the heat is on while exposed U-Foam delivers unrivaled protection at a light weight.', 'images/product21.jpg', '35.97', 'Hockey', 'Equipment'),
(22, 'Bauer NSX Griptac Senior Hockey Stick', 'The Bauer NSX Griptac Senior Hockey Stick features BridgeCore Technology for better feel and stability in the blade so you can have better control and accuracy on shots and passes. The Mid-Kick point gives you the best of both worlds for quick release snap shots and booming slap shots.', 'images/product22.jpg', '63.99', 'Hockey', 'Equipment'),
(23, 'CCM Premier P2.5 Senior Goalie Stick - Crawford 26', 'The CCM Premier P2.5 Senior Goalie Stick is a great option for those new to the game, and even experienced players looking to upgrade and take advantage of a lighter composite structure. Control the game from start to finish with excellent feel and rebound control.', 'images/product23.jpg', '62.97', 'Hockey', 'Equipment'),
(24, 'Nike React Infinity Run Flyknit', 'The Nike React Infinity Run Flyknit is designed to help reduce injury and keep you on the run. More foam and improved upper details provide a secure and cushioned feel. Lace up and feel the potential as you hit the road.', 'images/product24.jpg', '215.00', 'Running', 'Footwear'),
(25, 'Digital Pedometer', 'Maintain a healthy, active lifestyle with the BIOS Living Digital Pedometer. This pedometer counts steps walked, distance travelled and calories burned, all in one sleek, compact device. The large LCD screen also makes this pedometer easy to read. Colour may vary. Requires 1 x AG10 battery (included).', 'images/product25.jpg', '17.97', 'Running', 'Accessories'),
(26, 'Nike Air Zoom Pegasus 37 Shield', 'Don\'t let wet weather stop your running routine. The Nike Air Zoom Pegasus 37 Shield helps deliver the support you need in cold conditions. A water-repellent design helps keep you dry on every mile. Tough traction delivers tyre-inspired grip on slick streets.', 'images/product26.jpg', '170.00', 'Running', 'Footwear'),
(27, 'Nike Air Zoom Pegasus 37 Premium', 'Reinvigorate your stride with the Nike Air Zoom Pegasus 37 Premium. Delivering the same fit and feel that runners love, the shoe has an all-new forefoot cushioning unit and foam for maximum responsiveness. Eye-popping colours and bold shapes deliver a new spin on your favourite. The result is a durable, lightweight trainer designed for everyday running.', 'images/product27.jpg', '160.00', 'Running', 'Footwear'),
(28, 'Nike Air Zoom Pegasus 37 FlyEase', '37 years and millions of miles later, the legend lives on in the Nike Air Zoom Pegasus 37 FlyEase. Our most trusted running shoe flies into the future with Zoom Air specially tuned to your needs, and a FlyEase entry system that gets you in quickly and easily.', 'images/product28.jpg', '155.00', 'Running', 'Footwear'),
(29, 'Nike 22 oz Large Bottle Belt- Black', 'Stay hydrated throughout your run with the Nike Large 22 .Oz - bottle belt. The form-fitting shape and stabilised design curves to your body and reduces bounce as you work out. With a conveniently angled pocket, the bottle is easy to reach while a secure zip pocket stores any small items you need.', 'images/product29.jpg', '26.24', 'Running', 'Accessories'),
(30, 'Nike Air Zoom Tempo Next% FlyEase', 'The ultra-responsive Nike Air Zoom Tempo Next% FlyEase is designed to help you get the most from your training runs, so you can go confidently into your next (or first) race. It has a step-in entry and an internal lacing mechanism you operate with one hand. Pull one loop to tighten, another to release.', 'images/product30.jpg', '260.00', 'Running', 'Footwear');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
