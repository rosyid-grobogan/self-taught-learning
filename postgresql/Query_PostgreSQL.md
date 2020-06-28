## CREATE TABLE
```
create table user (
	id  bigserial not null, 
	name varchar(255), 
	password varchar(255), 
	type varchar(255), 
	primary key (id))
```

## cutomers 

```
CCREATE TABLE public.customers (
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(255),
	price INTEGER(11),
	created_at TIMESTAMP
);
```

## service

```
CREATE TABLE public.service(
	id SERIAL PRIMARY NOT NULL,
	problem VARCHAR(255),
	start_date TIMESTAMP
);
```



## MAX

Nilai Tertinggi

```
SELECT MAX(price) FROM sparepart
```

Nilai Terendah

```
SELECT MIX(price) FROM sparepart
```

Jumlah Baris

```
SELECT COUNT(*) FROM sparepart
```

Rata-rata

```
SELECT AVG(price) FROM sparepart
```

Penjumlahan total nilai di dalam kolom price

```
SELECT SUM(price)
```



