-- Active: 1664941266069@@mantenimiento.cjedgm57ynt9.sa-east-1.rds.amazonaws.com@3306@sys

DELIMITER//
create PROCEDURE mostrar_orden_lista(IN idMostrar INT)
BEGIN
    SELECT 
    orden.idorden,
    proc.nombre,
    proc.cargalab,
    DATE(orden.inicio),
    TIME(orden.inicio),
    DATE(orden.final),
    TIME(orden.final),
    prioridad.nombre
    FROM sys.ordentrabajo as orden 
    INNER JOIN procedimiento as proc on orden.idprocedimiento = proc.idprocedimiento 
    INNER JOIN prioridad on orden.idprioridad = prioridad.idprioridad
    WHERE orden.estado = idMostrar;
END
DELIMITER //

DELIMITER //

CREATE PROCEDURE mostrar_orden_estado(IN idMostrar INT)
BEGIN
    SELECT 
    orden.idorden,
    orden.idprocedimiento, 
    proc.nombre,
    proc.cargalab,
    orden.inicio,
    orden.final,
    prioridad.nombre,
    IF(orden.estado=1,'Abierto','Cerrado'),
    orden.descripcion
    FROM sys.ordentrabajo as orden 
    INNER JOIN procedimiento as proc on orden.idprocedimiento = proc.idprocedimiento 
    INNER JOIN prioridad on orden.idprioridad = prioridad.idprioridad
    WHERE orden.estado = idMostrar;
    END
DELIMITER //

CALL mostrar_orden_estado(2);
DELIMITER
CALL mostrar_orden_lista(2);
