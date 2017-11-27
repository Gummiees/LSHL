CREATE TABLE figures (
	figure_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	user_id MEDIUMINT UNSIGNED NOT NULL,
	name VARCHAR (50) NOT NULL,
	description VARCHAR(200) NOT NULL,
	price MEDIUMINT NOT NULL,
	image VARCHAR (100) NOT NULL,
	PRIMARY KEY (figure_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id)
)

INSERT INTO figures(user_id, name, description, price, image) VALUES
(1, 'Fate Stay Night Saber LILY White Dress', "	
New: A brand-new, unused, unopened, undamaged item (including handmade items). See the seller's listing for full details.", 22, 'https://i.ebayimg.com/images/g/DiwAAOSw-ldZX2dK/s-l1600.jpg'),
(1, 'Hatsune Miku Kimono Yukata Hanairogoromo', "Description:No Box, Version: Made in China,China Version, Size:23cm", 45, 'https://i.ebayimg.com/images/g/1G8AAOSwCGVYAddz/s-l500.jpg'),
(1, 'Re:Zero In A Different World From Zero Ram Figure', "Chinese-made clay jacks are large or small or suitable, elastic is a normal phenomenon.  For the loose joints, sometimes need their own simple treatment can be. Does not affect the overall effect. If can't accept this item have small problem, please go to other shop buy. Hope understanding , thanks!", 89, 'https://i.ebayimg.com/images/g/NTYAAOSwpuFaGDni/s-l1600.jpg')