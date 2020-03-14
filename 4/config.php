<?php
/**
 * Using MySQLi Connect for Database Connection
 */

$server = "localhost";//nama server
	$user = "root"; //username server
	$pass = "";  //password
	$dbase = "db_dumbways"; // database yang dipakai
 
	//Membuat koneksi
	$koneksi = mysqli_connect($server, $user, $pass, $dbase);
 
	//Mengecek koneksi 
	if(!$koneksi) {
	 die("Koneksi Gagal : ".mysqli_connect_error());
	}