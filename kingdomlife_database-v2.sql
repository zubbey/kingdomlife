-- -------------------------------------------------------------
-- TablePlus 3.1.0(290)
--
-- https://tableplus.com/
--
-- Database: kingdomlife_database
-- Generation Time: 2020-01-23 21:44:43.7330
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

CREATE TABLE `churchunits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(100) NOT NULL,
  `body` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `givePayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `referenceCode` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `gaveOption` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `givepayment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastAction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `productKey` varchar(255) NOT NULL,
  `productValue` varchar(255) NOT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `outreaches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE `pagecontents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(200) DEFAULT NULL,
  `body` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE `pastoral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `pictures` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `prayerRequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `prayer` varchar(1000) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `status` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `prayerrequest_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `testimonies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `testimony` varchar(1000) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `status` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `testimonies_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `video_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `video_tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `video_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `youtube_video_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `visitorprayerRequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `prayer` varchar(1000) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `status` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `visitorsPayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `referenceCode` varchar(255) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `gaveOption` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('1', 'Above only by Bishop Uzosike victor', 'ABOVE ONLY');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('11', 'ACTIVATING ANGELIC ASSISTANCE by Bishop Victor Uzosike PART 1', 'ACTIVATING ANGELIC ASSISTANCE Bishop Victor Uzosike PART 1');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('21', 'ACTIVATING ANGELIC ASSISTANCE by Bishop Victor Uzosike PART 2', 'ACTIVATING ANGELIC ASSISTANCE Bishop Victor Uzosike PART 2');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('31', 'ANGER MANAGEMENT by Pastor Esther Uzosike', 'ANGER MANAGEMENT Pastor Esther Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('41', 'Blessings guarantees success by  Bishop V Uzosike', 'Blessings guarantees success   Bishop V Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('51', 'ENCOUNTERING THE SUPERNATURAL by Bishop Victor Uzosike', 'ENCOUNTERING THE SUPERNATURAL Bishop Victor Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('61', 'JESUS THE SITTING HIGH PRIEST by BISHOP V UZOSIKE PART 1', 'JESUS THE SITTING HIGH PRIEST  BISHOP V UZOSIKE PART 1');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('71', 'JESUS THE SITTING HIGH PRIEST by  BISHOP V UZOSIKE PART 2', 'JESUS THE SITTING HIGH PRIEST  BISHOP V UZOSIKE PART 2');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('81', 'NEXT LEVEL by Bishop V Uzosike', 'NEXT LEVEL Bishop V Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('91', 'Next level favour by Bishop Uzosike', 'Next level favour Bishop Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('101', 'REVELATIONAL SOLUTIONS by Bishop V Uzosike', 'REVELATIONAL SOLUTIONS Bishop V Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('111', 'SACRIFICE THE RELEASE OF SPIRITUAL POWER by Bishop Victor Uzosike PART 1', 'SACRIFICE THE RELEASE OF SPIRITUAL POWER Bishop Victor Uzosike PART 1');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('121', 'SACRIFICE THE RELEASE OF SPIRITUAL POWER by Bishop Victor Uzosike PART 2', 'SACRIFICE THE RELEASE OF SPIRITUAL POWER Bishop Victor Uzosike PART 2');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('131', 'THE BLESSINGS OF ABRAHAM by Bishop V Uzosike', 'THE BLESSINGS OF ABRAHAM Bishop V Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('141', 'The blood of Jesus as a divine mystery by Bishop Uzosike', 'The blood of Jesus as a divine mystery Bishop Uzosike');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('151', 'THE MYSTERIES BEHIND THE MAKING OF STARS IN THE KINGDOM by Bishop V Uzosike PART 1', 'THE MYSTERIES BEHIND THE MAKING OF STARS IN THE KINGDOM Bishop V Uzosike PART 1');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('161', 'THE MYSTERIES BEHIND THE MAKING OF STARS IN THE KINGDOM by Bishop V Uzosike PART 2', 'THE MYSTERIES BEHIND THE MAKING OF STARS IN THE KINGDOM Bishop V Uzosike PART 2');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('171', 'The Power Of Sacrifice by Pastor Esther Uzosike PART 1', 'The Power Of Sacrifice by Pastor Esther Uzosike PART 1');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('181', 'The Power Of Sacrifice by Pastor Esther Uzosike PART 2', 'The Power Of Sacrifice by Pastor Esther Uzosike PART 2');
INSERT INTO `audio` (`id`, `description`, `filename`) VALUES ('191', 'The Power Of Sacrifice by Pastor Esther Uzosike PART 3', 'The Power Of Sacrifice by Pastor Esther Uzosike PART 3');

INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('1', 'https://i.imgur.com/46EPoqul.jpg?1', 'MEN OF HONOUR', 'This is a team of male adults who come together to foster the spirit of leadership by implementing God\'s word in their daily lives, and being exemplary models in their families and the body of Christ.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('2', 'https://i.imgur.com/QuTTZFgl.jpg', 'WOMEN OF DESTINY', 'These are female adults who by deliberate training inculcate in themselves the spirit of excellence and a life of virtue, employing God\'s word as a measure for fulfilling destiny.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('3', 'https://i.imgur.com/zFT5knFl.jpg', 'DESTINY KIDS', 'The Destiny Kids are children who are being raised into spiritual maturity by introducing to them fundamental principles of Christ, are being trained to become leaders full of the knowledge of God\'s love.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('4', 'https://i.imgur.com/ehRAU4Ol.jpg', 'KINGDOM YOUTH', 'These are the very lively and vibrant workforce of the church. They are those who carry the mandate of the kingdom; setting the pace for young people all over the world.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('5', 'https://i.imgur.com/15kAQOQl.jpg', 'DYNAMIC DESTINY PRAISE CHOIR', 'This is one of the best choir in the world! Their voices are gifted with an anointing to make a wondrous melody that creates an overwhelming atmosphere of praise and glorious worship to God.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('6', 'https://i.imgur.com/4wZcc1Pl.jpg', 'LEGACY DRAMA TEAM', 'This is a unit which uses drama as a medium to educate people on how live a destiny fulfilling life, teaching the Gospel of Christ through the art.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('7', 'https://i.imgur.com/aXAjikCl.jpg', 'LEGACY DANCE TEAM', 'This is a Gospel oriented dance-art platform with a focus to train people on how to use dance as a medium of expressing God\'s spirit.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('8', 'https://i.imgur.com/JWd8CDrl.jpg', 'PROTOCOL / USHERING DEPARTMENT', 'These are trained personnels who are willing to serve every single person in church; that includes the leaders and members. They ensure decorum and order in the House of God.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('9', 'https://i.imgur.com/iZfW3C8.jpg', 'MEDIA / PUBLICITY UNIT', 'These are those who project the image and vision of the church using various advertisement channels.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('10', 'https://i.imgur.com/CVGBwlX.jpg', 'CYBER FORCE', 'This is a community of like-minds who employ 21st century technologies and techniques in propagating the gospel of Christ and the vision of the church.');
INSERT INTO `churchunits` (`id`, `image`, `heading`, `body`) VALUES ('11', 'https://i.imgur.com/3tFNmIg.jpg', 'SCHOLARSHIP SCHEME', 'These are the very lively and vibrant workforce of the church. They are those who carry the mandate of the kingdom; setting the pace for young people all over the world.');

INSERT INTO `ebooks` (`id`, `thumbnail`, `name`, `amount`, `file`, `postDate`) VALUES ('1', 'https://i.imgur.com/bGCDZfJl.jpg', 'Covenant-Control', '8000', '', '2019-12-05 00:00:00');
INSERT INTO `ebooks` (`id`, `thumbnail`, `name`, `amount`, `file`, `postDate`) VALUES ('2', 'https://i.imgur.com/pbLNJ5Ul.jpg', 'Solution-by-Revelation', '5000', '', '2019-12-05 00:00:00');

INSERT INTO `members` (`id`, `username`, `firstname`, `lastname`, `gender`, `email`, `phone`, `password`, `verified`, `token`, `created_at`, `lastAction`) VALUES ('1', 'peter', NULL, NULL, NULL, 'peterukeh@hotmail.com', '09022993310', '$2y$10$cqnfAxD460TmO9go/UYJ7.VFIHZAVnhpmEHDINZK2Ch5Ty9foKYWC', '0', 'abd6496ec63bbad0027e24003eda148428c530c7b5e1529beee2f2639612', '2020-01-20 00:00:00', '2020-01-22 02:22:23');
INSERT INTO `members` (`id`, `username`, `firstname`, `lastname`, `gender`, `email`, `phone`, `password`, `verified`, `token`, `created_at`, `lastAction`) VALUES ('2', 'zubbey', 'innocent', 'Amazing', 'Male', 'com.zubbey@hotmail.com', '09022993310', '$2y$10$YMFXgu9ckRLeakAHAoTbkeiBJ7yZjOZ4XMGvQ27g9z44z9jPzcp5q', '1', '94227029be607a0e980dd03c003ae7ff2237d88b445bef4a50a2d2be6122', '2020-01-22 00:00:00', '2020-01-23 09:27:01');

INSERT INTO `outreaches` (`id`, `image`, `heading`, `body`, `postDate`) VALUES ('1', 'https://i.imgur.com/DeOhlE9.jpg', 'Widows Ministry and Outreach', 'The First Lady of the Church, Pastor Mrs. Esther Uzosike, wife of Bishop Victor Uzosike and co-pastor of the Kingdom Life Gospel Outreach Ministries has a driving passion for families and pilots the widows ministry and outreach.\r\n\r\nThe widows ministry was borne out of divine inspiration. God says, that the widows are His wives and He is very particular about them.\r\n\r\nWe find a rising number of widows today in Africa who are neglected and isolated after the death of their husbands, who in most cases are the bread winners of their homes.\r\n\r\nThe ministry is burdened with the plight of widows. It reaches out with love and welfare materials like foodstuffs, toiletries and monetary gifts, not only to widows in the city, but also in the rural areas where most of them retire to after the death of their husbands.\r\n\r\nIn the nearest future, the ministry also intends to train, empower and set up the industrious ones amongst them in small scale businesses, so they can take better care of their children.', '2019-12-05 11:30:29');
INSERT INTO `outreaches` (`id`, `image`, `heading`, `body`, `postDate`) VALUES ('2', 'https://i.imgur.com/KgXITnh.jpg', 'Free Medical Missions Outreach', 'A few years ago, a heavy burden descended on Bishop Victor Uzosike concerning the poor state of health and health institutions in Africa. It dawned on the Servant of God that the number of persons who die from ingesting fake, unprescribed, substandard or expired drugs from not having either the money or access to proper medical care could easily rival those killed in road accidents, on deplorable highways.\r\n\r\nWhile seeking the face of the Lord on why he should be burdened, Dr. Uzosike felt the spirit of God leading him to explore this area as an open door for the spreading of the Gospel of Christ. The man of God began to realize that good health was something everybody cherished, irrespective of religion, tribal, national or political differences.\r\n\r\nThat burden became a burning vision which eventually birthed the Free Medical Missions Outreach.', '2019-12-05 11:54:14');
INSERT INTO `outreaches` (`id`, `image`, `heading`, `body`, `postDate`) VALUES ('3', 'https://i.imgur.com/ukuGNeG.jpg', 'Kingdom Life Scholarship Scheme', 'Scholarship has been a serious part of our commission to care for the members of the Church, especially the youth. The Nigerian state has no serious welfare package for her indegent students, with the result that so many young people have no means of actualizing their dreams of going to school. The Man of God is personally involved in meeting the basic educational needs of some young people in the Church by paying their fees, buying books, giving them monetary aids and other sundry needs until the Henry Ogiri Foundation began to partner with us to reach out to more people from 2012. Bishop Uzosike says his vision for this scheme is for no member of Kingdom Life to say “I did not go to school because I have nobody to train”. \r\n\r\nThirty-five (35) indigent students have benefited from this scheme since inception, and it is a thing of joy to note that many of them are graduates today.  ', '2019-12-05 11:55:06');
INSERT INTO `outreaches` (`id`, `image`, `heading`, `body`, `postDate`) VALUES ('4', 'https://i.imgur.com/NTRkVE4.jpg', 'Kingdom Life Food Bank', '“Except we care, the people perish!” That is the driving mantra of the Kingdom Life Gospel Outreach Food Bank. \r\n\r\nWith the very intense economic situation in Nigeria, the Lord – in a revelation – led his Servant to a large store of food. He saw himself in a place where foodstuff was stocked and shared out to people. Today, the Church gives out food items every Sunday to needy members of the Church and her host community, with the hope of making it a daily exercise. \r\n\r\nThis distribution of foodstuff is also done every festive season like Christmas, New Year and Easter.', '2019-12-05 11:55:47');
INSERT INTO `outreaches` (`id`, `image`, `heading`, `body`, `postDate`) VALUES ('5', 'https://i.imgur.com/Hv8eVVq.jpg', 'Legacy Film Project', 'The Legacy film project began on a platform to train Christians in the art of screen play, movie production and acting for free. Bishop Victor Uzosike, the visioneer launched this project with the production of the first Christian soap opera, filled with suspense, humour, intriguing and soul lifting messages tailored at educating people on how to live a destiny fulfilling life. \r\nThe legacy film Season 1 showcased the talent of members of the church who starred as actors in the soap opera and has raised outstanding stars in the Nollywood industry. ', '2019-12-05 11:57:57');
INSERT INTO `outreaches` (`id`, `image`, `heading`, `body`, `postDate`) VALUES ('6', 'https://i.imgur.com/jGY9mL6.jpg', 'Spirit Filled Bible Institute', 'The Spirit Filled Bible Institute empowered with the mission of equipping and empowering believers to impact the body of Christ is geared towards raising spirit filled ministers.\r\n\r\nThe Bible Institute offers a range of practical and skill-oriented courses that are relevant in building a successful career in life, profession and ministry. Our courses are tailored towards Generational Relevance, Academic Excellence, Spiritual Impact and Holistic advancement in destiny.  Our Team of lecturers are well qualified in their various fields and are very committed to the ethics of effective communications and sound knowledge to lead the courses that they handle.\r\n\r\nOur courses are currently classified into Two (2) major categories : The Basic Certificate Course (6 weeks Intensive) and The Basic Diploma Course (9 months Intensive). It is our desire that at the completion of the course, every student would stand out as an effective minister of the gospel. ', '2019-12-05 11:58:48');

INSERT INTO `pagecontents` (`id`, `heading`, `body`) VALUES ('1', 'Welcome to Kingdom Life Gospel Outreach Ministries', 'Kingdom Life Gospel Outreach Ministries is a dynamic commission through which God has reached and transformed the destinies of people in Nigeria, Africa and beyond since it was birthed in November 1994.\r\n \r\nOur Headquarter Church, Jesus Cathedral, is a beautiful and inviting auditorium that sits over 4000 adults. It also has a Children’s Church and a Teens/Youth Center to ensure that the spiritual needs of your entire family are met. \r\nPresided over by the anointed and dynamic Apostle of Destiny and God’s Battle Axe, Bishop Victor Uzosike, Jesus Cathedral is also the administrative centre of the Ministry, supervising branches of the Church in major cities of Nigeria, Europe and the United States of America. \r\n\r\nKingdom Life Gospel Outreach is giving light to our generation with the message of salvation, healing and deliverance with the mandate of spreading the gospel all over the world through crusades, revivals and outreaches (Matthew 24:14, Mark 1:15). \r\nThis message is woven into the four pillars of the Kingdom Life Gospel Outreach Ministries. These pillars, which constitute our core mandate are – Discovering Destiny, Recovery of Destiny, Fulfillment of Destiny, and Leaving a Legacy on earth (Daniel 7:27). \r\nJesus Cathedral hosts two inspiring services, every Sunday from 7:30am local time, an insightful Bible Study every Tuesday by 5:30pm local time and Family Victory Prayer Service every Friday by 5:30pm local time. ');
INSERT INTO `pagecontents` (`id`, `heading`, `body`) VALUES ('2', 'MEET THE PRESIDING BISHOP KINGDOM LIFE GOSPEL OUTREACH MINISTRIES INT’L.', 'Bishop Victor C. Uzosike is the presiding Bishop of Kingdom Life Gospel Outreach Ministries International.\r\nA vibrant and dynamic charismatic preacher, Bishop Uzosike is fondly called the “Apostle of Destiny” because of his life transforming teachings, which have propelled many to discover and fulfill their destinies.\r\nHe is an internationally sought-for conference speaker, host of Hour of Destiny on Radio and Televisions, Executive Producer Legacy - A Christian soap opera, President Spirit Filled International Network of Gospel Ministers as well as President Prophetic Bible College, Port-Harcourt.\r\nBishop Uzosike is passionate about soul winning and has impacted thousands of youths on the essence of winning souls for Christ through the umbrella of soldiers of Christ.\r\n\r\nA prophetic writer and author of several books including best sellers; “Living In Power”, Your Place of Welcome”, and Covenant Control”.\r\nHe is highly respected as one of the Leaders of the Christian communities in Nigeria.\r\nIn recognition and appreciation of his numerous contributions to nation building, Bishop Uzosike has received awards from West African Students Union Parliament (WASUP) and National Association of Imo State Students, Award of Excellence by National Association of Niger Delta students as clergy man of the year 2015, in appreciation of his scholarship awards to the Niger Delta Youths.');

INSERT INTO `pastoral` (`id`, `heading`, `body`, `image`) VALUES ('1', 'MEET THE FIRST LADY OF KINGDOM LIFE GOSPEL OUTREACH MINISTRIES INT’L.', 'Pastor Mrs. Esther Uzosike is the wife of His Lordship, Bishop Victor Uzosike and First Lady Kingdom Life Gospel Outreach Ministries; A woman of prayer, strong in the word, a sought after international speaker, She is the Vice President of Spirit Filled Network of Gospel Ministers and a lecturer at the Spirit Filled Bible Institute, Port Harcourt. \r\n\r\nA woman of rare grace and unassuming charisma, Pastor Esther actively reaches out to the individual woman through the following ministries : The Widows Outreach, Kingdom Brides (Singles), Family Breakthrough service for healing, deliverance, breaking of family ancient barriers, supernatural conception and delivery which holds at Kingdom Life Gospel Outreach Ministry, every Wednesday by 10:00 am and a co-host, alongside her husband Bishop Victor to the annual Seize the Moment Program targeted to encourage Christian singles to interact with one another and locate their spouses. \r\n \r\nPastor Esther, the author of a bestselling book Solution by Revelation, is blessed with seven wonderful children. \r\n', 'https://i.imgur.com/zvKKXd5.jpg');

INSERT INTO `pictures` (`id`, `file`) VALUES ('1', 'https://i.imgur.com/dOmxT16.jpg');

INSERT INTO `prayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('1', '1', 'Peter Uchenna', '', '', 'Nigeria', 'Thank you Lord for this morning.', 'January 20, 2020, 8:48 am', '0');
INSERT INTO `prayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('2', '1', 'Peter Uchenna', '', '', 'Nigeria', 'Lord Jesus, you are the master of life and death. Everything I have is yours, and I love you very deeply. Just one touch from you restores the sick, heals the broken, and transforms the darkness. Only you can do this Only you', 'January 20, 2020, 10:09 am', '0');
INSERT INTO `prayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('3', '1', 'Peter Uchenna', 'peterukeh@hotmail.com', '09022993310', 'Nigeria', 'Lord, thank you that we are a family in Christ. Help us to share his love and legacy with everyone that we encounter this week. May we lavish Christ’s abounding goodness upon our families, friends and colleagues. Holy Spirit, come and equip us in our workplace, guide us in our school life, and inspire us in our neighbourhood. Thank you for choosing to use us to bring your kingdom here on earth. Amen.', 'January 20, 2020, 10:32 am', '0');

INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES ('1', '1', '1');
INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES ('2', '2', '1');

INSERT INTO `testimonies` (`id`, `userid`, `testimony`, `created_date`, `status`) VALUES ('1', '1', 'As a teenager, I was very depressed. I wanted to die. I experienced suicidal ideation. I ended up in the hospital for 10 days and was diagnosed with manic depression or bipolar disorder.', 'January 20, 2020, 6:13 am', '0');
INSERT INTO `testimonies` (`id`, `userid`, `testimony`, `created_date`, `status`) VALUES ('3', '1', 'You are not alone if you have ever wondered about the meaning of life or about the purpose of your own. Here are the testimonies of some who received answers to these questions.', 'January 20, 2020, 12:56 pm', '0');
INSERT INTO `testimonies` (`id`, `userid`, `testimony`, `created_date`, `status`) VALUES ('4', '1', 'I grew up in a Christian background, but I never had a personal relationship with God. I didn’t always live a life that was pleasing to God.\r\n\r\nIn 2008, during my second year studying Sport Science at the University of KwaZulu Natal in South Africa, I met two American students. They were part of a Cru summer project and were supposed to leave our campus at 3:30pm that day.\r\n\r\nBut at 3:20pm, they thought they could still have just one more conversation.\r\n\r\nThat conversation was with me, Mdu and Sbu, two friends who studied with me.\r\n\r\nThey shared a booklet called How to Know God personally, and for the first time I understood that God wants a personal relationship with me. It wasn’t about religion or going to church with my family; it was about relationship.', 'January 20, 2020, 1:02 pm', '1');
INSERT INTO `testimonies` (`id`, `userid`, `testimony`, `created_date`, `status`) VALUES ('5', '2', 'Thank you God, for completing Kingdom life Outreaches web app.', 'January 22, 2020, 4:16 pm', '0');

INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('1', '0', 'Okoro Thankgod', 'okorothankgod@gmail.com', '09022001100', 'Ghana', 'Every morning lean your arms awhile upon the windowsill of heaven and gaze upon the Lord. Then with the vision in your heart, turn strong to meet your day.', 'January 20, 2020, 11:09 am', '0');
INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('2', '0', 'Henry Ndubisi', 'henry@hotmail.com', '09022001100', 'Nigeria', 'Even when I walk through the darkest valley, I will not be afraid, for you are close beside me. Your rod and your staff protect and comfort me.', 'January 20, 2020, 11:55 am', '0');
INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('3', '0', 'Rume Frank', 'rume@gmail.com', '08050440030', 'Ghana', 'My name is Rume our family has been through much losing 2 family members in 10 months financial issues 2 house hold members being out of work because of surgery ANXIETY stress fears of whatever dear friends with health problems having to live in their car and trying to make it PLEASE PLEASE PLEASE ANY PRAYERS ARE DEARLY APPRECIATED AND WELCOME.AMEN GOD BLESS', 'January 20, 2020, 12:00 pm', '0');
INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('4', '0', 'Cynthia mongan', 'cynthia.millioniare@gmail.com', '070220031003', 'Ghana', 'My name Cynthia mongan\r\nMy husband name-Moumita mondal\r\nFrom India kolkata\r\nPlease pray for my wife my wife break my relationship god change my wife and return back my home i am very very sad and cry i am not well.', 'January 20, 2020, 12:06 pm', '0');
INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('5', '0', 'Cachy Sopideri', 'cachy@gmail.com', '070607700660', 'Nigeria', 'My name is cachy I would like to ask for prayer for me, my marriage, my kids, and my family...and for spiritual peace', 'January 20, 2020, 12:31 pm', '0');
INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('6', '0', 'Ike Ikechukwu', 'ike@gmail.com', '09045005000', 'Nigeria', 'God help me with brain and good eyes', 'January 20, 2020, 1:16 pm', '0');
INSERT INTO `visitorprayerRequest` (`id`, `userid`, `fullname`, `email`, `phone`, `country`, `prayer`, `created_date`, `status`) VALUES ('7', '0', 'Okoro Thankgod', 'com.zubbey@hotmail.com', '09022993310', 'Nigeria', 'testing', 'January 20, 2020, 2:12 pm', '0');




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;