<!DOCTYPE html>
<html>
<head>
<title>DCC Eastern Adventures Thief Character Generator </title>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<meta charset="UTF-8">
	<meta name="description" content="Dungeon Crawl Classics Thief Character Generator..">
	<meta name="keywords" content="Dungeon Crawl Classics,,HTML5,CSS,JavaScript">
	<meta name="author" content="Mark Tasaka 2022">
    
    <link rel="icon" href="../../../../images/favicon/icon.png" type="image/png" sizes="16x16"> 
		

	<link rel="stylesheet" type="text/css" href="css/thief.css">
    
    
    
    
</head>
<body>
    
    <!--PHP-->
    <?php
    
    include 'php/armour.php';
    include 'php/checks.php';
    include 'php/weapons.php';
    include 'php/gear.php';
    include 'php/classDetails.php';
    include 'php/abilityScoreGen.php';
    include 'php/xp.php';
    include 'php/diceRoll.php';
    include 'php/luckySign.php';
    include 'php/zeroLvOccupation.php';
    include 'php/wealth.php';
    include 'php/nameSelect.php';
    include 'php/gender.php';
    include 'php/languages.php';
    include 'php/thiefAbilities.php';
    
    
            
        if(isset($_POST["theGender"]))
        {
            $gender = $_POST["theGender"];
        }

        if(isset($_POST["theCharacterName"]))
        {
            $characterName = $_POST["theCharacterName"];
    
        }

        
        if(isset($_POST['theRandomNameGen']) && $_POST['theRandomNameGen'] == 1) 
        {
            $characterName = '';

            $givenName = '24';
            $surname = '19';
            
            $genderName = getGenderName($gender);
            $genderNameIdentifier = genderNameGeneration ($gender);

            $fullName = getName($givenName, $surname, $genderNameIdentifier);
            
        }
        else
        {
            $givenName = '';
            $surname = '';
            $genderName = getGenderName($gender);
            $fullName = '';
        } 


        


        if(isset($_POST["theAlignment"]))
        {
            $alignment = $_POST["theAlignment"];
        }
    
        if(isset($_POST["theLevel"]))
        {
            $level = $_POST["theLevel"];
        
        } 

        
        
        if(isset($_POST["thePlayerName"]))
        {
            $playerName = $_POST["thePlayerName"];
    
        }

        if(isset($_POST['theEasternTitle']) && $_POST['theEasternTitle'] == 1) 
        {
            $title = titleEastern($level, $gender);
        }
        else
        {
            $title = title($level, $alignment);
        } 

        

        
        $xpNextLevel = getXPNextLevel ($level);
        
        /*
        if(isset($_POST["theAbilityScore"]))
        {
            $abilityScoreGen = $_POST["theAbilityScore"];
        
        }*/
        
        
        if(isset($_POST["theWealth"]))
        {
            $wealthOption = $_POST["theWealth"];
        
        }  

        $wealth = getWealth($wealthOption);

        if(isset($_POST['theCustomAbilityScore']) && $_POST['theCustomAbilityScore'] == 1) 
        {        
            
            if(isset($_POST["theStrength"]))
            {
                $strengthString = $_POST["theStrength"];
                $strength = intval($strengthString);
            }      

            if(isset($_POST["theAgility"]))
            {
                $agilityString = $_POST["theAgility"];
                $agility = intval($agilityString);
            }     

            if(isset($_POST["theStamina"]))
            {
                $staminaString = $_POST["theStamina"];
                $stamina = intval($staminaString);
            }       

            if(isset($_POST["thePersonality"]))
            {
                $personalityString = $_POST["thePersonality"];
                $personality = intval($personalityString);
            }  

            if(isset($_POST["theIntelligence"]))
            {
                $intelligenceString = $_POST["theIntelligence"];
                $intelligence = intval($intelligenceString);
            }  

            if(isset($_POST["theLuck"]))
            {
                $luckString = $_POST["theLuck"];
                $luck = intval($luckString);
            }  

            $generationMessage = "Custom Ability Scores";

        }
        else
        {        if(isset($_POST["theAbilityScore"]))
            {
                $abilityScoreGen = $_POST["theAbilityScore"];
            
            }
            
            
            $abilityScoreArray = array();
            
            for($i = 0; $i < 6; ++$i)
            {
                $abilityScore = rollAbilityScores ($abilityScoreGen);
    
                array_push($abilityScoreArray, $abilityScore);
    
            }       
    
            $strength = $abilityScoreArray[0];
            $agility = $abilityScoreArray[1];
            $stamina = $abilityScoreArray[2];
            $personality = $abilityScoreArray[3];
            $intelligence = $abilityScoreArray[4];
            $luck = $abilityScoreArray[5];
            
            $generationMessage = generationMesssage ($abilityScoreGen);

        } 

        
        $strengthMod = getAbilityModifier($strength);
        $agilityMod = getAbilityModifier($agility);
        $staminaMod = getAbilityModifier($stamina);
        $personalityMod = getAbilityModifier($personality);
        $intelligenceMod = getAbilityModifier($intelligence);
        $luckMod = getAbilityModifier($luck);


/*
        if(isset($_POST["theAbilityScore"]))
        {
            $abilityScoreGen = $_POST["theAbilityScore"];
        
        }
        
        
        $abilityScoreArray = array();
        
        for($i = 0; $i < 6; ++$i)
        {
            $abilityScore = rollAbilityScores ($abilityScoreGen);

            array_push($abilityScoreArray, $abilityScore);

        }       

        $strength = $abilityScoreArray[0];
        $agility = $abilityScoreArray[1];
        $stamina = $abilityScoreArray[2];
        $personality = $abilityScoreArray[3];
        $intelligence = $abilityScoreArray[4];
        $luck = $abilityScoreArray[5];
        
        $strengthMod = getAbilityModifier($strength);
        $agilityMod = getAbilityModifier($agility);
        $staminaMod = getAbilityModifier($stamina);
        $personalityMod = getAbilityModifier($personality);
        $intelligenceMod = getAbilityModifier($intelligence);
        $luckMod = getAbilityModifier($luck);


        $generationMessage = generationMesssage ($abilityScoreGen);
    */
    
        if(isset($_POST["theArmour"]))
        {
            $armour = $_POST["theArmour"];
        }
    
        $armourName = getArmour($armour)[0];
        
        $armourACBonus = getArmour($armour)[1];
        $armourCheckPen = getArmour($armour)[2];
        $armourSpeedPen = getArmour($armour)[3];
        $armourFumbleDie = getArmour($armour)[4];

       $totalAcDefense = $armourACBonus;
       $totalAcCheckPen = $armourCheckPen;
       $speedPenality = $armourSpeedPen;

       $speed = 30 - $armourSpeedPen;


       $criticalDie = criticalDie($level);

      // $threat = threatRange($level);
       $luckDie = luckDie($level);

       $actionDice = actionDice($level);

       $attackBonus = attackBonus($level);

       $luckySign = array();
       $luckySign = getBirthAugur();

       
       $baseArmourClass = getAC($agilityMod, $luckMod, $luckySign[0]);

       $armourClass = $baseArmourClass + $totalAcDefense;

       $ref = savingThrowReflex($level);
       $ref += $agilityMod;
       $refLuckSign = getRefLuckBonus($luckMod, $luckySign[0]);
       $ref += $refLuckSign;
       
       $fort = savingThrowFort($level);
       $fort += $staminaMod;
       $fortLuckSign = getFortLuckBonus($luckMod, $luckySign[0]);
       $fort += $fortLuckSign;
       
       $will = savingThrowWill($level);
       $will += $personalityMod;
       $willLuckSign = getWillLuckBonus($luckMod, $luckySign[0]);
       $will += $willLuckSign;

       $speed = getSpeed($luckMod, $luckySign[0]);
       $speed -= $speedPenality;

       $initiative = getInit($agilityMod, $luckMod, $luckySign[0]);


       //Hit Points
       $hitPoints = getHitPoints($level, $staminaMod);

       $hitPointLuckySign = getHitPointLuck($luckMod, $luckySign[0]);

       $levelMultiplier = $level + 1;

       $bonusHitPoints = ($hitPointLuckySign * $levelMultiplier);
       
       $hitPoints += $bonusHitPoints;


       $meleeHitLuckyBonus = meleeAttackLuckSign($luckMod, $luckySign[0]);

       $meleeToHit = $attackBonus + $meleeHitLuckyBonus + $strengthMod;
       //$meleeToHit =$meleeHitLuckyBonus + $strengthMod;

       $meleeDamageLuckyBonus = meleeDamageLuckSign($luckMod, $luckySign[0]);

       $meleeToDamage = $meleeDamageLuckyBonus + $strengthMod;

       
        $missileHitLuckyBonus = missileAttackLuckSign($luckMod, $luckySign[0]);

        $missileToHit = $attackBonus + $missileHitLuckyBonus + $agilityMod;
        //$missileToHit = $missileHitLuckyBonus + $agilityMod;

        $missileDamageLuckyBonus = missileDamageLuckSign($luckMod, $luckySign[0]);

        $missileToDamage = $missileDamageLuckyBonus;

       
        
       $occupationArray = array();
       
       $occupationArray = getOccupation();
       
       $profession = $occupationArray[0];

       $species = $occupationArray[1];

       $languages = array();

       $languages = getLanguages($intelligenceMod, $luckMod, $luckySign[0], $alignment, $intelligence);


       $trainedWeapon = $occupationArray[2];


       $tradegoods = $occupationArray[4];

       $tradeGoodsAddition = tradeGoodsAddition($profession, $trainedWeapon);

       /*
       if(isset($_POST["theLuckyWeapon"]))
       {
           $luckyWeaponNumberString = $_POST["theLuckyWeapon"];
       } 

       $luckyWeaponNumber = (int)$luckyWeaponNumberString;
       $luckyWeapon = getWeapon($luckyWeaponNumber)[0];*/

       $thiefPath = getThiefPath($alignment);

       $backstabArray = getBackstabArray ($alignment);
       $backstab = $backstabArray[$level];

       $sneakSilentlyArray = getSneakSilentlyArray ($alignment);
       $sneakSilently = $sneakSilentlyArray[$level];
       $sneakSilently += $agilityMod;

       $hideInShadowArray = getHideInShadowsArray ($alignment);
       $hideInShadows = $hideInShadowArray[$level];
       $hideInShadows += $agilityMod;

       $pickPocketArray = getHideInShadowsArray ($alignment);
       $pickPocket = $pickPocketArray[$level];
       $pickPocket += $agilityMod;

       $climbArray = getClimbArray ($alignment);
       $climb = $climbArray[$level];
       $climb += $agilityMod;

       $pickLockArray = getPickLockArray ($alignment);
       $pickLock = $pickLockArray[$level];
       $pickLock += $agilityMod;

       $findTrapArray = getFindTrapArray ($alignment);
       $findTrap = $findTrapArray[$level];
       $findTrap += $intelligenceMod;

       $disableTrapArray = getDisableTrapArray ($alignment);
       $disableTrap = $disableTrapArray[$level];
       $disableTrap += $agilityMod;

       $forgeDocArray = getForgeDocArray ($alignment);
       $forgeDoc = $forgeDocArray[$level];
       $forgeDoc += $agilityMod;

       $disguiseSelfArray = getDisguiseSelfArray ($alignment);
       $disguiseSelf = $disguiseSelfArray[$level];
       $disguiseSelf += $personalityMod;

       $readLanguagesArray = getReadLanguagesArray ($alignment);
       $readLanguages = $readLanguagesArray[$level];
       $readLanguages += $intelligenceMod;

       $handlePoisonArray = getHandlePoisonArray ($alignment);
       $handlePoison = $handlePoisonArray[$level];

       $castSpellScrollArray = getCastSpellScrollArray ($alignment);
       $castSpellScroll = $castSpellScrollArray[$level];
       $modToCheckScroll = thiefSpellScrollMod ($intelligenceMod);




        $weaponArray = array();
        $weaponNames = array();
        $weaponDamage = array();
    
    //For Random Select weapon
    if(isset($_POST['thecheckBoxRandomWeaponsV3']) && $_POST['thecheckBoxRandomWeaponsV3'] == 1) 
    {
        $weaponArray = getRandomWeapons();

    }
    else
    {
        if(isset($_POST["theWeapons"]))
        {
            foreach($_POST["theWeapons"] as $weapon)
            {
                array_push($weaponArray, $weapon);
            }
        }
    }

    
    
    foreach($weaponArray as $select)
    {
        array_push($weaponNames, getWeapon($select)[0]);
    }
        
    foreach($weaponArray as $select)
    {
        array_push($weaponDamage, getWeapon($select)[1]);
    }
        
        $gearArray = array();
        $gearNames = array();
    
    

    //For Random Select gear
    if(isset($_POST['theCheckBoxRandomGear']) && $_POST['theCheckBoxRandomGear'] == 1) 
    {
        $gearArray = getRandomGear();

        $weaponCount = count($weaponArray);


        for($i = 0; $i < $weaponCount; ++$i)
        {

            if($weaponArray[$i] == "4")
            {
                array_push($gearArray, 26);
            }

            if($weaponArray[$i] == "18")
            {
                array_push($gearArray, 27);
            }

        }

    }
    else
    {
        //For Manually select gear
        if(isset($_POST["theGear"]))
            {
                foreach($_POST["theGear"] as $gear)
                {
                    array_push($gearArray, $gear);
                }
            }

    }

    
        foreach($gearArray as $select)
        {
            array_push($gearNames, getGear($select)[0]);
        }
    
    
    ?>

    
	
<!-- JQuery -->
  <img id="character_sheet"/>
   <section>
       
		<span id="profession">
        <?php
            echo $profession;
            ?></span>
           
        <span id="strength">
        <?php
            echo $strength;
            ?>
        </span>

        
        <span id="strengthMod">
        <?php
            $strengthMod = getModSign($strengthMod);
            echo $strengthMod;
            ?>
        </span>

		<span id="agility">
        <?php
            echo $agility;
            ?>
        </span>

          <span id="agilityMod">
        <?php
            $agilityMod = getModSign($agilityMod);
            echo $agilityMod;
            ?>
        </span>

           
		<span id="stamina">
        <?php
            echo $stamina;
            ?>
        </span>

          <span id="staminaMod">
        <?php
            $staminaMod = getModSign($staminaMod);
            echo $staminaMod;
            ?>
        </span>

		<span id="personality">
        <?php
            echo $personality;
            ?>
        </span>

         <span id="personalityMod">
        <?php
            $personalityMod = getModSign($personalityMod);
            echo $personalityMod;
            ?>
        </span>

		<span id="intelligence">
        <?php
            echo $intelligence;
            ?>
        </span>

         <span id="intelligenceMod">
        <?php
            $intelligenceMod = getModSign($intelligenceMod);
            echo $intelligenceMod;
            ?>
        </span>

		<span id="luck">
        <?php
            echo $luck;
            ?>
        </span>

         <span id="luckMod">
        <?php
            $luckMod = getModSign($luckMod);
            echo $luckMod;
            ?>
        </span>


       <span id="reflex">
        <?php
                $ref = getModSign($ref);
                echo $ref;
           ?>
       </span>

       <span id="fort">
        <?php
                $fort = getModSign($fort);
                echo $fort;
           ?>
       </span>

       <span id="will">
        <?php
                $will = getModSign($will);
                echo $will;
           ?>
       </span>
		  
       
       <span id="gender">
           <?php
           echo $genderName;
           ?>
       </span>
       
       
       
       <span id="class">Thief [Ninja]</span>
       
       <span id="armourClass">
           <?php
           echo $armourClass;
           ?>
           </span>

       
           <span id="armourClassBase">
           <?php
           echo '(' . $baseArmourClass . ')';
           ?>
           </span>
       
       <span id="hitPoints">
           <?php
           echo $hitPoints;
           ?>
           </span>

       <span id="languages">
           <?php

           $arraySize = count($languages);

           foreach($languages as $lan)
           {
               echo $lan;

               --$arraySize;

               if($arraySize > 1)
               {
                   echo ', ';
               }
               else if($arraySize === 1)
               {
                   echo ' & ';
               }
               else
               {
                    echo '';
               }

           }
           ?>
       </span>
       
       <span id="trainedWeapon">
           <?php
           echo $trainedWeapon . ' / ' . $tradegoods . $tradeGoodsAddition;

           ?></span>


       <span id="wealth">
       <?php
           echo $wealth;
           ?>
       </span>

       
       <span id="level">
           <?php
                echo $level;
           ?>
        </span>

        
       <span id="xpNextLevel">
           <?php
                echo $xpNextLevel;
           ?>
        </span>

       

       
       <span id="characterName">
           <?php
                echo $characterName;
           ?>
        </span>

             
       <span id="characterName2">
           <?php
                echo $fullName;
           ?>
        </span>

              
       <span id="playerName">
           <?php
                echo $playerName;
           ?>
        </span>
       
       
       
              
         <span id="alignment">
           <?php
                echo $alignment;
           ?>
        </span>
        
        <span id="speed">
           <?php
                echo $speed . '\'';
           ?></span>
        
        
        <span id="attackBonus">
        <?php
                $attackBonus = getModSign($attackBonus);
                echo $attackBonus;
           ?>
           </span>


              
       <span id="armourName">
           <?php
                echo $armourName;
           ?>
        </span>

        <span id="armourACBonus">
            <?php
                echo '+' . $totalAcDefense;
            ?>
        </span>

        
        <span id="armourACCheckPen">
            <?php
                echo $totalAcCheckPen;
            ?>
        </span>
        
        <span id="armourACSpeedPen">
            <?php
            if($speedPenality == 0)
            {
                echo "-";
            }
            else
            {
                echo "-" . $speedPenality;
            }
            ?>
        </span>

        <span id="fumbleDie">
            <?php
                echo $armourFumbleDie;
            ?>
        </span>

        <span id="criticalDieTable">
            <?php
                echo $criticalDie;
            ?>
        </span>
        
        <span id="threatRange">
            <?php
                echo $luckDie;
            ?>
        </span>

        <span id="initiative">
            <?php
                $initiative = getModSign($initiative);
                echo $initiative;
            ?>
        </span>
        
        <span id="actionDice">
            <?php
                echo $actionDice;
            ?>
        </span>

        
        <span id="title">
            <?php
                echo $title;
            ?>
        </span>

        
		<p id="birthAugur">
            <?php
                echo $luckySign[1] . ': ' . $luckySign[2] . ' (' . $luckMod . ')';
            ?>
            </p>


        
        <span id="melee">
            <?php
                $meleeToHit = getModSign($meleeToHit);
                echo $meleeToHit;
            ?>
            </span>

        <span id="range">
            <?php
                $missileToHit = getModSign($missileToHit);
                echo $missileToHit;
            ?>
            </span>
        
        <span id="meleeDamage">
            <?php
                $meleeToDamage = getModSign($meleeToDamage);
                echo $meleeToDamage;
            ?>
            </span>

        <span id="rangeDamage">
            <?php
                $missileToDamage = getModSign($missileToDamage);
                echo $missileToDamage;
            ?>
            </span>

       <span id="weaponsList">
           <?php
           
           foreach($weaponNames as $theWeapon)
           {
               echo $theWeapon;
               echo "<br/>";
           }
           
           ?>  
        </span>

       <span id="weaponsList2">
           <?php
           foreach($weaponDamage as $theWeaponDam)
           {
               echo $theWeaponDam;
               echo "<br/>";
           }
           ?>        
        </span>
       

       <span id="gearList">
           <?php

           $gearCount = count($gearNames);
           $counter = 1;
           
           foreach($gearNames as $theGear)
           {
              echo $theGear;

              if($counter == $gearCount-1)
              {
                  echo " & ";
              }
              elseif($counter > $gearCount-1)
              {
                  echo ".";
              }
              else
              {
                  echo ", ";
              }

              ++$counter;
           }
           ?>
       </span>


       <span id="abilityScoreGeneration">
            <?php
           echo $generationMessage;
           ?>
       </span>

       <span id="thiefPath">
       <?php
       echo $thiefPath;
       ?>
       </span>

       <span id="backstab">
            <?php
            $backstab = getModSign($backstab);
           echo $backstab;
           ?></span>


       <span id="sneakSilently">
            <?php
            $sneakSilently = getModSign($sneakSilently);
           echo $sneakSilently;
           ?></span>

       <span id="hideInShadows">
            <?php
            $hideInShadows = getModSign($hideInShadows);
           echo $hideInShadows;
           ?></span>

       <span id="pickPocket">
            <?php
            $pickPocket = getModSign($pickPocket);
           echo $pickPocket;
           ?></span>

       <span id="climb">
            <?php
            $climb = getModSign($climb);
           echo $climb;
           ?></span>

       <span id="pickLock">
            <?php
            $pickLock = getModSign($pickLock);
           echo $pickLock;
           ?></span>

       <span id="findTrap">
            <?php
            $findTrap = getModSign($findTrap);
           echo $findTrap;
           ?></span>

       <span id="disableTrap">
            <?php
            $disableTrap = getModSign($disableTrap);
           echo $disableTrap;
           ?></span>

       <span id="forgeDoc">
            <?php
            $forgeDoc = getModSign($forgeDoc);
           echo $forgeDoc;
           ?></span>

       <span id="disguiseSelf">
            <?php
            $disguiseSelf = getModSign($disguiseSelf);
           echo $disguiseSelf;
           ?></span>

       <span id="readLanguages">
            <?php
            $readLanguages = getModSign($readLanguages);
           echo $readLanguages;
           ?></span>

       <span id="handlePoison">
            <?php
            $handlePoison = getModSign($handlePoison);
           echo $handlePoison;
           ?></span>

       <span id="castSpellScroll">
            <?php
           echo $castSpellScroll . $modToCheckScroll;
           ?></span>

       

       
	</section>
	

		
  <script>
      

  
       let imgData = "images/thief.png";
      
        $("#character_sheet").attr("src", imgData);
      

    
	 
  </script>
		
	
    
</body>
</html>