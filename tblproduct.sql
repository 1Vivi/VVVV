--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `describe`varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`,`describe`) VALUES
(1, 'Sourdough White', '1', 'product-images/1.png', 7.00,"Our standard sourdough"),
(2, 'Sourdough Rye', '2', 'product-images/2.png', 8.00, "Sourdough created with 50% rye flour"),
(3, 'Sourdough Spelt', '3', 'product-images/3.png', 9.00,"Sourdough created with 100% spelt flour. "),
(4, 'Sourdough Seeded', '4', 'product-images/4.png', 9.50,"Sourdough including a mixture of yummy seeds." ),
(5, 'Oat bread', '5', 'product-images/5.png', 10.50,"A delicacy made of oats, bread and other ingredients. Oats are rich in B vitamins, niacin, folic acid and pantothenic acid. In addition, oat flour also contains saponins which are lacking in cereals. Oatbbread has high nutritional value and is a very healthy bread."),
(6, 'Whole wheat bread', '6', 'product-images/6.png', 8.50,"When making whole wheat bread, it is made of whole wheat flour without removing bran and wheat germ, which is different from ordinary bread made of refined flour."),
(7, 'Garlic bread', '7', 'product-images/7.png', 9.00,"Because the taste of garlic bread is very special, I list it separately. Apart from conventional bread, garlic bread slices are also very common in French meals."),
(8, 'Multigrain bread', '8', 'product-images/8.png', 9.50,"Bread made from oat flour, wheat flour, flax seed, Jiangxi flower seed, walnut, hazelnut and other raw materials is called "miscellaneous grain bread"."),
(9, 'Toast', '9', 'product-images/9.png', 10.00,"Sliced bread, which can be bought in supermarkets and convenience stores, is usually in bags, especially suitable for eating in the morning when you are in a hurry. It is very delicious to make sandwiches."),
(10, 'Croissant', '10', 'product-images/10.png', 6.00,"Croissant, also known as praise, is my favorite in the bakery. This word comes from French, and its pronunciation is very roundabout, meaning new moon."),
(11, 'Brioche Bread', '11', 'product-images/11.png', 6.50,"Brioche is a type of French wheat bread that has a light fine texture. The difference between brioche bread and regular wheat bread is the ingredients used. Eggs, butter, and milk are added to the bread mix to create a rich French bread. "),
(12, 'Ciabatta Bread', '12', 'product-images/12.png', 5.00,"Ciabatta is a popular Italian bread that is great for sandwiches, paninis, or toasted snacks.The difference between this Italian bread and French white bread is that olive oil is used in the ingredients. Usually, ciabatta has a light brown crispy crust with a soft center." ),
(13, 'Bagels', '13', 'product-images/13.png', 5.00,"Bagels are a yeast bread product that are in the shape of a doughnut. These bread rolls with holes in the center originated among the Jewish community in Poland." ),
(14, 'Crumpet', '14', 'product-images/14.png', 5.50,"Muffins have soft sponge texture and small potholes. Typical muffins are made from water, wheat flour and yeast."),
(15, 'Scone bread', '15', 'product-images/15.png', 6.00,"Scones are a popular, round-shaped form of small bread originating in the United Kingdom. Generally speaking, the ingredients of scones include wheat flour, butter, eggs, baking powder, and salt.");

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5
COMMIT;