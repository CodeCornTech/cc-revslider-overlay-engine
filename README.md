# CC Slider Revolution Overlay Engine

[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/CodeCornTech/cc-revslider-overlay-engine)
[![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)](LICENSE)
[![Author](https://img.shields.io/badge/author-CodeCorn%E2%84%A2%20Technology-orange.svg)](https://github.com/CodeCornTech)

Motore CSS a variabili per gestire **overlay globali** su Slider Revolution in modo DRY, leggibile e riutilizzabile.

Niente più copia/incolla di 10 overlay diversi per ogni slider, ma:

- una sola base CSS
- preset combinabili per direzione, tono e intensità
- micro tuning via variabili CSS per slider specifico

---

## ⚙️ Caratteristiche

- Overlay sempre e solo sopra il background `rs-sbg-px`
- Supporta video HTML5, immagini statiche, parallax, ecc.
- Direzioni disponibili: **top**, **bottom**, **left**, **right**, **center**, **solid**
- Tono colore: **dark** o **light**
- Intensità: **soft**, **medium**, **strong**
- Completamente estendibile via CSS variables
- Zero JS — solo CSS moderno, performante e mantenibile

---

## 🧩 Requisiti

- WordPress
- Plugin **Slider Revolution**
- Possibilità di aggiungere CSS personalizzato:
  - tramite tema child
  - oppure tramite il pannello _Custom CSS_ del tema o di SR

---

## 📦 Repository e struttura

**GitHub:** [https://github.com/CodeCornTech/cc-revslider-overlay-engine](https://github.com/CodeCornTech/cc-revslider-overlay-engine)

```

mu-plugins/
├── mu-cc-sr-overlay.php
└── codecorn/
└── sr-overlay/
├── assets/
│   └── cc-sr-overlay.css
└── index.php

```

Oppure puoi copiare il file CSS nel tuo tema child.

---

## 🚀 Installazione rapida

1️⃣ Copia il file `cc-sr-overlay.css` in  
`wp-content/themes/tuo-tema-child/assets/css/`

2️⃣ Enqueue del CSS nel `functions.php` del tema child:

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

## 🧱 Utilizzo base

1️⃣ Apri lo slider in **Slider Revolution**
2️⃣ Vai in
**Module General Options → Layout → CSS → Module Classes**
3️⃣ Aggiungi le classi che definiscono **overlay + preset**

Esempio:

```text
cc-sr-overlay cc-sr-o-top-dark-strong
```

- `cc-sr-overlay` → attiva il motore overlay
- `cc-sr-o-top-dark-strong` → preset: gradient dall’alto, nero intenso

Risultato nel DOM:

```html
<rs-module-wrap class="cc-sr-overlay cc-sr-o-top-dark-strong">
  <rs-module> ... </rs-module>
</rs-module-wrap>
```

Funziona sia sul `wrap` che sul `rs-module` stesso.

---

## 🎨 Preset disponibili

Ogni overlay è una combinazione logica:
`cc-sr-overlay cc-sr-o-[direzione]-[tono]-[intensità]`

### 🔸 Overlay solidi

| Classe                       | Descrizione                              |
| ---------------------------- | ---------------------------------------- |
| `cc-sr-o-solid-dark-soft`    | Nero leggero, ideale per slider luminosi |
| `cc-sr-o-solid-dark-medium`  | Nero medio, ottimo bilanciamento         |
| `cc-sr-o-solid-dark-strong`  | Nero pieno, massima leggibilità          |
| `cc-sr-o-solid-light-soft`   | Bianco velato, perfetto su sfondi scuri  |
| `cc-sr-o-solid-light-strong` | Bianco pieno, effetto "lavagna"          |

### 🔹 Gradient top → bottom

| Classe                     | Effetto                                           |
| -------------------------- | ------------------------------------------------- |
| `cc-sr-o-top-dark-soft`    | Scuro in alto, sfuma delicato verso trasparente   |
| `cc-sr-o-top-dark-medium`  | Nero più deciso, copertura 50%                    |
| `cc-sr-o-top-dark-strong`  | Hero classico: nero in alto, trasparente in basso |
| `cc-sr-o-top-light-soft`   | Bianco delicato in alto, per testi scuri          |
| `cc-sr-o-top-light-strong` | Bianco intenso, per contrasti forti               |

### 🔹 Gradient bottom → top

| Classe                       | Effetto                                    |
| ---------------------------- | ------------------------------------------ |
| `cc-sr-o-bottom-dark-soft`   | Nero alla base, fade verso l’alto          |
| `cc-sr-o-bottom-dark-medium` | Fondo deciso per testi ancorati in bottom  |
| `cc-sr-o-bottom-dark-strong` | Hero invertito, nero in basso intenso      |
| `cc-sr-o-bottom-light-soft`  | Luce bianca dal basso (effetto "riflesso") |

### 🔹 Gradient laterali

| Classe                      | Direzione                | Uso tipico                      |
| --------------------------- | ------------------------ | ------------------------------- |
| `cc-sr-o-left-dark-strong`  | da sinistra verso destra | per layout con testi a sinistra |
| `cc-sr-o-right-dark-strong` | da destra verso sinistra | per layout con testi a destra   |
| `cc-sr-o-left-light-soft`   | da sinistra verso destra | sfumatura chiara laterale       |
| `cc-sr-o-right-light-soft`  | da destra verso sinistra | riflesso morbido a lato         |

### 🔹 Vignette (centrale)

| Classe                       | Descrizione                     |
| ---------------------------- | ------------------------------- |
| `cc-sr-o-center-dark-soft`   | centro scuro, bordi trasparenti |
| `cc-sr-o-center-dark-strong` | vignetta più intensa            |
| `cc-sr-o-center-light-soft`  | centro chiaro, per slider dark  |

---

## 🧠 Esempi pratici

### 🔸 Hero principale (gradient top)

```html
cc-sr-overlay cc-sr-o-top-dark-strong
```

Hero scuro in alto, ottimo per loghi e testi chiari.

### 🔸 Slider chiaro con testo nero

```html
cc-sr-overlay cc-sr-o-bottom-light-soft
```

Sfuma luce dal basso, crea contrasto con testo scuro.

### 🔸 Overlay laterale per layout split

```html
cc-sr-overlay cc-sr-o-left-dark-medium
```

Scurisce da sinistra a destra, utile in layout “image + text”.

### 🔸 Overlay solido neutro

```html
cc-sr-overlay cc-sr-o-solid-dark-soft
```

Velatura uniforme, mantiene profondità sul background.

---

## ⚡ Micro tuning per slider specifici

Puoi personalizzare qualsiasi slider sovrascrivendo le variabili CSS:

```css
#rev_slider_11_1_wrapper.cc-sr-overlay {
  --sr-overlay-top: 0.9;
  --sr-overlay-mid: 0.4;
  --sr-overlay-color-r: 255;
  --sr-overlay-color-g: 215;
  --sr-overlay-color-b: 0; /* dorato */
}
```

---

## 🎛️ Variabili principali

```css
--sr-overlay-top        /* opacità a 0% */
--sr-overlay-mid        /* opacità intermedia */
--sr-overlay-bottom     /* opacità a 100% */
--sr-overlay-mid-pos    /* posizione intermedia (es. 40%, 50%) */
--sr-overlay-direction  /* to bottom | to top | to left | to right */
--sr-overlay-color-r/g/b /* RGB base */
```

---

## 🗺️ Mapping progetto consigliato

```css
/* SLIDER HOME HERO       : cc-sr-overlay cc-sr-o-top-dark-strong */
/* SLIDER FAQ             : cc-sr-overlay cc-sr-o-solid-dark-soft */
/* SLIDER LANDING DARK    : cc-sr-overlay cc-sr-o-bottom-dark-soft */
/* SLIDER FOOTER LIGHT    : cc-sr-overlay cc-sr-o-top-light-soft */
/* SLIDER SPLIT SINISTRO  : cc-sr-overlay cc-sr-o-left-dark-medium */
/* SLIDER SPLIT DESTRO    : cc-sr-overlay cc-sr-o-right-dark-medium */
```

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
