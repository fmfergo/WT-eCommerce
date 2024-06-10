https://github.com/fmfergo/WT-eCommerce

The name of the database the web sites connects to is "plant_house" on localhost with user root.

Please use this sql command to populate the "products" table

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_desc`, `item_img`, `item_price`) VALUES
(1, 'Rubber Plant', 'A popular ornamental plant known for its large, glossy leaves.', 'rubber_plant.jpg', 15.99),
(2, 'Snake Plant', 'An easy-to-care-for plant with tall, rigid leaves.', 'snake_plant.jpg', 12.99),
(3, 'Spider Plant', 'A popular houseplant with long, thin leaves and spider-like offshoots.', 'spider_plant.jpg', 8.99),
(4, 'Jade Plant', 'A succulent plant with thick, lush leaves.', 'jade_plant.jpg', 10.99),
(5, 'Ficus', 'A common houseplant with various species, known for its tree-like appearance.', 'ficus.jpg', 18.99),
(7, 'Aloe', 'A succulent plant known for its medicinal properties.', 'aloe.jpg', 9.99),
(8, 'Umbrella Plant', 'A plant with large, umbrella-like leaves.', 'umbrella_plant.jpg', 16.99),
(9, 'Peace Lily', 'A popular flowering plant known for its white blooms.', 'peace_lily.jpg', 13.99),
(10, 'Common Ivy', 'A climbing plant with lush, green foliage.', 'common_ivy.jpg', 7.99),
(11, 'Pothos', 'A hardy plant with heart-shaped leaves, known for its air-purifying qualities.', 'pothos.jpg', 11.99),
(12, 'Philodendron', 'A popular houseplant with large, glossy leaves.', 'philodendron.jpg', 12.99),
(13, 'Tradescantia Nanouk', 'A popular flowering plant known for its white blooms.', 'tradescantia.jpg', 13.99);

-- --------------------------------------------------------
