# STINGER

**Bergarako Antzokiaren web aplikazioa:** ekitaldiak kontsultatu, sarrerak online erosi eta antzokiaren programazioa kudeatu.



---

## Aurkibidea

1. [Proiektua](#1-proiektua)
2. [Taldea](#2-taldea)
3. [Erremintak eta teknologiak](#3-erremintak-eta-teknologiak)
4. [Faseak](#4-faseak)
5. [1. fasea · Analisia](#5-1-fasea--analisia)
6. [2. fasea · Aurreproiektua](#6-2-fasea--aurreproiektua)
7. [3. fasea · Identitate bisuala](#7-3-fasea--identitate-bisuala)
8. [4. fasea · Nabigazio-mapa eta prototipoa](#8-4-fasea--nabigazio-mapa-eta-prototipoa)
9. [5. eta 6. faseak · Garapena](#9-5-eta-6-faseak--garapena)
10. [Instalazioa (garapen-ingurunea)](#10-instalazioa-garapen-ingurunea)
11. [Argitalpena (Windows + Apache Lounge)](#11-argitalpena-windows--apache-lounge)
12. [Biltegiaren egitura eta lan-fluxua](#12-biltegiaren-egitura-eta-lan-fluxua)
13. [Hurrengo urratsak](#13-hurrengo-urratsak)

---

## 1. Proiektua

**Stinger** web aplikazioak garatu eta saltzen dituen enpresa bat da. Erronka honetan, **Bergarako Antzokiak** eskaera bat egin digu: bere ekitaldiak ezagutzera emateko eta sarrerak online saltzeko web aplikazio bat.

Proiektuak bi zati ditu:

| Zatia | Zer | Non |
|---|---|---|
| **Web aplikazioa** | Antzokiaren webgunea: ekitaldiak, sarreren erosketa eta kudeaketa-panela | Windows 11 makina birtuala (Laravel + Apache Lounge + MySQL) |
| **Odoo ERP-a** | Stinger enpresaren kudeaketa: bezeroak, aurrekontuak, proiektuak, orduak, fakturazioa eta langileak | Ubuntu Server makina birtuala (Odoo + PostgreSQL, Docker-en) |

### Helburuak

- Edonork antzokiaren **ekitaldiak kontsultatu** ahal izatea, ordenagailuan zein mugikorrean.
- Erabiltzaile erregistratuek **sarrerak erosi** ahal izatea, saioa eta eserlekua aukeratuta.
- Administratzaileek **ekitaldiak, saioak, erabiltzaileak eta erosketak kudeatu** ahal izatea.
- Webgunea **euskaraz** egotea eta **irisgarria** izatea (WCAG AA).

---

## 2. Taldea

| Kidea | GitHub |
|---|---|
| Andoni | [@andoniprieto](https://github.com/andoniprieto) |
| Iñigo | [@web25iuribe-commits](https://github.com/web25iuribe-commits) |
| Hodei | [@web25hagirre](https://github.com/web25hagirre) |

---

## 3. Erremintak eta teknologiak

Analisi-fasean aukeratutako erremintak (1.2 zeregina):

| Arloa | Erreminta | Zertarako |
|---|---|---|
| Backend | **PHP 8.3** eta **Laravel 13** | Web aplikazioaren logika (MVC, Eloquent, migrazioak) |
| Frontend | **Blade**, **Bootstrap 5.3** (CDN) eta CSS propioa (`public/css`) | Bistak eta estiloak, prototipoaren arabera |
| Frontend (Breeze) | **Tailwind CSS**, **Alpine.js**, **Vite** | Breeze-k ekarritako autentifikazio-bistak |
| Autentifikazioa | **Laravel Breeze** | Saio-hasiera, erregistroa eta pasahitza berrezartzea |
| Frogak | **Pest** | Feature eta unit frogak |
| Datu-basea (weba) | **MySQL** | Ekitaldiak, saioak, eserlekuak, sarrerak, erabiltzaileak |
| Web zerbitzaria | **Apache Lounge** | Weba Windows-en argitaratzeko |
| ERP-a | **Odoo** (Docker) + **PostgreSQL** | Stinger enpresaren kudeaketa |
| Birtualizazioa | **VMware** | Ubuntu Server eta Windows 11 makina birtualak |
| Diseinua | **Figma**, **draw.io** | Prototipoa, E-R eredua, erabilera-kasuak, nabigazio-mapa |
| Kudeaketa | **GitHub** (issues, Projects, adarrak) eta **Google Drive** | Zereginak, kodea eta dokumentazioa |
| Editorea | **Visual Studio Code** | Garapena |

Windows 11 eta Windows Server-en arteko konparaketa Drive-n dago: `windows 11 vs windows server.docx`.

---

## 4. Faseak

| # | Fasea | Zereginak | Egoera |
|---|---|---|---|
| 1 | Analisia | 1, 1.1, 1.2, 1.3 | ✅ Eginda |
| 2 | Aurreproiektua (datu-basea eta erabilera-kasuak) | 2, 14.1, 14.2, 14.3 | ✅ Eginda |
| 3 | Identitate bisuala | 12.1, 12.1.1, 12.1.2, 12.1.3 | ✅ Eginda |
| 4 | Bozetoa, nabigazio-mapa eta prototipoa | 12.2, 12.3, 12.4 | ✅ Eginda (bozetoa estekatzeke) |
| 5 | Formakuntza | 3–9 | 🔄 Lanean |
| 6 | Garapena (weba, Odoo, makina birtualak) | 12.5–12.8, 13, 14.4, 15 | 🔄 Lanean |
| 7 | Dokumentazioa eta aurkezpena | 10, 11 | ⏳ Egiteke |

Zereginen zerrenda osoa GitHub-eko Project-ean dago.

---

## 5. 1. fasea · Analisia

### 5.1 Bezeroaren eskaera (1.1)

Bergarako Antzokiaren eskaera aztertu eta eskakizunak atera ditugu.

**Eskakizun funtzionalak**

- Ekitaldien zerrenda ikusi, bilatu eta kategoriaren edo dataren arabera iragazi.
- Ekitaldi baten xehetasunak ikusi: deskribapena, prezioa, kategoriak eta saioak.
- Erregistratu eta saioa hasi.
- Sarrerak erosi: saioa aukeratu, sarrera kopurua, eserlekuak aretoaren mapan, ordainketa (simulatua) eta berrespena.
- Nire sarrerak ikusi.
- Administratzailea: ekitaldiak eta saioak sortu, editatu eta ezabatu; erabiltzaileak kudeatu; erosketen zerrenda ikusi.

**Eskakizun ez-funtzionalak**

- Diseinu moldagarria: ordenagailua (1440 px) eta mugikorra (390 px).
- Interfazea euskaraz.
- Irisgarritasuna: kontrastea (WCAG AA), foku ikusgaia eta irudien testu alternatiboa.
- Eserleku bera ezin da saio berean bi aldiz saldu.

### 5.2 Erremintak (1.2)

Ikus [3. atala](#3-erremintak-eta-teknologiak).

### 5.3 Behar den jakintza (1.3)

Taldeak ikasi behar dituen gaiak formakuntza-zeregin bihurtu ditugu:

| Zeregina | Gaia |
|---|---|
| 3 | Laravel framework-a |
| 4 | PHP |
| 5 | Blade txantiloiak |
| 6 | Apache Lounge |
| 7 | VMware hiperbisorea |
| 8 | Sistema eragileak (Ubuntu Server / Windows) |
| 9 | Odoo ERP-a |

---

## 6. 2. fasea · Aurreproiektua

Aurreproiektuaren entregagarri guztiak Drive-ko `Aurreproiektua/` karpetan daude.

### 6.1 Erabilera-kasuak

Hiru aktore:

| Aktorea | Zer egin dezake |
|---|---|
| **Bisitaria** | Ekitaldiak kontsultatu, bilatu eta iragazi. Erregistratu edo saioa hasi. |
| **Erabiltzaile arrunta** | Bisitariak egiten duen guztia + sarrerak erosi eta bere sarrerak ikusi. |
| **Administratzailea** | Ekitaldiak eta saioak kudeatu, erabiltzaileak kudeatu eta erosketak ikusi. |

Erabilera-kasu nagusiak: *Ekitaldiak kontsultatu*, *Login-a egin*, *Sarrerak erosi*, *Ekitaldiak editatu* eta *Erabiltzaileak editatu*.

📎 Drive: `Aurreproiektua/ERABILERA KASU DIAGRAMA.drawio`

### 6.2 Datu-basea (14.1 – 14.3)

**Entitate-erlazio eredua (14.1.1).** Entitateak:

| Entitatea | Deskribapena |
|---|---|
| **Erabiltzailea** | Izena, abizena, emaila, telefonoa, pasahitza eta rola (`admin` / `user`) |
| **Ekitaldia** | Izenburua, deskribapena eta prezioa |
| **Kategoria** | Ekitaldi motak (antzerkia, musika, dantza…) |
| **Aretoa** | Antzokiko aretoak |
| **Eserlekua** | Areto bateko eserlekua (ilara + zenbakia) |
| **Saioa** | Ekitaldi baten emanaldia: aretoa, data eta ordua |
| **Sarrera** | Erabiltzaile batek saio baterako erositako eserlekua, prezioa eta erosketa-data |

**Erlazio nagusiak**

```
Ekitaldia  N ── M  Kategoria
Ekitaldia  1 ── N  Saioa  N ── 1  Aretoa
Aretoa     1 ── N  Eserlekua
Sarrera    N ── 1  Erabiltzailea
Sarrera    N ── 1  Saioa
Sarrera    N ── 1  Eserlekua      (eserleku + saio bikotea bakarra da)
```

Eserleku baten egoera (librea / salduta) ez da eserlekuan gordetzen: **saio bakoitzeko** kalkulatzen da, saio horretarako sarrerarik dagoen ala ez begiratuta.

**Eredu erlazionala (14.1.2) eta aldagaiak (14.1.3).** Taulak, gako nagusiak, atzerriko gakoak eta eremu bakoitzaren mota eta murriztapenak.

**Eredu fisikoa (14.2) eta frogak (14.3).** MySQL script-a (`DB_STINGER.sql`), txertaketa, murriztapen eta egiaztapen-kontsultekin probatuta.

📎 Drive:
- `Aurreproiektua/ENTITATE ERLAZIOA.drawio`
- `Aurreproiektua/Eredu_erlazionala.drawio`
- `Datu Basea/DB_STINGER.sql`

> Garapen-fasean datu-basea Laravel-eko migrazioetara eraman da (`APP/database/migrations`) eta eredua **sinplifikatu** egin da: saioa, aretoa eta kategoria ekitaldiaren eremu bihurtu dira, eta sarrera batek kopuru bat gordetzen du (eserlekurik gabe). Azken eredua [9.2 atalean](#92-datu-basea-azken-eredua) dago.

---

## 7. 3. fasea · Identitate bisuala

Webgunearen ikus eta komunikazio identitatea (12.1) estilo-gidan jasota dago.

📎 Drive: `Aurreproiektua/Estilo gida.docx`

### 7.1 Logoa eta irudiak (12.1.1)

- Logoa: **antzoki-oholtza** baten ikurra.
- Ekitaldien irudiak: ekitaldi bakoitzak bere irudia du. Irudirik ez badago, **kategoriaren kolorea** erabiltzen da.

### 7.2 Tipografia (12.1.2)

| Erabilera | Letra-iturria | Lodiera |
|---|---|---|
| Izenburuak | **Archivo** | 700 / 800 |
| Testua | **Source Sans 3** | 400 / 600 / 700 |

### 7.3 Koloreak (12.1.3)

| Rola | Kolorea |
|---|---|
| Kolore nagusia | `#B91C1C` (gorria) |
| Fokua (irisgarritasuna) | `#2563EB` (urdina) |

Horrez gain, **kategoria bakoitzak bere kolorea** du, eta **egoera-koloreak** daude ekitaldien etiketetarako. Kolore guztiek WCAG AA kontrastea betetzen dute.

### 7.4 Egoera-etiketak

| Etiketa | Noiz |
|---|---|
| **Leku libreak** | Eserlekuen % 15 baino gehiago libre |
| **Azken sarrerak** | Eserlekuen % 15 edo gutxiago libre |
| **Agortuta** | Eserleku libre gabe |

---

## 8. 4. fasea · Nabigazio-mapa eta prototipoa

### 8.1 Bozetoa (12.2)

Orri nagusien zirriborroa (wireframe), prototipoaren aurretik egina. *Egiteke: issue-an estekatu.*

### 8.2 Nabigazio-mapa (12.3)

Orrien arteko nabigazioa:

```
Hasiera (ekitaldien zerrenda)
├── Ekitaldiaren xehetasunak
│   └── Sarrerak erosi
│       ├── Saioa eta sarrera kopurua aukeratu
│       ├── Eserlekuak aukeratu
│       ├── Ordainketa
│       └── Berrespena
├── Saioa hasi / Erregistratu
├── Nire sarrerak                      (erabiltzailea)
└── Administrazioa                     (administratzailea)
    ├── Ekitaldien kudeaketa (ekitaldiak eta saioak)
    ├── Erabiltzaileen kudeaketa
    └── Erosketak
```

📎 Drive: `Aurreproiektua/NABIGAZIO MAPA`

### 8.3 Prototipoa (12.4)

Prototipo interaktiboa bi tamainatan:

- **Ordenagailua:** 1440 px
- **Mugikorra:** 390 px

Prototipoan agertzen diren elementu nagusiak:

- **Hasiera:** bilatzailea, kategoria eta data iragazkiak, *Iragazkiak garbitu* botoia eta ekitaldi-txartelak egoera-etiketekin.
- **Ekitaldi-txartela:** irudia (edo kategoriaren kolorea), izenburua, data, prezioa eta *Xehetasunak ikusi* botoia.
- **Xehetasunak:** deskribapena, saioak, prezioa eta erosteko botoia.
- **Erosketa-prozesua:** saioa, sarrera kopurua, eserlekuen mapa eta berrespena.
- **Administrazio-panela:** ekitaldiak, erabiltzaileak eta *Erosketak*.

📎 Drive: `Aurreproiektua/Prototipo/` (Figma esteka eta HTML prototipoak)

Prototipo honek garapen-fasea gidatzen du: 12.5 zereginaren azpi-zeregin bakoitza prototipoko pantaila batekin lotuta dago.

---

## 9. 5. eta 6. faseak · Garapena

Web aplikazioa **Laravel 13** framework-arekin garatu da, **MVC** ereduari jarraituz. Bistak prototipoan oinarrituta daude eta **Bootstrap 5.3** + CSS propioarekin egin dira.

### 9.1 Arkitektura

```
Nabigatzailea
   │  HTTP eskaera
   ▼
routes/*.php  ──►  Middleware (auth, verified)  ──►  Kontrolatzailea
                                                        │   │
                                     Eloquent modeloak ◄┘   └► Blade bista (front-end/*)
                                            │
                                            ▼
                                         MySQL
```

| Geruza | Karpeta | Edukia |
|---|---|---|
| Bideak (routes) | `APP/routes/` | `web.php` eta atal bakoitzeko fitxategia (`web-ekitaldiak.php`, `web-erabiltzaileak.php`, `web-sarrerak.php`) |
| Kontrolatzaileak | `APP/app/Http/Controllers/` | `EkitaldiakController`, `ErabiltzaileakController`, `SarrerakController` eta Breeze-ren `Auth/*` |
| Modeloak | `APP/app/Models/` | `Ekitaldia`, `Sarrera`, `User` |
| Enum-ak | `APP/app/Enums/` | `Rola` (`admin` / `user`) |
| Bistak | `APP/resources/views/front-end/` | Prototipoko orriak eta administrazio-panela |
| Estiloak | `APP/public/css/` | `stinger.css` (orokorra), `ekitaldiak.css`, `saioa.css` |
| Datu-basea | `APP/database/` | Migrazioak, factory-ak eta seeder-ak |
| Frogak | `APP/tests/` | Pest frogak (`Feature` eta `Unit`) |

### 9.2 Datu-basea (azken eredua)

Aurreproiektuko eredua sinplifikatu egin da garapenean. Taula nagusiak:

**`users`** (Laravel-en taula + gure eremuak)

| Eremua | Mota | Oharrak |
|---|---|---|
| `id` | bigint | PK |
| `name` | string | Izena |
| `abizena` | string | |
| `email` | string | Bakarra |
| `telefonoa` | string(9) | Bakarra (balidazioan) |
| `password` | string | Hash-eatuta |
| `rola` | string | `admin` edo `user` (lehenetsia: `user`) — `App\Enums\Rola` |
| `email_verified_at`, `remember_token`, `timestamps` | | Laravel |

**`ekitaldiak`**

| Eremua | Mota | Oharrak |
|---|---|---|
| `id` | bigint | PK |
| `izenburua` | string(70) | |
| `deskribapena` | string(500) | |
| `kategoria` | string | Musika, Antzerkia, Bertsolaritza, Dantza, Haurrak, Zinema |
| `data` | date | |
| `ordua` | time | |
| `prezioa` | decimal(5,2) | |
| `irudia` | string, nullable | `storage/app/public/ekitaldiak` karpetako bidea |
| `edukiera` | unsigned int | Lehenetsia: 300 |
| `aretoa` | string | Lehenetsia: `Areto nagusia` |
| `timestamps` | | |

**`sarrerak`**

| Eremua | Mota | Oharrak |
|---|---|---|
| `id` | bigint | PK |
| `user_id` | FK → `users` | `cascadeOnDelete` |
| `ekitaldia_id` | FK → `ekitaldiak` | `cascadeOnDelete` |
| `kopurua` | unsigned int | Erositako sarrera kopurua |
| `prezio_totala` | decimal(5,2) | `kopurua × prezioa`, zerbitzarian kalkulatua |
| `kodigoa` | string | Bakarra. Formatua: `BA-<ekitaldia>-<5 karaktere>` |
| `timestamps` | | |

**Erlazioak**

```
User       1 ── N  Sarrera
Ekitaldia  1 ── N  Sarrera
```

Erabiltzaile edo ekitaldi bat ezabatzean, haren sarrerak ere ezabatzen dira (`cascadeOnDelete`).

Laravel-en taula estandarrak ere badaude: `password_reset_tokens`, `sessions`, `cache` eta `jobs`.

### 9.3 Modeloak

| Modeloa | Erlazioak | Metodo lagungarriak |
|---|---|---|
| `User` | `sarrerak()` (hasMany) | `rola` eremua `Rola` enum-era bihurtzen da; `password` automatikoki hash-eatzen da |
| `Ekitaldia` | `sarrerak()` (hasMany) | `kolorea()` kategoriaren kolorea · `dataLuzea()` *"Urriak 24, larunbata"* · `hilabeteLaburra()` *"URR"* · `salduta()` saldutako sarrerak · `libre()` geratzen diren lekuak (`edukiera − salduta`) |
| `Sarrera` | `user()`, `ekitaldia()` (belongsTo) | |

Kategoria bakoitzaren kolorea `Ekitaldia::KOLOREAK` konstantean dago:

| Kategoria | Kolorea |
|---|---|
| Musika | `#9A3412` |
| Antzerkia | `#1E3A8A` |
| Bertsolaritza | `#9F1239` |
| Dantza | `#6B21A8` |
| Haurrak | `#166534` |
| Zinema | `#334155` |

### 9.4 Bideak (routes)

**Publikoak**

| Metodoa | URLa | Zer |
|---|---|---|
| GET | `/` | Hasiera: ekitaldien zerrenda, bilatzailea eta kategoria-iragazkiak |
| GET | `/ekitaldiak/{id}` | Ekitaldiaren xehetasunak |
| GET | `/login`, `/register` | Saioa hasi eta erregistratu (Breeze) |
| GET | `/saioa-hasi`, `/erregistratu` | Prototipoko saio-hasiera eta erregistro orriak |
| GET | `/forgot-password`, `/reset-password/{token}` | Pasahitza berrezarri (Breeze) |
| GET | `/up` | Osasun-egiaztapena (Laravel) |

**Saioa hasita** (`auth`, `verified`)

| Metodoa | URLa | Zer |
|---|---|---|
| GET | `/sarrerak` | Nire sarrerak |
| GET | `/erosi/{id}` | Sarrerak erosteko orria |
| POST | `/erosi/{id}` | Erosketa gorde eta berrespena erakutsi |
| GET | `/profila` | Profila |
| GET / PATCH / DELETE | `/profile` | Profila editatu edo kontua ezabatu (Breeze) |
| POST | `/logout` | Saioa itxi |

**Administratzailea** (`auth`, `verified` + `rola = admin`)

| Metodoa | URLa | Zer |
|---|---|---|
| GET | `/admin/ekitaldiak` | Ekitaldien zerrenda |
| GET / POST | `/admin/ekitaldiak/create`, `/admin/ekitaldiak` | Ekitaldia sortu |
| GET | `/admin/ekitaldiak/{id}` | Ekitaldia ikusi |
| GET / PUT | `/admin/ekitaldiak/{id}/edit`, `/admin/ekitaldiak/{id}` | Ekitaldia editatu |
| DELETE | `/admin/ekitaldiak/{id}` | Ekitaldia ezabatu |
| GET | `/admin/erabiltzaileak` | Erabiltzaileen zerrenda |
| GET / POST | `/admin/erabiltzaileak/create`, `/admin/erabiltzaileak` | Erabiltzailea sortu |
| GET | `/admin/erabiltzaileak/{id}` | Erabiltzailearen fitxa eta haren sarrerak |
| GET / PUT | `/admin/erabiltzaileak/{id}/edit`, `/admin/erabiltzaileak/{id}` | Erabiltzailea editatu |
| DELETE | `/admin/erabiltzaileak/{id}` | Erabiltzailea ezabatu |

`/dashboard` bidea hasierara (`/`) birbideratzen da, Breeze-k saioa hasi ondoren hara bidaltzen baitu.

### 9.5 Funtzionalitateak

#### Hasiera eta ekitaldiak

- Ekitaldiak **dataren arabera** ordenatuta erakusten dira, txarteletan.
- **Bilatzailea** (izenburua edo aretoa) eta **kategoria-iragazkiak**.
- Txartel bakoitzak irudia (edo kategoriaren kolorea), data, prezioa eta egoera-etiketa du (*Leku libreak*, *Azken sarrerak*, *Agortuta*), `libre()` metodoarekin kalkulatuta.
- Xehetasunen orria saioa hasi gabe ikus daiteke; erosteko saioa hasi behar da.

#### Sarrerak erosi

1. Ekitaldiaren orrian *Sarrerak erosi* sakatu.
2. Sarrera kopurua aukeratu (**1 – 8**); laburpenak guztizko prezioa unean kalkulatzen du.
3. Erosketa berretsi: zerbitzariak sarrera sortzen du eta berrespen-orria (`done`) erakusten du kodearekin.
4. Erositako sarrerak *Nire sarrerak* (`/sarrerak`) orrian ikusten dira.

> Segurtasuna: erabiltzailea, prezio totala eta kodea **zerbitzarian** kalkulatzen dira; formulariotik kopurua bakarrik hartzen da.

#### Administrazio-panela

- **Ekitaldien kudeaketa (CRUD):** sortu, ikusi, editatu eta ezabatu. Irudia igo daiteke (`storage/app/public/ekitaldiak`); editatzean irudi berririk igotzen ez bada, lehengoa mantentzen da. Data ezin da iraganekoa izan.
- **Erabiltzaileen kudeaketa (CRUD):** sortu, ikusi (sarrerekin), editatu eta ezabatu. Pasahitza hutsik utziz gero ez da aldatzen. Administratzaile batek **ezin du bere burua ezabatu**.
- Ezabatu aurretik, prototipoaren estiloko **berrespen-leihoa** agertzen da.
- Ekintza bakoitzaren ondoren, arrakasta- edo errore-mezua erakusten da.

#### Balidazioak

| Formularioa | Arauak |
|---|---|
| Ekitaldia | `izenburua` ≤ 70 · `deskribapena` ≤ 500 · `kategoria` ≤ 20 · `data` ≥ gaur · `ordua` `HH:MM` · `prezioa` ≥ 0 · `irudia` irudia (aukerakoa) · `edukiera` ≥ 1 · `aretoa` derrigorrezkoa |
| Erabiltzailea | `name`, `abizena` derrigorrezkoak · `email` baliozkoa eta bakarra · `telefonoa` 9 karaktere eta bakarra · `password` ≥ 8 eta berretsita (editatzean aukerakoa) · `rola` `admin`/`user` |
| Erosketa | `kopurua` osoko zenbakia, 1 – 8 |

### 9.6 Baimenak eta rolak

| Rola | Sarbidea |
|---|---|
| Bisitaria | Hasiera, xehetasunak, saioa hasi eta erregistratu |
| `user` | + Sarrerak erosi, nire sarrerak eta profila |
| `admin` | + `/admin/*` orri guztiak |

- Bideak `auth` eta `verified` middleware-ekin babestuta daude.
- Administrazioko kontrolatzaileek `checkAdmin()` metodoa dute: rola `admin` ez bada, **403** errorea (*Ez duzu baimenik*).
- Goiburuak (`partials/header.blade.php`) administrazio-estekak administratzaileei bakarrik erakusten dizkie.
- Formulario guztiek **CSRF** token-a dute (`@csrf`), eta Blade-k irteera automatikoki ihes egiten du (XSS).

### 9.7 Bistak

```
resources/views/front-end/
├── layout.blade.php           Txantiloi nagusia (Bootstrap, letra-iturriak, mezuak)
├── partials/
│   ├── header.blade.php       Goiburua eta menua (rolaren arabera)
│   └── footer.blade.php       Oina (ordenagailua / mugikorra)
├── home.blade.php             Hasiera
├── detail.blade.php           Ekitaldiaren xehetasunak
├── buy.blade.php              Sarrerak erosi
├── done.blade.php             Erosketaren berrespena
├── tickets.blade.php          Nire sarrerak
├── login.blade.php            Saioa hasi
├── register.blade.php         Erregistratu
├── profile.blade.php          Profila
└── admin/
    ├── ekitaldiak/            index, create, edit, show + partials/form
    └── erabiltzaileak/        index, create, edit, show + partials/form, partials/rola
```

`resources/views/auth`, `profile`, `layouts` eta `components` karpetak Laravel Breeze-k sortutakoak dira.

### 9.8 Diseinu moldagarria (responsive)

Orri guztiak hiru tamainatara egokitzen dira (Bootstrap-en *breakpoint*-ak):

| Gailua | Zabalera | Portaera |
|---|---|---|
| Mugikorra | < 768 px | Goiko menua ezkutatu eta **beheko nabigazio-barra** (oina) erakusten da; taulak txartel bihurtzen dira; kategoria-iragazkiak alboetara mugitzen dira |
| Tableta | 768 – 1199 px | Menu osoa goiburuan |
| Ordenagailua | ≥ 1200 px | Prototipoko diseinu osoa (1440 px) |

### 9.9 Seeder-ak eta proba-datuak

`php artisan migrate --seed` exekutatzean `DatabaseSeeder`-ek hauek sortzen ditu:

| Seeder | Zer sortzen du |
|---|---|
| `UserSeeder` | Bi erabiltzaile (ikus beheko taula) |
| `EkitaldiaSeeder` | 6 ekitaldi, kategoria bakoitzeko bat (bertso saioa, antzerkia, jazz gaua, haur-antzerkia, dantza garaikidea eta zinema forum-a) |
| `SarreraSeeder` | `user@antzokia.eus` erabiltzailearen 2 sarrera *Etxeko giltzak* antzezlanerako |

**Proba-erabiltzaileak**

| Rola | Emaila | Pasahitza |
|---|---|---|
| Administratzailea | `admin@antzokia.eus` | `admin1234` |
| Erabiltzaile arrunta | `user@antzokia.eus` | `password` |

> Kontu hauek garapenerako bakarrik dira. Produkzioan pasahitzak aldatu.

### 9.10 Frogak

Frogak **Pest**-ekin idatzita daude (`APP/tests`):

| Fitxategia | Zer frogatzen du |
|---|---|
| `Feature/ErabiltzaileakTest.php` | Erabiltzaileen CRUD-a: zerrenda, fitxa, sortu, editatu (pasahitza aldatu gabe), ezabatu eta norbera ezin ezabatu |
| `Feature/Auth/*` | Breeze-ren autentifikazioa: saio-hasiera, erregistroa, emaila egiaztatu, pasahitza berrezarri eta eguneratu |
| `Feature/ProfileTest.php` | Profila editatu eta ezabatu |
| `Feature/ExampleTest.php` | Hasiera-orriak 200 erantzuten du |

Exekutatzeko:

```bash
cd APP
php artisan test
```

---

## 10. Instalazioa (garapen-ingurunea)

### Baldintzak

- PHP **8.3** edo berriagoa (`pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `intl`, `zip` luzapenekin)
- Composer
- Node.js eta npm
- MySQL (edo SQLite, proba azkarretarako)
- Git

### Urratsak

```bash
# 1. Biltegia klonatu
git clone https://github.com/andoniprieto/STINGER.git
cd STINGER/APP

# 2. Dependentziak
composer install
npm install

# 3. Ingurunea
cp .env.example .env
php artisan key:generate
```

`.env` fitxategian datu-basea konfiguratu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_stinger
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 4. Taulak eta proba-datuak
php artisan migrate --seed

# 5. Igotako irudiak publiko egiteko
php artisan storage:link

# 6. Frontend-a konpilatu (Breeze-ren bistetarako)
npm run build

# 7. Zerbitzaria abiarazi
php artisan serve
```

Aplikazioa <http://localhost:8000> helbidean egongo da. Saioa hasi [proba-erabiltzaileekin](#99-seeder-ak-eta-proba-datuak).

Datu-basea hutsetik berriz sortzeko:

```bash
php artisan migrate:fresh --seed
```

---

## 11. Argitalpena (Windows + Apache Lounge)

Web aplikazioa Windows 11 makina birtualean argitaratzeko gida osoa eranskinean dago:

📎 [`Eranskinak/README.md`](Eranskinak/README.md) — *Web orrialdea publikatzeko pausuak*

Laburpena:

| # | Urratsa |
|---|---|
| 1 | PHP konfiguratu (`php.ini` luzapenak eta `cacert.pem`) |
| 2 | Apache Lounge konfiguratu (`mod_rewrite`, `mod_ssl`, `mod_headers`, `mod_fcgid`) |
| 3 | Apache zerbitzu gisa instalatu eta suebakian 80 / 443 portuak ireki |
| 4 | Proiektua `C:\www\STINGER` karpetan klonatu eta `composer install --no-dev` |
| 5 | `.env` produkziorako (`APP_ENV=production`, `APP_DEBUG=false`, MySQL) |
| 6 | `php artisan migrate --force` |
| 7 | `npm ci` eta `npm run build` |
| 8 | `storage:link` eta cacheak (`config`, `route`, `view`, `event`) |
| 9 | Virtual Host-a (`bergara.antzokia.eus` → `APP/public`) eta `hosts` fitxategia |
| 10 | Azken probak (`200 OK`, eta `404` `.env`-erako) |

---

## 12. Biltegiaren egitura eta lan-fluxua

```
STINGER/
├── APP/                  Laravel aplikazioa
│   ├── app/              Kontrolatzaileak, modeloak, enum-ak
│   ├── database/         Migrazioak, factory-ak, seeder-ak
│   ├── public/           Sarrera-puntua, CSS-a eta irudiak
│   ├── resources/views/  Blade bistak
│   ├── routes/           Bideak
│   └── tests/            Pest frogak
├── Eranskinak/           Argitalpen-gida
└── README.md             Dokumentu hau
```

**Adarrak**

- `main`: entregatzeko bertsioa.
- `dev`: garapen-adarra; zeregin guztiak hemen batzen dira.
- `<issue zenbakia>-<zeregina>`: zeregin bakoitzeko adarra (adibidez `81-1256-zeregina---sarrerak-erosi`).

**Lan-fluxua**

1. Issue-tik adarra sortu.
2. Lana egin eta commit-ak egin.
3. `dev`-era Pull Request-a ireki, deskribapenean `Closes #N` jarrita, issue-a automatikoki ixteko.
4. `dev` egonkorra dagoenean, `main`-era batu.

---

## 13. Hurrengo urratsak

- **Garapena (12.5 – 12.8):** hasierako bilatzailea eta iragazkiak zerbitzarira eraman, eserlekuen mapa, eta ekitaldien CRUD-aren eta sarreren frogak gehitu.
- **Makina birtualak eta argitalpena (15):** DNS-a eta sarea amaitu.
- **Odoo ERP-a (13):** beharrak, moduluak, konfigurazioa, frogak, mantentze-plana eta segurtasun-kopiak.
- **Memoria eta aurkezpena (10, 11.6).**
