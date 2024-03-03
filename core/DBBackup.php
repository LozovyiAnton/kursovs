<?php

namespace core;

use PDO;
use PDOException;

class DBBackup
{
    public static function backupDB(array $config): string
    {
        $db = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}; charset=utf8", $config['DB_USERNAME'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);

        date_default_timezone_set($config['TIMEZONE']);
        $do_compress = $config['COMPRESS'];

        if ($do_compress) {
            $save_string = $config['SAVE_AS'] . $config['SAVE_DIR'] . date($config['APPEND_DATE_FORMAT']) . '.sql.gz';
            $zp = gzopen($save_string, "a9");
        } else {
            $save_string = $config['SAVE_AS'] . $config['SAVE_DIR'] . date($config['APPEND_DATE_FORMAT']) . '.sql';
            $handle = fopen($save_string, 'a+');
        }

        //array of all database field types which just take numbers
        $numtypes = array('tinyint', 'smallint', 'mediumint', 'int', 'bigint', 'float', 'double', 'decimal', 'real');

        $return = "";
        $return .= "CREATE DATABASE IF NOT EXISTS`{$config['DB_NAME']}`;\n";
        $return .= "USE `{$config['DB_NAME']}`;\n";

        //get all tables
        $pstm1 = $db->query('SHOW TABLES');
        while ($row = $pstm1->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }

        //cycle through the table(s)
        foreach ($tables as $table) {
            $result = $db->query("SELECT * FROM $table");
            $num_fields = $result->columnCount();
            $num_rows = $result->rowCount();

            if ($config['INCLUDE_DROP_TABLE']) {
                $return .= 'DROP TABLE IF EXISTS `' . $table . '`;';
            }

            //table structure
            $pstm2 = $db->query("SHOW CREATE TABLE $table");
            $row2 = $pstm2->fetch(PDO::FETCH_NUM);
            $ifnotexists = str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $row2[1]);
            $return .= "\n\n" . $ifnotexists . ";\n\n";

            if ($do_compress) {
                gzwrite($zp, $return);
            } else {
                fwrite($handle, $return);
            }
            $return = "";

            //insert values
            if ($num_rows) {
                $return = 'INSERT IGNORE INTO `' . $table . '` (';
                $pstm3 = $db->query("SHOW COLUMNS FROM $table");
                $count = 0;
                $type = array();

                while ($rows = $pstm3->fetch(PDO::FETCH_NUM)) {
                    if (stripos($rows[1], '(')) {
                        $type[$table][] = stristr($rows[1], '(', true);
                    } else {
                        $type[$table][] = $rows[1];
                    }

                    $return .= "`" . $rows[0] . "`";
                    $count++;
                    if ($count < ($pstm3->rowCount())) {
                        $return .= ", ";
                    }
                }

                $return .= ")" . ' VALUES';

                if ($do_compress) {
                    gzwrite($zp, $return);
                } else {
                    fwrite($handle, $return);
                }
                $return = "";
            }
            $counter = 0;
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $return = "\n\t(";

                for ($j = 0; $j < $num_fields; $j++) {

                    if (isset($row[$j])) {

                        //if number, take away "". else leave as string
                        if ((in_array($type[$table][$j], $numtypes)) && (!empty($row[$j]))) {
                            $return .= $row[$j];
                        } else {
                            $return .= $db->quote($row[$j]);
                        }
                    } else {
                        $return .= 'NULL';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }
                $counter++;
                if ($counter < ($result->rowCount())) {
                    $return .= "),";
                } else {
                    $return .= ");";
                }
                if ($do_compress) {
                    gzwrite($zp, $return);
                } else {
                    fwrite($handle, $return);
                }
                $return = "";
            }
            $return = "\n\n-- ------------------------------------------------ \n\n";
            if ($do_compress) {
                gzwrite($zp, $return);
            } else {
                fwrite($handle, $return);
            }
            $return = "";
        }

        $error1 = $pstm2->errorInfo();
        $error2 = $pstm3->errorInfo();
        $error3 = $result->errorInfo();
        echo $error1[2];
        echo $error2[2];
        echo $error3[2];

        if ($do_compress) {
            gzclose($zp);
        } else {
            fclose($handle);
        }
        return "{$config['DB_NAME']} saved as $save_string";
    }

    public static function restoreDB(array $config, string $file): string
    {
        $db = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}; charset=utf8", $config['DB_USERNAME'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);

        $save_string = $config['SAVE_AS'] . $config['SAVE_DIR'] . $file;

        // Check if the file exists
        if (!file_exists($save_string)) {
            return "Backup file not found: $save_string.";
        }

        // Open the gzipped backup file
        $zp = gzopen($save_string, "r");

        // Temporary variable to store the SQL query
        $query = "";

        while (($line = gzgets($zp)) !== false) {
            // Ignore comments and empty lines
            if (trim($line) == '' || substr($line, 0, 2) == '--') {
                continue;
            }

            // Append the line to the current query
            $query .= $line;

            // If the query ends with a semicolon, execute it and reset the $query variable
            if (substr(rtrim($query), -1) == ';') {
                try {
                    $db->exec($query);
                } catch (PDOException $e) {
                    return "Error restoring the database: " . $e->getMessage();
                }
                $query = "";
            }
        }

        // Close the gzipped file handle
        gzclose($zp);

        return "Database {$config['DB_NAME']} has been successfully restored from $save_string.";
    }

}
