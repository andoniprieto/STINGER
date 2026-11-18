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
10. [Biltegiaren egitura eta lan-fluxua](#10-biltegiaren-egitura-eta-lan-fluxua)
11. [Hurrengo urratsak](#11-hurrengo-urratsak)

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
- Erabiltzaile erregistratuek **sarrerak erosi** ahal izatea.
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
| Datu-basea (weba) | **MySQL** | Ekitaldiak, sarrerak eta erabiltzaileak |
| Web zerbitzaria | **Apache Lounge** | Weba Windows-en argitaratzeko |
| ERP-a | **Odoo** + **PostgreSQL** (biak Docker-en) | Stinger enpresaren kudeaketa |
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
| 2 | Aurreproiektua (datu-basea eta erabilera-kasuak) | 2, 14, 14.1 (14.1.1 – 14.1.3), 14.2, 14.3 | ✅ Eginda |
| 3 | Identitate bisuala | 12.1, 12.1.1, 12.1.2, 12.1.3 | ✅ Eginda |
| 4 | Bozetoa, nabigazio-mapa eta prototipoa | 12.2, 12.3, 12.4 | ✅ Eginda |
| 5 | Formakuntza | 3 – 9 | ✅ Eginda |
| 6 | Webgunearen garapena | 12.5, 14.4 | ✅ Eginda |
| 7 | Makina birtualak | 15, 15.1, 15.2, 15.3 | ✅ Eginda |
| 8 | Odoo ERP-a | 13, 13.1 – 13.4 | ✅ Eginda |
| 9 | Dokumentazioa eta aurkezpena | 10, 11, 11.1 – 11.6 | ✅ Eginda |

**Webgunearen garapena (12.5) xehetasunez**

| Zeregina | Atala | Egoera |
|---|---|---|
| 12.5.1 | Ekitaldiak (front-end eta back-end) | ✅ |
| 12.5.2 | Erabiltzaileak (CRUD-a) | ✅ |
| 12.5.3 | Sarrerak (front-end eta back-end) | ✅ |
| 12.5.4 | Footer-a (ordenagailua eta mugikorra) | ✅ |
| 12.5.5 | Kategoriak | ❌ Baztertuta: kategoria ekitaldiaren eremu bat da |
| 12.5.6 | Sarrerak erosi | ✅ |
| 12.5.7 | Ekitaldien kudeaketa | ✅ |
| 12.5.8 | Orri nagusia | ✅ |
| 12.5.9 | Saioa hasi eta erregistratu | ✅ |
| 12.5.10 | Front-end eta back-end adarrak bateratu | ✅ |
| 14.4 | Migrazioak eta seeder-ak | ✅ |

Zereginen zerrenda osoa GitHub-eko Project-ean dago.

---

## 5. 1. fasea · Analisia

### 5.1 Bezeroaren eskaera (1.1)

Bergarako Antzokiaren eskaera aztertu eta eskakizunak atera ditugu.

**Eskakizun funtzionalak**

- Ekitaldien zerrenda ikusi, bilatu eta kategoriaren edo dataren arabera iragazi.
- Ekitaldi baten xehetasunak ikusi: deskribapena, prezioa, kategoriak eta saioak.
- Erregistratu eta saioa hasi.
- Sarrerak erosi: sarrera kopurua aukeratu, ordainketa (simulatua) eta berrespena.
- Nire sarrerak ikusi.
- Administratzailea: ekitaldiak eta saioak sortu, editatu eta ezabatu; erabiltzaileak kudeatu; erosketen zerrenda ikusi.

**Eskakizun ez-funtzionalak**

- Diseinu moldagarria: ordenagailua (1440 px) eta mugikorra (390 px).
- Interfazea euskaraz.
- Irisgarritasuna: kontrastea (WCAG AA), foku ikusgaia eta irudien testu alternatiboa.

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
| **Ekitaldia** | Izenburua, deskribapena, kategoria, data, ordua, prezioa, irudia, edukiera eta aretoa |
| **Sarrera** | Erabiltzaile batek ekitaldi baterako egindako erosketa: sarrera kopurua, prezio totala eta kode bakarra |

**Erlazio nagusiak**

```
Erabiltzailea  1 ── N  Sarrera  N ── 1  Ekitaldia
```

- Erabiltzaile batek sarrera asko eros ditzake, eta ekitaldi batek sarrera asko ditu.
- Kategoria eta aretoa ekitaldiaren eremuak dira (ez dute taula propiorik).
- Ekitaldi baten leku libreak kalkulatu egiten dira: `edukiera − saldutako sarrerak`.

**Eredu erlazionala (14.1.2) eta aldagaiak (14.1.3).** Taulak, gako nagusiak, atzerriko gakoak eta eremu bakoitzaren mota eta murriztapenak.

**Eredu fisikoa (14.2) eta frogak (14.3).** MySQL script-a (`DB_STINGER.sql`), txertaketa, murriztapen eta egiaztapen-kontsultekin probatuta.

📎 Drive:
- `Aurreproiektua/ENTITATE ERLAZIOA.drawio`
- `Aurreproiektua/Eredu_erlazionala.drawio`
- `Datu Basea/DB_STINGER.sql`

> Datu-basea Laravel-eko migrazioekin sortzen da (`APP/database/migrations`). Taulen xehetasunak [9.2 atalean](#92-datu-basea) daude.

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
| **Leku libreak** | Lekuen % 15 baino gehiago libre |
| **Azken sarrerak** | Lekuen % 15 edo gutxiago libre |
| **Agortuta** | Leku libre gabe |

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
- **Erosketa-prozesua:** sarrera kopurua, ordainketa eta berrespena.
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

### 9.2 Datu-basea

Taulak migrazioekin sortzen dira (`APP/database/migrations`). Taula nagusiak:

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

---

## 10. Biltegiaren egitura eta lan-fluxua

```
STINGER/
├── APP/                  Laravel aplikazioa
│   ├── app/              Kontrolatzaileak, modeloak, enum-ak
│   ├── database/         Migrazioak, factory-ak, seeder-ak
│   ├── public/           Sarrera-puntua, CSS-a eta irudiak
│   ├── resources/views/  Blade bistak
│   └── routes/           Bideak
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

## 11. Hurrengo urratsak

### 11.1 Makina birtualak eta argitalpena (15): DNS-a eta sarea

**Sarea.** Makina birtualak ikastetxeko sarean daude:

| Makina | IP helbidea | Zerbitzuak |
|---|---|---|
| Ubuntu Server | `192.168.1.3` | Odoo + PostgreSQL (Docker), `:8069` portuan |
| Windows 11 | `192.168.1.2` | Apache Lounge + PHP + MySQL (web aplikazioa) |

**DNS-a.** Web aplikazioa `bergara.antzokia.eus` izenarekin argitaratzen da:

- Apache-ko Virtual Host-ak `bergara.antzokia.eus` izena `C:/www/STINGER/APP/public` karpetara bideratzen du.
- DNS zerbitzari bat instalatu da (**AdGuard Home**, Windows-en), eta `bergara.antzokia.eus` izena `192.168.1.2` helbidera ebazten du.
- Suebakian 80 (HTTP) eta 443 (HTTPS) portuak irekita daude.

Urrats guztiak eta frogak: [`Eranskinak/README.md`](Eranskinak/README.md).

### 11.2 Odoo ERP-a (13): beharrak, moduluak, konfigurazioa

Odoo **19.0 Community** Docker bidez exekutatzen da Ubuntu Server makinan (`http://192.168.1.3:8069`, `STINGER` datu-basea). Enpresa: Stinger, Bergara (EUR).

**Beharrak.** Erronkak sei baldintza eskatzen ditu, eta guztiak beteta daude:

| Baldintza | Moduluak | Stinger-en datuak |
|---|---|---|
| Erabiltzaileak eta baimenak | Oinarria, Izen-ematea | 4 barneko erabiltzaile 3 rolekin + atariko 1 erabiltzaile |
| Odoo-ren mantenua | Mantenua, Mantenua - GB | 2 ekipo, 2 mantentze-eskaera |
| Erosketa kudeaketa | Erosketak | 1 hornitzaile, 2 eros-eskaera |
| Ekitaldien eta aretoen kudeaketa | Ekitaldiak, Ekitaldien salmentak, Webguneko ekitaldiak | 2 areto, 2 ekitaldi, 3 sarrera mota |
| Langileen kudeaketa | Langileak, Opor-egunak, Asistentziak, Gaitasunak | 4 langile, 2 sail |
| Ataria | Ataria, Webgunea | Bergarako Antzokiaren atariko erabiltzailea |

**Moduluak.** Enpresaren kudeaketa-fluxua:

```
CRM (aukera) → Salmentak (aurrekontua) → Proiektua (atazak) → Orduen erregistroa → Fakturazioa
```

| Modulua | Zertarako | Stinger-en datuak |
|---|---|---|
| Kontaktuak | Bezero eta hornitzaileen zerrenda bakarra | Bergarako Antzokia |
| CRM | Salmenta-aukeren jarraipena | Aukera bat, irabazita (4.800 €) |
| Salmentak | Aurrekontuak eta salmenta-eskaerak | 2 zerbitzu, S00001 eskaera |
| Proiektua | Lana proiektu eta atazatan antolatu | *Bergarako Antzokia: web aplikazioa* |
| Orduen erregistroa | Orduak apuntatu eta fakturatu | 30 ordu (3 langile) |
| Fakturazioa | Fakturak eta kontabilitatea (Espainiako lokalizazioa, BEZa % 21) | INV/2026/00001 faktura |
| Langileak | Langileen fitxak eta sailak | Garapena saila, 3 langile |

**Konfigurazioa.**

- **Erabiltzaileak eta rolak:** administratzailea; Andoni (kudeatzailea); Iñigo (ekitaldiak); Hodei (erosketak eta mantenua); Bergarako Antzokia (atariko bezeroa). Erabiltzaile bakoitzak bere lanerako baimenak bakarrik ditu.
- **Ekitaldiak:** *Areto Nagusia* (300 lagun) eta *Areto Txikia* (40 lagun), ekitaldiaren *Kokalekua* eremuan aukeratuta. Ekitaldiak webgunean (`/event`) argitaratuta daude.
- **Ataria:** izen-ematea irekita (b2c); bezeroek `/my` orrian ikusten dituzte eskaerak eta fakturak.
- **Mantenua:** segurtasun-kopiak `/web/database/manager` orritik egiten dira, eta moduluak *Aplikazioak* menutik eguneratzen dira.

📎 Drive: `odoo/Odoo baldintzak.docx`, `odoo/Odoo moduluak.docx`

### 11.3 Aurkezpena (11.6)

- **Aurkezpena (11.6):** Canva-n — <https://www.canva.com/design/DAHbRPJCKoE/4mFjc5uNMWaRLxYZ49dFXA/edit>
- **Aurreproiektuaren aurkezpena:** <https://canva.link/jm2tek3tx66lbtd>
