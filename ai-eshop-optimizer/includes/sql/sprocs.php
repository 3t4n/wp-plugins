<?php
// Create the functions and  stored procedures upon activation of the plugin
if (!defined('ABSPATH')) exit; // Exit if accessed directly
// Part 1: Create necessary tables

function aieo_create_temp_orders_table($temp_orders_table_name)
{
    global $wpdb;

    // Define basic table structure
    $sql_table = "CREATE TABLE IF NOT EXISTS {$temp_orders_table_name} (
        `Id` int(11) NOT NULL AUTO_INCREMENT,
        `OrderId` bigint(20) unsigned NOT NULL,
        `OrderStatus` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `SKU` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `ProductId` int(11) DEFAULT NULL,
        `ParentProductId` int(11) DEFAULT NULL,
        `CategoryId` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `TagId` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `OrderDate` datetime DEFAULT NULL,
        `PrimaryQty` int(11) DEFAULT NULL,
        `ItemSequence` bigint(21) unsigned NOT NULL DEFAULT '0',
        `Stock` int(11) DEFAULT NULL,
        `OrderSize` bigint(21) DEFAULT '0',
        `EngagementTime` int(11) DEFAULT NULL,
        `JourneyLinearWeight` decimal(25,4) DEFAULT NULL,
        `AnonymousWeight` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        `Price` decimal(10,2) DEFAULT NULL,
        `LineValue` decimal(10,2) DEFAULT NULL,
        `OrderItemsTotal` decimal(10,2) DEFAULT NULL,
        `ValueLinearWeight` decimal(10,4) DEFAULT NULL,
        `CurrentPrice` decimal(10,2) DEFAULT NULL,
        `CurrentRegularPrice` decimal(10,2) DEFAULT NULL,
        `ItemName` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `ParentItemName` longtext COLLATE utf8mb4_unicode_ci,
        `ItemNameDiff` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `TotalItemSales` int(11) DEFAULT NULL,
        `DistinctOrderSales` int(11) DEFAULT NULL,
        `TotalTurnover` decimal(10,2) DEFAULT NULL,
        `UniqueItemSales` int(11) DEFAULT NULL,
        `FirstItemSales` int(11) DEFAULT NULL,
        `LastItemSales` int(11) DEFAULT NULL,
        `AvgJLW` decimal(10,7) DEFAULT NULL,
        `AvgVLW` decimal(10,7) DEFAULT NULL,
        `ProfitabilityIndex` int(11) DEFAULT NULL,
        `BrandId` int(11) DEFAULT NULL,
        `Brand` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `BrandAvgJLW` decimal(10,7) DEFAULT NULL,
        `BrandAvgVLW` decimal(10,7) DEFAULT NULL,
        `BrandTotalTurnover` decimal(10,7) DEFAULT NULL,
        `ContentWordCount` int(11) DEFAULT NULL,
        `ContentIntro` longtext COLLATE utf8mb4_unicode_ci,
        `ContentIntroPlain` longtext COLLATE utf8mb4_unicode_ci,
        `ContentSentimentArray` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `ContentViews` int(11) DEFAULT NULL,
        `ContentCreated` datetime DEFAULT CURRENT_TIMESTAMP,
        `ContentLastUpdated` datetime DEFAULT CURRENT_TIMESTAMP,
        `ContentIncoming` int(11) DEFAULT NULL,
        `ContentOutgoing` int(11) DEFAULT NULL,
        `ContentCorIndex` decimal(10,7) DEFAULT NULL,
        `CategoryName` longtext COLLATE utf8mb4_unicode_ci,
        `CategoryCorIndex` decimal(10,7) DEFAULT NULL,
        `TagName` longtext COLLATE utf8mb4_unicode_ci,
        `TagCorIndex` decimal(10,7) DEFAULT NULL,
        `KeyVerb` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `KeySentimentArray` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `EponymousID` int(11) DEFAULT NULL,
        `AvgOrderSize` DECIMAL(10,4) DEFAULT NULL,
        `MaxOrderSize` int(11) DEFAULT NULL,
        `MinOrderSize` int(11)  DEFAULT NULL,
        `SDOrderSize` DECIMAL(10,7) DEFAULT NULL, 
        `zOrderSize` DECIMAL(10,7) DEFAULT NULL, 
        `AvgSpend` decimal(10,2) DEFAULT NULL,
        `MaxSpend` decimal(10,2) DEFAULT NULL,
        `MinSpend` decimal(10,2) DEFAULT NULL,
        `SDSpend` DECIMAL(10,7) DEFAULT NULL,
        `zSpend` DECIMAL(10,7) DEFAULT NULL,
        `TotalCustomerItems` int(11) DEFAULT NULL,
        `TotalCustomerOrders` int(11) DEFAULT NULL,
        `TotalCustomerTurnover` decimal(10,2) DEFAULT NULL,
        `Fav1Product` int(11) DEFAULT NULL,
        `Fav2Product` int(11) DEFAULT NULL,
        `Fav3Product` int(11) DEFAULT NULL,
        `LastOrderSpend` DECIMAL(10,4) DEFAULT NULL,
        `CurrentDBO` INT DEFAULT NULL,
        `AvgDBO` DECIMAL(10,4) DEFAULT NULL,
        `MaxDBO` INT DEFAULT NULL,
        `MinDBO` INT DEFAULT NULL,
        `SDDBO` DECIMAL(10,7) DEFAULT NULL,  
        `zDBO` DECIMAL(10,7) DEFAULT NULL,
        `maDBO` DECIMAL(10,7) DEFAULT NULL,
        `Seasonality` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        `PartnerId` int(11) DEFAULT NULL,
        `OriginId` int(11) DEFAULT NULL,
        `OriginType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `EventId` int(11) DEFAULT NULL,
        `EventType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `EventLocation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `AffiliateId` int(11) DEFAULT NULL,
        `GASource` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `GAMedium` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `GACampaign` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `GAContent` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `GATerm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `GABrand` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `CustomerDevice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `CustomerSegment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `CustomerFeedback` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `CustomerFeedforward` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `JourneyEventsArray` tinytext COLLATE utf8mb4_unicode_ci,
        `JourneyDuration` int(11) DEFAULT NULL,
        `HitType` int(11) DEFAULT NULL,
        `HitRate` decimal(10,7) DEFAULT NULL,
        `Velocity` decimal(10,7) DEFAULT NULL,
        `Momentum` decimal(10,7) DEFAULT NULL,
        `Closeness` decimal(10,7) DEFAULT NULL,
        `AdamicAdar` decimal(10,7) DEFAULT NULL,
        `Jaccard` decimal(10,7) DEFAULT NULL,
        `Louvain` decimal(10,7) DEFAULT NULL,
        `BFS` decimal(10,7) DEFAULT NULL,
        `MotivesArray` decimal(10,7) DEFAULT NULL,
        `CalabiYau` decimal(10,7) DEFAULT NULL,
        `Perspective` varchar(230) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        `Transparency` decimal(10,7) DEFAULT NULL,
        `ABTesting` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        `Neo4jParams` tinytext COLLATE utf8mb4_unicode_ci,
        `OrderIdGraphUUID` CHAR(36),
        `OrderItemIdGraphUUID` CHAR(36),
        `PPIdGraphUUID` CHAR(36),
        `ProdIdGraphUUID` CHAR(36),
        `EpoIdGraphUUID` CHAR(36),
        `O_PP_GraphUUID` CHAR(36),
        `O_PP_Freq` INT,
        `O_Prod_GraphUUID` CHAR(36),
        `O_Prod_Freq` INT,
        `O_Epo_GraphUUID` CHAR(36),
        `O_Epo_Freq` INT,
        `PP_Epo_GraphUUID` CHAR(36),
        `PP_Epo_Freq` INT,
        `Prod_Epo_GraphUUID` CHAR(36),
        `Prod_Epo_Freq` INT,
        PRIMARY KEY (`Id`)
    ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;";

    // Create or update table using dbDelta for basic structure
    // dbDelta($sql_table);  
    $wpdb->query($sql_table);

    // Define array of index creation statements
    $index_sql = array(
        "aieo_idx_orderid_orders ON {$temp_orders_table_name}  (OrderId)",
        "aieo_idx_productid_orders ON {$temp_orders_table_name}  (ProductId)",
        "aieo_idx_parentproductid_orders ON {$temp_orders_table_name}  (ParentProductId)",
        "aieo_idx_brandid_orders ON {$temp_orders_table_name}  (BrandId)",
        "aieo_idx_eponymousid_orders ON {$temp_orders_table_name}  (EponymousID)"
    );

    // Iterate through index creation statements and execute them
    foreach ($index_sql as $index) {
        $wpdb->query("CREATE INDEX $index;");
    }
}



function aieo_create_temp_products_table($temp_products_table_name)
{
  global $wpdb;
 
  $sql_table = "CREATE TABLE IF NOT EXISTS {$temp_products_table_name}  (
    `Id` int(11) NOT NULL AUTO_INCREMENT,
    `OrderId` bigint(20) unsigned NOT NULL,
    `OrderStatus` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `SKU` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `ProductId` int(11) DEFAULT NULL,
    `ParentProductId` int(11) DEFAULT NULL,
    `CategoryId` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `TagId` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `OrderDate` datetime DEFAULT NULL,
    `PrimaryQty` int(11) DEFAULT NULL,
    `ItemSequence` bigint(21) unsigned NOT NULL DEFAULT '0',
    `Stock` int(11) DEFAULT NULL,
    `OrderSize` bigint(21) DEFAULT '0',
    `EngagementTime` int(11) DEFAULT NULL,
    `JourneyLinearWeight` decimal(25,4) DEFAULT NULL,
    `AnonymousWeight` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `Price` decimal(10,2) DEFAULT NULL,
    `LineValue` decimal(10,2) DEFAULT NULL,
    `OrderItemsTotal` decimal(10,2) DEFAULT NULL,
    `ValueLinearWeight` decimal(10,4) DEFAULT NULL,
    `CurrentPrice` decimal(10,2) DEFAULT NULL,
    `CurrentRegularPrice` decimal(10,2) DEFAULT NULL,
    `ItemName` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `ParentItemName` longtext COLLATE utf8mb4_unicode_ci,
    `ItemNameDiff` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `TotalItemSales` int(11) DEFAULT NULL,
    `DistinctOrderSales` int(11) DEFAULT NULL,
    `TotalTurnover` decimal(10,2) DEFAULT NULL,
    `UniqueItemSales` int(11) DEFAULT NULL,
    `FirstItemSales` int(11) DEFAULT NULL,
    `LastItemSales` int(11) DEFAULT NULL,
    `AvgJLW` decimal(10,7) DEFAULT NULL,
    `AvgVLW` decimal(10,7) DEFAULT NULL,
    `ProfitabilityIndex` int(11) DEFAULT NULL,
    `BrandId` int(11) DEFAULT NULL,
    `Brand` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `BrandAvgJLW` decimal(10,7) DEFAULT NULL,
    `BrandAvgVLW` decimal(10,7) DEFAULT NULL,
    `BrandTotalTurnover` decimal(10,7) DEFAULT NULL,
    `ContentWordCount` int(11) DEFAULT NULL,
    `ContentIntro` longtext COLLATE utf8mb4_unicode_ci,
    `ContentIntroPlain` longtext COLLATE utf8mb4_unicode_ci,
    `ContentSentimentArray` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `ContentViews` int(11) DEFAULT NULL,
    `ContentCreated` datetime DEFAULT CURRENT_TIMESTAMP,
    `ContentLastUpdated` datetime DEFAULT CURRENT_TIMESTAMP,
    `ContentIncoming` int(11) DEFAULT NULL,
    `ContentOutgoing` int(11) DEFAULT NULL,
    `ContentCorIndex` decimal(10,7) DEFAULT NULL,
    `CategoryName` longtext COLLATE utf8mb4_unicode_ci,
    `CategoryCorIndex` decimal(10,7) DEFAULT NULL,
    `TagName` longtext COLLATE utf8mb4_unicode_ci,
    `TagCorIndex` decimal(10,7) DEFAULT NULL,
    `KeyVerb` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `KeySentimentArray` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `EponymousID` int(11) DEFAULT NULL,
    `AvgOrderSize` DECIMAL(10,4) DEFAULT NULL,
    `MaxOrderSize` int(11) DEFAULT NULL,
    `MinOrderSize` int(11)  DEFAULT NULL,
    `SDOrderSize` DECIMAL(10,7) DEFAULT NULL, 
    `zOrderSize` DECIMAL(10,7) DEFAULT NULL, 
    `AvgSpend` decimal(10,2) DEFAULT NULL,
    `MaxSpend` decimal(10,2) DEFAULT NULL,
    `MinSpend` decimal(10,2) DEFAULT NULL,
    `SDSpend` DECIMAL(10,7) DEFAULT NULL,
    `zSpend` DECIMAL(10,7) DEFAULT NULL,
    `TotalCustomerItems` int(11) DEFAULT NULL,
    `TotalCustomerOrders` int(11) DEFAULT NULL,
    `TotalCustomerTurnover` decimal(10,2) DEFAULT NULL,
    `Fav1Product` int(11) DEFAULT NULL,
    `Fav2Product` int(11) DEFAULT NULL,
    `Fav3Product` int(11) DEFAULT NULL,
    `LastOrderSpend` DECIMAL(10,4) DEFAULT NULL,
    `CurrentDBO` INT DEFAULT NULL,
    `AvgDBO` DECIMAL(10,4) DEFAULT NULL,
    `MaxDBO` INT DEFAULT NULL,
    `MinDBO` INT DEFAULT NULL,
    `SDDBO` DECIMAL(10,7) DEFAULT NULL,  
    `zDBO` DECIMAL(10,7) DEFAULT NULL,
    `maDBO` DECIMAL(10,7) DEFAULT NULL,
    `Seasonality` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `PartnerId` int(11) DEFAULT NULL,
    `OriginId` int(11) DEFAULT NULL,
    `OriginType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `EventId` int(11) DEFAULT NULL,
    `EventType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `EventLocation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `AffiliateId` int(11) DEFAULT NULL,
    `GASource` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `GAMedium` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `GACampaign` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `GAContent` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `GATerm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `GABrand` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `CustomerDevice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `CustomerSegment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `CustomerFeedback` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `CustomerFeedforward` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `JourneyEventsArray` tinytext COLLATE utf8mb4_unicode_ci,
    `JourneyDuration` int(11) DEFAULT NULL,
    `HitType` int(11) DEFAULT NULL,
    `HitRate` decimal(10,7) DEFAULT NULL,
    `Velocity` decimal(10,7) DEFAULT NULL,
    `Momentum` decimal(10,7) DEFAULT NULL,
    `Closeness` decimal(10,7) DEFAULT NULL,
    `AdamicAdar` decimal(10,7) DEFAULT NULL,
    `Jaccard` decimal(10,7) DEFAULT NULL,
    `Louvain` decimal(10,7) DEFAULT NULL,
    `BFS` decimal(10,7) DEFAULT NULL,
    `MotivesArray` decimal(10,7) DEFAULT NULL,
    `CalabiYau` decimal(10,7) DEFAULT NULL,
    `Perspective` varchar(230) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `Transparency` decimal(10,7) DEFAULT NULL,
    `ABTesting` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `Neo4jParams` tinytext COLLATE utf8mb4_unicode_ci,
    `OrderIdGraphUUID` CHAR(36),              -- UUID for distinct OrderId
    `OrderItemIdGraphUUID` CHAR(36),              -- UUID for distinct OrderId
    `PPIdGraphUUID` CHAR(36),                 -- UUID for distinct ParentProductId
    `ProdIdGraphUUID` CHAR(36),               -- UUID for distinct ProductId
    `EpoIdGraphUUID` CHAR(36),                -- UUID for distinct EponymousId
    `O_PP_GraphUUID` CHAR(36),                -- UUID for distinct relation between OrderId and ParentProductId
    `O_PP_Freq` INT,                -- UUID for distinct relation between OrderId and ParentProductId
    `O_Prod_GraphUUID` CHAR(36),              -- UUID for distinct relation between OrderId and ProductId
    `O_Prod_Freq` INT,
    `O_Epo_GraphUUID` CHAR(36),                -- UUID for distinct relation between OrderId and EponymousId
    `O_Epo_Freq` INT,
    `PP_Epo_GraphUUID` CHAR(36),              -- UUID for distinct relation between ParentProductId and EponymousId
    `PP_Epo_Freq` INT,
    `Prod_Epo_GraphUUID` CHAR(36),            -- UUID for distinct relation between ProductId and EponymousId
    `Prod_Epo_Freq` INT,
    PRIMARY KEY (`Id`)
   ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;";

  // dbDelta($sql_table);  
  $wpdb->query($sql_table);


  $index_sql = array(
    "aieo_idx_productid_products ON {$temp_products_table_name}  (ProductId)",
    "aieo_idx_parentproductid_products ON {$temp_products_table_name}  (ParentProductId)",
    "aieo_idx_brandid_products ON {$temp_products_table_name}  (BrandId)"
);

// Iterate through index creation statements and execute them
foreach ($index_sql as $index) {
    $wpdb->query("CREATE INDEX $index;");
}
}

// Part 2: Create Necessary Functions

function aieo_create_function_AIEO_StripHTML()
{
  global $wpdb;

  $sql = "CREATE FUNCTION AIEO_StripHTML(input TEXT) RETURNS TEXT
DETERMINISTIC READS SQL DATA
BEGIN
    DECLARE start INT DEFAULT 0;
    DECLARE end INT DEFAULT 0;
    DECLARE length INT DEFAULT 0;

    SET input = REPLACE(input, '\n', ' ');  -- Handle new lines
    SET input = REPLACE(input, '\r', '');  -- Handle carriage returns

    loop_label: LOOP
        SET start = LOCATE('<', input);
        IF start = 0 THEN
            LEAVE loop_label;
        END IF;
        SET end = LOCATE('>', input, start);
        SET length = (end - start) + 1;
        SET input = INSERT(input, start, length, '');
    END LOOP loop_label;

    RETURN TRIM(input);

END;
";

  $wpdb->query($sql);
}




function aieo_create_function_AIEO_CountWords()
{
  global $wpdb;

  $sql = "CREATE FUNCTION AIEO_CountWords(input_text TEXT) RETURNS INT
    DETERMINISTIC READS SQL DATA
    BEGIN
        DECLARE wordCount INT;
    
        -- Remove leading and trailing spaces
        SET input_text = TRIM(input_text);
    
        -- Count spaces and add 1 to get word count
        SET wordCount = LENGTH(input_text) - LENGTH(REPLACE(input_text, ' ', '')) + 1;
    
        -- If the text is empty, we should return 0
        IF LENGTH(input_text) = 0 THEN
            SET wordCount = 0;
        END IF;
    
        RETURN wordCount;
    END;
";

  $wpdb->query($sql);
}

function aieo_create_function_AIEO_CountLinks()
{
  global $wpdb;

  $sql = "CREATE FUNCTION AIEO_CountLinks(input_text TEXT) RETURNS INT
    DETERMINISTIC READS SQL DATA
    BEGIN
        DECLARE linkCount INT;
    
        SET linkCount = (LENGTH(input_text) - LENGTH(REPLACE(input_text, '<a', ''))) / LENGTH('<a');
    
        RETURN linkCount;
    END;
";

  $wpdb->query($sql);
}


// Part 3:  Create necessary Procedures


function aieo_create_sp_UpdateProductCentricStats($sp_prefix)
{
  global $wpdb;

  $sp_name = $sp_prefix . "AIEO_UpdateProductCentricStats";


  // Create procedure
  $create_sql = "CREATE PROCEDURE $sp_name(IN target_table_name VARCHAR(255), IN use_product_id TINYINT)
        BEGIN
          DECLARE column_id VARCHAR(255);
          SET column_id = IF(use_product_id = 1, 'ProductId', 'ParentProductId');
  
          
          -- Update TotalItemSales

          SET @sql = CONCAT('UPDATE ', target_table_name, ' AS t1 
          INNER JOIN (
              SELECT ', column_id, ', SUM(PrimaryQty) AS TotalItemSales
              FROM ', target_table_name, '
              GROUP BY ', column_id, '
          ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
          SET t1.TotalItemSales = t2.TotalItemSales;
          ');

          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;
          
          -- Update DistinctOrderSales
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', COUNT(DISTINCT OrderId) AS DistinctOrderSales
                  FROM ', target_table_name, '
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.DistinctOrderSales = t2.DistinctOrderSales;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

          -- Update TotalTurnover
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', SUM(PrimaryQty * Price) AS TotalTurnover
                  FROM ', target_table_name, '
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.TotalTurnover = t2.TotalTurnover;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

          -- Update UniqueItemSales with ItemSequence = 1 AND OrderSize = 1
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', COUNT(DISTINCT OrderId) AS UniqueItemSales
                  FROM ', target_table_name, '
                  WHERE ItemSequence = 1 AND OrderSize = 1
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.UniqueItemSales = t2.UniqueItemSales;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

          -- Update FirstItemSales with ItemSequence = 1
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', COUNT(DISTINCT OrderId) AS FirstItemSales
                  FROM ', target_table_name, '
                  WHERE ItemSequence = 1
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.FirstItemSales = t2.FirstItemSales;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

          -- Update LastItemSales with ItemSequence = OrderSize
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', COUNT(DISTINCT OrderId) AS LastItemSales
                  FROM ', target_table_name, '
                  WHERE ItemSequence = OrderSize
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.LastItemSales = t2.LastItemSales;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

          -- Update AvgJLW
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', AVG(JourneyLinearWeight) AS AvgJLWValue
                  FROM ', target_table_name, '
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.AvgJLW = t2.AvgJLWValue;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

          -- Update AvgVLW
          SET @sql = CONCAT('
              UPDATE ', target_table_name, ' AS t1
              INNER JOIN (
                  SELECT ', column_id, ', AVG(ValueLinearWeight) AS AvgVLWValue
                  FROM ', target_table_name, '
                  GROUP BY ', column_id, '
              ) AS t2 ON t1.', column_id, ' = t2.', column_id, '
              SET t1.AvgVLW = t2.AvgVLWValue;
          ');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;


          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;

      END;
";

  $wpdb->query($create_sql);
}




function aieo_create_sp_AIEO_UpdateCustomerCentricStdStats($sp_prefix, $sp_orders_table)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE {$sp_prefix}AIEO_UpdateCustomerCentricStdStats(IN target_table_name VARCHAR(255), IN use_product_id TINYINT)
      BEGIN
          DECLARE column_id VARCHAR(255);
          SET column_id = IF(use_product_id = 1, 'ProductId', 'ParentProductId');
          
          -- Basic statistics regarding order size and spend
          SET @sql = CONCAT('UPDATE ', target_table_name, ' AS t1 
              INNER JOIN (
                  SELECT EponymousId, 
                         AVG(OrderSize) AS AvgOrderSize, 
                         MAX(OrderSize) AS MaxOrderSize, 
                         MIN(OrderSize) AS MinOrderSize,
                         AVG(OrderItemsTotal) AS AvgSpend, 
                         MAX(OrderItemsTotal) AS MaxSpend, 
                         MIN(OrderItemsTotal) AS MinSpend
                  FROM ', target_table_name, ' 
                  WHERE EponymousId <> 0
                  GROUP BY EponymousId
              ) AS t2 ON t1.EponymousId = t2.EponymousId
              SET t1.AvgOrderSize = t2.AvgOrderSize,
                  t1.MaxOrderSize = t2.MaxOrderSize,
                  t1.MinOrderSize = t2.MinOrderSize,
                  t1.AvgSpend = t2.AvgSpend,
                  t1.MaxSpend = t2.MaxSpend,
                  t1.MinSpend = t2.MinSpend;');
          PREPARE stmt FROM @sql;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;
          
          -- Updating the total statistics
          SET @total_stats_sql = CONCAT('UPDATE ', target_table_name, ' AS t1 
    INNER JOIN (
        SELECT EponymousId, 
               SUM(PrimaryQty) AS TotalCustomerItems, 
               COUNT(DISTINCT OrderId) AS TotalCustomerOrders, 
               SUM(LineValue) AS TotalCustomerTurnover
        FROM ', target_table_name, ' 
        WHERE EponymousId <> 0
        GROUP BY EponymousId
    ) AS t2 ON t1.EponymousId = t2.EponymousId
    SET t1.TotalCustomerItems = t2.TotalCustomerItems,
        t1.TotalCustomerOrders = t2.TotalCustomerOrders,
        t1.TotalCustomerTurnover = t2.TotalCustomerTurnover;');
PREPARE stmt_total FROM @total_stats_sql;
EXECUTE stmt_total;
DEALLOCATE PREPARE stmt_total;


-- Define session variables for row numbering
SET @EponymousId = NULL, @row_num = 0;

DROP TEMPORARY TABLE IF EXISTS TopProductsTemp;
CREATE TEMPORARY TABLE TopProductsTemp (
    EponymousId INT,
    Fav1Product INT DEFAULT NULL,
    Fav2Product INT DEFAULT NULL,
    Fav3Product INT DEFAULT NULL
);

SET @sql = CONCAT('
    INSERT INTO TopProductsTemp (EponymousId, Fav1Product, Fav2Product, Fav3Product)
    SELECT 
        EponymousId,
        MAX(CASE WHEN RowNum = 1 THEN ParentProductId ELSE NULL END) AS Fav1Product,
        MAX(CASE WHEN RowNum = 2 THEN ParentProductId ELSE NULL END) AS Fav2Product,
        MAX(CASE WHEN RowNum = 3 THEN ParentProductId ELSE NULL END) AS Fav3Product
    FROM (
        SELECT 
            EponymousId, 
            ParentProductId,
            SUM(PrimaryQty) AS TotalQty,
            @row_num := IF(@EponymousId = EponymousId, @row_num + 1, 1) AS RowNum,
            @EponymousId := EponymousId
        FROM 
            ', target_table_name, '
        WHERE EponymousId <> 0
        GROUP BY 
            EponymousId, ParentProductId
        ORDER BY 
            EponymousId, TotalQty DESC
    ) AS DerivedTable
    WHERE 
        RowNum <= 3
    GROUP BY 
        EponymousId;
');

PREPARE stmt2 FROM @sql;
EXECUTE stmt2;
DEALLOCATE PREPARE stmt2;

-- Update the main table using data from the temporary table
SET @sql = CONCAT('
    UPDATE ', target_table_name, ' AS t1 
    INNER JOIN TopProductsTemp AS t2 ON t1.EponymousId = t2.EponymousId
    SET 
        t1.Fav1Product = t2.Fav1Product,
        t1.Fav2Product = t2.Fav2Product,
        t1.Fav3Product = t2.Fav3Product;
');

PREPARE stmt3 FROM @sql;
EXECUTE stmt3;
DEALLOCATE PREPARE stmt3;

      END
  ";

  // Run the SQL
  $wpdb->query($sql);
}


function aieo_create_sp_AIEO_UpdateCustomerCentricAdvStats($sp_prefix, $sp_orders_table)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE {$sp_prefix}AIEO_UpdateCustomerCentricAdvStats(IN target_table_name VARCHAR(255), IN use_product_id TINYINT)
BEGIN
    DECLARE column_id VARCHAR(255);
    SET column_id = IF(use_product_id = 1, 'ProductId', 'ParentProductId');

    -- Create a temporary table with a row number
    SET @sql = CONCAT('
        CREATE TEMPORARY TABLE temp_orders_with_row_num AS
        SELECT *, ROW_NUMBER() OVER (PARTITION BY EponymousId ORDER BY OrderDate) AS rn
        FROM ', target_table_name, '
        WHERE EponymousId <> 0;
    ');

    PREPARE temp_stmt FROM @sql;
    EXECUTE temp_stmt;
    DEALLOCATE PREPARE temp_stmt;

    -- Create a copy of the temporary table to avoid self-join issues
    CREATE TEMPORARY TABLE temp_orders_with_row_num_copy AS SELECT * FROM temp_orders_with_row_num;

    -- Compute order-based stats and spend stats using the temporary tables
    SET @sql = CONCAT('
    UPDATE `', target_table_name, '` AS t1
INNER JOIN (
    SELECT a.EponymousId,
           AVG(DATEDIFF(a.OrderDate, b.OrderDate)) AS AvgDBO,
           MAX(CASE WHEN DATEDIFF(a.OrderDate, b.OrderDate) <> 0 THEN DATEDIFF(a.OrderDate, b.OrderDate) ELSE NULL END) AS MaxDBO,
           MIN(CASE WHEN DATEDIFF(a.OrderDate, b.OrderDate) <> 0 THEN DATEDIFF(a.OrderDate, b.OrderDate) ELSE NULL END) AS MinDBO,
           DATEDIFF(NOW(), MAX(a.OrderDate)) AS CurrentDBO,
           STDDEV(DATEDIFF(a.OrderDate, b.OrderDate)) AS SDDBO,
           FIRST_VALUE(a.OrderItemsTotal) OVER (PARTITION BY a.EponymousId ORDER BY a.OrderDate DESC) AS LastOrderSpend
    FROM temp_orders_with_row_num AS a
    LEFT JOIN temp_orders_with_row_num_copy AS b ON a.EponymousId = b.EponymousId AND a.rn = b.rn + 1
    WHERE a.EponymousId <> 0
    GROUP BY a.EponymousId
) AS t2 ON t1.EponymousId = t2.EponymousId
SET 
    t1.AvgDBO = t2.AvgDBO,
    t1.MaxDBO = t2.MaxDBO,
    t1.MinDBO = t2.MinDBO,
    t1.CurrentDBO = t2.CurrentDBO,
    t1.SDDBO = t2.SDDBO,
    t1.zDBO = (t2.CurrentDBO - t2.AvgDBO) / t2.SDDBO,
    t1.LastOrderSpend = t2.LastOrderSpend;


    ');

    PREPARE stmt2 FROM @sql;
    EXECUTE stmt2;
    DEALLOCATE PREPARE stmt2;

    -- Cleanup temporary tables
    DROP TABLE IF EXISTS temp_orders_with_row_num;
    DROP TABLE IF EXISTS temp_orders_with_row_num_copy;
END;


  ";

  // Run the SQL query to create the procedure
  $wpdb->query($sql);
}


function aieo_create_sp_AIEO_GenerateGraphDBUUIDFreqs($sp_prefix)
{
  global $wpdb;

  $procedure_name = "{$sp_prefix}AIEO_GenerateGraphDBUUIDFreqs";

  $sql = "CREATE PROCEDURE {$procedure_name}(IN target_table_name VARCHAR(255))
  BEGIN
-- O_PP_Freq based on O_PP_GraphUUID:

SET @sql37 = CONCAT('UPDATE ', target_table_name, ' t1 
    JOIN (
        SELECT Prod_Epo_GraphUUID, COUNT(*) as FreqCount
        FROM ', target_table_name, '
        GROUP BY Prod_Epo_GraphUUID
    ) t2 ON t1.Prod_Epo_GraphUUID = t2.Prod_Epo_GraphUUID
    SET t1.Prod_Epo_Freq = t2.FreqCount;');
PREPARE stmt37 FROM @sql37;
EXECUTE stmt37;
DEALLOCATE PREPARE stmt37;

-- O_PP_Freq based on O_PP_GraphUUID:
SET @sql38 = CONCAT('UPDATE ', target_table_name, ' t1 
    JOIN (
        SELECT O_PP_GraphUUID, COUNT(*) as FreqCount
        FROM ', target_table_name, '
        GROUP BY O_PP_GraphUUID
    ) t2 ON t1.O_PP_GraphUUID = t2.O_PP_GraphUUID
    SET t1.O_PP_Freq = t2.FreqCount;');
PREPARE stmt38 FROM @sql38;
EXECUTE stmt38;
DEALLOCATE PREPARE stmt38;

-- O_Prod_Freq based on O_Prod_GraphUUID:
SET @sql39 = CONCAT('UPDATE ', target_table_name, ' t1 
    JOIN (
        SELECT O_Prod_GraphUUID, COUNT(*) as FreqCount
        FROM ', target_table_name, '
        GROUP BY O_Prod_GraphUUID
    ) t2 ON t1.O_Prod_GraphUUID = t2.O_Prod_GraphUUID
    SET t1.O_Prod_Freq = t2.FreqCount;');
PREPARE stmt39 FROM @sql39;
EXECUTE stmt39;
DEALLOCATE PREPARE stmt39;


-- O_Epo_Freq based on O_Epo_GraphUUID:
SET @sql40 = CONCAT('UPDATE ', target_table_name, ' t1 
    JOIN (
        SELECT O_Epo_GraphUUID, COUNT(*) as FreqCount
        FROM ', target_table_name, '
        GROUP BY O_Epo_GraphUUID
    ) t2 ON t1.O_Epo_GraphUUID = t2.O_Epo_GraphUUID
    SET t1.O_Epo_Freq = t2.FreqCount;');
PREPARE stmt40 FROM @sql40;
EXECUTE stmt40;
DEALLOCATE PREPARE stmt40;

-- PP_Epo_Freq based on PP_Epo_GraphUUID:
SET @sql41 = CONCAT('UPDATE ', target_table_name, ' t1 
    JOIN (
        SELECT PP_Epo_GraphUUID, COUNT(*) as FreqCount
        FROM ', target_table_name, '
        GROUP BY PP_Epo_GraphUUID
    ) t2 ON t1.PP_Epo_GraphUUID = t2.PP_Epo_GraphUUID
    SET t1.PP_Epo_Freq = t2.FreqCount;');
PREPARE stmt41 FROM @sql41;
EXECUTE stmt41;
DEALLOCATE PREPARE stmt41;



SET @sql39 = CONCAT('UPDATE ', target_table_name, ' t1 
    JOIN (
        SELECT O_Prod_GraphUUID, COUNT(*) as FreqCount
        FROM ', target_table_name, '
        GROUP BY O_Prod_GraphUUID
    ) t2 ON t1.O_Prod_GraphUUID = t2.O_Prod_GraphUUID
    SET t1.O_Prod_Freq = t2.FreqCount;');
PREPARE stmt39 FROM @sql39;
EXECUTE stmt39;
DEALLOCATE PREPARE stmt39;

  END;


";

  // Run the SQL query to create the procedure
  $wpdb->query($sql);
}


function aieo_create_sp_AIEO_GenerateGraphDBUUIDs($sp_prefix)
{
  global $wpdb;

  $procedure_name = "{$sp_prefix}AIEO_GenerateGraphDBUUIDs";

  $sql = "CREATE PROCEDURE {$procedure_name}(IN target_table_name VARCHAR(255))
  BEGIN


  -- For EponymousId (EpoIdGraphUUID)
  SET @sql13 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs13 (
            originalValue BIGINT,
            generatedUUID CHAR(36)
        ) ENGINE=MEMORY;');
        PREPARE stmt13 FROM @sql13;
        EXECUTE stmt13;
        DEALLOCATE PREPARE stmt13;

        SET @sql14 = CONCAT('INSERT INTO tempUUIDs13 (originalValue, generatedUUID)
            SELECT DISTINCT EponymousId, UUID() 
            FROM ', target_table_name, ';');
        PREPARE stmt14 FROM @sql14;
        EXECUTE stmt14;
        DEALLOCATE PREPARE stmt14;

        SET @sql15 = CONCAT('UPDATE ', target_table_name, ' 
            JOIN tempUUIDs13 ON ', target_table_name, '.EponymousId = tempUUIDs13.originalValue 
            SET ', target_table_name, '.EpoIdGraphUUID = tempUUIDs13.generatedUUID;');
        PREPARE stmt15 FROM @sql15;
        EXECUTE stmt15;
        DEALLOCATE PREPARE stmt15;

        SET @sql16 = 'DROP TEMPORARY TABLE tempUUIDs13;';
        PREPARE stmt16 FROM @sql16;
        EXECUTE stmt16;
        DEALLOCATE PREPARE stmt16;


        
-- For O_Epo_GraphUUID (OrderId and EponymousId)
SET @sql25 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs25 (
    OrderIdValue BIGINT,
    EponymousIdValue BIGINT,
    generatedUUID CHAR(36)
) ENGINE=MEMORY;');
PREPARE stmt25 FROM @sql25;
EXECUTE stmt25;
DEALLOCATE PREPARE stmt25;

SET @sql26 = CONCAT('INSERT INTO tempUUIDs25 (OrderIdValue, EponymousIdValue, generatedUUID)
    SELECT DISTINCT OrderId, EponymousId, UUID() 
    FROM ', target_table_name, ' 
    WHERE EponymousId <> 0 AND EponymousId IS NOT NULL;');
PREPARE stmt26 FROM @sql26;
EXECUTE stmt26;
DEALLOCATE PREPARE stmt26;

SET @sql27 = CONCAT('UPDATE ', target_table_name, ' 
    JOIN tempUUIDs25 ON ', target_table_name, '.OrderId = tempUUIDs25.OrderIdValue AND ', target_table_name, '.EponymousId = tempUUIDs25.EponymousIdValue
    SET ', target_table_name, '.O_Epo_GraphUUID = tempUUIDs25.generatedUUID;');
PREPARE stmt27 FROM @sql27;
EXECUTE stmt27;
DEALLOCATE PREPARE stmt27;

SET @sql28 = 'DROP TEMPORARY TABLE tempUUIDs25;';
PREPARE stmt28 FROM @sql28;
EXECUTE stmt28;
DEALLOCATE PREPARE stmt28;

-- For PP_Epo_GraphUUID (ParentProductId and EponymousId)
SET @sql29 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs29 (
    ParentProductIdValue BIGINT,
    EponymousIdValue BIGINT,
    generatedUUID CHAR(36)
) ENGINE=MEMORY;');
PREPARE stmt29 FROM @sql29;
EXECUTE stmt29;
DEALLOCATE PREPARE stmt29;

SET @sql30 = CONCAT('INSERT INTO tempUUIDs29 (ParentProductIdValue, EponymousIdValue, generatedUUID)
    SELECT DISTINCT ParentProductId, EponymousId, UUID() 
    FROM ', target_table_name, ' 
    WHERE EponymousId <> 0 AND EponymousId IS NOT NULL;');
PREPARE stmt30 FROM @sql30;
EXECUTE stmt30;
DEALLOCATE PREPARE stmt30;

SET @sql31 = CONCAT('UPDATE ', target_table_name, ' 
    JOIN tempUUIDs29 ON ', target_table_name, '.ParentProductId = tempUUIDs29.ParentProductIdValue AND ', target_table_name, '.EponymousId = tempUUIDs29.EponymousIdValue
    SET ', target_table_name, '.PP_Epo_GraphUUID = tempUUIDs29.generatedUUID;');
PREPARE stmt31 FROM @sql31;
EXECUTE stmt31;
DEALLOCATE PREPARE stmt31;

SET @sql32 = 'DROP TEMPORARY TABLE tempUUIDs29;';
PREPARE stmt32 FROM @sql32;
EXECUTE stmt32;
DEALLOCATE PREPARE stmt32;

-- For Prod_Epo_GraphUUID (ProductId and EponymousId)
SET @sql33 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs33 (
    ProductIdValue BIGINT,
    EponymousIdValue BIGINT,
    generatedUUID CHAR(36)
) ENGINE=MEMORY;');
PREPARE stmt33 FROM @sql33;
EXECUTE stmt33;
DEALLOCATE PREPARE stmt33;

SET @sql34 = CONCAT('INSERT INTO tempUUIDs33 (ProductIdValue, EponymousIdValue, generatedUUID)
    SELECT DISTINCT ProductId, EponymousId, UUID() 
    FROM ', target_table_name, ' 
    WHERE EponymousId <> 0 AND EponymousId IS NOT NULL;');
PREPARE stmt34 FROM @sql34;
EXECUTE stmt34;
DEALLOCATE PREPARE stmt34;

SET @sql35 = CONCAT('UPDATE ', target_table_name, ' 
    JOIN tempUUIDs33 ON ', target_table_name, '.ProductId = tempUUIDs33.ProductIdValue AND ', target_table_name, '.EponymousId = tempUUIDs33.EponymousIdValue
    SET ', target_table_name, '.Prod_Epo_GraphUUID = tempUUIDs33.generatedUUID;');
PREPARE stmt35 FROM @sql35;
EXECUTE stmt35;
DEALLOCATE PREPARE stmt35;

SET @sql36 = 'DROP TEMPORARY TABLE tempUUIDs33;';
PREPARE stmt36 FROM @sql36;
EXECUTE stmt36;
DEALLOCATE PREPARE stmt36;
      

      -- For ParentProductId
      -- First set of operations


      SET @sql1 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs1 (
          originalValue BIGINT,
          generatedUUID CHAR(36)
      ) ENGINE=MEMORY;');
      PREPARE stmt1 FROM @sql1;
      EXECUTE stmt1;
      DEALLOCATE PREPARE stmt1;

      SET @sql2 = CONCAT('INSERT INTO tempUUIDs1 (originalValue, generatedUUID)
          SELECT DISTINCT ParentProductId, UUID() 
          FROM ', target_table_name, ';');
      PREPARE stmt2 FROM @sql2;
      EXECUTE stmt2;
      DEALLOCATE PREPARE stmt2;

      SET @sql3 = CONCAT('UPDATE ', target_table_name, ' 
          JOIN tempUUIDs1 ON ', target_table_name, '.ParentProductId = tempUUIDs1.originalValue 
          SET ', target_table_name, '.PPIdGraphUUID = tempUUIDs1.generatedUUID;');
      PREPARE stmt3 FROM @sql3;
      EXECUTE stmt3;
      DEALLOCATE PREPARE stmt3;

      SET @sql4 = 'DROP TEMPORARY TABLE tempUUIDs1;';
      PREPARE stmt4 FROM @sql4;
      EXECUTE stmt4;
      DEALLOCATE PREPARE stmt4;

      -- For OrderId
      SET @sql5 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs5 (
          originalValue BIGINT,
          generatedUUID CHAR(36)
      ) ENGINE=MEMORY;');
      PREPARE stmt5 FROM @sql5;
      EXECUTE stmt5;
      DEALLOCATE PREPARE stmt5;

      SET @sql6 = CONCAT('INSERT INTO tempUUIDs5 (originalValue, generatedUUID)
          SELECT DISTINCT OrderId, UUID() 
          FROM ', target_table_name, ';');
      PREPARE stmt6 FROM @sql6;
      EXECUTE stmt6;
      DEALLOCATE PREPARE stmt6;

      SET @sql7 = CONCAT('UPDATE ', target_table_name, ' 
          JOIN tempUUIDs5 ON ', target_table_name, '.OrderId = tempUUIDs5.originalValue 
          SET ', target_table_name, '.OrderIdGraphUUID = tempUUIDs5.generatedUUID;');
      PREPARE stmt7 FROM @sql7;
      EXECUTE stmt7;
      DEALLOCATE PREPARE stmt7;

      SET @sql8 = 'DROP TEMPORARY TABLE tempUUIDs5;';
      PREPARE stmt8 FROM @sql8;
      EXECUTE stmt8;
      DEALLOCATE PREPARE stmt8;

        -- For ProductId (ProdIdGraphUUID)
        SET @sql9 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs19 (
            originalValue BIGINT,
            generatedUUID CHAR(36)
        ) ENGINE=MEMORY;');
        PREPARE stmt9 FROM @sql9;
        EXECUTE stmt9;
        DEALLOCATE PREPARE stmt9;

        SET @sql10 = CONCAT('INSERT INTO tempUUIDs19 (originalValue, generatedUUID)
            SELECT DISTINCT ProductId, UUID() 
            FROM ', target_table_name, ';');
        PREPARE stmt10 FROM @sql10;
        EXECUTE stmt10;
        DEALLOCATE PREPARE stmt10;

        SET @sql11 = CONCAT('UPDATE ', target_table_name, ' 
            JOIN tempUUIDs19 ON ', target_table_name, '.ProductId = tempUUIDs19.originalValue 
            SET ', target_table_name, '.ProdIdGraphUUID = tempUUIDs19.generatedUUID;');
        PREPARE stmt11 FROM @sql11;
        EXECUTE stmt11;
        DEALLOCATE PREPARE stmt11;

        SET @sql12 = 'DROP TEMPORARY TABLE tempUUIDs19;';
        PREPARE stmt12 FROM @sql12;
        EXECUTE stmt12;
        DEALLOCATE PREPARE stmt12;

        
-- For O_PP_GraphUUID (OrderId and ParentProductId)
SET @sql17 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs17 (
            OrderIdValue BIGINT,
            ParentProductIdValue BIGINT,
            generatedUUID CHAR(36)
        ) ENGINE=MEMORY;');
        PREPARE stmt17 FROM @sql17;
        EXECUTE stmt17;
        DEALLOCATE PREPARE stmt17;

        SET @sql18 = CONCAT('INSERT INTO tempUUIDs17 (OrderIdValue, ParentProductIdValue, generatedUUID)
            SELECT DISTINCT OrderId, ParentProductId, UUID() 
            FROM ', target_table_name, ';');
        PREPARE stmt18 FROM @sql18;
        EXECUTE stmt18;
        DEALLOCATE PREPARE stmt18;

        SET @sql19 = CONCAT('UPDATE ', target_table_name, ' 
            JOIN tempUUIDs17 ON ', target_table_name, '.OrderId = tempUUIDs17.OrderIdValue AND ', target_table_name, '.ParentProductId = tempUUIDs17.ParentProductIdValue
            SET ', target_table_name, '.O_PP_GraphUUID = tempUUIDs17.generatedUUID;');
        PREPARE stmt19 FROM @sql19;
        EXECUTE stmt19;
        DEALLOCATE PREPARE stmt19;

        SET @sql20 = 'DROP TEMPORARY TABLE tempUUIDs17;';
        PREPARE stmt20 FROM @sql20;
        EXECUTE stmt20;
        DEALLOCATE PREPARE stmt20;

-- For O_Prod_GraphUUID (OrderId and ProductId)
SET @sql21 = CONCAT('CREATE TEMPORARY TABLE IF NOT EXISTS tempUUIDs_O_Prod (
    OrderIdValue BIGINT,
    ProductIdValue BIGINT,
    generatedUUID CHAR(36)
) ENGINE=MEMORY;');
PREPARE stmt21 FROM @sql21;
EXECUTE stmt21;
DEALLOCATE PREPARE stmt21;

SET @sql22 = CONCAT('INSERT INTO tempUUIDs_O_Prod (OrderIdValue, ProductIdValue, generatedUUID)
    SELECT DISTINCT OrderId, ProductId, UUID() 
    FROM ', target_table_name, ';');
PREPARE stmt22 FROM @sql22;
EXECUTE stmt22;
DEALLOCATE PREPARE stmt22;

SET @sql23 = CONCAT('UPDATE ', target_table_name, ' 
    JOIN tempUUIDs_O_Prod ON ', target_table_name, '.OrderId = tempUUIDs_O_Prod.OrderIdValue AND ', target_table_name, '.ProductId = tempUUIDs_O_Prod.ProductIdValue
    SET ', target_table_name, '.O_Prod_GraphUUID = tempUUIDs_O_Prod.generatedUUID;');
PREPARE stmt23 FROM @sql23;
EXECUTE stmt23;
DEALLOCATE PREPARE stmt23;





END";

  // Execute the SQL
  $wpdb->query($sql);
}



function aieo_create_sp_AIEO_UpdateOrdersWithUnsold($sp_prefix, $sp_orders_table, $sp_products_table)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_UpdateOrdersWithUnsold(OUT warning_message VARCHAR(255))
proc_label: BEGIN

  -- Check if the orders table is empty
  IF (SELECT COUNT(*) FROM $sp_orders_table) = 0 THEN
      SET warning_message = CONCAT('Warning: ', '$sp_orders_table', ' is empty. The operation cannot proceed.');
      LEAVE proc_label;
  END IF;

  START TRANSACTION;

  -- INSERT Operation
  INSERT INTO $sp_orders_table 
  (OrderStatus, SKU, ProductId, ParentProductId, CategoryId, TagId, CurrentPrice, CurrentRegularPrice, Stock, ItemName, ParentItemName, Brand, CategoryName, TagName, ContentIntro, ContentIntroPlain, ContentCreated, ContentLastUpdated)
  SELECT 
  st.OrderStatus, st.SKU, st.ProductId, st.ParentProductId, st.CategoryId, st.TagId, 
  st.CurrentPrice, st.CurrentRegularPrice, st.Stock, st.ItemName, st.ParentItemName, 
  st.Brand, st.CategoryName, st.TagName, st.ContentIntro, st.ContentIntroPlain, 
  st.ContentCreated, st.ContentLastUpdated
  FROM $sp_products_table st
  LEFT JOIN $sp_orders_table atot ON atot.ProductId = st.ProductId
  WHERE atot.ProductId IS NULL;

  -- UPDATE Operation
  UPDATE $sp_orders_table atot
  JOIN $sp_products_table st
  ON atot.ProductId = st.ProductId
  SET 
  atot.PPIdGraphUUID = st.PPIdGraphUUID,
  atot.ProdIdGraphUUID = st.ProdIdGraphUUID;

  COMMIT;

  -- Set the success message
  SET warning_message = ', and included the products that have no sales';

END;";

  $wpdb->query($sql);
}




function aieo_create_sp_AIEO_Orchestrate_all_non_HPOS_SPs($sp_prefix)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_Orchestrate_all_non_HPOS_SPs (  
    IN _price_sql_choice INT, 
    IN _text_sql_choice INT, 
    IN _full_text_sql_choice INT, 
    IN _eponymous_sql_choice INT, 
    IN _seasonality_sql_choice INT, 
    IN _order_id INT, 
    IN _max_records INT,
    IN _temp_orders_table_name VARCHAR(255),    
    IN _orders_table_name VARCHAR(255)         
)
BEGIN
    -- Call the first procedure
    CALL `" . $sp_prefix . "AIEO_Export_Orders_HPOS`(_price_sql_choice, _text_sql_choice, _full_text_sql_choice, _eponymous_sql_choice, _seasonality_sql_choice, _order_id, _max_records);

    -- Call the second procedure
    CALL `" . $sp_prefix . "AIEO_Create_Product_Catalogue_HPOS`(_price_sql_choice, _text_sql_choice, _full_text_sql_choice);

    -- Call the third procedure
    CALL `" . $sp_prefix . "AIEO_UpdateOrdersWithUnsold`();

    -- Call the fourth procedure with the provided table names
    CALL `" . $sp_prefix . "AIEO_RenameTable`(_temp_orders_table_name, _orders_table_name);  
    
END;
";

  $wpdb->query($sql);
}




function aieo_create_sp_AIEO_StripHTMLAndReplicateContentIntro($sp_prefix, $sp_orders_table)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_StripHTMLAndReplicateContentIntro()
  BEGIN
  
    -- Declare variables
    DECLARE v_done INT DEFAULT 0;
    DECLARE v_ProductId INT;
    DECLARE v_ContentIntro TEXT;
  
    -- Declare cursor for unique ProductIds
    DECLARE cur_ProductIds CURSOR FOR 
        SELECT DISTINCT ProductId 
        FROM $sp_orders_table; 
  
    -- Declare handlers
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = 1;
  
    -- Open the cursor
    OPEN cur_ProductIds;
  
    -- Start the loop
    read_loop: LOOP
    
        FETCH cur_ProductIds INTO v_ProductId;
  
        IF v_done THEN
            LEAVE read_loop;
        END IF;
  
        -- Start a transaction
        START TRANSACTION;
  
        -- Update ContentIntro for the first occurrence based on OrderId for the current ProductId
        UPDATE $sp_orders_table 
        SET ContentIntro = AIEO_StripHTML(ContentIntro)
        WHERE ProductId = v_ProductId
        ORDER BY OrderId ASC
        LIMIT 1;
  
        -- Fetch the updated value
        SELECT ContentIntro INTO v_ContentIntro
        FROM $sp_orders_table
        WHERE ProductId = v_ProductId
        LIMIT 1;
  
        -- Copy the value to other instances with different OrderId
        UPDATE $sp_orders_table
        SET ContentIntro = v_ContentIntro
        WHERE ProductId = v_ProductId;
  
        -- Commit the transaction
        COMMIT;
  
    END LOOP;
  
    -- Close the cursor
    CLOSE cur_ProductIds;
  
  END;
";

  $wpdb->query($sql);
}


function aieo_create_sp_AIEO_RenameTable($sp_prefix)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_RenameTable(IN oldTableName VARCHAR(255), IN newTableName VARCHAR(255))
  BEGIN
        -- Start transaction
        START TRANSACTION;
    
        -- Drop the table with new name if it already exists
        SET @drop_query = CONCAT('DROP TABLE IF EXISTS ', newTableName);
        PREPARE drop_stmt FROM @drop_query;
        EXECUTE drop_stmt;
        DEALLOCATE PREPARE drop_stmt;
    
        -- Rename the old table to the new table name
        SET @rename_query = CONCAT('RENAME TABLE ', oldTableName , ' TO ', newTableName);
        PREPARE rename_stmt FROM @rename_query;
        EXECUTE rename_stmt;
        DEALLOCATE PREPARE rename_stmt;
    
        -- Commit the transaction to finalize changes
        COMMIT;
  END;
  ";

  $wpdb->query($sql);
}


function aieo_create_sp_AIEO_UpdateContentIntroPlain($sp_prefix)
{
  global $wpdb;

  $sql = "
    CREATE PROCEDURE " . $sp_prefix . "AIEO_UpdateContentIntroPlain (IN tableName VARCHAR(255))
    BEGIN
        -- Declarations at the top
        DECLARE done INT DEFAULT FALSE;
        DECLARE v_ParentProductId INT;
        DECLARE v_ContentIntro TEXT;
        DECLARE v_cleanText TEXT;
        DECLARE cur CURSOR FOR SELECT ParentProductId, ContentIntro FROM temp_table;
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

        -- Create a temporary table
        SET @sqlText = CONCAT('CREATE TEMPORARY TABLE temp_table AS SELECT DISTINCT ParentProductId, ContentIntro FROM ', tableName);
        PREPARE stmt FROM @sqlText;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;

        OPEN cur;

        read_loop: LOOP
            FETCH cur INTO v_ParentProductId, v_ContentIntro;

            IF done THEN
                LEAVE read_loop;
            END IF;

            -- You can use a user-defined function or do the stripping directly here
            SET v_cleanText = AIEO_StripHTML(v_ContentIntro);

            SET @updateText = CONCAT('UPDATE ', tableName, ' SET ContentIntroPlain = \'', v_cleanText, '\' WHERE ParentProductId = ', v_ParentProductId);
            PREPARE updateStmt FROM @updateText;
            EXECUTE updateStmt;
            DEALLOCATE PREPARE updateStmt;

        END LOOP;

        CLOSE cur;
        DROP TEMPORARY TABLE IF EXISTS temp_table;
    END;
    ";

  $wpdb->query($sql);
}




function aieo_create_sp_AIEO_UpdateContentWordCount($sp_prefix)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_UpdateContentWordCount(
      IN _table_name VARCHAR(255))
    BEGIN
        SET @query = CONCAT('UPDATE ', _table_name, ' SET ContentWordCount = AIEO_CountWords(ContentIntroPlain)');
        PREPARE stmt FROM @query;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
    END;
    ";

  $wpdb->query($sql);
}



function aieo_create_sp_AIEO_UpdateContentOutgoingLinks($sp_prefix)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_UpdateContentOutgoingLinks (
        IN _table_name VARCHAR(255))
      BEGIN
          SET @query = CONCAT('UPDATE ', _table_name, ' SET ContentOutgoing = AIEO_CountLinks(ContentIntro)');
          PREPARE stmt FROM @query;
          EXECUTE stmt;
          DEALLOCATE PREPARE stmt;
      END ;
      ";

  $wpdb->query($sql);
}




function aieo_create_sp_AIEO_FindDifferences($sp_prefix)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_FindDifferences(IN in_table_name VARCHAR(255))
    DETERMINISTIC READS SQL DATA
    BEGIN
        -- Variables declaration
        DECLARE v_sql TEXT;
        DECLARE v_diff_part TEXT DEFAULT '';
        DECLARE v_word_count_parent INT DEFAULT 0;
        DECLARE v_word_count_item INT DEFAULT 0;
        DECLARE v_iter INT DEFAULT 1;
    
        -- Calculate word count of the ParentItemName for one record as an example.
        SET @v_sql = CONCAT('SELECT ROUND((CHAR_LENGTH(ParentItemName) - CHAR_LENGTH(REPLACE(ParentItemName, '' '', ''''))) / CHAR_LENGTH('' '') + 1) INTO @v_word_count_temp FROM ', in_table_name, ' LIMIT 1');
        PREPARE stmt1 FROM @v_sql;
        EXECUTE stmt1;
        DEALLOCATE PREPARE stmt1;
    
        -- Calculate word count of the ItemName for the same record.
        SET @v_sql = CONCAT('SELECT ROUND((CHAR_LENGTH(ItemName) - CHAR_LENGTH(REPLACE(ItemName, '' '', ''''))) / CHAR_LENGTH('' '') + 1) INTO @v_word_count_temp_item FROM ', in_table_name, ' LIMIT 1');
        PREPARE stmt2 FROM @v_sql;
        EXECUTE stmt2;
        DEALLOCATE PREPARE stmt2;
    
        SET v_word_count_parent = @v_word_count_temp;
        SET v_word_count_item = @v_word_count_temp_item;
    
        -- Construct the column of differing words from ParentItemName not in ItemName
        WHILE v_iter <= v_word_count_parent DO
            SET v_diff_part = CONCAT(v_diff_part, 'IF(ItemName NOT LIKE CONCAT(''%'', SUBSTRING_INDEX(SUBSTRING_INDEX(ParentItemName, '' '', ', v_iter, '), '' '', -1), ''%''), CONCAT(SUBSTRING_INDEX(SUBSTRING_INDEX(ParentItemName, '' '', ', v_iter, '), '' '', -1), '' ''), '''')', ',');
            SET v_iter = v_iter + 1;
        END WHILE;
    
        SET v_iter = 1;
    
        -- Construct the column of differing words from ItemName not in ParentItemName
        WHILE v_iter <= v_word_count_item DO
            SET v_diff_part = CONCAT(v_diff_part, 'IF(ParentItemName NOT LIKE CONCAT(''%'', SUBSTRING_INDEX(SUBSTRING_INDEX(ItemName, '' '', ', v_iter, '), '' '', -1), ''%''), CONCAT(SUBSTRING_INDEX(SUBSTRING_INDEX(ItemName, '' '', ', v_iter, '), '' '', -1), '' ''), '''')', ',');
            SET v_iter = v_iter + 1;
        END WHILE;
    
        -- Trim the last comma
        SET v_diff_part = LEFT(v_diff_part, CHAR_LENGTH(v_diff_part) - 1);
    
        -- Begin the construction of the dynamic SQL statement to update ItemNameDiff
        SET @v_sql = CONCAT('UPDATE ', in_table_name, ' SET ItemNameDiff = REPLACE(TRIM(CONCAT_WS('' '', ', v_diff_part, ')), ''  '', '' '')');
    
        -- Execute the dynamic SQL
        PREPARE dynamic_statement FROM @v_sql;
        EXECUTE dynamic_statement;
        DEALLOCATE PREPARE dynamic_statement;
    END;
    ";

  $wpdb->query($sql);
}

function aieo_create_sp_AIEO_Create_Product_Catalogue_HPOS($sp_prefix, $sp_products_table)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_Create_Product_Catalogue_HPOS(
    IN _price_sql_choice INT, 
    IN _text_sql_choice INT,
    IN _full_text_sql_choice INT
     
  ) BEGIN 
  TRUNCATE TABLE $sp_products_table;
  INSERT INTO $sp_products_table 
  (OrderId, OrderStatus, SKU, ProductId, ParentProductId, CategoryId, TagId, Stock, CurrentPrice, CurrentRegularPrice, ItemName, ParentItemName, 
  ProfitabilityIndex, Brand, ContentIntro, ContentIntroPlain, ContentCreated, ContentLastUpdated, 
  CategoryName, TagName, Seasonality, ProdIdGraphUUID, PPIdGraphUUID)  
  SELECT DISTINCT
    '0' as OrderId, 
    'unsold' as OrderStatus,
    (
      CASE WHEN _text_sql_choice = 0 THEN '' ELSE  COALESCE(psku.meta_value, '')  END) as SKU,
    pmp.ID as ProductId, 
    CASE 
        WHEN pmp.post_type = 'product_variation' THEN pmp.post_parent 
        ELSE pmp.ID 
    END as ParentProductId,
    COALESCE(pc.category_ids, '') as CategoryId, 
    COALESCE(pt.tag_ids, '') AS TagId,
    COALESCE(pstock.meta_value, '') as Stock,
( 
  CASE 
  WHEN _price_sql_choice = 0 THEN '' 
  ELSE 
    CASE 
      WHEN pm_price.meta_value IS NOT NULL AND pm_price.meta_value REGEXP '^[0-9.]+$' THEN CONVERT(pm_price.meta_value, DECIMAL(7, 2)) 
      ELSE NULL 
    END 
END
) AS CurrentPrice,

(
CASE 
  WHEN _price_sql_choice = 0 THEN '' 
  ELSE 
    CASE 
      WHEN pm_regular_price.meta_value IS NOT NULL AND pm_regular_price.meta_value REGEXP '^[0-9.]+$' THEN CONVERT(pm_regular_price.meta_value, DECIMAL(7, 2)) 
      ELSE NULL 
    END
END
) AS CurrentRegularPrice,
    (
      CASE WHEN _text_sql_choice = 0 THEN '' ELSE pmp.post_title END) as ItemName,
      (
      CASE WHEN _text_sql_choice = 0 THEN '' ELSE  COALESCE(parent.post_title, pmp.post_title) END) as ParentItemName,
    '1' as ProfitabilityIndex, 
    '' as Brand,
      (
      CASE WHEN _full_text_sql_choice = 0 THEN '' ELSE COALESCE(parent.post_content, pmp.post_content) END) as ContentIntro,
      (
      CASE WHEN _full_text_sql_choice = 0 THEN '' ELSE COALESCE(parent.post_content, pmp.post_content) END) as ContentIntroPlain,
     
    pmp.post_date_gmt AS ContentCreated,
    pmp.post_modified_gmt AS ContentLastUpdated, 
    (
      CASE WHEN _text_sql_choice = 0 THEN '' ELSE COALESCE(pc.category_names, '') END ) AS CategoryName,
      (
      CASE WHEN _text_sql_choice = 0 THEN '' ELSE  COALESCE(pt.tag_names, '') END ) AS TagName, 
      '0' as Seasonality,
        UUID() as ProdIdGraphUUID,  -- UUID generation for ProductId
        (CASE 
            WHEN pmp.post_type = 'product_variation' THEN (SELECT UUID() FROM wp_posts WHERE ID = pmp.post_parent LIMIT 1) 
            ELSE UUID()
        END) as PPIdGraphUUID  -- UUID generation for ParentProductId
    FROM 
(
    SELECT DISTINCT
        pmp.ID as ProductId,
        CASE 
            WHEN pmp.post_type = 'product_variation' THEN pmp.post_parent 
            ELSE pmp.ID 
        END as ParentProductId
    FROM 
        wp_posts pmp
    WHERE 
        pmp.post_type IN ('product', 'product_variation')
) AS derivedTable

JOIN wp_posts pmp ON derivedTable.ProductId = pmp.ID
LEFT JOIN wp_posts parent ON pmp.post_parent = parent.ID

LEFT JOIN wp_postmeta AS psku 
ON psku.post_id = CASE 
                     WHEN pmp.post_type = 'product_variation' THEN pmp.ID 
                     ELSE parent.ID 
                  END 
AND psku.meta_key = '_sku'

-- Join for Price
LEFT JOIN wp_postmeta AS pm_price 
ON pmp.ID = pm_price.post_id 
AND pm_price.meta_key = '_price'

-- Join for Regular Price
LEFT JOIN wp_postmeta AS pm_regular_price 
ON pmp.ID = pm_regular_price.post_id 
AND pm_regular_price.meta_key = '_regular_price'


-- Join for Stock
LEFT JOIN wp_postmeta AS pstock 
ON pmp.ID = pstock.post_id 
AND pstock.meta_key = '_stock'


LEFT JOIN (
SELECT 
    tr.object_id AS product_id, 
    GROUP_CONCAT(t.term_id ORDER BY t.term_id ASC) AS category_ids, 
    GROUP_CONCAT(t.name ORDER BY t.term_id ASC) AS category_names 
FROM 
   wp_term_relationships tr 
JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat' 
JOIN wp_terms t ON tt.term_id = t.term_id 
GROUP BY 
    tr.object_id
) AS pc ON (pc.product_id = pmp.ID OR pc.product_id = parent.ID)

LEFT JOIN (
SELECT 
    tr.object_id AS product_id, 
    GROUP_CONCAT(t.term_id ORDER BY t.term_id ASC) AS tag_ids, 
    GROUP_CONCAT(t.name ORDER BY t.term_id ASC) AS tag_names 
FROM 
   wp_term_relationships tr 
JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_tag' 
JOIN wp_terms t ON tt.term_id = t.term_id 
GROUP BY 
    tr.object_id
) AS pt ON (pt.product_id = pmp.ID OR pt.product_id = parent.ID)
-- Now, move the WHERE condition here:
WHERE NOT (
  pmp.post_type = 'product' 
  AND derivedTable.ProductId = derivedTable.ParentProductId
  AND EXISTS (
    SELECT 1 FROM wp_posts pmp_var 
    WHERE pmp_var.post_parent = derivedTable.ParentProductId 
    AND pmp_var.post_type = 'product_variation'
  )
)
ORDER BY pmp.ID;
      END;       
    ";

  $wpdb->query($sql);
}



function aieo_create_sp_AIEO_Export_Orders_HPOS($sp_prefix, $sp_orders_table)
{
  global $wpdb;

  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_Export_Orders_HPOS(
    IN _price_sql_choice INT, 
    IN _text_sql_choice INT, 
    IN _full_text_sql_choice INT,
    IN _eponymous_sql_choice INT, 
    IN _seasonality_sql_choice INT, 
    IN _order_id INT, 
    IN _max_records INT
  ) BEGIN 
  TRUNCATE TABLE $sp_orders_table;
  INSERT INTO $sp_orders_table
  (OrderIdGraphUUID, OrderItemIdGraphUUID, PPIdGraphUUID, ProdIdGraphUUID, EpoIdGraphUUID, O_PP_GraphUUID,O_Prod_GraphUUID, 
  O_Epo_GraphUUID, PP_Epo_GraphUUID, Prod_Epo_GraphUUID, OrderId, OrderStatus, SKU,  ProductId, ParentProductId, CategoryId, TagId, OrderDate, PrimaryQty, ItemSequence, Stock, OrderSize, 
    JourneyLinearWeight, AnonymousWeight, Price, LineValue, OrderItemsTotal, ValueLinearWeight, CurrentPrice, CurrentRegularPrice, ItemName,  ParentItemName, ItemNameDiff, 
    ProfitabilityIndex, Brand, ContentIntro, ContentIntroPlain, ContentCreated, ContentLastUpdated, 
    CategoryName, TagName, EponymousID, Seasonality)
    SELECT 
    UUID() AS OrderIdGraphUUID, 
    MD5(CONCAT(o.id)) AS OrderItemIdGraphUUID,
    MD5(CONCAT(COALESCE(oimp.meta_value, ''))) AS PPIdGraphUUID,
    MD5(CONCAT(COALESCE(CASE WHEN oimpv.meta_value = 0 THEN oimp.meta_value ELSE oimpv.meta_value END, ''))) AS ProdIdGraphUUID,
    CASE 
    WHEN _eponymous_sql_choice = 0 OR o.customer_id = 0 THEN NULL
    ELSE MD5(CONCAT(o.customer_id))
END AS EpoIdGraphUUID,

    MD5(CONCAT(COALESCE(oimp.meta_value, ''), o.id)) AS O_PP_GraphUUID,
    MD5(CONCAT(COALESCE(CASE WHEN oimpv.meta_value = 0 THEN oimp.meta_value ELSE oimpv.meta_value END, ''), o.id)) AS O_Prod_GraphUUID,
    
    CASE 
    WHEN _eponymous_sql_choice = 0 OR o.customer_id = 0 THEN NULL
    ELSE MD5(CONCAT(o.id, o.customer_id))
END AS O_Epo_GraphUUID,

CASE 
    WHEN _eponymous_sql_choice = 0 OR o.customer_id = 0 THEN NULL
    ELSE MD5(CONCAT(COALESCE(oimp.meta_value, ''), o.customer_id))
END AS PP_Epo_GraphUUID,

CASE 
    WHEN _eponymous_sql_choice = 0 OR o.customer_id = 0 THEN NULL
    ELSE MD5(CONCAT(COALESCE(CASE WHEN oimpv.meta_value = 0 THEN oimp.meta_value ELSE oimpv.meta_value END, ''), o.customer_id))
END AS Prod_Epo_GraphUUID,
    
    o.id as OrderId, 
      o.status as OrderStatus, 
    CASE WHEN _text_sql_choice = 0 THEN '' ELSE COALESCE(psku.meta_value, '') END AS SKU, 
      COALESCE(
          CASE WHEN oimpv.meta_value = 0 THEN oimp.meta_value ELSE oimpv.meta_value END, ''
      ) AS ProductId, 
      COALESCE(oimp.meta_value, '') AS ParentProductId,
      COALESCE(pc.category_ids, '') as CategoryId, 
      COALESCE(pt.tag_ids, '') AS TagId, 
      o.date_created_gmt as OrderDate, 
      COALESCE(CONVERT(oimq.meta_value, decimal(3, 0)), '') as PrimaryQty, 
      ROW_NUMBER() OVER (PARTITION BY o.id ORDER BY oi.order_item_id) as ItemSequence, 
      COALESCE(pstock.meta_value, '') as Stock,
      os.OrderSize, 
      ROW_NUMBER() OVER (PARTITION BY o.id ORDER BY oi.order_item_id) / os.OrderSize as JourneyLinearWeight, 
      CASE WHEN _eponymous_sql_choice = 0 THEN '0' ELSE '1' END AS AnonymousWeight,
      (CASE WHEN _price_sql_choice = 0 THEN '' ELSE convert(
              
                oims.meta_value 
              / oimq.meta_value,
              decimal(5, 2)
          ) END ) as Price, 
      (CASE WHEN _price_sql_choice = 0 THEN '' ELSE  convert(
              oims.meta_value, 
              decimal(7, 2)
          
          ) END ) as LineValue, 
          
          ( CASE WHEN _price_sql_choice = 0 THEN '' ELSE convert(o.total_amount , 
          decimal(7, 2)) END )   as OrderItemsTotal,
          ( CASE WHEN _price_sql_choice = 0 THEN '' ELSE 
          convert(oims.meta_value / o.total_amount , 
              decimal(7, 2)) END )   as ValueLinearWeight, 
              (
    CASE 
      WHEN _price_sql_choice = 0 THEN '' 
      ELSE (
        CASE 
          WHEN pm_price.meta_value REGEXP '^[0-9.]+$' THEN CONVERT(pm_price.meta_value, DECIMAL(7, 2)) 
          ELSE NULL 
        END 
      ) 
  END
  ) AS CurrentPrice,  
  (
    CASE 
      WHEN _price_sql_choice = 0 THEN '' 
      ELSE (
        CASE 
          WHEN pm_regular_price.meta_value REGEXP '^[0-9.]+$' THEN CONVERT(pm_regular_price.meta_value, DECIMAL(7, 2)) 
          ELSE NULL 
        END
      ) 
  END
) AS CurrentRegularPrice,
          (
            CASE WHEN _text_sql_choice = 0 THEN '' ELSE 
          
            oi.order_item_name END) as ItemName, 
            (
            CASE WHEN _text_sql_choice = 0 THEN '' ELSE  (
              CASE WHEN oimpv.meta_value = 0 THEN oi.order_item_name ELSE pmp.post_title END
            ) END ) as ParentItemName, 
            (
            CASE WHEN _text_sql_choice = 0 THEN '' ELSE '' END ) as ItemNameDiff, 
  
  '1' as ProfitabilityIndex,
  '' AS Brand,
       (
            CASE WHEN _full_text_sql_choice = 0 THEN '' ELSE     
            (
              CASE WHEN oimpv.meta_value = 0 THEN pmp.post_content ELSE (
                SELECT 
                  parent.post_content 
                FROM 
                  wp_posts parent 
                WHERE 
                  parent.ID = oimp.meta_value
              ) END
            ) END)  as ContentIntro, 
            (
            CASE WHEN _full_text_sql_choice = 0 THEN '' ELSE     
            (
              CASE WHEN oimpv.meta_value = 0 THEN pmp.post_content ELSE (
                SELECT 
                  parent.post_content 
                FROM 
                  wp_posts parent 
                WHERE 
                  parent.ID = oimp.meta_value
              ) END
            ) END) as ContentIntroPlain,
          COALESCE(pmp.post_date_gmt, '2000-01-01 00:00:00') as ContentCreated, 
          COALESCE(pmp.post_modified_gmt, '2000-01-01 00:00:00') as ContentLastUpdated,
       (
            CASE WHEN _text_sql_choice = 0 THEN '' ELSE     
       
          COALESCE(pc.category_names, '') END ) AS CategoryName, 
  (
            CASE WHEN _text_sql_choice = 0 THEN '' ELSE     
               COALESCE(pt.tag_names, '') END ) AS TagName, 
           (CASE WHEN _eponymous_sql_choice = 0 THEN '0' ELSE  o.customer_id END)  AS EponymousID, 
   
          (
            CASE WHEN _seasonality_sql_choice = 0 THEN '0' ELSE     
       '1' END) AS Seasonality
      FROM 
      wp_woocommerce_order_items oi 
      JOIN wp_wc_orders o 
          ON o.id = oi.order_id 
      JOIN wp_woocommerce_order_itemmeta oimp 
          ON oi.order_item_id = oimp.order_item_id AND oimp.meta_key = '_product_id' 
      LEFT JOIN wp_woocommerce_order_itemmeta oimpv 
          ON oi.order_item_id = oimpv.order_item_id AND oimpv.meta_key = '_variation_id' 
      LEFT JOIN wp_woocommerce_order_itemmeta oimq 
          ON oi.order_item_id = oimq.order_item_id AND oimq.meta_key = '_qty' 
    LEFT JOIN wp_woocommerce_order_itemmeta oims on oi.order_item_id = oims.order_item_id 
  and oims.meta_key = '_line_subtotal'



  
   LEFT JOIN wp_wc_order_operational_data ood 
          ON ood.order_id = o.id 
      JOIN wp_wc_order_addresses oba 
          ON oba.order_id = o.id AND oba.address_type = 'billing' 
          LEFT JOIN wp_posts pmp 
    ON pmp.ID = oimp.meta_value 


    LEFT JOIN wp_postmeta AS pm_price 
ON (
    CASE 
        WHEN oimpv.meta_value != '0' THEN oimpv.meta_value  
        ELSE oimp.meta_value                               
    END
) = pm_price.post_id 
AND pm_price.meta_key = '_price'

LEFT JOIN wp_postmeta AS pm_regular_price 
ON (
    CASE 
        WHEN oimpv.meta_value IS NOT NULL AND oimpv.meta_value != '0' THEN oimpv.meta_value
        ELSE oimp.meta_value
    END
) = pm_regular_price.post_id 
AND pm_regular_price.meta_key = '_regular_price'

LEFT JOIN wp_postmeta pstock
ON (
    CASE 
        WHEN oimpv.meta_value != '0' THEN oimpv.meta_value  
        ELSE oimp.meta_value                               
    END
) = pstock.post_id 
AND pstock.meta_key = '_stock'



  
  LEFT JOIN wp_postmeta AS psku 
      ON psku.post_id = CASE WHEN oimpv.meta_value != '0' THEN oimpv.meta_value ELSE pmp.ID END AND psku.meta_key = '_sku'
   
      LEFT JOIN (
        SELECT 
            oi.order_id, 
            COUNT(*) AS OrderSize 
        FROM 
            wp_woocommerce_order_items oi 
        WHERE 
            oi.order_item_type = 'line_item'
        GROUP BY 
            oi.order_id
    ) AS os ON o.ID = os.order_id
   
   
    LEFT JOIN (
    SELECT 
        tr.object_id AS product_id, 
        GROUP_CONCAT(t.term_id ORDER BY t.term_id ASC) AS category_ids,
        GROUP_CONCAT(t.name ORDER BY t.term_id ASC) AS category_names  -- Include category names
    FROM 
    wp_term_relationships tr 
        JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat'
        JOIN wp_terms t ON tt.term_id = t.term_id 
    GROUP BY 
        tr.object_id
) AS pc ON pc.product_id = oimp.meta_value
    LEFT JOIN (
        SELECT 
            tr.object_id AS product_id, 
            GROUP_CONCAT(t.term_id ORDER BY t.term_id ASC) AS tag_ids,
            GROUP_CONCAT(t.name ORDER BY t.term_id ASC) AS tag_names 
        FROM 
            wp_term_relationships tr 
            JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_tag'
            JOIN wp_terms t ON tt.term_id = t.term_id 
        GROUP BY 
            tr.object_id
    ) AS pt ON pt.product_id = oimp.meta_value
  WHERE 
      oi.order_item_type = 'line_item' 
      AND oi.order_id >= _order_id 
      LIMIT _max_records;

      END;       
    ";

  $wpdb->query($sql);
}

function aieo_create_sp_AIEO_Export_Orders_non_HPOS($sp_prefix, $sp_orders_table)
{
  global $wpdb;
  // Validate and sanitize table name
  // if (preg_match("/^wp_[a-zA-Z_]+$/", $temp_orders_table_name) === 0) {
  //   throw new Exception("Invalid table name.");


  $sql = "CREATE PROCEDURE " . $sp_prefix . "AIEO_Export_Orders_non_HPOS(
        IN _price_sql_choice INT, 
        IN _text_sql_choice INT, 
        IN _full_text_sql_choice INT,
        IN _eponymous_sql_choice INT, 
        IN _seasonality_sql_choice INT, 
        IN _order_id INT, 
        IN _max_records INT
  ) BEGIN 
  TRUNCATE TABLE $sp_orders_table;
  INSERT INTO $sp_orders_table
(OrderId, OrderStatus, SKU,  ProductId, ParentProductId, CategoryId, TagId, OrderDate, PrimaryQty, ItemSequence, Stock, OrderSize, 
JourneyLinearWeight, AnonymousWeight, Price, LineValue, OrderItemsTotal, ValueLinearWeight, CurrentPrice, CurrentRegularPrice, ItemName,  ParentItemName, ItemNameDiff, 
ProfitabilityIndex, Brand, ContentIntro, ContentIntroPlain, ContentCreated, ContentLastUpdated, 
CategoryName, TagName, EponymousID, Seasonality)

SELECT  o.id as OrderId,
o.post_status as OrderStatus,
case 
when _text_sql_choice = 0
then ''
else COALESCE(psku.meta_value, '')
end as SKU,
COALESCE(case 
when oimpv.meta_value = 0
then oimp.meta_value
else oimpv.meta_value
end, '') as ProductId,
COALESCE(oimp.meta_value, '') as ParentProductId,
COALESCE(pc.category_ids, '') as CategoryId,
COALESCE(pt.tag_ids, '') as TagId,
o.post_date_gmt as OrderDate,
COALESCE(CONVERT(oimq.meta_value, decimal(3, 0)), '') as PrimaryQty,
ROW_NUMBER() over (
partition by o.id order by oi.order_item_id
) as ItemSequence,
COALESCE(pstock.meta_value, '') as Stock,
os.OrderSize,
ROW_NUMBER() over (
partition by o.id order by oi.order_item_id
) / os.OrderSize as JourneyLinearWeight,
(
case 
when _eponymous_sql_choice = 0
then '0'
else '1'
end
) as AnonymousWeight,
(
case 
when _price_sql_choice = 0
then ''
else convert(oims.meta_value / oimq.meta_value, decimal(5, 2))
end
) as Price,
(
case 
when _price_sql_choice = 0
then ''
else convert(oims.meta_value, decimal(7, 2))
end
) as LineValue,
( CASE WHEN _price_sql_choice = 0 THEN '' ELSE convert(pmot.meta_value , 
decimal(7, 2)) END ) as OrderItemsTotal,
(
case 
when _price_sql_choice = 0
then ''
else (
case 
when pmot.meta_value = 0
or pmot.meta_value is null
then '0'
else convert(oims.meta_value / pmot.meta_value, decimal(7, 2))
end
)
end
) as ValueLinearWeight,
(
    CASE 
      WHEN _price_sql_choice = 0 THEN '' 
      ELSE (
        CASE 
          WHEN pm_price.meta_value REGEXP '^[0-9.]+$' THEN CONVERT(pm_price.meta_value, DECIMAL(7, 2)) 
          ELSE NULL 
        END 
      ) 
  END
  ) AS CurrentPrice,
  
  (
    CASE 
      WHEN _price_sql_choice = 0 THEN '' 
      ELSE (
        CASE 
          WHEN pm_regular_price.meta_value REGEXP '^[0-9.]+$' THEN CONVERT(pm_regular_price.meta_value, DECIMAL(7, 2)) 
          ELSE NULL 
        END
      ) 
  END
) AS CurrentRegularPrice,
(
case 
when _text_sql_choice = 0
then ''
else oi.order_item_name
end
) as ItemName,
(
case 
when _text_sql_choice = 0
then ''
else (
case 
when oimpv.meta_value = 0
then oi.order_item_name
else pmp.post_title
end
)
end
) as ParentItemName,
'' as ItemNameDiff,


  '1' as ProfitabilityIndex,
'' as Brand,
(
case 
when _full_text_sql_choice = 0
then ''
else (
case 
when oimpv.meta_value = 0
then pmp.post_content
else (
select parent.post_content
from wp_posts parent
where parent.ID = oimp.meta_value
)
end
)
end
) as ContentIntro,
(
    case 
    when _full_text_sql_choice = 0
    then ''
    else (
    case 
    when oimpv.meta_value = 0
    then pmp.post_content
    else (
    select parent.post_content
    from wp_posts parent
    where parent.ID = oimp.meta_value
    )
    end
    )
    end
    ) as ContentIntroPlain,
COALESCE(pmp.post_date_gmt, '2000-01-01 00:00:00') as ContentCreated,
COALESCE(pmp.post_modified_gmt, '2000-01-01 00:00:00') as ContentLastUpdated,
(
case 
when _text_sql_choice = 0
then ''
else COALESCE(pc.category_names, '')
end
) as CategoryName,

(
case 
when _text_sql_choice = 0
then ''
else COALESCE(pt.tag_names, '')
end
) as TagName,
(
case 
when _eponymous_sql_choice = 0
then '0'
else pmu.meta_value
end
) as EponymousID,
(
case 
when _seasonality_sql_choice = 0
then '0'
else '1'
end
) as Seasonality
FROM wp_woocommerce_order_items oi

INNER JOIN wp_posts o
ON o.ID = oi.order_id
AND o.post_type = 'shop_order'

INNER JOIN wp_woocommerce_order_itemmeta oimp
ON oi.order_item_id = oimp.order_item_id
AND oimp.meta_key = '_product_id'

LEFT JOIN wp_woocommerce_order_itemmeta oimpv
ON oi.order_item_id = oimpv.order_item_id
AND oimpv.meta_key = '_variation_id'

LEFT JOIN wp_woocommerce_order_itemmeta oimq
ON oi.order_item_id = oimq.order_item_id
AND oimq.meta_key = '_qty'

LEFT JOIN wp_woocommerce_order_itemmeta oims
ON oi.order_item_id = oims.order_item_id
AND oims.meta_key = '_line_subtotal'

INNER JOIN wp_postmeta as pmu
ON pmu.post_id = o.ID
AND pmu.meta_key = '_customer_user'

INNER JOIN wp_postmeta as pmot
ON pmot.post_id = o.ID
AND pmot.meta_key = '_order_total'

LEFT JOIN wp_posts pmp
ON pmp.ID = oimp.meta_value

LEFT JOIN wp_postmeta as psku
ON psku.post_id = CASE 
    WHEN oimpv.meta_value != '0' THEN oimpv.meta_value
    ELSE pmp.ID
END
AND psku.meta_key = '_sku'
LEFT JOIN wp_postmeta AS pm_price 
ON (
    CASE 
        WHEN oimpv.meta_value != '0' THEN oimpv.meta_value  
        ELSE oimp.meta_value                               
    END
) = pm_price.post_id 
AND pm_price.meta_key = '_price'

LEFT JOIN wp_postmeta AS pm_regular_price 
ON (
    CASE 
        WHEN oimpv.meta_value IS NOT NULL AND oimpv.meta_value != '0' THEN oimpv.meta_value
        ELSE oimp.meta_value
    END
) = pm_regular_price.post_id 
AND pm_regular_price.meta_key = '_regular_price'

LEFT JOIN wp_postmeta pstock
ON (
    CASE 
        WHEN oimpv.meta_value != '0' THEN oimpv.meta_value  
        ELSE oimp.meta_value                               
    END
) = pstock.post_id 
AND pstock.meta_key = '_stock'

left join (
select oi.order_id,
COUNT(distinct oimp.meta_value) as OrderSize
from wp_woocommerce_order_items oi
inner join wp_woocommerce_order_itemmeta oimp
on oi.order_item_id = oimp.order_item_id
and oimp.meta_key = '_product_id'
group by oi.order_id
) as os
on o.ID = os.order_id
left join (
select tr.object_id as product_id,
GROUP_CONCAT(t.term_id order by t.term_id asc) as category_ids,
GROUP_CONCAT(t.name order by t.term_id asc) as category_names -- Include category names
from wp_term_relationships tr
inner join wp_term_taxonomy tt
on tr.term_taxonomy_id = tt.term_taxonomy_id
and tt.taxonomy = 'product_cat'
inner join wp_terms t
on tt.term_id = t.term_id
group by tr.object_id
) as pc
on pc.product_id = oimp.meta_value
left join (
select tr.object_id as product_id,
GROUP_CONCAT(t.term_id order by t.term_id asc) as tag_ids,
GROUP_CONCAT(t.name order by t.term_id asc) as tag_names
from wp_term_relationships tr
inner join wp_term_taxonomy tt
on tr.term_taxonomy_id = tt.term_taxonomy_id
and tt.taxonomy = 'product_tag'
inner join wp_terms t
on tt.term_id = t.term_id
group by tr.object_id
) as pt
on pt.product_id = oimp.meta_value
where oi.order_item_type = 'line_item'
and oi.order_id >= _order_id
LIMIT _max_records;

END;      
    ";

  $wpdb->query($sql);
}



function aieo_drop_temp_orders_table($sp_temp_orders_table_name) {
  global $wpdb;
      // Drop all indexes associated with the table
      $wpdb->query("DROP INDEX aieo_idx_orderid_orders ON {$sp_temp_orders_table_name}");
      $wpdb->query("DROP INDEX aieo_idx_productid_orders ON {$sp_temp_orders_table_name}");
      $wpdb->query("DROP INDEX aieo_idx_parentproductid_orders ON {$sp_temp_orders_table_name}");
      $wpdb->query("DROP INDEX aieo_idx_brandid_orders ON {$sp_temp_orders_table_name}");
      $wpdb->query("DROP INDEX aieo_idx_eponymousid_orders ON {$sp_temp_orders_table_name}");

      // Drop the table itself
      $wpdb->query("DROP TABLE IF EXISTS `{$sp_temp_orders_table_name}`"); // Use backticks to quote SQL identifiers
}

function aieo_drop_temp_products_table($sp_temp_products_table_name) {
  global $wpdb;

      // Drop all indexes associated with the table
      $wpdb->query("DROP INDEX aieo_idx_productid_products ON {$sp_temp_products_table_name}");
      $wpdb->query("DROP INDEX aieo_idx_parentproductid_products ON {$sp_temp_products_table_name}");
      $wpdb->query("DROP INDEX aieo_idx_brandid_products ON {$sp_temp_products_table_name}");

      // Drop the table itself
      $wpdb->query("DROP TABLE IF EXISTS `{$sp_temp_products_table_name}`"); // Use backticks to quote SQL identifiers
}






function aieo_drop_sp_common($sp_prefix, $procedure_name_suffix) {
  global $wpdb;

  // Sanitize and validate the prefix to ensure it only contains alphanumeric characters and underscores
  $sp_prefix = sanitize_text_field($sp_prefix);
  if (!preg_match('/^\w+$/', $sp_prefix)) {
      // Handle invalid input
      wp_die('Invalid input detected in prefix');
  }

  // Sanitize and validate the procedure name suffix similarly
  $procedure_name_suffix = sanitize_text_field($procedure_name_suffix);
  if (!preg_match('/^\w+$/', $procedure_name_suffix)) {
      // Handle invalid input
      wp_die('Invalid input detected in procedure name suffix');
  }

  // Combine the prefix with the procedure name suffix
  $procedure_name = $sp_prefix . $procedure_name_suffix;

  // Construct the SQL query using backticks for SQL identifier quoting
  $query = "DROP PROCEDURE IF EXISTS `{$procedure_name}`";

  // Execute the query directly without using $wpdb->prepare since it's not suitable for identifiers
  $wpdb->query($query);
}



function aieo_drop_sp_AIEO_UpdateOrdersWithUnsold($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateOrdersWithUnsold");
}


// Example of using the common function for multiple similar drop procedures
function aieo_drop_sp_AIEO_StripHTMLAndReplicateContentIntro($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_StripHTMLAndReplicateContentIntro");
}

function aieo_drop_sp_AIEO_RenameTable($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_RenameTable");
}

function aieo_drop_sp_AIEO_FindDifferences($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_FindDifferences");
}

function aieo_drop_sp_AIEO_Create_Product_Catalogue_HPOS($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_Create_Product_Catalogue_HPOS");
}

function aieo_drop_sp_AIEO_Export_Orders_HPOS($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_Export_Orders_HPOS");
}

// Continue similarly for other stored procedure drop functions

// Example: Implementing the pattern for all other stored procedure drops
function aieo_drop_sp_AIEO_Export_Orders_non_HPOS($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_Export_Orders_non_HPOS");
}

// Continue this pattern for all stored procedure drop functions listed




function aieo_drop_sp_AIEO_Orchestrate_all_non_HPOS_SPs($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_Orchestrate_all_non_HPOS_SPs");
}

function aieo_drop_sp_AIEO_UpdateProductCentricStats($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateProductCentricStats");
}

function aieo_drop_sp_AIEO_UpdateCustomerCentricStdStats($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateCustomerCentricStdStats");
}

function aieo_drop_sp_AIEO_UpdateCustomerCentricAdvStats($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateCustomerCentricAdvStats");
}

function aieo_drop_sp_GenerateGraphDBUUIDs($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_GenerateGraphDBUUIDs");
}

function aieo_drop_sp_GenerateGraphDBUUIDFreqs($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_GenerateGraphDBUUIDFreqs");
}

function aieo_drop_sp_AIEO_UpdateContentWordCount($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateContentWordCount");
}

function aieo_drop_sp_AIEO_UpdateContentOutgoingLinks($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateContentOutgoingLinks");
}

function aieo_drop_sp_AIEO_UpdateContentIntroPlain($sp_prefix) {
  aieo_drop_sp_common($sp_prefix, "AIEO_UpdateContentIntroPlain");
}



function aieo_drop_sp_AIEO_Include_Products_Without_Sales()
{
  global $wpdb;
  $wpdb->query("DROP PROCEDURE IF EXISTS AIEO_Include_Products_Without_Sales");
}



//Drop Functions
function aieo_drop_function_AIEO_StripHTML()
{
  global $wpdb;
  $wpdb->query("DROP FUNCTION IF EXISTS AIEO_StripHTML");
}

function aieo_drop_function_AIEO_CountWords()
{
  global $wpdb;
  $wpdb->query("DROP FUNCTION IF EXISTS AIEO_CountWords");
}


function aieo_drop_function_AIEO_CountLinks()
{
  global $wpdb;
  $wpdb->query("DROP FUNCTION IF EXISTS AIEO_CountLinks");
}
