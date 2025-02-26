DELETE FROM `#__dataset_foreign` WHERE `map` LIKE 'created';
/* CONDITIONINDEX||dataset_foreign||UK_dataset_foreign_feid_dbtid_red_dbtid */ ALTER TABLE `#__dataset_foreign` DROP INDEX `UK_dataset_foreign_feid_dbtid_red_dbtid`, ADD UNIQUE `UK_dataset_foreign_dbtid_red_dbtid_map_map2` (`dbtid`, `ref_dbtid`, `map`, `map2`) USING BTREE;
/* CONDITIONINDEX||dataset_foreign||IX_dataset_foreign_publish_ref_feid */ ALTER TABLE `#__dataset_foreign` DROP INDEX `IX_dataset_foreign_publish_ref_feid`, ADD INDEX `IX_dataset_foreign_publish` (`publish`);
ALTER TABLE `#__dataset_foreign` ADD UNIQUE `UK_dataset_foreign_namekey` (`namekey`(50));
DELETE FROM `#__dataset_foreign` WHERE `namekey` = 'FK_product_pricetrans_pricetype';
DELETE FROM `#__dataset_foreign` WHERE `namekey` = 'FK_product_price_pricetype';