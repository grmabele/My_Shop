WARNING check log file people.json (problème de droit www-data)

# my_shop
16022021/php09 add_users.php

sudo mysql -u root -p
mysql> source PHP_D09_base-test.sql

Restart Apache 2 web server, enter:
# /etc/init.d/apache2 restart
OR
$ sudo /etc/init.d/apache2 restart
OR
$ sudo service apache2 restart
// http://localhost/Rendu/my_shop/ex_01/inscription.php


windows + shift + up/down (déplacer une fenetre dans ubuntu)
window + droite/gauche (centrer droite ou gauche)
ctrl + alt + up/down (déplacer dans les bureau)


sudo vim /etc/php/7.4/mods-available/xdebug.ini
zend_extension=xdebug.so
xdebug.remote_enable=1
xdebug.remote_port=9000
xdebug.idekey=PHPSTORM
xdebug.show_error_trace=1
xdebug.remote_autostart=1


Technical point
category recursivity
the flexibility of the search bar results
grouping of search criteria in a single search bar(parsing of the user query)




<?php require('displaying_all_users.php'); ?>
<?php require('editing_user.php'); ?>
<?php require('deleting_user.php'); ?>
<?php require('adding_new_product.php'); ?>
<?php require('displaying_all_products.php'); ?>
<?php require('editing_product.php'); ?>
<?php require('deleting_product.php'); ?>


// https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4671096-les-limites-dun-code-de-debutant


index.php : le contrôleur (chef d'orchestre), il fait le lien entre le modèle et l'affichage 

indexView.php : la vue (page HTML...)

model.php : le modèle (requêtes SQL...)


// http://filldb.info/dummy/step2/users
INSERT INTO `users` VALUES (1,'xkoss','ee2b3d45f8d0c59207821719c4632fa3708125e5','kylee20@example.net',0,'Ford Smith'),(2,'marks.rosamond','e12c4001ad0a8dbf565383438573214f91073d2e','kub.adaline@example.com',0,'Skyla Corwin'),(3,'mayer.candida','68a5c2dee5f592743958f09275ff9b6fb544b4e4','blair63@example.com',0,'Raphaelle Frami V'),(4,'marty82','b7f1fdc7a2fc24f125f2553dca59ad5984c8239d','quigley.emily@example.net',0,'Russel Trantow'),(5,'mdare','d549ab67a2a9ea8505f29a2d263edc98e226f41a','pcrooks@example.com',1,'Gail Thiel'),(6,'kflatley','8366ad9883496251c2aa8008470c9d3c6a82876c','fahey.lenny@example.com',1,'Noah Waelchi'),(7,'flittel','b44d20226f48c2f022426f45fffece41e8c58ff0','ikunde@example.org',0,'Danny Paucek'),(8,'mayert.lyda','7d679898802ca5997d30744b8ee7892e8fa1ef9b','reanna.mckenzie@example.net',0,'Carmelo Bode'),(9,'vkassulke','d685bde200c72c14f49b132896c5e764aa123a06','roberts.arvid@example.net',0,'Deion Skiles V'),(10,'verna.reynolds','fd166243d89536cbab865ba600ec88fdcec7b68a','kemmer.everette@example.com',1,'Louie Bins'),(11,'luettgen.johnpaul','65f2c24e3324849b1eb15316a0e6ecfd9da8900a','block.ariane@example.org',1,'Julien Leuschke'),(12,'morissette.dexter','aa9a98d7f884038ae3690ba0eb5f85e062056e30','hessel.lucie@example.com',1,'Greta Baumbach'),(13,'braxton07','97c923692728e7336278cf7835dfd259b00c63f9','miracle.bosco@example.net',0,'Delmer Hermann IV'),(14,'kassulke.danyka','3afe7fffc33236a384a505fae40ce97a84d88f3f','sanford.johnnie@example.org',0,'Aurelio Hansen'),(15,'maiya.ondricka','6bd59e32de3b080d283ea39dea09041db407aca3','estefania.pouros@example.net',1,'Miss Athena Murphy'),(16,'fbeier','fa20b3ef3d2903a355788c9bd8b5931b788c34c6','kuphal.shyann@example.net',1,'Meagan Rutherford'),(17,'leann08','9ee730d3ee3f9ececf76dc2172be7b55d0759e62','hgusikowski@example.org',0,'Mackenzie Ortiz'),(18,'gstracke','d66e9a03235ad3afd143a3ee1d736de9e4b9b9bc','marques.flatley@example.org',1,'Kristy Conroy'),(19,'xkunze','1f44cd9b4b8559d2e8544d408eeaa7c147f36a9b','isenger@example.net',1,'Alysa Bartoletti'),(20,'flavie.torp','9f38243c59009a8e45209570d0032a740dc48400','maybell08@example.net',1,'Woodrow Balistreri'),(21,'fbarrows','06adc628827ed22cbc4485f8d441cd56ca2d82ba','carroll.filiberto@example.org',1,'Brendan Franecki'),(22,'gschinner','491aa39d0fcf709bd47b968a6011ae325fa02995','nikolaus.darion@example.org',0,'Connie Bergstrom'),(23,'barney.wolff','7f62dc8e6cba59ea7e193efc7d0c5635160df32a','americo32@example.com',0,'Adrien Robel'),(24,'jennyfer.kassulke','a211fd201021972007ae02e625f4fb9218cd6477','xwintheiser@example.net',0,'Ezekiel Denesik'),(25,'xcarter','e8f1b451329caccd7156211dc9dab3896bc72f35','nestor.gottlieb@example.com',0,'Benjamin Cassin'),(26,'lowe.austin','9af5191644c77b030439e117b78c946ab06f386b','macey51@example.net',1,'Mrs. Asia Reynolds'),(27,'kathlyn77','529165961ab05aaa92ee62719878234671435b5b','jermain33@example.net',1,'Wellington Oberbrunner'),(28,'sreichel','60078467ba16fb9dbfefdb7bd86e40fa6d75a820','kraig.bernier@example.org',1,'Cortez Mitchell Jr.'),(29,'keeling.modesto','67794cc8e1045267a085ec4899f6bb44f79c0ac6','alice74@example.org',1,'Eduardo Armstrong'),(30,'guillermo33','49620a2e440a95a287bbaee0e7beccc841da0c6c','grant.paige@example.com',0,'Julius Denesik DDS'),(31,'vgoyette','ddb27c475732cb79ca2ee7288777cc4aba9e08a2','joana38@example.com',1,'Sophia Balistreri'),(32,'savannah.denesik','51c99dc43a6575ee902ba974f2baab05c6c048da','marquardt.margarette@example.com',0,'Dr. Alexandra Stiedemann III'),(33,'amiya.sawayn','70e675b5e53481bf8913003cdbd1e4e18d8cd9e4','judge.labadie@example.com',0,'Emil Jones'),(34,'ro\'keefe','59943965afcfbee13cf2733223f184ea8f520063','sandy.trantow@example.org',1,'Karley Ratke'),(35,'vweimann','bd70d3dd936ec376b2f373ead6e346be125f3152','ufriesen@example.net',1,'Zora Halvorson'),(36,'terence.considine','fb4be6258a9120e5c1716cf5b657f7b7316ef1bf','xbartoletti@example.com',0,'Teagan Wehner'),(37,'ihowell','4e04e93528b7447015db023a721ed66a536c3405','prohaska.giovanni@example.com',0,'Chet Langosh'),(38,'vlittle','5116a6df3342c7104b4bbadc4134a444f460da87','mitchell.nadia@example.com',1,'Cletus Watsica'),(39,'xwuckert','40a4e12775af95e6e20399b931809d1f842dc448','jdoyle@example.org',0,'Josh Balistreri'),(40,'regan45','88840b95f0ab42fd11234565727e130fab3cda47','wcorkery@example.com',1,'Gunnar Walter'),(41,'lorenza04','74ac654023fcc2d34c574218cf6e834e6b9c4489','witting.lizzie@example.org',1,'Gavin Abbott'),(42,'yasmine28','f10db9a830e4188406b7e8ab705520a12b670af4','borer.princess@example.com',0,'Glen Will'),(43,'pacocha.daron','ad45c3d5a34a00f936d2c48e9ea5cbf16081db3c','kirlin.arturo@example.com',1,'Prof. Myron Turcotte MD'),(44,'kiley.price','802ce2c88bff3c158e4e3a9f296dd25a20a347c8','lisette96@example.org',0,'Mrs. Amalia Dicki'),(45,'weimann.lafayette','9b7d9b98cb28bc7bfb6409f44de37e850252921b','estell73@example.com',0,'Prof. Devan Hilpert III'),(46,'camilla.auer','8d84cae82ea96bc9832e31475874b754ba35d89f','elittel@example.net',1,'Erick Strosin'),(47,'cmetz','eed3efa101f102ea0d479137f9d4feff7d7038b3','alehner@example.net',1,'Micah Upton'),(48,'rippin.savanah','239530394ae77638a5f5c160e6c950f46ac304ed','elise82@example.net',1,'Alexane Orn'),(49,'wintheiser.isaac','c4a34ac206ec00854e9101fc2aee30f540072db7','bernhard.heathcote@example.com',0,'Kelvin Schiller'),(50,'ezemlak','8af199ff095d74d46e65355b3c379759220882b5','hagenes.cameron@example.com',0,'Kaylin Bogisich'),(51,'bette.moen','4506a3f36409435a975d72408e849ef91bfb2838','wilfred65@example.org',1,'Oral Altenwerth MD'),(52,'robel.meda','d91175b07091aed4728e412abdff3cdba9751e8f','langosh.woodrow@example.org',0,'Olaf Ullrich MD'),(53,'yheathcote','7905ad34a44861bdbb468bdb933be685f618b6bc','jchamplin@example.com',0,'Miss Betty Torp II'),(54,'jacobi.demetrius','7ad3b49a863ebb89fb8cef0430f838f12b1be374','irving.champlin@example.com',0,'Nia Bauch MD'),(55,'ystark','cdb26ee6d64fe5a8f965a0dd35ded5ff51dd2ce8','kory78@example.net',1,'Ms. Myrtie Maggio'),(56,'beaulah88','3200a5ac9d97ed41541e6caf6e7dc45bc0b9497c','fyundt@example.com',0,'Helmer Kautzer'),(57,'jade29','b0050a089d1b4f7457b23e53158ccd09ebd20cec','hkohler@example.org',0,'Arnold Conroy DVM'),(58,'ivah87','fedf0a6e3ba82b066eeabab2cd8a1a1ab39fe1d1','flatley.sophia@example.net',0,'Prof. Keith Kohler'),(59,'geo41','a6e1dcc3c7f91ad6544df5c3d32e924aa534d89d','jordan35@example.org',0,'Marc Rutherford'),(60,'iwhite','09970e4047c76e6acb62de8b4565c4da726b0404','lysanne76@example.org',0,'Mr. Santa Maggio MD'),(61,'friesen.cedrick','b96c66b1913889b1da2a4e73467e4ef583af90a7','jonathon.osinski@example.com',1,'Gerda Hermiston DDS'),(62,'lyda58','cf6966a866c8695c84deace1c43d1fadb40a7f5d','kemmer.marcella@example.org',1,'Mortimer Anderson V'),(63,'jan.klocko','c8473be16a384a055bf88d1996b472726ac84dcf','royal.fisher@example.net',1,'Peggie Schuppe'),(64,'pcollins','3cc51926d8098f8f82d7b7ca39a6c361d26dcf6b','gideon.abernathy@example.org',1,'Dr. Jarvis Thompson'),(65,'efritsch','202e22e0e1a2cf6cfa487cc0f74a1f52011e3eef','odurgan@example.org',1,'Stuart Keebler'),(66,'sarai67','3e57566d64b94377e1b54c0f325b7b48a649b10b','norene.mills@example.org',1,'Edgar Schmitt IV'),(67,'darrick.stanton','48a7cfb0df4fe6474e8677e59bedc20f5276ab09','keenan31@example.com',0,'Imelda Stanton'),(68,'pfriesen','c83d08dfc1f105ae871002ae2b4a50debf816aa5','bud.stracke@example.net',0,'Tremaine Deckow MD'),(69,'ellis.grady','950abe5d13bf6184187325d9687ff7fa5acac8ed','ludwig.abernathy@example.org',1,'Kelvin Schoen'),(70,'charlie75','10fdd346f3ea282e6df7a5181f0fb6b1b2d89004','roberts.hector@example.com',1,'Evie Sporer'),(71,'art.quitzon','5e2e277d7fd352d9cdf3df22a21f4e9a29dae52c','barney14@example.net',1,'Mackenzie Russel'),(72,'mmurphy','4bd3fa9933009c0af58ff9b0b12e0e79e366ae9f','echristiansen@example.net',0,'Prof. Alford Breitenberg'),(73,'ulises81','9b54c7a8a5bf4e84f59238654b2c5a1eeb0d2e74','terry.jessica@example.com',1,'Prof. Lelia Parisian'),(74,'manuela.welch','2362274baf94b6304a99ccbabe336081d984507f','carissa46@example.org',0,'Sincere Feeney'),(75,'brice20','510447869e6aaf9d08e54432f6a7f61d6768cb95','aaliyah78@example.com',1,'Abraham Feil IV'),(76,'jyost','e3700371c1f4bc2960efb801d270aaedc8f1a55e','natasha38@example.com',1,'Miss Dayana Becker'),(77,'greenholt.jaylen','4c41d2c30e04112a3d0dc26e97dd4699ec224721','christa74@example.net',1,'Geovany Casper'),(78,'jconroy','2abe697f4fb94e8123ece6d7bf22fdb3ecfc1d8a','eborer@example.org',0,'Alexandria Kuvalis'),(79,'selena.corwin','f2cac34058147100d0bc6768d4b4d84183a3e31f','omann@example.com',1,'Harmon Predovic'),(80,'tiara.bergnaum','baa77d44cfd29299ea7917a7ecbee785e401fb72','bergstrom.pattie@example.org',0,'Christy Batz'),(81,'leon85','3913c07cef361d59876dcef698c48c4eaea40dd7','bertrand80@example.org',1,'Dr. Tod Reynolds'),(82,'carter.christiansen','275e7c7d29af1b7258355de7ebff66a23a6ed261','keaton.murphy@example.com',1,'Prof. Elyse Labadie'),(83,'bettie.morissette','e44c3b41e82bff34a00daa1388a456bcec392b0b','josephine.beier@example.org',0,'Dr. Suzanne Hoeger MD'),(84,'yost.guy','84d1295c7e6f7d9270c38275af5b9995043db070','winnifred.waters@example.com',0,'Pete Turcotte'),(85,'vinnie25','ad00c2959de21f72788b999383b0c024e3719f1e','duncan60@example.com',1,'Sean Emmerich'),(86,'swift.lenny','92c5d9e75613d3f1ed69b8959c975ed305566e1c','amelie73@example.com',1,'Cassie Jenkins'),(87,'hessel.hanna','1b7e0cb20e437fefad9283e51546ad5ea7043430','wrussel@example.net',1,'Dr. Darien Emmerich'),(88,'tevin85','bcd7494e87941cca6f73cbca496ea35c43234a80','xgerlach@example.org',0,'Mr. Sammie Ortiz'),(89,'gkreiger','8931e094c0516a6435a12f95d8ce225e2b9b3d7a','delia00@example.com',1,'Ophelia McKenzie'),(90,'lola70','b7612e2bcbe8806660c840503987a21e5ddccda6','ethan.gusikowski@example.com',0,'Marisol Lehner'),(91,'kerluke.beverly','83f790ce2f699a0867910b10f59d98881c7fc4e6','katelynn.klocko@example.com',1,'Devyn Emard'),(92,'yglover','8378f7c1dd132359b8e0324130135a79402b8f16','ngrady@example.com',0,'Charley Balistreri'),(93,'hand.ferne','3e4bf349649e1f43a741c6779edb7c0cae145531','kturcotte@example.com',1,'Gabriel Leffler'),(94,'hodkiewicz.christian','c8f2a64b13635561c8abf5f2d6581d4b46201608','wunsch.zita@example.net',1,'Clemmie Rohan'),(95,'maia.harvey','ab1baeb96e3b087f61abe38113b3ad3cc77b9681','elyssa.ullrich@example.org',0,'Dr. Buddy Haley'),(96,'lonny57','c47ea91249f9b9c470e2107c70f26467cbe01bbd','rritchie@example.net',0,'Beth Emmerich'),(97,'omante','b3cf79be4bc1ad7e57788a98c2e046c480fab2a8','pluettgen@example.net',0,'Sarai Bradtke'),(98,'okuhlman','c221bb7c895a5168cf766f5d11c561dc683afbbc','beryl43@example.net',1,'Kaylin Douglas'),(99,'geovanny.pouros','084d4096e2cfdc0befe967fb98d953b73f31b80b','braden.corwin@example.org',0,'Vernon Streich'),(100,'pfannerstill.oma','8521ac6617ce7e19c3d7cb0736a041e0ad5579bf','vmohr@example.org',1,'Lazaro Schaefer');