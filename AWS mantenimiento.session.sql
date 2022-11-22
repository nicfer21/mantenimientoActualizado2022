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

DELIMITER //



DELIMITER //

show CREATE table ordentrabajo;


SELECT procedimiento.idtrabajador, concat(t_apelllido,', ',t_nombre),p_prof,t_tarifa,idreptrabajo,idorden,ordentrabajo.idprocedimiento from reptrabajo
inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
inner join m_trabajador on m_trabajador.t_dni = procedimiento.idtrabajador
inner join m_profesion on m_profesion.p_id = m_trabajador.t_profesion

where idreptrabajo = 1;


SELECT o.inicio,o.final,p.cargalab,prio.nombre from ordentrabajo as o
INNER JOIN procedimiento as p on p.idprocedimiento = o.idprocedimiento
inner JOIN prioridad as prio on prio.idprioridad = o.idprioridad
where o.idorden = 1;

SELECT inicio,final,tiempo from reptrabajo where idreptrabajo = 1;

SELECT maquina.id_maq,maquina.nombre,parte.id_parte,parte.parte,subparte.id_subparte,subparte.subparte,procedimiento.nombre,reptrabajo.observacion
 from reptrabajo
    inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
    inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
    inner join maquina on procedimiento.idmaquina = maquina.id_maq
    inner join parte on procedimiento.idparte = parte.id_parte
    inner join subparte on procedimiento.idsubparte = subparte.id_subparte
    where idreptrabajo = 1;

    SELECT 
                            categoria.nombre,
                            inventario.idinventario,
                            inventario.nombre,
                            requisito.cantidad,
                            inventario.costou,
                            tipo.nombre,
                            unidad.nombre,
                            requisito.costo
                            FROM 
                            ((((requisito inner join inventario on requisito.idinventario = inventario.idinventario) inner join tipo on inventario.idtipo = tipo.idtipo) 
                            inner join fabricante on inventario.idfabricante = fabricante.idfabricante)
                            inner join categoria on inventario.idcategoria = categoria.idcategoria)
                            inner join unidad on inventario.idunidad = unidad.idunidad
                            where idprocedimiento = 1 order by categoria.idcategoria;