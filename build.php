<?php
define("APP_VERSION", "1.0");

$config = require("config.php");

$zipFile = "out/{$config['idname']}-{$config['version']}.zip";
$zipArchive = new ZipArchive();

if(!$zipArchive->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    die("Failed to create archive \n");
}

$zipArchive->addGlob("./config.php");
$zipArchive->addGlob("./index.php");
$zipArchive->addGlob("./instagram-automatic.php");
$zipArchive->addGlob("./views/*.*");
$zipArchive->addGlob("./controllers/*.*");

if(!$zipArchive->status == ZipArchive::ER_OK) {
    echo "Failed to write files to zip \n";
}

$zipArchive->close();