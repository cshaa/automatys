
<?php

$produkty = json_decode( '{"file":'.file_get_contents("produkty.json")."}", true );

foreach($produkty['file'] as $p){ ?>

<div class="product">

	<!-- Obrázek -->
	<img src="<?=$p['img']?>">

	<!-- Popisek / Jméno -->
	<div class="popisek"><?=$p['jmeno']?></div>

	<!-- Popisek / Detail -->
	<?php if(isset($p['detail'])) { ?>
		<div class="popisek-detail"><?=$p['detail'] ?></div>
	<?php } ?>

	<!-- And his name is John... -->
	<div class="cena"><?=$p['cena']?> Kč</div>


	<!-- Novinka -->
	<?php if(isset($p['novinka'])) { ?>
		<div class="novinka">Novinka</div>
	<?php } ?>

	<!-- Akční panel -->
	<?php if(isset($p['akce'])) { ?>
		<div class="akce"><?=$p['akce'] ?></div>
	<?php } ?>


	<!-- Volba -->
	<?php if(isset($p['volba'])) { ?>
		<table class="varianta">
	    <tr>
				<?php foreach ($p['volba'] as $volba) { ?>
		      <td class="volba">
		        <label class="radio">
		        <input type="radio" name="volba_<?=$p['id']?>" value="<?=$volba?>" checked>
		        <span class="outer"><span class="inner"></span></span><?=$volba?></label>
		      </td>
				<? } ?>
	    </tr>
	  </table>
	<? } ?>


	<!-- Počet objednávek -->
	<p>Počet</p>

	<table class="pocet">
	<tr>
	<td class="plusminus"><input type="button" onclick="decreaseValue('<?=$p['id']?>')" value="-" ></td>
	<td class="pocet_input"><input type="number" placeholder="Počet" placeholder="Počet" id="<?=$p['id']?>" step="1"  name="<?=$p['id']?>" value="0" min="0" ></td>
	<td class="plusminus"><input type="button" onclick="increaseValue('<?=$p['id']?>')" value="+" ></td>
	</tr>
	</table>
</div>

<?php } ?>
