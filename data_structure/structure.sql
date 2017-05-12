--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET search_path = public, pg_catalog;

--
-- Name: on_purchase_order_bidding_confirmed(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION on_purchase_order_bidding_confirmed() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE

if_confirm int;
in_wsid int;
in_prid int;
ins_sdceno int;
ins_quotation real;
ins_qty int;
ins_total_amount real;
checks_current_record int;
currentpoid int;
previous_poamount real;
lastpoid int;

BEGIN
	SELECT COUNT(*) into if_confirm FROM bidding WHERE new.status ='confirm' AND bid = new.bid;
	IF if_confirm >= 1 THEN

		SELECT bidding_details.prid into in_prid FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.wsid into in_wsid FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.sdceno into ins_sdceno FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.quotation into ins_quotation FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;
		
		SELECT (bidding_details.qty * bidding_details.quotation) into ins_total_amount FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.qty into ins_qty FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT COUNT(*) into checks_current_record FROM purchase_order JOIN purchase_order_details on purchase_order.poid = purchase_order_details.poid WHERE purchase_order.sdceno = ins_sdceno AND purchase_order_details.prid = in_prid;

		IF checks_current_record > 0 THEN

			SELECT purchase_order.poid into currentpoid FROM purchase_order JOIN purchase_order_details on purchase_order.poid = purchase_order_details.poid WHERE purchase_order.sdceno = ins_sdceno AND purchase_order_details.prid = in_prid LIMIT 1;

			SELECT purchase_order.po_amount into previous_poamount FROM purchase_order JOIN purchase_order_details on purchase_order.poid = purchase_order_details.poid WHERE purchase_order.sdceno = ins_sdceno AND purchase_order_details.prid = in_prid LIMIT 1;

			UPDATE purchase_order
			SET po_amount = previous_poamount + ins_total_amount 
			WHERE poid = currentpoid;

			Insert INTO purchase_order_details (poid, bid, prid, wsid, qty, price) values (currentpoid,new.bid,in_prid,in_wsid,ins_qty,ins_quotation); 

		ELSE

			Insert INTO purchase_order (date_approved,payment_method, delivery_period, po_amount, dceno, sdceno) values (current_date,'Invoice','30 calendar days',ins_total_amount,null,ins_sdceno) ; 

			SELECT poid into lastpoid FROM purchase_order ORDER BY poid DESC LIMIT 1;	

			Insert INTO purchase_order_details (poid, bid, prid, wsid, qty, price) values (lastpoid,new.bid,in_prid,in_wsid,ins_qty,ins_quotation); 

		END IF;
	END IF;
	
	RETURN new;
END
$$;


ALTER FUNCTION public.on_purchase_order_bidding_confirmed() OWNER TO postgres;

--
-- Name: on_request(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION on_request() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE
last_id int;
last_pid int;
items_count int;
pending_count int;
pending varchar(50) := 'pending';
BEGIN
     IF tg_op = 'INSERT' THEN

        IF new.quantity_onhand <= new.reordering_pt AND new.quantity_onorder <= new.reordering_pt THEN

			SELECT prid into last_id FROM purchase_request ORDER BY prid DESC LIMIT 1;
			SELECT count(prid) into pending_count FROM purchase_request WHERE prid = last_id AND status = pending;
			
			SELECT COUNT(*) into items_count FROM purchase_request_details WHERE prid = last_id;

			IF items_count < 3 AND pending_count >= 1 THEN
				Insert INTO purchase_request_details (qty, estimated_cost , prid , wsid)values (5,new.delivery_price,last_id,new.wsid); 
		
			ELSE
				Insert INTO purchase_request (date,remark, status, date_status_changed, person_responsible, dceno) 
				values (current_timestamp,'null','pending',current_timestamp,'null',null); 

				SELECT prid into last_pid FROM purchase_request ORDER BY prid DESC LIMIT 1;

				Insert INTO purchase_request_details 
				(qty, estimated_cost , prid , wsid) 	
				values (5,new.delivery_price, last_pid ,new.wsid); 
			END IF ;
		 END IF ;
         RETURN new;
     END IF;

     IF tg_op = 'UPDATE' THEN

         IF new.quantity_onhand <= new.reordering_pt AND new.quantity_onorder <= new.reordering_pt THEN

			SELECT prid into last_id FROM purchase_request ORDER BY prid DESC LIMIT 1;
			SELECT count(prid) into pending_count FROM purchase_request WHERE prid = last_id AND status = pending;
			
			SELECT COUNT(*) into items_count FROM purchase_request_details WHERE prid = last_id;
			
			IF items_count < 3 AND pending_count >= 1 THEN
				Insert INTO purchase_request_details (qty, estimated_cost , prid , wsid)values (5,new.delivery_price,last_id,new.wsid); 
		
			ELSE
				Insert INTO purchase_request (date,remark, status, date_status_changed, person_responsible, dceno) 
				values (current_timestamp,'null','pending',current_timestamp,'null',null); 

				SELECT prid into last_pid FROM purchase_request ORDER BY prid DESC LIMIT 1;

				Insert INTO purchase_request_details 
				(qty, estimated_cost , prid , wsid) 	
				values (5,new.delivery_price, last_pid ,new.wsid); 
			END IF ;
		 END IF ;  
         RETURN new;
     END IF;
END
$$;


ALTER FUNCTION public.on_request() OWNER TO postgres;

--
-- Name: purchase_update_onhand(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION purchase_update_onhand() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN 
    IF tg_op = 'INSERT' THEN
        UPDATE warehouse_spares SET quantity_onorder = quantity_onorder + new.qty
		WHERE wsid = new.wsid;         
		RETURN new;
    END IF;
	 
	IF tg_op = 'UPDATE' THEN
		UPDATE warehouse_spares SET quantity_onorder = quantity_onorder - old.qty + new.qty
		WHERE wsid = new.wsid;         
		RETURN new;
    END IF;
END
$$;


ALTER FUNCTION public.purchase_update_onhand() OWNER TO postgres;

--
-- Name: update_on_delivery(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION update_on_delivery() RETURNS trigger
    LANGUAGE plpgsql
    AS $$

BEGIN
		
		
		IF tg_op = 'INSERT' THEN

			 UPDATE delivery 
			 SET total_amount = total_amount +  (new.delivery_price * new.qty_delivered)	
			 WHERE did = new.did;     
			 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + new.qty_accepted
			 WHERE wsid = new.wsid;      
			  
			 UPDATE warehouse_spares SET quantity_onorder = quantity_onorder - new.qty_accepted
			 WHERE wsid = new.wsid;         
			  
			 UPDATE warehouse_spares 
			 SET delivery_price = new.delivery_price
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;

		 IF tg_op = 'UPDATE' THEN

			 UPDATE delivery 
			 SET total_amount = total_amount - (old.delivery_price * old.qty_delivered) + (new.delivery_price * new.qty_delivered)
			 WHERE did = new.did;      
			 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand - old.qty_accepted + new.qty_accepted
			 WHERE wsid = new.wsid;      
			  
			 UPDATE warehouse_spares SET quantity_onorder = quantity_onorder + old.qty_accepted - new.qty_accepted
			 WHERE wsid = new.wsid;         
			  
			 UPDATE warehouse_spares 
			 SET delivery_price = new.delivery_price
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;
		 
END
$$;


ALTER FUNCTION public.update_on_delivery() OWNER TO postgres;

--
-- Name: withdrawal_spares(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION withdrawal_spares() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
		 IF tg_op = 'UPDATE' THEN

			 UPDATE delivery_details 
			 SET qty_available = qty_available + old.qty_released - new.qty_released	
			 WHERE ddid = new.ddid;      
			 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + old.qty_released - new.qty_released
			 WHERE wsid = (SELECT delivery_details.wsid FROM delivery_details WHERE delivery_details.ddid = new.ddid); 
			 
			 RETURN new;
		 END IF;
		 
		 
		IF tg_op = 'INSERT' THEN

			 UPDATE delivery_details 
			 SET qty_available = qty_available -  new.qty_released	
			 WHERE ddid = new.ddid;   

			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand - new.qty_released
			 WHERE wsid = (SELECT delivery_details.wsid FROM delivery_details WHERE delivery_details.ddid = new.ddid); 
			 
			 RETURN new;
		 END IF;

		 
		 IF tg_op = 'DELETE' THEN

			 UPDATE delivery_details 
			SET qty_available = qty_available + old.qty_released
			WHERE ddid = old.ddid; 
			 
			  UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + old.qty_released
			 WHERE wsid = (SELECT delivery_details.wsid FROM delivery_details WHERE delivery_details.ddid = old.ddid); 
			 RETURN old;
		 END IF;
END
$$;


ALTER FUNCTION public.withdrawal_spares() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: bidding; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bidding (
    bid integer NOT NULL,
    date date NOT NULL,
    "time" time without time zone NOT NULL,
    venue character varying(50) NOT NULL,
    status character varying(50) NOT NULL,
    date_status_changed date NOT NULL,
    person_responsible character varying(50) NOT NULL,
    wsid integer,
    prid integer
);


ALTER TABLE public.bidding OWNER TO postgres;

--
-- Name: bidding_bid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bidding_bid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bidding_bid_seq OWNER TO postgres;

--
-- Name: bidding_bid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bidding_bid_seq OWNED BY bidding.bid;


--
-- Name: bidding_details; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bidding_details (
    bdid integer NOT NULL,
    bid integer,
    prid integer NOT NULL,
    wsid integer NOT NULL,
    sdceno integer NOT NULL,
    quotation real NOT NULL,
    status character varying(10) NOT NULL,
    qty integer NOT NULL
);


ALTER TABLE public.bidding_details OWNER TO postgres;

--
-- Name: bidding_details_bdid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bidding_details_bdid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bidding_details_bdid_seq OWNER TO postgres;

--
-- Name: bidding_details_bdid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bidding_details_bdid_seq OWNED BY bidding_details.bdid;


--
-- Name: delivery; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE delivery (
    did integer NOT NULL,
    date_delivered date NOT NULL,
    received_by character varying(50) NOT NULL,
    remarks character varying(50) NOT NULL,
    total_amount real NOT NULL,
    sdceno integer,
    status character varying(50),
    date_completed date,
    poid integer
);


ALTER TABLE public.delivery OWNER TO postgres;

--
-- Name: delivery_details; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE delivery_details (
    ddid integer NOT NULL,
    qty_delivered integer NOT NULL,
    qty_accepted integer NOT NULL,
    qty_available integer NOT NULL,
    delivery_price real NOT NULL,
    wsid integer NOT NULL,
    did integer
);


ALTER TABLE public.delivery_details OWNER TO postgres;

--
-- Name: delivery_details_ddid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE delivery_details_ddid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.delivery_details_ddid_seq OWNER TO postgres;

--
-- Name: delivery_details_ddid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE delivery_details_ddid_seq OWNED BY delivery_details.ddid;


--
-- Name: delivery_did_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE delivery_did_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.delivery_did_seq OWNER TO postgres;

--
-- Name: delivery_did_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE delivery_did_seq OWNED BY delivery.did;


--
-- Name: employee; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE employee (
    dceno integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    fname character varying(50) NOT NULL,
    mname character varying(50) NOT NULL,
    lname character varying(50) NOT NULL,
    "position" character varying(50) NOT NULL,
    user_access_level integer NOT NULL,
    ccno character varying(10) NOT NULL,
    requisitioning_section character varying(50) NOT NULL
);


ALTER TABLE public.employee OWNER TO postgres;

--
-- Name: employee_dceno_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE employee_dceno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.employee_dceno_seq OWNER TO postgres;

--
-- Name: employee_dceno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE employee_dceno_seq OWNED BY employee.dceno;


--
-- Name: fixed_value; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE fixed_value (
    fvid integer NOT NULL,
    name character varying(50) NOT NULL,
    value character varying(50) NOT NULL
);


ALTER TABLE public.fixed_value OWNER TO postgres;

--
-- Name: fixed_value_fvid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE fixed_value_fvid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fixed_value_fvid_seq OWNER TO postgres;

--
-- Name: fixed_value_fvid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE fixed_value_fvid_seq OWNED BY fixed_value.fvid;


--
-- Name: ins_quotation; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ins_quotation (
    quotation real
);


ALTER TABLE public.ins_quotation OWNER TO postgres;

--
-- Name: purchase_order; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE purchase_order (
    poid integer NOT NULL,
    date_approved date NOT NULL,
    payment_method character varying(50) NOT NULL,
    delivery_period character varying(50) NOT NULL,
    po_amount real NOT NULL,
    dceno integer,
    sdceno integer
);


ALTER TABLE public.purchase_order OWNER TO postgres;

--
-- Name: purchase_order_details; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE purchase_order_details (
    poid integer,
    bid integer,
    prid integer,
    wsid integer,
    qty integer NOT NULL,
    price real NOT NULL
);


ALTER TABLE public.purchase_order_details OWNER TO postgres;

--
-- Name: purchase_order_poid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE purchase_order_poid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.purchase_order_poid_seq OWNER TO postgres;

--
-- Name: purchase_order_poid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE purchase_order_poid_seq OWNED BY purchase_order.poid;


--
-- Name: purchase_request; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE purchase_request (
    prid integer NOT NULL,
    date timestamp without time zone,
    remark character varying(50) NOT NULL,
    status character varying(50) NOT NULL,
    date_status_changed timestamp without time zone,
    person_responsible character varying(50) NOT NULL,
    dceno integer
);


ALTER TABLE public.purchase_request OWNER TO postgres;

--
-- Name: purchase_request_details; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE purchase_request_details (
    qty integer NOT NULL,
    estimated_cost real NOT NULL,
    prid integer,
    wsid integer
);


ALTER TABLE public.purchase_request_details OWNER TO postgres;

--
-- Name: purchase_request_prid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE purchase_request_prid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.purchase_request_prid_seq OWNER TO postgres;

--
-- Name: purchase_request_prid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE purchase_request_prid_seq OWNED BY purchase_request.prid;


--
-- Name: specifications; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE specifications (
    sid integer NOT NULL,
    specification character varying(50) NOT NULL,
    value character varying(50) NOT NULL,
    wsid integer
);


ALTER TABLE public.specifications OWNER TO postgres;

--
-- Name: specifications_sid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE specifications_sid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.specifications_sid_seq OWNER TO postgres;

--
-- Name: specifications_sid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE specifications_sid_seq OWNED BY specifications.sid;


--
-- Name: supplier; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE supplier (
    sdceno integer NOT NULL,
    supplier_name character varying(50) NOT NULL,
    address character varying(50) NOT NULL,
    tel_no character varying(50) NOT NULL,
    fax_no character varying(50) NOT NULL
);


ALTER TABLE public.supplier OWNER TO postgres;

--
-- Name: supplier_sdceno_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE supplier_sdceno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.supplier_sdceno_seq OWNER TO postgres;

--
-- Name: supplier_sdceno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE supplier_sdceno_seq OWNED BY supplier.sdceno;


--
-- Name: warehouse_spares; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE warehouse_spares (
    wsid integer NOT NULL,
    category character varying(50) NOT NULL,
    spare_name character varying(50) NOT NULL,
    description character varying(100) NOT NULL,
    quantity_onhand integer NOT NULL,
    quantity_onorder integer NOT NULL,
    reordering_pt integer NOT NULL,
    delivery_price real NOT NULL,
    unit_of_measurement character varying(10),
    file_name text
);


ALTER TABLE public.warehouse_spares OWNER TO postgres;

--
-- Name: warehouse_spares_wsid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE warehouse_spares_wsid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.warehouse_spares_wsid_seq OWNER TO postgres;

--
-- Name: warehouse_spares_wsid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE warehouse_spares_wsid_seq OWNED BY warehouse_spares.wsid;


--
-- Name: withdrawal_request; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE withdrawal_request (
    wrid character varying(20) NOT NULL,
    date_created text NOT NULL,
    released_by text NOT NULL,
    date_released text NOT NULL,
    status character varying(10) NOT NULL,
    remarks text NOT NULL,
    dceno integer
);


ALTER TABLE public.withdrawal_request OWNER TO postgres;

--
-- Name: withdrawal_request_details; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE withdrawal_request_details (
    qty_requested integer NOT NULL,
    qty_released integer NOT NULL,
    ddid integer,
    wrid character varying(20)
);


ALTER TABLE public.withdrawal_request_details OWNER TO postgres;

--
-- Name: bid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bidding ALTER COLUMN bid SET DEFAULT nextval('bidding_bid_seq'::regclass);


--
-- Name: bdid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bidding_details ALTER COLUMN bdid SET DEFAULT nextval('bidding_details_bdid_seq'::regclass);


--
-- Name: did; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY delivery ALTER COLUMN did SET DEFAULT nextval('delivery_did_seq'::regclass);


--
-- Name: ddid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY delivery_details ALTER COLUMN ddid SET DEFAULT nextval('delivery_details_ddid_seq'::regclass);


--
-- Name: dceno; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY employee ALTER COLUMN dceno SET DEFAULT nextval('employee_dceno_seq'::regclass);


--
-- Name: fvid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY fixed_value ALTER COLUMN fvid SET DEFAULT nextval('fixed_value_fvid_seq'::regclass);


--
-- Name: poid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_order ALTER COLUMN poid SET DEFAULT nextval('purchase_order_poid_seq'::regclass);


--
-- Name: prid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_request ALTER COLUMN prid SET DEFAULT nextval('purchase_request_prid_seq'::regclass);


--
-- Name: sid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY specifications ALTER COLUMN sid SET DEFAULT nextval('specifications_sid_seq'::regclass);


--
-- Name: sdceno; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY supplier ALTER COLUMN sdceno SET DEFAULT nextval('supplier_sdceno_seq'::regclass);


--
-- Name: wsid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY warehouse_spares ALTER COLUMN wsid SET DEFAULT nextval('warehouse_spares_wsid_seq'::regclass);


--
-- Name: bidding_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bidding_details
    ADD CONSTRAINT bidding_details_pkey PRIMARY KEY (bdid);


--
-- Name: bidding_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bidding
    ADD CONSTRAINT bidding_pkey PRIMARY KEY (bid);


--
-- Name: delivery_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY delivery_details
    ADD CONSTRAINT delivery_details_pkey PRIMARY KEY (ddid);


--
-- Name: delivery_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY delivery
    ADD CONSTRAINT delivery_pkey PRIMARY KEY (did);


--
-- Name: employee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY employee
    ADD CONSTRAINT employee_pkey PRIMARY KEY (dceno);


--
-- Name: fixed_value_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY fixed_value
    ADD CONSTRAINT fixed_value_pkey PRIMARY KEY (fvid);


--
-- Name: purchase_order_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY purchase_order
    ADD CONSTRAINT purchase_order_pkey PRIMARY KEY (poid);


--
-- Name: purchase_request_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY purchase_request
    ADD CONSTRAINT purchase_request_pkey PRIMARY KEY (prid);


--
-- Name: specifications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY specifications
    ADD CONSTRAINT specifications_pkey PRIMARY KEY (sid);


--
-- Name: supplier_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY supplier
    ADD CONSTRAINT supplier_pkey PRIMARY KEY (sdceno);


--
-- Name: warehouse_spares_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY warehouse_spares
    ADD CONSTRAINT warehouse_spares_pkey PRIMARY KEY (wsid);


--
-- Name: withdrawal_request_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY withdrawal_request
    ADD CONSTRAINT withdrawal_request_pkey PRIMARY KEY (wrid);


--
-- Name: on_purchase_order_bidding_confirmed; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER on_purchase_order_bidding_confirmed AFTER UPDATE ON bidding FOR EACH ROW EXECUTE PROCEDURE on_purchase_order_bidding_confirmed();


--
-- Name: on_request; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER on_request AFTER INSERT OR UPDATE ON warehouse_spares FOR EACH ROW EXECUTE PROCEDURE on_request();


--
-- Name: purchase_update_onhand; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER purchase_update_onhand BEFORE INSERT OR UPDATE ON purchase_request_details FOR EACH ROW EXECUTE PROCEDURE purchase_update_onhand();


--
-- Name: update_on_delivery; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER update_on_delivery BEFORE INSERT OR UPDATE ON delivery_details FOR EACH ROW EXECUTE PROCEDURE update_on_delivery();


--
-- Name: withdrawal_spares; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER withdrawal_spares AFTER INSERT OR DELETE OR UPDATE ON withdrawal_request_details FOR EACH ROW EXECUTE PROCEDURE withdrawal_spares();


--
-- Name: bidding_details_bid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bidding_details
    ADD CONSTRAINT bidding_details_bid_fkey FOREIGN KEY (bid) REFERENCES bidding(bid);


--
-- Name: delivery_details_did_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY delivery_details
    ADD CONSTRAINT delivery_details_did_fkey FOREIGN KEY (did) REFERENCES delivery(did);


--
-- Name: delivery_sdceno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY delivery
    ADD CONSTRAINT delivery_sdceno_fkey FOREIGN KEY (sdceno) REFERENCES supplier(sdceno);


--
-- Name: purchase_order_dceno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_order
    ADD CONSTRAINT purchase_order_dceno_fkey FOREIGN KEY (dceno) REFERENCES employee(dceno);


--
-- Name: purchase_order_details_bid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_order_details
    ADD CONSTRAINT purchase_order_details_bid_fkey FOREIGN KEY (bid) REFERENCES bidding(bid);


--
-- Name: purchase_order_details_poid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_order_details
    ADD CONSTRAINT purchase_order_details_poid_fkey FOREIGN KEY (poid) REFERENCES purchase_order(poid);


--
-- Name: purchase_order_details_wsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_order_details
    ADD CONSTRAINT purchase_order_details_wsid_fkey FOREIGN KEY (wsid) REFERENCES warehouse_spares(wsid);


--
-- Name: purchase_order_sdceno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_order
    ADD CONSTRAINT purchase_order_sdceno_fkey FOREIGN KEY (sdceno) REFERENCES supplier(sdceno);


--
-- Name: purchase_request_dceno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_request
    ADD CONSTRAINT purchase_request_dceno_fkey FOREIGN KEY (dceno) REFERENCES employee(dceno);


--
-- Name: purchase_request_details_wsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY purchase_request_details
    ADD CONSTRAINT purchase_request_details_wsid_fkey FOREIGN KEY (wsid) REFERENCES warehouse_spares(wsid);


--
-- Name: specifications_wsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY specifications
    ADD CONSTRAINT specifications_wsid_fkey FOREIGN KEY (wsid) REFERENCES warehouse_spares(wsid);


--
-- Name: withdrawal_request_dceno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY withdrawal_request
    ADD CONSTRAINT withdrawal_request_dceno_fkey FOREIGN KEY (dceno) REFERENCES employee(dceno);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

