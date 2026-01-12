# CC Slider Revolution Overlay Engine

[![Version](https://img.shields.io/badge/version-2.0.1-blue.svg)](https://github.com/CodeCornTech/cc-revslider-overlay-engine)
[![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)](LICENSE)
[![Author](https://img.shields.io/badge/author-CodeCorn%E2%84%A2%20Technology-orange.svg)](https://github.com/CodeCornTech)

Motore CSS a variabili per gestire **overlay globali** su Slider Revolution in modo DRY, leggibile e riutilizzabile.  
Progettato per essere **logico, scalabile e riusabile** tra più progetti WordPress.

---

## ⚙️ Caratteristiche

- Overlay sempre e solo sopra `rs-sbg-px`
- Supporto completo: video, immagini, parallax, ecc.
- Direzioni: **top**, **bottom**, **left**, **right**, **center**, **solid**
- Toni: **dark** / **light**
- Intensità: **soft** / **medium** / **strong**
- Gestione tramite CSS variables — nessuno script JS
- Compatibile con tema child, MU-plugin o Custom CSS di SR

---

## 🧩 Requisiti

- WordPress
- Plugin **Slider Revolution**
- Accesso a CSS personalizzato (tema child o pannello SR)

---

## 📦 Struttura plugin

```

mu-plugins/
├── mu-cc-sr-overlay.php
└── codecorn/
└── sr-overlay/
├── assets/
│   └── cc-sr-overlay.css
└── index.php

```

---

## 🚀 Installazione

```php
function cc_revslider_overlay_assets() {
    wp_enqueue_style(
        'cc-sr-overlay',
        get_stylesheet_directory_uri() . '/assets/css/cc-sr-overlay.css',
        [],
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'cc_revslider_overlay_assets');
```

---

## 🧱 Utilizzo Universale (Novità v1.1)

Il motore ora supporta qualsiasi elemento HTML standard (Header, Section, Div) tramite la classe helper `.cc-o-self`.

### Logica di implementazione

- **Slider Revolution (`.cc-sr-overlay`)**: L'overlay viene iniettato con `z-index: 1` (sopra il bg `rs-sbg`, sotto i layer di testo).
- **HTML Standard (`.cc-o-self`)**: L'overlay viene iniettato direttamente nell'elemento con `z-index: -1` per posizionarsi automaticamente sotto il contenuto (testo/bottoni) ma sopra il background.

---

### 🚀 Use Cases HTML (Scenario B)

Per applicare gli overlay fuori dallo slider, usa la sintassi:
`cc-o-self` + `[preset]`

#### 1. Header Hero

Overlay scuro dal basso per far risaltare il titolo bianco.

```html
<header class="site-header cc-o-self cc-sr-o-bottom-dark-medium">
  <div class="container">
    <h1>Titolo Header</h1>
    <p>Il testo rimane selezionabile sopra l'overlay.</p>
  </div>
</header>
```

#### 2. Card o Box generico

Vignettatura leggera su un div contenuto.

```html
<div class="my-card cc-o-self cc-sr-o-solid-dark-soft">
  <h3>Titolo Card</h3>
  <p>Contenuto della card...</p>
</div>
```

---

## 🧱 Utilizzo base

1️⃣ Apri lo slider in **Slider Revolution**
2️⃣ Vai su **Module General Options → Layout → CSS → Module Classes**
3️⃣ Aggiungi le classi:

```text
cc-sr-overlay cc-sr-o-top-dark-strong
```

---

## 🎨 Preset disponibili

Ogni overlay si costruisce così:

```
cc-sr-overlay cc-sr-o-[posizione]-[tono]-[intensità]
```

### 🔸 Overlay solidi

| Classe                       | Descrizione    |
| ---------------------------- | -------------- |
| `cc-sr-o-solid-dark-soft`    | Nero velato    |
| `cc-sr-o-solid-dark-medium`  | Nero medio     |
| `cc-sr-o-solid-dark-strong`  | Nero pieno     |
| `cc-sr-o-solid-light-soft`   | Bianco leggero |
| `cc-sr-o-solid-light-strong` | Bianco intenso |

---

### 🔹 Gradient verticali

#### **Top → Bottom**

| Classe                     | Descrizione               |
| -------------------------- | ------------------------- |
| `cc-sr-o-top-dark-soft`    | Nero delicato dall’alto   |
| `cc-sr-o-top-dark-medium`  | Copertura media dall’alto |
| `cc-sr-o-top-dark-strong`  | Nero deciso dall’alto     |
| `cc-sr-o-top-light-soft`   | Bianco sfumato dall’alto  |
| `cc-sr-o-top-light-medium` | Bianco medio dall’alto    |
| `cc-sr-o-top-light-strong` | Bianco forte dall’alto    |

#### **Bottom → Top**

| Classe                        | Descrizione               |
| ----------------------------- | ------------------------- |
| `cc-sr-o-bottom-dark-soft`    | Nero sfumato dal basso    |
| `cc-sr-o-bottom-dark-medium`  | Copertura media dal basso |
| `cc-sr-o-bottom-dark-strong`  | Nero intenso dal basso    |
| `cc-sr-o-bottom-light-soft`   | Luce chiara dal basso     |
| `cc-sr-o-bottom-light-medium` | Bianco medio dal basso    |
| `cc-sr-o-bottom-light-strong` | Bianco intenso dal basso  |

---

### 🔹 Gradient orizzontali

#### **Left → Right**

| Classe                      | Descrizione                    |
| --------------------------- | ------------------------------ |
| `cc-sr-o-left-dark-soft`    | Scuro da sinistra verso destra |
| `cc-sr-o-left-dark-medium`  | Copertura media sinistra       |
| `cc-sr-o-left-dark-strong`  | Nero forte da sinistra         |
| `cc-sr-o-left-light-soft`   | Chiaro da sinistra             |
| `cc-sr-o-left-light-medium` | Bianco medio da sinistra       |
| `cc-sr-o-left-light-strong` | Bianco intenso da sinistra     |

#### **Right → Left**

| Classe                       | Descrizione                    |
| ---------------------------- | ------------------------------ |
| `cc-sr-o-right-dark-soft`    | Scuro da destra verso sinistra |
| `cc-sr-o-right-dark-medium`  | Copertura media da destra      |
| `cc-sr-o-right-dark-strong`  | Nero forte da destra           |
| `cc-sr-o-right-light-soft`   | Chiaro da destra               |
| `cc-sr-o-right-light-medium` | Bianco medio da destra         |
| `cc-sr-o-right-light-strong` | Bianco intenso da destra       |

---

### 🔹 Vignette (centrale)

| Classe                       | Effetto                      |
| ---------------------------- | ---------------------------- |
| `cc-sr-o-center-dark-soft`   | Centro scuro, bordi chiari   |
| `cc-sr-o-center-dark-strong` | Centro nero intenso          |
| `cc-sr-o-center-light-soft`  | Centro chiaro su slider dark |

---

## 🧠 Esempi pratici

```html
<!-- Hero classico, nero forte in alto -->
cc-sr-overlay cc-sr-o-top-dark-strong

<!-- Footer chiaro con testo scuro -->
cc-sr-overlay cc-sr-o-bottom-light-soft

<!-- Layout split con testo a sinistra -->
cc-sr-overlay cc-sr-o-left-dark-medium

<!-- Layout split inverso -->
cc-sr-overlay cc-sr-o-right-dark-medium

<!-- Overlay uniforme morbido -->
cc-sr-overlay cc-sr-o-solid-dark-soft
```

---

## ⚙️ Micro tuning

Personalizza un singolo slider con variabili CSS:

```css
#rev_slider_11_1_wrapper.cc-sr-overlay {
  --sr-overlay-top: 0.85;
  --sr-overlay-mid: 0.4;
  --sr-overlay-color-r: 221;
  --sr-overlay-color-g: 157;
  --sr-overlay-color-b: 87; /* brand gold */
}
```

---

## 🎛️ Variabili principali

```css
--sr-overlay-top        /* opacità 0% (inizio gradient) */
--sr-overlay-mid        /* opacità intermedia */
--sr-overlay-bottom     /* opacità 100% */
--sr-overlay-mid-pos    /* posizione (es. 40%, 50%) */
--sr-overlay-direction  /* to bottom | top | left | right */
--sr-overlay-color-r/g/b /* RGB del tono base */
```

---

## 🗺️ Mapping progetto (esempio)

```css
/* HERO PRINCIPALE      : cc-sr-overlay cc-sr-o-top-dark-strong */
/* FOOTER CHIARO         : cc-sr-overlay cc-sr-o-bottom-light-soft */
/* PAGINA FAQ            : cc-sr-overlay cc-sr-o-solid-dark-soft */
/* LANDING DARK          : cc-sr-overlay cc-sr-o-bottom-dark-strong */
/* SLIDER SINISTRO       : cc-sr-overlay cc-sr-o-left-dark-medium */
/* SLIDER DESTRO         : cc-sr-overlay cc-sr-o-right-dark-medium */
```

---

## 🧮 Matrice combinazioni disponibili

| Direzione  | Toni disponibili | Intensità disponibili  | Totale combinazioni |
| ---------- | ---------------- | ---------------------- | ------------------- |
| `solid`    | dark / light     | soft / medium / strong | 6                   |
| `top`      | dark / light     | soft / medium / strong | 6                   |
| `bottom`   | dark / light     | soft / medium / strong | 6                   |
| `left`     | dark / light     | soft / medium / strong | 6                   |
| `right`    | dark / light     | soft / medium / strong | 6                   |
| `center`   | dark / light     | soft / strong          | 4                   |
| **Totale** | —                | —                      | **34 preset reali** |

> Tutti combinabili con varianti colore personalizzate via CSS variables (es. brand, accent, gold, blu).

---

## 🧩 Credits

**Autore:** [Federico Girolami](https://github.com/FedericoGirolami)
**Team:** [CodeCorn™ Technology](https://github.com/CodeCornTech)
**Progetto:** CC Slider Revolution Overlay Engine
**Repository:** [CodeCornTech/cc-revslider-overlay-engine](https://github.com/CodeCornTech/cc-revslider-overlay-engine)

---

## 🪪 Licenza

Distribuito sotto licenza **GPL-2.0 o successiva**.
Puoi usarlo liberamente, modificarlo e ridistribuirlo mantenendo il credito a **CodeCorn™ Technology**.
© 2025 — CodeCorn™ Technology. Tutti i diritti riservati.
