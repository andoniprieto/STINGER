# Web orrialdea publikatzeko pausuak

Dokumentu honek **Bergarako Antzokiaren** Laravel proiektua Windows-en **Apache Lounge** + **PHP (FastCGI)** erabiliz hedatzeko urratsak azaltzen ditu.

## Edukiak

1. [PHP konfiguratu](#1-php-konfiguratu)
2. [Apache Lounge konfiguratu](#2-apache-lounge-konfiguratu)
3. [Zerbitzua eta suebakia](#3-zerbitzua-eta-suebakia)
4. [Laravel proiektua](#4-laravel-proiektua)
5. [.env fitxategia](#5-env-fitxategia)
6. [Datu-basea](#6-datu-basea)
7. [Frontend-a](#7-frontend-a)
8. [Storage eta cachea](#8-storage-eta-cachea)
9. [Virtual Host eta DNS lokala](#9-virtual-host-eta-dns-lokala)
10. [Azken probak](#10-azken-probak)

### Aurrebaldintzak

- PHP `C:\php` karpetan
- Apache Lounge `C:\Apache24` karpetan
- Composer, Git, Node.js eta npm instalatuta
- MySQL datu basea martxan

---

## 1. PHP konfiguratu

Bilatu fitxategia, egin klik eskuineko botoiarekin eta editatu Ohar-blokarekin (Notepad).

Editatu `C:\php\php.ini` eta lerro hauek **deskomentatu** (hasierako `;` ikurrak kendu):

```ini
extension_dir = "ext"

extension=curl
extension=fileinfo
extension=intl
extension=mbstring
extension=openssl
extension=pdo_mysql
extension=zip

curl.cainfo = "C:/php/cacert.pem"
openssl.cafile = "C:/php/cacert.pem"
```

> Deskargatu `cacert.pem`: <http://curl.se/ca/cacert.pem> eta `C:\php` karpetan gorde.

### Probak

PowerShell-en hurrengo **komandoak** exekutatu.

| Komandoa | Espero den emaitza |
|---|---|
| `php -v` | Abisurik gabe |
| `composer diagnose` | SSL errorerik gabe |
| `composer self-update` | Erroreren bat ematen badu edo eguneratzeko eskatzen badu |

---

## 2. Apache Lounge konfiguratu

### Moduluak

Deskargatu `mod_fcgid.so`: <https://www.apachelounge.com/download/> eta `C:\Apache24\modules` karpetan gorde.

### `httpd.conf` editatu

Editatu `C:\Apache24\conf\httpd.conf`.

**Aldatu:**

```apache
Define SRVROOT "C:/Apache24"
ServerName localhost:80
```

**Deskomentatu:**

```apache
LoadModule rewrite_module modules/mod_rewrite.so
LoadModule headers_module modules/mod_headers.so
LoadModule ssl_module modules/mod_ssl.so
LoadModule socache_shmcb_module modules/mod_socache_shmcb.so
LoadModule fcgid_module modules/mod_fcgid.so
```

**Aldatu:**

```apache
DirectoryIndex index.php index.html
```

**Gehitu:**

```apache
<IfModule fcgid_module>
    FcgidInitialEnv PHPRC "C:/php"
    FcgidInitialEnv PHP_FCGI_MAX_REQUESTS 1000
    <Files ~ "\.php$">
        Options +ExecCGI
        AddHandler fcgid-script .php
        FcgidWrapper "C:/php/php-cgi.exe" .php
    </Files>
</IfModule>
```

**Deskomentatu:**

```apache
Include conf/extra/httpd-vhosts.conf
```

### Probak

CMD-an hurrengo **komandoak** exekutatu:

```cmd
cd C:\Apache24\bin\
```

| Komandoa | Espero den emaitza |
|---|---|
| `httpd.exe -t` | `Syntax OK` |
| `httpd.exe -M \| findstr /i "rewrite ssl headers fcgid"` | 4 moduluak agertzen dira |

---

## 3. Zerbitzua eta suebakia

CMD-a ireki eta Apache zerbitzu gisa instalatu (horrela ez da eskuz abiarazi behar):

```cmd
cd C:\Apache24\bin\
httpd.exe -k install
```

PowerShell ireki eta zerbitzua abiarazi:

```powershell
Start-Service Apache2.4
```

### 80 eta 443 portuak suebakian baimendu

PowerShell **administratzaile gisa** ireki:

```powershell
New-NetFirewallRule -DisplayName "HTTP" -Direction Inbound -Protocol TCP -LocalPort 80 -Action Allow
New-NetFirewallRule -DisplayName "HTTPS" -Direction Inbound -Protocol TCP -LocalPort 443 -Action Allow
```

### Probak

| Proba | Espero den emaitza |
|---|---|
| Nabigatzailean <http://localhost> ireki | `It works!` agertzen da |
| PowerShell-en: `Get-Service Apache2.4` | `Running` |

---

## 4. Laravel proiektua

### Proiektua deskargatu

1. `www` karpeta `C:\` diskoan sortu → `C:\www` geratu behar da.
2. CMD-a karpeta horretan (`C:\www`) ireki eta repositorioa klonatu → `C:\www\STINGER` geratu behar da.

```cmd
git clone https://github.com/andoniprieto/STINGER.git
```

### Produkziorako dependentziak

PowerShell ireki:

```powershell
cd C:\www\STINGER\APP

# boost, debugbar... dauden lerroak erakusten ditu
Select-String -Path composer.json -Pattern "boost|debugbar" -Context 1,1

Remove-Item bootstrap\cache\packages.php, bootstrap\cache\services.php, bootstrap\cache\config.php -ErrorAction SilentlyContinue

composer install --no-dev --optimize-autoloader --no-scripts

php artisan package:discover --ansi
```

### Probak

PowerShell-en jarraitu, `C:\www\STINGER\APP` karpetan:

| Komandoa | Espero den emaitza |
|---|---|
| `Test-Path vendor\autoload.php` | `True` |
| `php artisan --version` | `Laravel 13.x` |
| `Select-String -Path bootstrap\cache\packages.php -Pattern "debugbar"` | Ez du ezer itzuli behar |

---

## 5. `.env` fitxategia

Fitxategia kopiatu `.env.example` → `.env`.

Aplikazioaren gakoa sortu:

```powershell
php artisan key:generate
```

`.env` fitxategia editatu eta hurrengoa **jarri**:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=http://bergara.antzokia.eus
```

**Deskomentatu** eta `DB_DATABASE`, `DB_USERNAME` eta `DB_PASSWORD` zure datuekin aldatu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_stinger
DB_USERNAME=root
DB_PASSWORD=root
```

### Probak

```powershell
php artisan config:clear
php artisan about
```

Espero den emaitza: `Environment: production` eta `Debug Mode: OFF`.

---

## 6. Datu-basea

```powershell
php artisan migrate --force
```

### Probak

| Komandoa | Espero den emaitza |
|---|---|
| `php artisan migrate:status` | Migrazio guztiak `Ran` egoeran |

---

## 7. Frontend-a

```powershell
npm ci
npm run build
```

### Probak

| Komandoa | Espero den emaitza |
|---|---|
| `Test-Path public\build\manifest.json` | `True` |

---

## 8. Storage eta cachea

PowerShell **administratzaile gisa** ireki:

```powershell
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

> **Gero `.env` aldatzen baduzu**, exekutatu:
>
> ```powershell
> php artisan config:clear
> php artisan config:cache
> ```

### Probak

| Komandoa | Espero den emaitza |
|---|---|
| `Test-Path public\storage` | `True` |

---

## 9. Virtual Host eta DNS lokala

### Virtual Host

`C:\Apache24\conf\extra\httpd-vhosts.conf` editatu, eta adibide bezala dauden VirtualHost-ak ezabatu eta hurrengoa kopiatu:

```apache
<VirtualHost *:80>
    ServerName bergara.antzokia.eus
    DocumentRoot "C:/www/STINGER/APP/public"
    <Directory "C:/www/STINGER/APP/public">
        Options +FollowSymLinks +ExecCGI
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog "logs/got-error.log"
    CustomLog "logs/got-access.log" common
</VirtualHost>
```

### DNS

PowerShell **administratzaile gisa** ireki:

```powershell
Add-Content C:\Windows\System32\drivers\etc\hosts "127.0.0.1 bergara.antzokia.eus"

C:\Apache24\bin\httpd.exe -t

# Apache zerbitzua berrabiarazi
Restart-Service Apache2.4
```

---

## 10. Azken probak

CMD-a ireki:

| Komandoa | Espero den emaitza |
|---|---|
| `curl.exe -I http://bergara.antzokia.eus` | `HTTP/1.1 200 OK` |
| `C:\Apache24\bin\httpd.exe -t` | `Syntax OK` (`AH00112` gabe) |

Nabigatzailean:

| URLa | Espero den emaitza |
|---|---|
| <http://bergara.antzokia.eus/ezer-ez-dago> | `404 \| NOT FOUND` |
| <http://bergara.antzokia.eus/.env> | `404 \| NOT FOUND` |