drop sequence cust_seq;
drop sequence ord_seq;
drop sequence cart_seq;
drop sequence od_seq;
create sequence cust_seq
start with 1
increment by 1
nomaxvalue;


create sequence ord_seq
start with 1
increment by 1
nomaxvalue;


create sequence cart_seq
start with 1
increment by 1
nomaxvalue;

create trigger cart_trigger
before insert on carttemp
for each row
begin
select cart_seq.nextval into :new.carttemp_hidden from dual;
end;
.
/

create sequence od_seq
start with 1
increment by 1
nomaxvalue;

create trigger od_trigger
before insert on orderdet
for each row
begin
select od_seq.nextval into :new.orderdet_id from dual;
end;
.
/

