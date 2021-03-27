<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!$CI->db->table_exists(db_prefix() . 'boletos')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "boletos` (
  `boletoid` int(11) NOT NULL,
  `our_number` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `clientnote` text NOT NULL,
  `doc_number` int(11) NOT NULL,
  `datecreated` date NOT NULL,
  `duedate` date NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');

    $CI->db->query('ALTER TABLE `' . db_prefix() . 'boletos`
  ADD PRIMARY KEY (`boletoid`),
  ADD KEY `clientid` (`clientid`);');

    $CI->db->query('ALTER TABLE `' . db_prefix() . 'boletos`
  MODIFY `boletoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1');
}
