<?php
    require_once('./db/config.php');
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=venta de zapatillas;charset=utf8', 'root', '');
        $this->_deploy();
    } 

    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql = <<<END
                Base de datos: `venta de zapatillas`

                Estructura de tabla para la tabla `fabrica`

                CREATE TABLE `fabrica` (
                `id` int(11) NOT NULL,
                `nombre` varchar(100) NOT NULL,
                `importador` varchar(100) NOT NULL,
                `pais` varchar(100) NOT NULL,
                `cantidad` int(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                Volcado de datos para la tabla `fabrica`

                INSERT INTO `fabrica` (`id`, `nombre`, `importador`, `pais`, `cantidad`) VALUES
                (1, 'Nike', 'Juan Luis Rodriguez', 'Estados Unidos', 50),
                (2, 'Adidas', 'Andres Lopez', 'Estados Unidos', 25),
                (3, 'Puma', 'Luis Ignacio Martinez', 'Alemania', 70),
                (4, 'Converse', 'Thomas Shelby', 'Alemania', 50),
                (5, 'New Balance', 'Jhon Trump', 'Estados Unidos', 90),
                (6, 'DC', 'Peruano', 'Puerto Rico', 5);

                Estructura de tabla para la tabla `modelo`


                CREATE TABLE `modelo` (
                `id_zapatilla` int(11) NOT NULL,
                `id_fabrica` int(11) NOT NULL,
                `precio` int(100) NOT NULL,
                `nombre` varchar(100) NOT NULL,
                `stock` int(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                Volcado de datos para la tabla `modelo`


                INSERT INTO `modelo` (`id_zapatilla`, `id_fabrica`, `precio`, `nombre`, `stock`) VALUES
                (1, 1, 120, 'Air Force 1 \'07 Next Nature', 5),
                (2, 2, 120, 'Campus 00s', 10),
                (4, 3, 150, 'Samba OG', 5),
                (9, 1, 140, 'Air Jordan', 15),
                (10, 2, 100, 'SL 72 RS', 5),
                (11, 4, 100, 'Star Player 76', 15),
                (13, 6, 120, 'Court Graffik Ss (Xw)', 10),
                (14, 5, 160, '530', 15);

                Estructura de tabla para la tabla `usuario`


                CREATE TABLE `usuario` (
                `id` int(11) NOT NULL,
                `user` varchar(250) NOT NULL,
                `password` char(60) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                Volcado de datos para la tabla `usuario`


                INSERT INTO `usuario` (`id`, `user`, `password`) VALUES
                (1, 'webadmin', '$2y$10$1zkQ5p1OqmcGMyw6NEf7B./d.r3DSAbBEcVRO/zE1Ge1dAGLOzETG');


                Índices para tablas volcadas

                Indices de la tabla `fabrica`

                ALTER TABLE `fabrica`
                ADD PRIMARY KEY (`id`);

                Indices de la tabla `modelo`

                ALTER TABLE `modelo`
                ADD PRIMARY KEY (`id_zapatilla`),
                ADD KEY `modelo_ibfk_1` (`id_fabrica`);

                Indices de la tabla `usuario`

                ALTER TABLE `usuario`
                ADD PRIMARY KEY (`id`),
                ADD UNIQUE KEY `email` (`user`);

                AUTO_INCREMENT de las tablas volcadas

                AUTO_INCREMENT de la tabla `fabrica`

                ALTER TABLE `fabrica`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

                AUTO_INCREMENT de la tabla `modelo`

                ALTER TABLE `modelo`
                MODIFY `id_zapatilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

                AUTO_INCREMENT de la tabla `usuario`

                ALTER TABLE `usuario`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


                Restricciones para tablas volcadas

                Filtros para la tabla `modelo`

                ALTER TABLE `modelo`
                ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_fabrica`) REFERENCES `fabrica` (`id`);
                COMMIT;
        END;
        $this->db->query($sql);
        } 
    }
}