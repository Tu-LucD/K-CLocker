-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 10:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
(2, 'James', 'Cortez', 'jamessscortezzz@gmail.com', 1, 'Jamez', 'polo'),
(3, 'Tu-Luc0', 'Duong', 'tlduong123@gmail.com', 0, 'Sumyonguy0', 'pokemon828'),
(4, 'Tu-Luc1', 'Duong', 'tlduong123@gmail.com', 1, 'SumyonguyAdmin', 'pokemon828');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(5) NOT NULL,
  `productId` int(5) NOT NULL,
  `unityPrice` decimal(10,2) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `account_id`, `feedback_content`) VALUES
(9, 1, 'Helloooooooooooooooo');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `quantity`) VALUES
(1, 100),
(2, 100),
(3, 100),
(4, 100),
(5, 100),
(6, 100),
(7, 100),
(8, 100),
(9, 100),
(10, 100),
(11, 100),
(12, 100),
(13, 100),
(14, 100),
(15, 100),
(16, 100),
(17, 100),
(18, 100),
(19, 100),
(20, 100),
(21, 100),
(22, 100),
(23, 100),
(24, 100),
(25, 100),
(26, 100),
(27, 100),
(28, 100),
(29, 100),
(30, 100),
(31, 100),
(32, 100),
(33, 100),
(34, 100),
(35, 100),
(36, 100),
(37, 100),
(38, 100),
(39, 100),
(40, 100),
(41, 100),
(42, 100),
(43, 100),
(44, 100),
(45, 100),
(46, 100),
(47, 100),
(48, 100),
(49, 100),
(50, 100),
(51, 100),
(52, 100),
(53, 100),
(54, 100),
(55, 100),
(56, 100),
(57, 100),
(58, 100),
(59, 100),
(60, 100),
(61, 100),
(62, 100),
(63, 100),
(64, 100),
(65, 100),
(66, 100),
(67, 100),
(68, 100),
(69, 100),
(70, 100),
(71, 100),
(72, 100),
(73, 100),
(74, 100),
(75, 100),
(76, 100),
(77, 100),
(78, 100),
(79, 100),
(80, 100),
(81, 100),
(82, 100),
(83, 100),
(84, 100);

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `account_id`, `order_date`, `order_price`, `order_shipping`) VALUES
(1, 1, '2020-12-16', '9.00', '25.00');

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

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `order_item_quantity`, `order_item_price`) VALUES
(1, 1, 9, 1, '9.00'),
(2, 1, 2, 1, '99.99');

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
(1, 'Adidas NMD_R1', 'Run with it. These adidas NMD_R1 Shoes are a little technical and a lot street smart. Their midsole plugs flash back to the \'80s, but the knit upper, full-length cushioned midsole and EVA inserts are 100 percent fashion forward.', 'images/product1.jpg', '170.00', 'Running', 'Footwear'),
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
(30, 'Nike Air Zoom Tempo Next% FlyEase', 'The ultra-responsive Nike Air Zoom Tempo Next% FlyEase is designed to help you get the most from your training runs, so you can go confidently into your next (or first) race. It has a step-in entry and an internal lacing mechanism you operate with one hand. Pull one loop to tighten, another to release.', 'images/product30.jpg', '260.00', 'Running', 'Footwear'),
(31, 'Nike Joyride Nova', 'The Nike Joyride Nova has a comfortable slip-on design with cushioning pods you can see and feel. Small beads in the pods contour to your foot like a beanbag chair, for comfort like you\'ve never felt.', 'images/product31.jpg', '84.99', 'Running', 'Footwear'),
(32, 'Nike React Miler Shield', 'Stick to your route in less-than-ideal conditions. The Nike React Miler delivers trusted stability for your wet-weather miles. Its tyre-inspired outsole gives you the traction you need to keep pace on slick roads. Water-repellent details around the upper help keep your foot dry.', 'images/product32.jpg', '180.00', 'Running', 'Footwear'),
(33, 'Adidas Ultraboost DNA Montreal', 'From a lunchtime 5K to a long Saturday loop, these adidas Ultraboost DNA Montreal running shoes fit your life and your style. They have a stretchy knit upper that adapts to the shape of your foot as you run, for comfort and support. Responsive cushioning keeps your stride energized.', 'images/product33.jpg', '250.00', 'Running', 'Footwear'),
(34, 'Adidas X90004D Shoes', 'As high tech as your life. These adidas X90004D Shoes are designed for the fast pace and high energy of our hyperconnected world. The distinctive lattice midsole was crafted from liquid resin to give you precisely tuned cushioning that keeps you comfortable while running or gaming with friends. Floating triangles and supportive underlays give the stretchy knit upper a bold and futuristic look.', 'images/product34.jpg', '275.00', 'Running', 'Footwear'),
(35, 'Adidas Galaxy 5', 'Make the most out of your runs. No matter how far you go, these adidas shoes cushion every take-off and landing to make each step feel like a good one. Another block. Another lap. Another mile. Get after it.', 'images/product35.jpg', '90.00', 'Running', 'Footwear'),
(36, 'Adidas Climacool Vento', 'Don\'t forgo your day just because of the heat. Keep your routine on track in these adidas Climacool Vento Shoes. They have a breathable upper and responsive cushioning that keep you looking and feeling fresh.', 'images/product36.jpg', '180.00', 'Running', 'Footwear'),
(37, 'Adidas Edge XT SUMMER.RDY Shoes', 'Because your speed training can\'t wait for cooler weather. These adidas running shoes have a breathable textile upper and built-in ventilation for a breezy feel in the heat. Midfoot stability means you feel sure-footed, any way you turn.', 'images/product37.jpg', '90.00', 'Running', 'Footwear'),
(38, 'DeMarini CF 2¾\' USSSA Bat 2020 (-10)', 'Developed for the well-rounded player that needs the perfect combination of speed, power, and barrel control, the 2020 DeMarini® CF® USSSA Bat is outfitted with high-performing materials to elevate your game to its apex. Utilizing the power of ParaFlex™ Plus Composite in the handle and barrel, this two-piece, -10 model offers a massive sweet spot and maximizes the transfer of energy straight to the barrel to drive pitches with force.', 'images/product38.jpg', '299.99', 'Baseball', 'Equipment'),
(39, 'Louisville Slugger Prime BBCOR Bat 2020 (-3)', 'Engineered with advanced composite material, the 2020 Louisville Slugger® Prime® BBCOR Bat has been fully optimized to drive through the zone with exceptional speed and power at the plate this season. This three-piece model utilizes a patented VCX™ Vibration Control Connection System, allowing the handle and barrel to move independently upon contact to better control vibration and provide unmatched feel.', 'images/product39.jpg', '349.99', 'Baseball', 'Equipment'),
(40, 'Rawlings Quatro Pro USA Youth Bat 2020 (-12)', 'Get more pop, more distance and a lighter, faster swing speed with the 2019 Rawlings® Quatro™ Pro USA Bat. Introducing the second generation for the Youth Quatro™ Pro, this -12 composite model has a more forgiving swing weight for every player in the lineup, and features a suspended inner barrel to balance impact and velocity through the zone.', 'images/product40.jpg', '249.99', 'Baseball', 'Equipment'),
(41, 'Diadora Match - Adult Volleyball Knee Pads', 'These pads provide a full range of motion on the court while protecting sensitive knees from contusions and bruises.', 'images/product41.jpg', '19.99', 'Volleyball', 'Equipment'),
(42, 'Freelift Printed Tennis T-Shirt Heat.RDY', 'Inspired by legends. Built to conquer. Bouncing straight from the rich tennis heritage of adidas, the eye-catching graphic on this FreeLift Tee makes a real impression on court. The specially designed cut keeps you comfortable through every serve and smash. The soft fabric will ensure you stay cool and confident even when you\'re on the verge of creating your own slice of history.', 'images/product42.jpg', '85.00', 'Tennis', 'Clothing'),
(43, 'Nike Men\'s Classic Mesh Basketball Shorts', 'Cross over from court to street in the Nike Dri-FIT Classic Men’s Basketball Shorts. They’re made from mesh-constructed fabric that’s airy, light and powered by Dri-FIT technology, Nike’s solution for sweat saturation.', 'images/product43.jpg', '31.50', 'Basketball', 'Clothing'),
(44, 'Nike Reveal - Adult Wristbands', 'Stay focus on your objectives with the Nike Reveal adult wristbands. Their sweat-wicking fabric will help to keep you dry so you can train comfortably.', 'images/product44.jpg', '6.00', 'Basketball', 'Accessories'),
(45, 'Nike Alpha Edge Youth Baseball Glove', 'Your budding ball player can experience and enjoy this durable, breathable split grain leather glove. Comfortable and adjustable, this padded glove also features an easy open/ close with no break-in.', 'images/product45.jpg', '44.99', 'Baseball', 'Equipment'),
(46, 'Babolat Explorer II - Adult Badminton Racquet', 'The Babolat Explorer II adult badminton racquet is lightweight and suits perfectly social players looking for an aluminum frame that is highly maneuverable.', 'images/product46.jpg', '24.49', 'Badminton', 'Equipment'),
(47, 'Babolat Sensation - Replacement grips (Pack of 2)', 'The Babolat Sensation badminton racquet replacement grips provide premium grip and great absorption.', 'images/product47.jpg', '13.99', 'Badminton', 'Accessories'),
(48, 'Men\'s Los Angeles Dodgers Mookie Betts Nike Gray A', 'You\'re the type of Los Angeles Dodgers fan who counts down the minutes until the first pitch. When your squad finally hits the field, show your support all game long with this Mookie Betts Replica Player jersey from Nike. Its classic full-button design features crisp player and Los Angeles Dodgers applique graphics, leaving no doubt you\'ll be along for the ride for every game and beyond this season.', 'images/product48.jpg', '134.99', 'Baseball', 'Clothing'),
(49, 'Diamond D-OB Official League Practice Bucket of 30', 'Designed for ultimate convenience and efficiency at practice, the Diamond® 6-Gallon Ball Bucket with 30 D-OB Official League Baseballs is essential for any coach or player. The Diamond® D-OB Official League Baseball Bucket offers a padded lip top for comfortable sitting in the dugout. The D-OB baseballs feature a genuine leather cover, Diamond Seam™ red stitching, and a solid cork/rubber pull core.', 'images/product49.jpg', '114.99', 'Baseball', 'Equipment'),
(50, 'Rawlings Senior VELO Baseball Batting Helmet w/ EX', 'Highly protective thanks to the addition of an extended Jaw Guard, the Rawlings® Senior VELO™ Matte Batting Helmet helps keep you confident and covered as you step up to the plate this season. This helmet also utilizes 16 vents that are strategically located to circulate cool air and keep you comfortable.', 'images/product50.jpg', '59.99', 'Baseball', 'Equipment'),
(51, 'Under Armour Junior Heater Digi Camo Baseball Batt', 'Featuring a fabric-wrapped Charged Foam liner that absorbs impact, the Under Armour® Junior Heater Digi Camo Batting Helmet offers critical protection when you need it most.', 'images/product51.jpg', '54.99', 'Baseball', 'Equipment'),
(52, 'Force3 Pro Gear Adult Ultimate Umpire Chest Protec', 'Tailor your needs behind home plate as you see fit with the highly customizable Force3 Pro Gear® Ultimate Umpire Chest Protector. This chest protector is equipped with extensions along the throat and the bottom, and includes removable/adjustable wings to accommodate those with wider chests.', 'images/product52.jpg', '279.99', 'Baseball', 'Equipment'),
(53, 'Franklin Adult CFX Pro Chrome Dip Batting Gloves', 'Showcased by dozens of professional hitters on the field, the Franklin® CFX Pro® Chrome Dip Batting Gloves feature world-class quality Pittards® leather and superior softness and durability.', 'images/product53.jpg', '39.99', 'Baseball', 'Equipment'),
(54, 'New Balance Men\'s 4040 v5 Metal Baseball Cleats', 'Find yet another technological advantage to your game in the New Balance® 4040 v5 baseball cleat. A synthetic upper with Kinetic stitching allows for enhanced strength and support in critical stretch zones during baseball specific movements while the tried and trusted, REVlite midsole provides you with responsive comfort to keep you playing you best longer.', 'images/product54.jpg', '89.99', 'Baseball', 'Footwear'),
(55, 'New Balance Men\'s 4040 V4 Turf Baseball Cleats', 'Approach your this season ready to dominate in the New Balance® 4040 V4 turf baseball cleat. A synthetic and mesh upper delivers breathable comfort while REVlite padding in the midsole provides maximum cushioning.', 'images/product55.jpg', '74.99', 'Baseball', 'Footwear'),
(56, 'Nike Men\'s Alpha Huarache Turf Baseball Cleats', 'Be prepared to thrive this season in the Nike® Alpha Huarache Varsity turf baseball cleat. A Lunarlon midsole provides comfort while the aggressive rubber nubbed outsole pattern provides traction on a variety of surfaces including grass, dirt, turf and rubber.', 'images/product56.jpg', '54.99', 'Baseball', 'Footwear'),
(57, 'Mikasa V200W Official FIVB Volleyball', 'The V200W features a perfectly balanced, 18-panel aerodynamic design that improves ball movement and gives players greater control. With enhanced visibility, the new indoor ball will optimize the quality of play and maximize excitement on the court. The ball exceeds the FIVB\'s homologation standards and passed stringent testing protocols, carried out by leading national teams and clubs over the last six months.', 'images/product57.jpg', '62.60', 'Volleyball', 'Equipment'),
(58, 'Wilson OPTX AVP Official Volleyball', 'The best players on the beach are always one step ahead. When you can read and react to where the game is going, you can be too. The breakthrough design of the AVP Optx volleyball brings a whole new approach to the beach. New VST™ (visual spin technology) uses strategic color variance to enhance the human eye\'s ability to detect spin on the ball. A vibrant color palette and Optic Flow graphics allow the ball to be more easily tracked in the diverse environments of beach volleyball, like clouds, sky, sand, water, and crowds. With the AVP Optx, you\'ll see the game like never before.', 'images/product58.jpg', '64.95', 'Volleyball', 'Equipment'),
(59, 'Volleyball Setting Net', 'The Portable Volleyball Setting Net allows you to practice Sets at the Net and also to the Attack Line. With an adjustable basket angle from level up to 45º the net will catch even those horizontal sets. ', 'images/product59.jpg', '299.99', 'Volleyball', 'Equipment'),
(60, 'Mizuno LR6 Knee Pads', 'With a minimalist, low-rise, no fold, design, the Mizuno LR6 Kneepad gives you just the right amount of coverage while supplying you with greater freedom of movement.', 'images/product60.jpg', '25.95', 'Volleyball', 'Equipment'),
(61, 'Adidas Low Profile Knee Pad', 'These adidas volleyball kneepads have you covered without compromising your play. Their 12.75 cm sleeve height means they offer full freedom of movement for every dig and roll. Shock-absorbing EVA padding cushions impacts with the court to keep your game flowing.', 'images/product61.jpg', '19.95', 'Volleyball', 'Equipment'),
(62, 'ASICS Gel-Rally VB Knee Pad', 'ASICS GEL Cool active cooling technology creates a 3D effect on fabric surface and provides space between skin and fabric to accelerate ventilation for outstanding performance.', 'images/product62.jpg', '15.50', 'Volleyball', 'Equipment'),
(63, 'CustomFuze Men\'s Sublimated Sleeveless Jersey', 'In these unpredictable times, having a reliable partner means more than ever. With over two decades of experience servicing the volleyball community, we are on a mission to bring you the best products and solutions the volleyball world has ever seen through our exclusive apparel brand.\r\nWe are starting small, but thinking big. ', 'images/product63.jpg', '36.95', 'Volleyball', 'Clothing'),
(64, 'Mizuno Men\'s Team Tank', 'The Mizuno Men\'s Team Tank is a great lightweight and breathable tank for any occasion. Prefect for beach volleyball, training, and working out, this tank will keep you cool under when you need it most!', 'images/product64.jpg', '30.50', 'Volleyball', 'Clothing'),
(65, 'ASICS Men\'s Rival II Short', 'Lightweight, breathable and designed with a premium 100% polyester and a flat braided drawcord at the waist for custom comfort, the Rival II™ Short keeps you distraction-free so you can be ready when the moment is here.', 'images/product65.jpg', '17.95', 'Volleyball', 'Clothing'),
(66, 'Nike Men\'s React HyperSet', 'The Nike React HyperSet lets you attack at full-speed, stop on a dime, elevate and land with confidence. The lateral strap and Flywire cables stabilize the fit, while Nike React foam creates incredible energy return to help keep the quickness in your game.', 'images/product66.jpg', '119.95', 'Volleyball', 'Footwear'),
(67, 'ASICS Men\'s Gel-Rocket 9', 'Face down any opponent in the men\'s GEL-ROCKET™ 9 indoor sports shoe by ASICS. With forefoot GEL® technology for shock absorption and lasting comfort, this versatile shoe has the features you need to put in an outstanding performance. Extra cushioning is provided by the springy EVA midsole, with added rebound properties to give you a real boost as you race across court. For added stability, these shoes feature our TRUSSTIC SYSTEM® technology, a molded component under the midfoot area that works to control torsion, helping you change direction at lightning speed without the fear of twisting. Side support construction and full strobel lasting provide additional support as you make multi-directional movements, while the EVA sockliner molds to the shape of your feet over time, making each match more comfortable than the last. The sockliner can also be removed to accommodate medical orthotics. With the GEL-ROCKET™ 9 shoe in your matchday bag, you\'ll feel unstoppable on the court.', 'images/product67.jpg', '54.95', 'Volleyball', 'Footwear'),
(68, 'Adidas Men\'s Crazyflight', 'Jump high above the competition. These adidas Crazyflight Shoes charge you with endless energy to own the volleyball court. A grippy rubber outsole supports red-hot reactions while a mesh upper ensures your feet keep their cool. The snug fit and EVA stability frame provide the platform. You bring the domination.', 'images/product68.jpg', '119.95', 'Volleyball', 'Footwear'),
(69, 'Nike Air Zoom BB NXT', 'Keep your focus on the game in the new Air Zoom BB NXT from Nike Basketball. It\'s designed to help players feel light, secure and responsive. You get energy back with every step, helping to turn your force into momentum when it matters most.', 'images/product69.jpg', '235.00', 'Basketball', 'Footwear'),
(70, 'Nike Kyrie 7', 'Kyrie Irving is a creative force on and off the court. He needs his shoes to keep up with his playmaking, but also sync with his boundary-pushing style and ethos. Tuned for the next generation of energy return, control and speed, the Kyrie 7 helps players at all levels take advantage of their quick first step by optimising the shoe\'s fit, court feel and banking ability.', 'images/product70.jpg', '170.00', 'Basketball', 'Footwear'),
(71, 'Nike PG 4', 'Paul George is the rare high-percentage shooter who\'s also a coach\'s dream on D. Designed for his unrivalled 2-way game, the PG 4 unveils a new cushioning system that\'s lightweight, articulated and responsive, ideal for players like PG who go hard every play.', 'images/product71.jpg', '145.00', 'Basketball', 'Footwear'),
(72, 'Nike LeBron 18', 'When LeBron accelerates down the court, he produces tremendous force. The LeBron 18 is designed to harness his abilities while helping with the stress he puts on his body. Combined cushioning underfoot allows him to use his power for unstoppable bursts of speed.', 'images/product72.jpg', '260.00', 'Basketball', 'Footwear'),
(73, 'Adidas Dame 7', 'There isn\'t anybody in the game like Damian Lillard. He\'s an on-court visionary, who is always one step ahead of his competition on and off the court.  It\'s this visionary mindset that allows Dame to have confidence in the most high pressure situations at the end of the game.', 'images/product73.jpg', '160.00', 'Basketball', 'Footwear'),
(74, 'Adidas Pro Boost Low', 'Play at full speed without sacrificing comfort. These adidas basketball shoes are designed with an innovative, super-lightweight midsole that provides outstanding energy return. A gore band beneath the upper provides a locked-down fit. The low cut keeps the look sleek and streamlined.', 'images/product74.jpg', '160.00', 'Basketball', 'Footwear'),
(75, 'D.O.N. Issue #2 Marvel Spidey Sense', 'The first drop delivers an electric green Spidey Sense colorway of D.O.N. Issue #2, fusing Marvel\'s Spider-Man and Mitchell\'s trust in his instincts to guide his actions towards positive outcomes on and off the courts. Just as the friendly neighborhood superhero protects his community, Mitchell hopes to connect with his fans and give back in a meaningful way. These D.O.N. Issue #2 Spidey Sense Shoes present a glow-in-the-dark silhouette with Glory Mint, Signal Green and Solar Red hues. A Spider-Man graphic inside the tongue, \"Spidey-Sense!\" inscription on the lacing and \"BOOM\" and \"POW\" text on the outsole complete the comic book-like feel of the partnership.', 'images/product75.jpg', '130.00', 'Basketball', 'Footwear'),
(76, 'Yonex Nanoflare 800 LT', 'A lightweight derivative of the NANOFLARE 800 is for advanced players looking to control the court with accelerated maneuverability from a headlight racquet. ', 'images/product76.jpg', '269.00', 'Badminton', 'Equipment'),
(77, 'Yonex Astrox 88 S', 'For advanced players looking for accuracy, touch, and feel for skillful net play', 'images/product77.jpg', '168.97', 'Badminton', 'Equipment'),
(78, 'Blackknight Hex-Force 360-S8', 'The HEX Series Models use Super G Reactive Graphite in a micro-woven matrix to generate faster frame recovery when flexed. The S8 HEX frame uses its hex angularity for a stiff, aerodynamic cross-section that swings faster and hits harder. The HEX-FORCE 360-S8 extends this into the unique hex shaft. The HEX shaft has more lateral stability and resistance to torque than conventional round shafts.', 'images/product78.jpg', '200.00', 'Badminton', 'Equipment'),
(79, 'Blackknight Photon PCV', 'Extremely light, the PHOTON accelerates reaction speed by up to 20%. The Power Channel groove enlarges the string surface without increasing head size, while the Vibra Plate Technology stiffens the head against torsion on impact and interrupts the transmission of shock through the frame to the handle. The result: An exceptionally solid hit with excellent control on off-center shots, and outstanding performance for power hitters.', 'images/product79.jpg', '150.00', 'Badminton', 'Equipment'),
(80, 'Head Prestige MP', 'The legendary PRESTIGE MP comes with the Graphene 360+ technology, a new mold, and a new design identity for the experienced player seeking absolute precision.', 'images/product80.jpg', '229.95', 'Tennis', 'Equipment'),
(81, 'Head Speed PRO', 'Recommended by Novak Djokovic, the SPEED PRO with the Graphene 360+ technology is made for the advanced tournament player who needs optimized control for their fast-paced game.', 'images/product81.jpg', '239.95', 'Tennis', 'Equipment'),
(82, 'Head Instinct MP', 'The INSTINCT MP provides effortless high performance and comfort for the advanced tournament player, now with a new design, and the innovative Graphene 360+ technology for enhanced flex and clean impact feel. The secret to the easy playability lies in the specially designed cross-section, which provides more stability and a larger sweetspot for effortless power.', 'images/product82.jpg', '179.95', 'Tennis', 'Equipment'),
(83, 'Head Sprint Pro 3.0 Men', 'As HEAD\'s lightest shoe, the SPRINT PRO 3.0 is made for players who are looking for more speed on the court. The mesh material makes the shoe lightweight and extremely breathable, while the sock construction takes care of the out-of-the-box comfort you crave. And on top, the new Delta Straps and TPU heel counter keep your foot in place during slides and rallies on even the toughest court.', 'images/product83.jpg', '129.95', 'Tennis', 'Footwear'),
(84, 'Head Sprint Pro 2.5 Carpet Men MNNR', 'Fast has never been more comfortable. The SPRINT PRO 2.5 CARPET is a serious premium performance shoe for fast versatile players. The breathable mesh upper makes the shoe extremely flexible for an incredibly short break-in time and increased comfort. The unique low-to-the-ground midsole construction allows you to move faster and the HEAD Cooling System integrated into the sole unit supports you during the hottest rallies. The perfect combination of explosive energy and agile finesse, the SPRINT PRO 2.5 is your best partner on carpet surfaces.', 'images/product84.jpg', '160.00', 'Tennis', 'Footwear');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `description`) VALUES
(1, 'Big Spender\'s Paradise', 'If the order\'s subtotal is equal or higher than $600, you will receive a 10% discount on your order!!'),
(2, 'Beginner\'s Luck', 'If it is your first purchase with us, you will receive a 5% discount on your order as a welcome gift!!'),
(3, 'Team Spirit', 'If you buy the same product 10 times in the same order, get 2 of them for free!!'),
(4, 'Homecourt Advantage', 'If your shipping location is in Montreal, you will receive a 5% discount on your order!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
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
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
