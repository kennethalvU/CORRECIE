DELIMITER //
CREATE PROCEDURE SP_INSERT_INFO_DOC(
    IN id_departamento INT,
    IN tipoDoc VARCHAR(255),
    IN descripcion TEXT,
    IN fecha DATETIME,
    IN destino VARCHAR(255), 
    IN folder VARCHAR(255),
    IN caja VARCHAR(255),
    IN observaciones TEXT, 
    IN ruta VARCHAR(512),
    OUT id_salida INT
)
BEGIN
    DECLARE v_id_documento INT;


    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET id_salida = 0;
    END;

    -- Inicio transaccion
    START TRANSACTION;
    
    INSERT INTO documentos(ruta_doc, tipo_doc, descripcion_doc, fecha, folder, caja)
    VALUES(ruta, tipoDoc, descripcion, fecha, folder, caja);
    
    SET v_id_documento = LAST_INSERT_ID();
    
    INSERT INTO acceso_documentos(id_documento, id_departamento)
    VALUES(v_id_documento, id_departamento);
    
    SET id_salida = 1;
    
    COMMIT;
END //
DELIMITER ;
