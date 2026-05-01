Hai individuato perfettamente il fulcro della situazione. Ci sono due elementi distinti che stanno accadendo qui: l'avviso (warning) in console e il motivo reale per cui non vedi più l'overlay visivamente.

Ecco esattamente cosa sta succedendo e come risolvere entrambi i problemi.

### 1. Il Deprecation Notice di jQuery
Il messaggio di errore è un semplice "avviso" (non blocca il codice). Slider Revolution, a partire dalla versione 7 (che stai attualmente utilizzando, come si nota dai tag `<sr7-module>`), ha eliminato la dipendenza da jQuery per migliorare le prestazioni.

Il codice che hai inserito funziona ancora (le classi `cc-sr-overlay` e `cc-sr-o-bottom-dark-strong` vengono effettivamente applicate al div `wp-block-themepunch-revslider`, lo si vede nel tuo HTML), ma SR ti sta dicendo "smetti di usare jQuery".

**La soluzione (Vanilla JS):**
Sostituisci il tuo script personalizzato con questo equivalente in JavaScript puro, che non farà arrabbiare Slider Revolution ed eviterà l'errore `DOMTokenList` originario passando le classi come argomenti separati:

```javascript
window.addEventListener('load', function() {
    const sliders = document.querySelectorAll('.wp-block-themepunch-revslider');
    sliders.forEach(function(slider) {
        slider.classList.add('cc-sr-overlay', 'cc-sr-o-bottom-dark-strong');
    });
});
```
