create table nhanvien
(
    IDNV   int auto_increment
        primary key,
    Hoten  varchar(50) null,
    IDPB   int         not null,
    Diachi varchar(50) null,
    constraint FK_staff_department
        foreign key (IDPB) references phongban (IDPB)
);

