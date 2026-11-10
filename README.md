# STINGER

**Bergarako Antzokiaren web aplikazioa:** ekitaldiak kontsultatu, sarrerak online erosi eta antzokiaren programazioa kudeatu.

1. ebaluazioko erronka · Laravel · MySQL · Apache Lounge · Odoo

> README honek proiektuaren lehen zatia jasotzen du: **analisia, aurreproiektua eta prototipoa**. Garapena, instalazio-gida eta argitalpena hurrengo faseetan gehituko dira.

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
9. [Biltegiaren egitura eta lan-fluxua](#9-biltegiaren-egitura-eta-lan-fluxua)
10. [Hurrengo urratsak](#10-hurrengo-urratsak)

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
| Backend | **PHP 8.3** eta **Laravel** | Web aplikazioaren logika (MVC, Eloquent, migrazioak) |
| Frontend | **Blade**, **Tailwind CSS**, **Alpine.js**, **Vite** | Bistak eta estiloak |
| Autentifikazioa | **Laravel Breeze** | Saio-hasiera eta erregistroa |
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

> Garapen-fasean datu-basea Laravel-eko migrazioetara eraman da (`APP/database/migrations`). Bertsio horrek kategoria N:M erlazioa du eta eserlekuaren egoera saioaren araberakoa da. Azken eredua 11.1 zereginean dokumentatuko da.

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

## 9. Biltegiaren egitura eta lan-fluxua

```
STINGER/
├── APP/          Laravel aplikazioa
└── README.md     Dokumentu hau
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

## 10. Hurrengo urratsak

Prototipoaren ondoren datozen faseak (README honen hurrengo bertsioetan jasoko dira):

- **Garapena (12.5 – 12.8):** web aplikazioaren atalak, estiloa bateratzea, frogak eta euskaratzea.
- **Migrazioak eta seeder-ak (14.4).**
- **Makina birtualak eta argitalpena (15):** Apache Lounge, DNS-a eta sarea.
- **Odoo ERP-a (13):** beharrak, moduluak, konfigurazioa, frogak, mantentze-plana eta segurtasun-kopiak.
- **Instalazio-gida (11.7):** baldintzak, `.env` konfigurazioa, `composer install`, `npm install`, `php artisan migrate --seed` eta proba-erabiltzaileak.
- **Memoria eta aurkezpena (10, 11.6).**
