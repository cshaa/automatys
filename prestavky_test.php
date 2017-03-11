<select name="time">

	<option value="0">--- Čas přestávky ---</option>

  <?php
    /* --- ZAČÁTEK MĚNITELNÝCH DAT --- */

    /*
      Kolik minut před koncem přestávky příjmáme
      poslední objednávku.
    */
    $delta_t = 3;

    /*
      Časy všech přestávek
    */
    $prestavky = [
      "7:55-8:00",
      "8:45-8:55",
      "9:40-10:00",
      "10:45-10:55",
      "11:40-11:50",
      "12:35-12:40",
      "13:25-13:30",
      "14:15-14:20",
      "15:05-15:10",
      "15:55-16:00",
      "16:45-16:50"
    ];

    /*
      Každý řádek odpovídá jednomu dni, po-ne.
      Každý znak odpovídá jedné přestávce počínaje nultou
      (tj. přestávka před první hodinou, kdy běžně nedodáváme).
      Mezera znamená, že nedoručujeme, X znamená, že doručujeme.
      Mezery na konci řádku není potřeba psát.
    */
    $nas_rozvrh = [
      " XXXXX", //Pak je matika
      " XX XX", //Tělák, pak je fyzika
      " XXXXXXXX", //I s deskriptivou
      " XXXXX", //O Paj/Sfe se nedoručuje
      " XXXXXX" //O lit./právu doručuje David
    ];

    /*
      Názvy dnů v týdnu.
    */
    $dny_slovnik = [
      "Pondělí",
      "Úterý",
      "Středa",
      "Čtvrtek",
      "Pátek",
      "Sobota",
      "Neděle"
    ];

    /* --- KONEC MĚNITELNÝCH DAT --- */

    /* --- ZAČÁTEK TOHO, ČEMU ROZUMÍ JEN MICHAL --- */
    /* --- ALE STEJNĚ PO VÁS BUDE CHTÍT, ABYSTE SI TO PŘEČETLI --- */


    $dnes = $den_v_tydnu = date("N")-1; //po=0; ne=6
    $minuta_v_dnu = date("i") + date("G")*60;

    /*
      FIXME Až bude otestováno, odeber tento kód! ☠
    */
        if( isset($_GET["d"]) ){
          $d = $_GET["d"];
          if( floor($d) == $d && $d >= 0 && $d < 7 ){
            $dnes = $den_v_tydnu = $d;
          }
        }
        if( isset($_GET["h"]) && isset($_GET["m"]) ){
          $h = $_GET["h"];
          $m = $_GET["m"];
          if( floor($h) == $h && $h >= 0 && $h < 24
           && floor($m) == $m && $m >= 0 && $m < 60){
            $minuta_v_dnu = $m + $h*60;
          }
        }
    // KONEC FIXME

    /*
      Změň časy přestávek na počítačem čitelný formát.
      Teď je $prestavky dvourozměrné pole, kde první index
      je 0 až 6 podle dne v týdnu a druhý index je 0 pro
      začátek přestávky a 1 pro konec přestávky. Hodnoty
      jsou časy v minutách.
    */
    foreach($prestavky as &$p){
      $p = explode("-",$p);
      foreach($p as &$q){
        $q = explode(":",$q);
        $q = $q[1] + $q[0]*60;
      }
    }

    /*
      Pokud už nedodáváme (je moc pozdě, nebo víkend),
      přeskoč na následující den, kdy dodáváme.
      FIXME Pokud za celý týden ani jednou nedodáváme,
      kód se zasekne v nekonečném cyklu 😢
    */
    while(true){ // Honzo, vzpomínáš? ;)

      if( isset($nas_rozvrh[ $den_v_tydnu ]) ){
        // Pokud je definovaný náš dnešní rozvrh

        $dnesni_rozvrh = $nas_rozvrh[ $den_v_tydnu ];
        $posledni_dodavka = strrpos($dnesni_rozvrh,"X"); //číslo přestávky

        if( $posledni_dodavka !== false ){
          // Pokud dnes vůbec dodáváme

          $posledni_dodavka = $prestavky[ $posledni_dodavka ][1]; //čas konce přestávky

          if( $posledni_dodavka - $minuta_v_dnu >= $delta_t ){
            // Pokud dnes ještě budeme dodávat
            // Splnil jsi cíl hledání, vyskoč z cyklu!
            break;
          }
        }
      }

      // Pokud nějaká z podmínek nebyla splněna:
      // V tento den nedoručujeme, pokračuj na další
      $minuta_v_dnu = 0;
      $den_v_tydnu++;
      $den_v_tydnu %= 7; // VFR neVFR, týden má 7 dní

    }// konec while


    /*
      Zjisti číslo další přestávky, kdy dodáváme.
    */
    $dalsi_prestavka = 0;
    while(true){ // Riskuju tím něčí život? 😯

      $dalsi_prestavka = strpos($dnesni_rozvrh,"X",$dalsi_prestavka);
      $konec_prestavky = $prestavky[ $dalsi_prestavka ][1];

      if( $konec_prestavky - $minuta_v_dnu >= $delta_t ){
        // Našel jsi přestávku, kdy doručujeme
        // Vyskoč z cyklu!
        break;
      }

      // Na tuhle přestávku už nedoručujeme, hledej dál
      $dalsi_prestavka++;

    }// konec while


    /*
      Tato funkce převádí z minut na hh:MM.
    */
    function hhmm($min){
      return floor($min/60).":".sprintf("%02d", $min%60);
    }


    /*
      Vypiš všechny relevantní přestávky
    */
    while(true){ // Žíít jako kaskadéér...

      $dalsi_prestavka = strpos($dnesni_rozvrh,"X",$dalsi_prestavka);

      if($dalsi_prestavka === false){
        // Už jsi vypsal všechny přestávky.
        // THOU SHALT RETURN TO SLUMBER!
        break;
      }

      $zacatek_prestavky = hhmm($prestavky[ $dalsi_prestavka ][0]);
      $konec_prestavky   = hhmm($prestavky[ $dalsi_prestavka ][1]);

      // Formát textu: (začátek) - (konec) / (den)
      $text = $zacatek_prestavky." - ".$konec_prestavky." / ";

      $delta_d = $den_v_tydnu - $dnes; // Kolik dní do dodávky
      $delta_d = ($delta_d + 7) % 7; // Pondělí je od neděle 1 den daleko!

      if($delta_d == 0) $text.="Dnes";
      elseif($delta_d == 1) $text.="Zítra";
      else $text.= $dny_slovnik[ $den_v_tydnu ];

      // Vypiš html kód
      ?><option value="<?=$text?>"><?=$text?></option><?php

      $dalsi_prestavka++;

    }// konec while

  ?>

</select>
