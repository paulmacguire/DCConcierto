CREATE OR REPLACE FUNCTION importar_usuarios()

-- declaramos la funcion y sus argumentos



-- declaramos lo que retorna

RETURNS void AS $$

-- declaramos las variables

DECLARE 

    artista RECORD;
    productora RECORD;
    tupla_artista RECORD;
    tupla_productora RECORD;
    contrasena_nueva VARCHAR(50);


-- definimos nuestra funcion

BEGIN 
-- revisamos si existe la tabla usuarios, sino, la creamos
  IF EXISTS(SELECT FROM pg_tables WHERE tablename='usuarios') THEN
        artista := TRUE;
        productora := TRUE;
  ELSE 
        artista := NULL;
        productora := NULL;
        CREATE TABLE usuarios(
        id_usuario SERIAL PRIMARY KEY,
        nombre VARCHAR(150),
        contrasena VARCHAR(100),
        tipo_usuario VARCHAR(50));
					
  END IF;

-- crear conexiones 

IF artista IS NULL THEN

    FOR tupla_artista IN (SELECT * FROM artistas)
    LOOP
      -- Generar contraseña y construir nombre
      SELECT floor(random() * (999999999-100 + 1) + 100) INTO contrasena_nueva;
      INSERT INTO usuarios (nombre, contrasena, tipo_usuario) VALUES (REPLACE((LOWER(tupla_artista.nombre_artistico)), ' ', '_'), contrasena_nueva, 'Artista');
    END LOOP;
  END IF;
  
IF productora IS NULL THEN

    FOR tupla_productora IN (SELECT * FROM productoras)

    LOOP
      -- Generar contraseña y construir nombre
      SELECT floor(random() * (999999999-100 + 1) + 100) INTO contrasena_nueva;
      INSERT INTO usuarios (nombre, contrasena, tipo_usuario) VALUES (REPLACE((LOWER(tupla_productora.nombre)), ' ', '_'), contrasena_nueva, 'Productora');
    END LOOP;
  END IF;

END 
$$ language plpgsql