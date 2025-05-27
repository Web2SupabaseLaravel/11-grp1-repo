# Script to download and install PostgreSQL extension for PHP
$phpPath = "C:\php-8.3.2-nts-Win32-vs16-x64"
$extPath = "$phpPath\ext"
$phpIniPath = "$phpPath\php.ini"

# Download the extension files from PECL
$tempFolder = [System.IO.Path]::GetTempPath()
$downloadPath = Join-Path $tempFolder "php_pgsql.zip"

# Download URL
$downloadUrl = "https://windows.php.net/downloads/releases/latest/php-8.3-nts-Win32-vs16-x64-latest.zip"

Write-Host "Downloading PHP 8.3 package from $downloadUrl..."
Invoke-WebRequest -Uri $downloadUrl -OutFile $downloadPath
Write-Host "Download complete."

# Create temp extraction folder
$extractPath = Join-Path $tempFolder "php_extract"
if (Test-Path $extractPath) {
    Remove-Item -Path $extractPath -Recurse -Force
}
New-Item -Path $extractPath -ItemType Directory | Out-Null

Write-Host "Extracting files..."
Expand-Archive -Path $downloadPath -DestinationPath $extractPath -Force
Write-Host "Extraction complete."

# Copy PostgreSQL extension files
$sourcePgSqlPath = Join-Path $extractPath "ext\php_pgsql.dll"
$sourcePdoPgSqlPath = Join-Path $extractPath "ext\php_pdo_pgsql.dll"

if (Test-Path $sourcePgSqlPath) {
    Copy-Item -Path $sourcePgSqlPath -Destination "$extPath\php_pgsql.dll" -Force
    Write-Host "Copied php_pgsql.dll to the extensions directory."
} else {
    Write-Host "Warning: php_pgsql.dll was not found in the package."
}

if (Test-Path $sourcePdoPgSqlPath) {
    Copy-Item -Path $sourcePdoPgSqlPath -Destination "$extPath\php_pdo_pgsql.dll" -Force
    Write-Host "Copied php_pdo_pgsql.dll to the extensions directory."
} else {
    Write-Host "Warning: php_pdo_pgsql.dll was not found in the package."
}

# Update php.ini
$phpIniContent = Get-Content -Path $phpIniPath -Raw
if (-not ($phpIniContent -match "extension=pgsql")) {
    $phpIniContent = $phpIniContent -replace ";extension=pgsql", "extension=pgsql"
} else {
    $phpIniContent = $phpIniContent -replace ";extension=pgsql", "extension=pgsql"
}

if (-not ($phpIniContent -match "extension=pdo_pgsql")) {
    $phpIniContent = $phpIniContent -replace ";extension=pdo_pgsql", "extension=pdo_pgsql"
} else {
    $phpIniContent = $phpIniContent -replace ";extension=pdo_pgsql", "extension=pdo_pgsql"
}

Set-Content -Path $phpIniPath -Value $phpIniContent
Write-Host "Updated php.ini to enable PostgreSQL extensions."

# Clean up
Remove-Item -Path $downloadPath -Force
Remove-Item -Path $extractPath -Recurse -Force
Write-Host "Cleanup complete."

Write-Host "PostgreSQL extension installation completed!"
Write-Host "Please restart your web server."

net start postgresql

createdb -U postgres laravel

php artisan migrate 