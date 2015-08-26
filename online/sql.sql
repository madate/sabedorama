DROP TABLE IF EXISTS `acessos_online`;
CREATE TABLE IF NOT EXISTS `acessos_online` (
  `ip` varchar(255) NOT NULL default '',
  `TIME` int(12) NOT NULL default '0'
);