<?php
define("APP_VERSION", null);

$config = require("config.php");

$zipFile = "out/{$config['idname']}-{$config['version']}.zip";
$zipArchive = new ZipArchive();

if(!$zipArchive->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    die("Failed to create archive \n");
}

$zipArchive->addGlob("controllers/*.*");
$zipArchive->addGlob("views/*.*");
$zipArchive->addGlob("views/*/*");
$zipArchive->addGlob("config.php");
$zipArchive->addGlob("index.php");
$zipArchive->addGlob("module-starter.php");

if(!$zipArchive->status == ZipArchive::ER_OK) {
    echo "Failed to write files to zip \n";
}

$zipArchive->close();