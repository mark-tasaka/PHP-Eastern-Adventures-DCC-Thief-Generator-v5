<?php
/*Thief Languages */

function getLanguages($intMod, $luckMod, $luckySign, $alignment, $intelligence)
{
        $bonusLanguages = 0;
        
        $languages = array();
        array_push($languages, 'Common');
        array_push($languages, 'Thieves Cant');

        $languagesAvailable = array("Amabie", "Bakemono", "Bakeneko", "Jorōgumo", "Kappa", "Karura", "Kitsune", "Komainu", "Koropokuru", "Mikoshi-nyūdō ", "Mizuchi", "Mujina", "Namahage", "Nekomata", "Ningyo", "Nure-onna", "Ogre-magi", "Oni", "Onikuma ", "Shojo", "Tengu", "Tsuchigumo");

        $alignmentTongue = "Alignment Tongue (" . $alignment . ")";

        array_push($languagesAvailable, $alignmentTongue);

        shuffle($languagesAvailable);

        if($intMod > 0)
        {
                $bonusLanguages += $intMod;
        }
        

        if($luckySign == "28" && $luckMod > 0)
        {
            $bonusLanguages += $luckMod;
        }

        for($i = 0; $i < $bonusLanguages; $i++)
        {
            array_push($languages, $languagesAvailable[$i]);
        }

        return $languages;

}


?>