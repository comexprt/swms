--
-- Triggers `blog`
--
DELIMITER $$
CREATE TRIGGER `blog_after_update` AFTER UPDATE ON `blog`
 FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'EDIT';
		END IF;
    
		INSERT INTO audit (blog_id, changetype) VALUES (NEW.id, @changetype);
		
    END
$$
DELIMITER ;

-- --------------------------------------------------------
--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `updateProductPrice` BEFORE UPDATE ON `products`
 FOR EACH ROW BEGIN
  IF NEW.prod_cost <> OLD.prod_cost
    THEN
      SET NEW.prod_price = NEW.prod_cost * 1.40;
  END IF ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

--
-- Triggers `purchase`
--
DELIMITER $$
CREATE TRIGGER `Add_Purchase` AFTER INSERT ON `purchase`
 FOR EACH ROW BEGIN
    
    	UPDATE warehouse
        
        SET warehouse.qtyonhand = warehouse.qtyonhand + new.qty
        
        WHERE warehouse.w = new.w;
   
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Delete_Purchase` AFTER DELETE ON `purchase`
 FOR EACH ROW BEGIN
		UPDATE warehouse
        SET warehouse.qtyonhand = warehouse.qtyonhand - old.qty
        WHERE warehouse.w = old.w;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Purchase` AFTER UPDATE ON `purchase`
 FOR EACH ROW BEGIN
    
    	UPDATE warehouse
        SET warehouse.qtyonhand = warehouse.qtyonhand - old.qty        
        WHERE warehouse.w = old.w;
		
        
		UPDATE warehouse
		SET warehouse.qtyonhand = warehouse.qtyonhand + new.qty        
        WHERE warehouse.w = new.w;
   
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--
-- AD8915
-- --------------------------------------------------------
--
DELIMITER $$
CREATE TRIGGER `Add_Request` AFTER UPDATE ON `warehouse`
 FOR EACH ROW BEGIN
 	IF new.qtyonhand <= new.stocklimit THEN

Insert INTO request (request.Date_Created,request.remark,request.Status,request.Date_Status_Change) 	values (now(),"","",""); 

SET @lastID = (SELECT RId FROM request ORDER BY RId DESC LIMIT 1);

Insert INTO request_details (request_details.qty,request_details.w,request_details.RId) 	values (5,old.w,@lastID); 

		 END IF ;
END
$$
DELIMITER ;
