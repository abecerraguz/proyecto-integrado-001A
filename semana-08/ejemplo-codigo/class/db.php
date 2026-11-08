<?php
/**
 * db.php — Clase para conectarse y consultar MySQL con consultas preparadas.
 * Es la misma clase que usamos en Lenguajes de Programación (proyecto cms-nuevo).
 *
 * Uso:
 *   $db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
 *   $db->query('SELECT * FROM vv_plantas WHERE p_id = ?', $id);
 *   $planta = $db->fetchArray();   // una fila
 *   $lista  = $db->fetchAll();     // todas las filas
 *   $db->close();
 */
class db {

    protected $connection;
    protected $query;
    // En el hosting cambia a FALSE: así no se muestran detalles del error en pantalla.
    protected $show_errors = TRUE;
    protected $query_closed = TRUE;
    public $query_count = 0;

    // Constructor: se conecta a la base de datos
    public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = '', $charset = 'utf8mb4') {
        // Desde PHP 8.1 mysqli lanza excepciones; las desactivamos para usar el manejo de errores de esta clase
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->connection = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($this->connection->connect_error) {
            $this->error('No se pudo conectar a MySQL - ' . $this->connection->connect_error);
        }
        $this->connection->set_charset($charset);
    }

    // Prepara y ejecuta una consulta. Los valores después del SQL reemplazan cada "?".
    public function query($query) {
        if (!$this->query_closed) {
            $this->query->close();
        }
        if ($this->query = $this->connection->prepare($query)) {
            if (func_num_args() > 1) {
                $x = func_get_args();
                $args = array_slice($x, 1);
                $types = '';
                $args_ref = array();
                foreach ($args as $k => &$arg) {
                    if (is_array($args[$k])) {
                        foreach ($args[$k] as $j => &$a) {
                            $types .= $this->_gettype($args[$k][$j]);
                            $args_ref[] = &$a;
                        }
                    } else {
                        $types .= $this->_gettype($args[$k]);
                        $args_ref[] = &$arg;
                    }
                }
                array_unshift($args_ref, $types);
                call_user_func_array(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
            if ($this->query->errno) {
                $this->error('No se puede procesar la consulta de MySQL (revisa tus parámetros) - ' . $this->query->error);
            }
            $this->query_closed = FALSE;
            $this->query_count++;
        } else {
            $this->error('No se puede preparar la declaración de MySQL (revisa tu sintaxis) - ' . $this->connection->error);
        }
        return $this;
    }

    // Devuelve todas las filas del resultado como un arreglo de arreglos
    public function fetchAll($callback = null) {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            if ($callback != null && is_callable($callback)) {
                $value = call_user_func($callback, $r);
                if ($value == 'break') {
                    break;
                }
            } else {
                $result[] = $r;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }

    // Devuelve una sola fila (o un arreglo vacío si no hay resultados)
    public function fetchArray() {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            foreach ($row as $key => $val) {
                $result[$key] = $val;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }

    // Cierra la conexión
    public function close() {
        return $this->connection->close();
    }

    // Número de filas de la consulta
    public function numRows() {
        $this->query->store_result();
        return $this->query->num_rows;
    }

    // Filas afectadas por un INSERT, UPDATE o DELETE
    public function affectedRows() {
        return $this->query->affected_rows;
    }

    // Último ID insertado
    public function lastInsertID() {
        return $this->connection->insert_id;
    }

    // Muestra el error (solo si $show_errors es TRUE) y detiene la página
    public function error($error) {
        error_log($error);
        exit($this->show_errors ? $error : 'Ocurrió un problema. Intenta nuevamente más tarde.');
    }

    // Tipo de dato para bind_param: s = texto, d = decimal, i = entero, b = binario
    private function _gettype($var) {
        if (is_null($var))   return 's';   // NULL se envía como NULL
        if (is_string($var)) return 's';
        if (is_float($var))  return 'd';
        if (is_int($var))    return 'i';
        return 'b';
    }
}
