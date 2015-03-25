drop table carttemp;
drop table orderdet;
drop table ordermain;
drop table customers;
drop table products;
CREATE TABLE products (
          products_prodnum CHAR(5) NOT NULL,
          products_name VARCHAR(20) NOT NULL,
          products_proddesc VARCHAR(255) NOT NULL,
          products_price NUMBER (6,2) NOT NULL,
          products_dateadded DATE NOT NULL,
          CONSTRAINT PK_PDCT PRIMARY KEY(products_prodnum));
CREATE TABLE customers (
           customers_custnum NUMBER(6) NOT NULL,
           customers_firstname VARCHAR (15) NOT NULL,
           customers_lastname VARCHAR (50) NOT NULL,
           customers_add1 VARCHAR (50) NOT NULL,
           customers_add2 VARCHAR (50),
           customers_city VARCHAR (50) NOT NULL,
           customers_postcode CHAR (8) NOT NULL,
           customers_county CHAR (20) NOT NULL,
           customers_phone CHAR (12) NOT NULL,
           customers_email VARCHAR (50) NOT NULL,
          CONSTRAINT PK_CUST PRIMARY KEY (customers_custnum));
CREATE TABLE ordermain (
           ordermain_ordernum NUMBER(6) NOT NULL,
           ordermain_orderdate DATE NOT NULL,
           ordermain_custnum NUMBER(6) NOT NULL,
           ordermain_subtotal NUMBER (7,2) NOT NULL,
           ordermain_delivery NUMBER (6,2),
           ordermain_tax NUMBER(6,2),
           ordermain_total NUMBER(7,2) NOT NULL,
           ordermain_delfirst VARCHAR(15) NOT NULL,
           ordermain_dellast VARCHAR(50) NOT NULL,
           ordermain_delcompany VARCHAR (50),
           ordermain_deladd1 VARCHAR (50) NOT NULL,
           ordermain_deladd2 VARCHAR(50),
           ordermain_delcity VARCHAR(50) NOT NULL,
           ordermain_delcounty CHAR(20) NOT NULL,
           ordermain_delpostcode CHAR(8) NOT NULL,
           ordermain_delphone CHAR(12) NOT NULL,
           ordermain_delemail VARCHAR(50),
          CONSTRAINT pk_ord PRIMARY KEY(ordermain_ordernum)) ;
CREATE TABLE orderdet (
           orderdet_id NUMBER (6) NOT NULL,
           orderdet_ordernum NUMBER (6) NOT NULL,
           orderdet_qty NUMBER(3) NOT NULL,
           orderdet_prodnum CHAR(5) NOT NULL,
           CONSTRAINT ordref FOREIGN KEY (orderdet_ordernum) REFERENCES ordermain(ordermain_ordernum),
           CONSTRAINT prodref FOREIGN KEY (orderdet_prodnum) REFERENCES products(products_prodnum),
           CONSTRAINT pk_od PRIMARY KEY (orderdet_id));
CREATE TABLE carttemp(
          carttemp_hidden NUMBER(10) NOT NULL,
          carttemp_sess CHAR(50) NOT NULL,
          carttemp_prodnum CHAR(5) NOT NULL,
          carttemp_quan NUMBER(3) NOT NULL,
          PRIMARY KEY (carttemp_hidden));

