
-- Transforma a chave primaria em AutoIncremental
ALTER TABLE `j17_equipamento` CHANGE `idEquipamento` `idEquipamento` INT(11) NOT NULL AUTO_INCREMENT;