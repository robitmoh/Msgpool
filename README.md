# Msgpool plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require your-name-here/Msgpool
```




CREATE TABLE `msgpool_msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `sender_point` varchar(45) DEFAULT NULL,
  `source` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `msg` text,
  `msg_type` varchar(45) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

CREATE TABLE `msgpool_subscribes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `sender_point` varchar(45) DEFAULT NULL,
  `source` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `grouping` varchar(45) DEFAULT NULL,
  `msgpool_action_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `msgpool_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;





