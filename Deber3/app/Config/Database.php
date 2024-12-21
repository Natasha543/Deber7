<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Configuración de la base de datos en CodeIgniter 4
 */
class Database extends Config
{
    /**
     * El directorio que contiene las carpetas de Migraciones y Seeds.
     * Normalmente, se encuentra en `app/Database/`.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Grupo de conexión por defecto que se usará si no se especifica otro.
     * En este caso, el grupo predeterminado es 'default'.
     */
    public string $defaultGroup = 'default';

    /**
     * Configuración de la conexión por defecto.
     * Este grupo será utilizado para la mayoría de las operaciones de base de datos.
     */
    public array $default = [
        // Data Source Name (DSN), útil para conexiones avanzadas.
        'DSN'          => '',
        
        // Nombre del servidor o dirección IP del servidor de la base de datos.
        'hostname'     => 'localhost',
        
        // Usuario con permisos en la base de datos.
        'username'     => 'root',
        
        // Contraseña del usuario de la base de datos.
        'password'     => '',
        
        // Nombre de la base de datos a la que se conectará CodeIgniter.
        'database'     => 'actividad3db',
        
        // Controlador que se utilizará (MySQL en este caso).
        'DBDriver'     => 'MySQLi',
        
        // Prefijo de tabla (opcional) que se usará al trabajar con múltiples bases de datos.
        'DBPrefix'     => '',
        
        // Indica si la conexión es persistente (recomendada false por defecto).
        'pConnect'     => false,
        
        // Muestra errores de la base de datos si no estás en producción.
        'DBDebug'      => (ENVIRONMENT !== 'production'),
        
        // Juego de caracteres usado por la conexión.
        'charset'      => 'utf8mb4',
        
        // Intercalación para las tablas y datos (combinado con el charset).
        'DBCollat'     => 'utf8mb4_general_ci',
        
        // Prefijo de reemplazo para las tablas (normalmente vacío).
        'swapPre'      => '',
        
        // Si se requiere cifrado en la conexión (usualmente falso).
        'encrypt'      => false,
        
        // Compresión de la conexión (opcional, falso por defecto).
        'compress'     => false,
        
        // Establece si las reglas estrictas están habilitadas (útil en bases de datos modernas).
        'strictOn'     => false,
        
        // Configuración de conmutación por error (failover) en caso de problemas con la base principal.
        'failover'     => [],
        
        // Puerto del servidor de la base de datos (3306 por defecto para MySQL).
        'port'         => 3306,
    ];

    /**
     * Configuración de base de datos para pruebas (testing).
     * Se usa al ejecutar pruebas automáticas con PHPUnit.
     */
    public array $tests = [
        // Data Source Name (DSN) para conexiones avanzadas.
        'DSN'         => '',
        
        // Host del servidor de base de datos para pruebas.
        'hostname'    => '127.0.0.1',
        
        // Usuario de la base de datos para pruebas.
        'username'    => '',
        
        // Contraseña del usuario para pruebas.
        'password'    => '',
        
        // Base de datos en memoria (SQLite) para pruebas rápidas.
        'database'    => ':memory:',
        
        // Controlador de base de datos (SQLite para pruebas).
        'DBDriver'    => 'SQLite3',
        
        // Prefijo de tabla para diferenciar en las pruebas (opcional).
        'DBPrefix'    => 'db_',
        
        // Conexión persistente (normalmente falso en pruebas).
        'pConnect'    => false,
        
        // Muestra errores de la base de datos en pruebas.
        'DBDebug'     => true,
        
        // Juego de caracteres en pruebas.
        'charset'     => 'utf8',
        
        // Intercalación (usualmente vacío en SQLite).
        'DBCollat'    => '',
        
        // Prefijo de reemplazo para tablas (normalmente vacío).
        'swapPre'     => '',
        
        // Cifrado de conexión (falso por defecto en pruebas).
        'encrypt'     => false,
        
        // Compresión de conexión (falso por defecto en pruebas).
        'compress'    => false,
        
        // Reglas estrictas en pruebas (normalmente falso).
        'strictOn'    => false,
        
        // Configuración de conmutación por error (vacía en pruebas).
        'failover'    => [],
        
        // Puerto del servidor (opcional en pruebas).
        'port'        => 3306,
        
        // Habilita claves foráneas en SQLite.
        'foreignKeys' => true,
        
        // Tiempo de espera para SQLite (opcional).
        'busyTimeout' => 1000,
        
        // Formatos de fecha y hora específicos para pruebas.
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    /**
     * Constructor de la clase.
     * Cambia automáticamente el grupo de conexión a 'tests' si el entorno es de pruebas.
     */
    public function __construct()
    {
        // Llama al constructor de la clase padre (Config).
        parent::__construct();

        // Si el entorno actual es 'testing', cambia el grupo predeterminado a 'tests'.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}