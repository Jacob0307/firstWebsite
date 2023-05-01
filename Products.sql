CREATE DATABASE assignment1;
use assignment1;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (                                   
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_category` varchar(20) DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL, 
  `item_description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- NOTE iTEM DESCRIPTION IS COPIED FROM INTERNET THIS WAS PERMITTED BY SUBJECT COORDINATOR
-- ----------------------------

BEGIN;
INSERT INTO `products` VALUES (1000, 'meat', 'Beef Fillet', 20.99, '500g', 50,"Beef Fillet: a cut of beef from the tenderloin, prized for its tenderness and flavor.");
INSERT INTO `products` VALUES (1001, 'meat', 'Pork Chops', 15.49, '1kg', 30,"Pork Chops: a meaty cut of pork taken from the loin of a pig, often cooked on the bone for added flavor.");
INSERT INTO `products` VALUES (1002, 'meat', 'Chicken Breast', 10.99, '400g', 40,"Chicken Breast: a versatile cut of meat that can be grilled, baked, or fried, and is low in fat and high in protein.");
INSERT INTO `products` VALUES (1003, 'meat', 'Lamb Shank', 18.99, '600g', 25,"Lamb Shank: a flavorful and tender cut of meat from the lower leg of a lamb, often slow-cooked to enhance its taste and texture.");
INSERT INTO `products` VALUES (1004, 'meat', 'Beef Mince', 10.00, '500g', 25,"Beef Mince: ground beef that is commonly used in a wide variety of dishes, such as burgers, meatballs, and chili.");
INSERT INTO `products` VALUES (2000, 'fruitAndVegetables', 'Apples', 2.99, '1kg', 100,"Apples: a sweet and crunchy fruit that comes in many varieties and can be eaten raw or cooked in both sweet and savory dishes.");
INSERT INTO `products` VALUES (2001, 'fruitAndVegetables', 'Bananas', 1.99, '500g', 150,"Bananas: a sweet and creamy fruit that is high in potassium and often eaten as a snack or used in smoothies and baked goods.");
INSERT INTO `products` VALUES (2002, 'fruitAndVegetables', 'Carrots', 0.99, '500g', 200,"Carrots: a root vegetable that is high in vitamins and fiber, and is often used in soups, stews, and as a side dish.");
INSERT INTO `products` VALUES (2003, 'fruitAndVegetables', 'Spinach', 1.49, '200g', 120,"Spinach: a leafy green vegetable that is high in iron and other vitamins, and is often used in salads, smoothies, and cooked dishes.");
INSERT INTO `products` VALUES (2004, 'fruitAndVegetables', 'Mango', 2.99, '1kg', 100,"Mango: a tropical fruit with a sweet and tangy flavor that is often used in desserts, smoothies, and savory dishes.");
INSERT INTO `products` VALUES (2005, 'fruitAndVegetables', 'Peach', 3.99, '1kg', 100,"Peach: a juicy and flavorful stone fruit that is often eaten raw or used in pies, cobblers, and other baked goods.");
INSERT INTO `products` VALUES (3000, 'dairyAndEggs', 'Full Cream Milk', 2.29, '2L', 80,"Full Cream Milk: milk that has not had any of its fat content removed, often used in baking and cooking.");
INSERT INTO `products` VALUES (3001, 'dairyAndEggs', 'Light Milk', 2.29, '2L', 80,"Light Milk: a lower-fat version of milk that is often used as a healthy alternative in recipes and drinks.");
INSERT INTO `products` VALUES (3002, 'dairyAndEggs', 'Skim Milk', 2.29, '2L', 80,"Skim Milk: milk that has had all of its fat content removed, often used as a low-calorie alternative to other milk types.");
INSERT INTO `products` VALUES (3003, 'dairyAndEggs', 'Cheese', 5.49, '300g', 50,"Cheese: a dairy product made from the curdled milk of cows, goats, or sheep, that comes in a variety of textures and flavors.");
INSERT INTO `products` VALUES (3004, 'dairyAndEggs', 'Eggs', 3.99, 'dozen', 100,"Eggs: a versatile and nutrient-dense food that can be prepared in many ways, such as boiled, scrambled, fried, or used in baking.");
INSERT INTO `products` VALUES (3005, 'dairyAndEggs', 'Yogurt', 1.99, '500g', 120,"Yogurt: a creamy and tangy dairy product that is high in protein and often used as a healthy snack or breakfast food.");
INSERT INTO `products` VALUES (3006, 'dairyAndEggs', 'Cottage Cheese', 1.99, '500g',120,"Cottage Cheese: a fresh cheese that is high in protein and low in fat, often used as a healthy snack or in savory dishes.");
INSERT INTO `products` VALUES (3007, 'dairyAndEggs', 'Whey Protien', 30, '1kg', 20,"Whey Protein: a protein supplement derived from milk, often used by athletes and bodybuilders to build muscle mass.");
INSERT INTO `products` VALUES (4000, 'bakery', 'Baguette', 1.49, '1pc', 200,"Baguette: a long, thin French bread with a crispy crust and a soft interior, often used for sandwiches or served with cheese.");
INSERT INTO `products` VALUES (4001, 'bakery', 'Croissant', 0.99, '1pc', 300,"Croissant: a flaky and buttery pastry that originated in France and is often eaten for breakfast or as a snack.");
INSERT INTO `products` VALUES (4002, 'bakery', 'Sourdough Bread', 3.49, '1 loaf', 80,"Sourdough Bread: a type of bread made using a sourdough starter, which gives it a tangy flavor and chewy texture.");
INSERT INTO `products` VALUES (4003, 'bakery', 'Cinnamon Roll', 1.99, '1pc', 120,"Cinnamon Roll: a sweet and sticky pastry made with cinnamon, sugar, and butter, often eaten for breakfast or as a dessert.");
INSERT INTO `products` VALUES (4004, 'bakery', 'White Bread', 2.29, '1pc', 80,"White Bread: a type of bread made from wheat flour that has had the bran and germ removed, often used for sandwiches and toast.");
INSERT INTO `products` VALUES (4005, 'bakery', 'Brown Bread', 2.29, '1pc', 80,"Brown Bread: a type of bread made from whole wheat flour that contains the bran and germ, often used as a healthier alternative to white bread.");
INSERT INTO `products` VALUES (4006, 'bakery', 'Bagel', 2.29, '5pc', 30,"Bagel: a round bread with a hole in the middle, often boiled before being baked, and often served with cream cheese or as a sandwich bread.");
INSERT INTO `products` VALUES (4007, 'bakery', 'Crumpet', 2.29, '4pc', 80,"Crumpet: a small, round, and fluffy bread that is often toasted and served with butter or jam.");
INSERT INTO `products` VALUES (5000, 'confectionary', 'Chocolate Bar', 2.49, '100g', 150,"Chocolate Bar: a sweet treat made with chocolate");
INSERT INTO `products` VALUES (5001, 'confectionary', 'Gummy Bears', 1.99, '200g', 200,"Gummy Bears: a type of chewy candy shaped like bears");
INSERT INTO `products` VALUES (5002, 'confectionary', 'Candy Canes', 0.99, '1pc', 300,"Candy Canes: a traditional confectionery cane-shaped candy often associated with Christmas");
INSERT INTO `products` VALUES (5003, 'confectionary', 'Jelly Beans', 1.49, '150g', 180,"Jelly Beans: small bean-shaped candies with a soft and chewy texture");
INSERT INTO `products` VALUES (5004, 'confectionary', 'Zappos', 2.49, '100g', 150,"Zappos: a chewy lolly from Australia ");
INSERT INTO `products` VALUES (5005, 'confectionary', 'WizFiz', 2.49, '100g', 150,"WizFiz: a confectionary powder from Austraila");  
COMMIT;
