<?php
function env($key, $defaultValue){
    $allEnv = getEnvConsts();

    return $allEnv[$key] ?? $defaultValue;
}

function getAppConsts() {
	return [
		'APP_NAME' => env('APP_NAME', 'Default_App_Name'),
		'APP_ENV' => env('APP_ENV', 'production'),
		'APP_DEBUG' => env('APP_DEBUG', false),
		'APP_URL' => env('APP_URL', 'https://localhost'),
		'APP_TIMEZONE' => env('APP_TIMEZONE', 'UTC'),
		'APP_KEY' => env('APP_KEY', ''),
	
		'DB_HOST' => env('DB_HOST', 'localhost'),
		'DB_NAME' => env('DB_NAME', 'test'),
		'DB_USER' => env('DB_USER', 'root'),
		'DB_PASS' => env('DB_PASS', ''),
		'DB_PREFIX' => env('DB_PREFIX', ''),
	];
}

function pdo(){
    $app = getAppConsts();
    
    try {
        $pdo = new \PDO(
            "mysql:host={$app['DB_HOST']};dbname={$app['DB_NAME']}",
            $app['DB_USER'],
            $app['DB_PASS']
        );
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    return $pdo;
}

function pref(){
    $app = getAppConsts();

    $DB_PREFIX = $app["DB_PREFIX"];

    return $DB_PREFIX;
}