CREATE DATABASE `Bakerz-Bite`;

USE `Bakerz-Bite`;

CREATE TABLE `Admin` (
  `aid`   int(6) UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,
  `aname` varchar(50) NOT NULL,
  `apass` varchar(30) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `aphone` varchar(11) ,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Admin` (`aname`,`apass`, `aemail`, `aphone`)
VALUES  ('Admin1', 'admin1', 'admin1@admin.com', '0123456789'),
        ('Admin2', 'admin2', 'admin2@admin.com', '0123456789');


CREATE TABLE `Customers` (
  `cid`   int(6)  UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,
  `cfname` varchar(50) NOT NULL,
  `clname` varchar(50) NOT NULL,
  `cpass` varchar(30) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cphone` varchar(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Customers` (`cfname`,`clname`, `cpass`, `cemail`, `cphone`)
VALUES  ('Minh Vu','Nguyen', 'qwaszx', 'nmv@gmail.com', '0123456789'),
        ('John','Doe', '1234567', 'test@gmail.com', '0123456789'),
        ('Minh Vu','Nguyen', 'qwaszx', 'minhvu@gmail.com', '0123456789');


CREATE TABLE `Products` (
  `pid`    int(6) UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,
  `pname`  varchar(30) NOT NULL,
  `pdesc`  varchar(100) NOT NULL,
  `pimg` text NOT NULL,
  `pprice` FLOAT NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Products` (`pid`, `pname`, `pdesc`, `pimg`, `pprice`) VALUES
(1, 'Vanilla Cupcake', 'vanilla cupcake with vanilla frosting', 'cupcake_pic.png', 1.5),
(2, 'Red Velvet Cupcake', 'red velvet cupcake with cream cheese frosting', 'red_velvet_cupcake_pic.png', 2.5),
(3, 'Choc chip cookie', 'cookie with chocolate chips', 'cookies_pic.png', 1.5),
(4, 'Croissant', 'light and airy pastry', 'croissants_pic.jpg', 2.0),
(5, 'Donut', 'sweet fried rind dough with colourful frosting', 'donut_on_plate_pic.jpg', 4.0),
(6, 'Macaron_box_20', 'box of 20 macarons of different flavours', 'macaron_box_pic.jpg', 6.5),
(7, 'Birthday cupcakes', 'Cupcakes specially designed for birthdays', 'Cake_1.jpg', 3.5),
(8, 'Fruity Cheesecake', 'A cool, exotic cheesecake, perfect for hot days! With its Graham biscuit base and smooth texture, this cheesecake offers a plethora of textures at once!', 'Cake_2.jpg', 4.0),
(9, 'Chocolate Mousse', 'The best chocolate mousse that feels like eating clouds! It has a fudgy chocolate base and a very delicate chocolate mousse as its body with a tasty strawberry on the top. All with 70% cacao.', 'Cake_3.jpg', 4.0),
(10, 'Chocolate Cake pops', 'Lollipops but as a cake coated with a cracking chocolate!', 'Cake_4.jpg', 3.5),
(11, 'Expresso Cupcake', 'Expresso cupcake with a chocolate base and a hint of coffee! Its accompanied with a very creamy frosting with a coffee flavor.', 'Cake_5.jpg', 3.0),
(12, 'Rainbow Cupcake', 'Vanilla flavoured cupcake with a confetti bomb at its heart! The topping is a meringue based frosting.', 'cupcake_bg.jpg', 4.0),
(13, 'Cinnamon brownie', 'Squared chocolaty and fudgy brownie, flavored faintly with cinnamon!', 'Brownie/Brownie_1.png', 2.5),
(14, 'choc-chip brownie', 'Amazingly mouth melting brownie with a fudgy consistency. It contains melted chocolate in every bite !', 'Brownie/Brownie_2.png', 2.0),
(15, 'choc-mint brownie', 'This brownie is refreshing and very delicious, with a hint of mint and a swirl of chocolate.', 'Brownie/Brownie_3.png', 2.0),
(16, 'Pecan brownie', 'This brownie contains pecan nuts and offers a wider range of textures. A pure chef-doeuvre!', 'Brownie/Brownie_4.png', 2.9),
(17, 'Raspberry  brownie', 'Delicate raspberry brownie that brings the perfect balance between fruitiness and chocolate ! Raspberry is one of the best fruits that compliments the cacao flavor.', 'Brownie/Brownie_5.png', 2.9),
(18, 'Walnut brownie', 'This brownie contains roasted walnuts that accentuates the cacao in the brownie. The nutty flavor and particular texture of the roasted walnut compliments the delicateness and fudgy texture of the original brownie.', 'Brownie/Brownie_6.png', 2.5),
(19, 'White-choc brownie', 'White chocolate provides for the adequate moisture that makes up the perfect brownie!', 'Brownie/Brownie_7.png', 2.3),
(20, 'Choc-chip blondie', 'Blondie is another word for a longer brownie but not necessarily dominated by chocolate! This choc chip blondie offers the warmth and purity of vanilla and the fudgy texture of the chocolate chips.', 'Brownie/Brownie_8.png', 4.0),
(21, 'Raspberry swirl blondie', 'A fruity flavor that perfectly fits the moistness of a good blondie.', 'Brownie/Brownie_9.png', 4.0),
(22, 'Lemon blondie', 'Lemon flavored blondie provides for the perfect balance between the sourness of the lemon and the sweetness of the blondie.', 'Brownie/Brownie_10.png', 4.0),
(23, 'Christmas box x 24', 'Brownie box with 4 pieces of 6 unique flavors:1. Walnut Brownie,<br>\r\n2. Cream cheese Brownie,<br>\r\n3. Original Brownie,<br>\r\n4. Choc-chip Brownie,<br>\r\n5. Raspberry swirl Brownie,<br>\r\n6. Double choc Brownie.<br>', 'Brownie/Brownie_11.png', 7.0),
(24, 'Christmas brownie bars x 8', 'The box contains 8 brownie bars, topped with white chocolate with a hint of candy cane. A limited edition by Bakerz Bite!', 'Brownie/Brownie_12.png', 3.2),
(37, 'Rainbow cake', 'Beautiful multi flavored cake with interior and exterior rainbow colors! 4 layers of different cakes in 1!', 'Cakes/Cake_1.png', 6.5),
(38, 'Elegant floral wedding cake', 'Multi layered wedding cake decorated with fondant and sugar flowers. It\'s layers and sandwiched with several frostings: <br>\r\n\r\n> White chocolate ganache<br>\r\n> Vanilla frosting <br>\r\n> Chocolate and raspberry frosting<br>\r\n\r\n', 'Cakes/Cake_2.png', 2.2),
(39, 'Minimal elegant floral cake', 'Multi-layered cake with a minimalistic design for a modern look. The floral design gives an elegant touch to it. It\'s flavor is vanilla with chocolate frosting.', 'Cakes/Cake_3.png', 1.8),
(40, 'Golden drip floral cake', 'Long multi-layered cake with golden white chocolate drips. One of our trendiest and candid looking cake ! It\'s delicious with a combination of our best compatible flavors.', 'Cakes/Cake_4.png', 1.5),
(41, 'Fruity cake with chocolate', 'Simple chocolate cake with vanilla buttercream and refreshing red berries: cherries and strawberries.', 'Cakes/Cake_5.png', 3.50),
(42, 'Fruity cake with alomonds', 'Vanilla and almond flavored cake with simple buttercream frosting and fresh fruits.', 'Cakes/Cake_6.png', 3.50),
(43, 'White floral fondant cake', 'Red velvet cake covered with fondant and sugar flowers for a vintage look.', 'Cakes/Cake_7.png', 10.00),
(44, 'Choc-drip coffee cake', 'Amazing coffee cake with coffee beans flavored buttercream and a dripping chocolate ganache.', 'Cakes/Cake_8.png', 10.00),
(45, 'Original vanilla cookie', 'Plain vanilla cookie', 'Cookie/Cookie_1.png', 1.5),
(46, 'M&M cookie', 'Soft cookie with M&Ms .', 'Cookie/Cookie_4.png', 1.5),
(47, 'Choc-chunks cookie', 'Cookie filled with chocolate chips', 'Cookie/Cookie_5.png', 1.5),
(48, 'M&M and Choc-chip cookie', 'Cookie with M&M and Chocolate chips.', 'Cookie/Cookie_6.png', 1.5),
(49, 'Chocolate sandwich cookie', '2 chocolate cookies filled with whipped cream too satisfy any sugar cravings!', 'Cookie/Cookie_7.png', 3.0),
(50, 'Choc-chip and M&M sandwich cookie', 'M&M and Choc-chip cookies with whipped cream', 'Cookie/Cookie_8.png', 3.0),
(51, 'Oats cookies', 'Cookies with oats for a healthier option.', 'Cookie/Cookie_9.png', 2.5),
(52, 'Dark-choc and mint cookie', 'Dark chocolate cookie with a hint of mint', 'Cookie/Cookie_10.png', 3.5);

CREATE TABLE `Categories` (
  `ctgid`    int(6) UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,
  `ctgname`  varchar(30) NOT NULL,
  `ctgdesc`  text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Categories` (`ctgid`, `ctgname`, `ctgdesc`) VALUES
(1, 'cake', 'Cakes with layer(s), frosting and top coat'),
(2, 'cupcake', 'Small cake baked in cupcake or muffin cups'),
(3, 'cakepop', 'Cake shaped as lollipops'),
(4, 'cookie', 'Baked circular or differently shaped biscuits'),
(5, 'macaron', 'Sandwiched cookies and cream'),
(6, 'brownie', 'Chocolate fudge cakes'),
(7, 'pastry', 'Cakes that dont fall in any other categories');

CREATE TABLE `product_category` (
  `pid` bigint(20) NOT NULL,
  `ctgid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product_category` (`pid`, `ctgid`) VALUES
(1, 2),
(2, 2),
(3, 4),
(4, 7),
(5, 7),
(6, 5),
(7, 2),
(8, 7),
(9, 7),
(10, 3),
(11, 2),
(12, 2),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4);



CREATE TABLE `Orders` (
  `orderid`      int(6)  UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,  
  `cid`          int(6) ,
  `fullname`     varchar(50),
  `email`        varchar(50),
  `payment`      text,  
  `address`      text,
  `total`        float ,
  `phone`        varchar(11),
  `status`       text ,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()         
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `OrderItems` (
  `orderid`      int(6) NOT NULL, 
  `pid`         int(6) NOT NULL,
  `quantity`     int(6) NOT NULL   
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `Reviews` (
  `reviewid`   int(6) UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,
  `orderid`    int(6) NOT NULL,
  `review`     text,
  `rating`     int(6),
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()     
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Counter` (
  `vcid`       int(6) NOT NULL,  
  `visits`     int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Counter` (`vcid`, `visits`)
VALUES  (1, 12345);

CREATE TABLE `Contact` (
  `contactid`    int(6)  UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,  
  `name`         varchar(50),
  `email`        varchar(50),
  `subject`      text,  
  `content`      text,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()         
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;