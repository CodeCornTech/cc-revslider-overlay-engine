# CC Slider Revolution Overlay Engine

Motore CSS a variabili per gestire **overlay globali** su Slider Revolution in modo DRY , leggibile e riutilizzabile .

Niente più copia incolla di 10 overlay diversi per ogni slider , ma :

- una sola base CSS
- preset pronti a classi
- micro tuning per singolo modulo con le CSS variables

---

## Caratteristiche

- Overlay sempre e solo sopra il background `rs-sbg-px`
- Supporta video HTML5 , immagini statiche , parallax , ecc .
- Preset pronti :
  - solidi forti e soft
  - gradient dall alto
  - gradient dal basso
  - vignette centrale
- Completamente estendibile con CSS variables
- Zero JS , solo CSS moderno

---

## Requisiti

- WordPress
- Plugin Slider Revolution
- Possibilità di aggiungere CSS personalizzato :
  - tramite tema child
  - oppure tramite pannello Custom CSS del tema o di SR

---

## Installazione

1 . Copia il file `cc-sr-overlay.css` dentro il tuo tema child , per esempio :

```text
wp-content/themes/tuo-tema-child/assets/css/cc-sr-overlay.css
```

2 . Enqueue del file nel `functions.php` del tema child :

```php
function cc_revslider_overlay_assets() {
    wp_enqueue_style(
        'cc-sr-overlay',
        get_stylesheet_directory_uri() . '/assets/css/cc-sr-overlay.css',
        array(),
        '1.0.0'
    );
}
add_action( 'wp_enqueue_scripts' , 'cc_revslider_overlay_assets' );
```

In alternativa , puoi incollare il contenuto del CSS direttamente in :

- Customizer → CSS aggiuntivo
- oppure nel pannello globale di Slider Revolution → Global Settings → Custom CSS

---

## Utilizzo base

1 . Apri lo slider in Slider Revolution .
2 . Vai su **Module General Options → Layout → CSS → Module Classes** .
3 . Aggiungi le classi :

```text
cc-sr-overlay cc-sr-o-grad-top-strong
```

Questo attiva :

- il motore overlay (`cc-sr-overlay`)
- il preset “gradient top strong” (`cc-sr-o-grad-top-strong`)

L HTML generato sarà simile a :

```html
<rs-module-wrap
  id="rev_slider_11_1_wrapper"
  class="cc-sr-overlay cc-sr-o-grad-top-strong"
>
  <rs-module id="rev_slider_11_1"> ... </rs-module>
</rs-module-wrap>
```

Il CSS è scritto in modo che funzioni sia se la classe è sul `wrap` , sia se è sul `rs-module` .

---

## Preset disponibili

Tutti i preset si usano in coppia con `cc-sr-overlay` , per esempio :

```text
cc-sr-overlay cc-sr-o-solid-strong
```

### 1 . Overlay solidi

- `cc-sr-o-solid-strong`
  Nero pieno , ideale per hero ultra leggibili .

- `cc-sr-o-solid-soft`
  Velatura leggera , lascia respirare il background .

### 2 . Gradient dall alto

- `cc-sr-o-grad-top-strong`
  Parte alta molto scura , sfuma a trasparente entro il 40 % .

- `cc-sr-o-grad-top-soft`
  Stessa logica ma più delicata , perfetta per overlay sopra video con molta luce .

### 3 . Gradient dal basso

- `cc-sr-o-grad-bottom-soft`
  Parte bassa più scura , ottimo per testi ancorati in bottom .

### 4 . Vignette centrale

- `cc-sr-o-vignette`
  Centro scuro , trasparente in alto e in basso , perfetto per focalizzare il centro di un hero .

---

## Micro tuning per singolo slider

Se vuoi cambiare leggermente un preset per uno slider specifico , non serve creare nuove classi .

Puoi sovrascrivere le variabili CSS solo su quell ID .

Esempio :

```css
/* Slider con ID rev_slider_11_1 , classe cc-sr-overlay */
#rev_slider_11_1_wrapper.cc-sr-overlay {
  --sr-overlay-top: 0.9;
  --sr-overlay-mid: 0.2;
}
```

Oppure se la classe è sul modulo :

```css
#rev_slider_11_1.cc-sr-overlay {
  --sr-overlay-top: 0.9;
  --sr-overlay-mid: 0.2;
}
```

Variabili principali disponibili :

```css
--sr-overlay-top        /* opacità al 0 % del gradient */
--sr-overlay-mid        /* opacità alla posizione --sr-overlay-mid-pos */
--sr-overlay-bottom     /* opacità al 100 % */
--sr-overlay-mid-pos    /* posizione intermedia , es 40 % , 50 % , ecc . */
--sr-overlay-direction  /* to bottom , to top , ecc . */
--sr-overlay-color-r    /* componente R del colore */
--sr-overlay-color-g    /* componente G del colore */
--sr-overlay-color-b    /* componente B del colore */
```

Esempio overlay blu notte :

```css
.hero-slider-wrapper.cc-sr-overlay {
  --sr-overlay-color-r: 10;
  --sr-overlay-color-g: 20;
  --sr-overlay-color-b: 40;
}
```

---

## Esempi di mapping per progetto

Solo come documentazione interna , puoi annotare dentro il CSS :

```css
/* SLIDER HOME HERO    : cc-sr-overlay cc-sr-o-grad-top-strong */
/* SLIDER PAGINA FAQ   : cc-sr-overlay cc-sr-o-solid-soft       */
/* SLIDER LANDING DARK : cc-sr-overlay cc-sr-o-solid-strong     */
```

Così tu o chiunque tocchi il progetto vede al volo cosa monta ogni slider senza aprire Slider Revolution .

---

## Roadmap

- Preset chiari per overlay bianchi e colorati
- Snippet JS opzionale per togglare overlay via data attribute
- Versione SCSS con mixin e map dei preset

Pull request graditissime ✨
