CREATE TABLE IF NOT EXISTS public.bakers
(
	baker_id bigserial NOT NULL UNIQUE PRIMARY KEY,
	baker_name text
);
CREATE TABLE IF NOT EXISTS public.suppliers
(
	supplier_id bigserial NOT NULL UNIQUE PRIMARY KEY,
	supplier_name text,
	status boolean,
	baker_id integer references bakers
);

CREATE OR REPLACE FUNCTION add_supplier(add_name text, add_status boolean, add_backer_id integer)
	RETURNS void
	LANGUAGE 'plpgsql'
	AS $supp$
 BEGIN
  INSERT INTO public.suppliers(supplier_name, status,baker_id) Values(add_name,add_status,add_backer_id);
 END;
$supp$;

CREATE OR REPLACE FUNCTION show_suppliers()
	RETURNS table(
		supplier_id bigint,
		supplier_name text,
		status boolean,
		baker_id integer
	)
	LANGUAGE 'plpgsql'
 AS $show2$
 BEGIN
  return query SELECT * FROM public.suppliers;
 END;
$show2$;

CREATE OR REPLACE FUNCTION del_suppliers(supp_id integer)
	RETURNS void
	LANGUAGE 'plpgsql'
 AS $del$
 BEGIN
  DELETE FROM public.suppliers WHERE supplier_id = supp_id;
 END;
$del$;

CREATE OR REPLACE FUNCTION change_suppliers_name(supp_id integer, supp_name text)
	RETURNS void
	LANGUAGE 'plpgsql'
 AS $up$
 BEGIN
  UPDATE public.suppliers set supplier_name = supp_name WHERE supplier_id = supp_id;
 END;
$up$;

CREATE OR REPLACE FUNCTION change_suppliers_status(supp_id integer, supp_status boolean)
	RETURNS void
	LANGUAGE 'plpgsql'
 AS $up2$
 BEGIN
  UPDATE public.suppliers set status = supp_status WHERE supplier_id = supp_id;
 END;
$up2$;

SELECT add_supplier('SupplierG',true,1);
SELECT * FROM suppliers;
SELECT show_suppliers();
SELECT del_suppliers(2);
SELECT change_suppliers_name(1,'SuppliersB');
SELECT change_suppliers_status(4,FALSE);

CREATE TABLE IF NOT EXISTS public.ingredients
(
    ingredient_id bigserial NOT NULL UNIQUE PRIMARY KEY,
    ingredient_name text,
    region text,
    price real,
    stock integer,
    status boolean,
	supplier_id integer references suppliers
);

CREATE OR REPLACE FUNCTION add_ingredient(add_name text, add_region text, add_price real, add_stock integer, add_status boolean, add_supplier integer)
	 RETURNS void
	 LANGUAGE 'plpgsql'
	AS $ing$
 BEGIN
  INSERT INTO public.ingredients(ingredient_name,region,price,stock,status,supplier_id)
  VALUES(add_name,add_region,add_price,add_stock,add_status,add_supplier);
 END;
$ing$;
SELECT add_ingredient('Tomato','Bavaria',0.45,15,true,1);

SELECT * FROM ingredients;

CREATE OR REPLACE FUNCTION del_ingredient(ing_id integer)
	RETURNS void
	LANGUAGE 'plpgsql'
 AS $del$
 BEGIN
  DELETE FROM public.ingredients WHERE ingredient_id = ing_id;
 END;
$del$;

SELECT del_ingredient(3);

CREATE OR REPLACE FUNCTION change_ingredient_all(ing_id integer, ing_name text, ing_region text, ing_price real, quantity integer, ing_status boolean)
	RETURNS void
	LANGUAGE 'plpgsql'
 AS $up$
 BEGIN
  UPDATE public.ingredients
  set ingredient_name = ing_name, region = ing_region, price = ing_price, stock = quantity, status = ing_status
  WHERE ingredient_id = ing_id;
 END;
$up$;

SELECT change_ingredient_all(8,'walnuts','Hamburg',0.66,35,'f');

CREATE OR REPLACE FUNCTION change_ingredient_status(ing_id integer, ing_status boolean)
	RETURNS void
	LANGUAGE 'plpgsql'
 AS $up$
 BEGIN
  UPDATE public.ingredients
  set status = ing_status
  WHERE ingredient_id = ing_id;
 END;
$up$;

SELECT change_ingredient_status(7,'f');

CREATE TABLE IF NOT EXISTS public.customers
(
	customer_id bigserial NOT NULL UNIQUE PRIMARY KEY,
	customer_name text
);
CREATE TABLE IF NOT EXISTS public.orders
(
	order_id bigserial NOT NULL UNIQUE PRIMARY KEY,
	order_price real,
	order_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS public.base_pizzas
(
	bp_id serial NOT NULL UNIQUE PRIMARY KEY,
	bp_name text,
	bp_size integer
);
CREATE OR REPLACE FUNCTION add_base_pizzas(add_name text, add_size integer)
	RETURNS integer
 	LANGUAGE 'plpgsql'
 AS $add$
 BEGIN
  INSERT INTO public.base_pizzas(bp_name,bp_size) VALUES(add_name, add_size);
 END;
$add$;

CREATE OR REPLACE FUNCTION show_base_pizzas()
	RETURNS table(
		bp_id integer,
		bp_name text,
		bp_size integer
	)
	LANGUAGE 'plpgsql'
 AS $show$
 BEGIN
  return query SELECT * FROM public.base_pizzas;
 END;
$show$;

SELECT show_base_pizzas();

SELECT add_base_pizzas('Beef', '24');
SELECT * FROM base_pizzas;

CREATE TABLE IF NOT EXISTS public.compose_pizzas
(
	cp_id serial NOT NULL UNIQUE PRIMARY KEY,
	cp_name text,
	cp_size integer,
	cp_price real
);


insert into public.bakers(baker_name) values('yasin');
select * from bakers;
