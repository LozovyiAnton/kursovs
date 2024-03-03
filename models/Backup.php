<?php

namespace models;


use core\DBBackup;

class Backup
{
    protected static $backup_config = array(
        'DB_HOST' => DATABASE_HOST, ////Database hostname
        'DB_NAME' => DATABASE_BASENAME, //Database name to backup
        'DB_USERNAME' => DATABASE_LOGIN, //Database account username
        'DB_PASSWORD' => DATABASE_PASSWORD, //Database account password
        'INCLUDE_DROP_TABLE' => false, //Include DROP TABLE IF EXISTS
        'SAVE_DIR' => 'F:/programs/coding/OSPanel/OSPanel/domains/passport/static/bu/', //Folder to save file in
        'SAVE_AS' => '', //Prepend filename
        'APPEND_DATE_FORMAT' => 'Y-m-d-H-i', //Append date to file name
        'TIMEZONE' => 'UTC', //Timezone for date format
        'COMPRESS' => true, //Compress into gz otherwise keep as .sql
    );

    public static function createBackup()
    {
        DBBackup::backupDB(self::$backup_config);
    }

    public static function getBackupFiles()
    {
        $fileList = scandir(self::$backup_config['SAVE_DIR']);

        // Видаляємо спеціальні папки "." і ".." зі списку.
        $fileList = array_diff($fileList, array('.', '..'));

        // Повертаємо список файлів у папці.
        return array_reverse($fileList);
    }

    public static function getBackupFilesNames()
    {
        $fileList = self::getBackupFiles();
        foreach ($fileList as &$file) {
            $file = substr($file, 0, -7);
        }

        return array_reverse($fileList);
    }

    public static function combineBackupData()
    {
        $backupFiles = self::getBackupFiles();
        $backupNames = self::getBackupFilesNames();

        $combinedData = [];
        for ($i = 0; $i < count($backupFiles); $i++) {

            if (strpos($backupNames[$i], "11-00") !== false) {
                $backupNames[$i].='_autosave';
            }
            $combinedData[] = [
                'name' => $backupNames[$i],
                'path' => $backupFiles[$i]
            ];
        }
        $combinedData = array_reverse($combinedData);
        return $combinedData;
    }

    public static function restoreBackup($file)
    {
        DBBackup::restoreDB(self::$backup_config, $file);
    }
}
