<?php
/*
 * Deze class zorgt ervoor dat we ons mandje kunnen opvullen,
 * indien een element reeds bestaat in de mand, dan vermeerderen we het aantal
 *
 * @property array $mand
 *
 * @method toevoegenAanMand
 * @method verwijderenUitMand
 * @method mandWeergeven
 *
 */

/**
 * We werken nog niet met een database, maar met een array $item :
 *              $items[] = array('id' => 1,
 *                  'titel' => "GSM 1",
 *                  'aantal' => 1,
 *                  'prijs' => 10
 *             );
 *
 * @author xavierdekeyster
 */
class Winkelmand {

    public $mand = array();

    /**
     * Vult het mandje op
     * @param array $items
     * @return void
     *
     */
    public function toevoegenAanMand($items) {
        // We lussen over het bestaande mandje om te zien of er reeds een element met hetzelfde id bestaat in onze mand
				/*echo "<pre>";
				print_r($this->mand);
				die("ok");*/
        foreach ($this->mand as $key => $value) {
            if ($this->mand[$key]['id'] == $items['id']) {
                $this->mand[$key]['aantal'] += $items['aantal'];
                return;// stop met code uit te voeren, we verwachten maar één element en die hebben we gehad!
            }
        }
       // nog geen element in ons mandje, we voegen het dus toe.
       $this->mand[] = $items;
    }

    /**
     * verwijdert een element of vermindert het aantal
     * @param array $items
     * @return void
     */
    public function verwijderenUitMand($itemId) {
        foreach ($this->mand as $key => $value) {
            if ($this->mand[$key]['id'] == $itemId) {
                $this->mand[$key]['aantal'] -= 1;
								if ($this->mand[$key]['aantal'] < 0) {
									 $this->mand[$key]['aantal']=0;
								}
                return;
            }
        }
    }

    /**
     * Mandje weergeven als object
     * @return array $this->mand
     */
    public function mandWeergeven() {
        $value = "";
				$ii=0; 
				$totaal=0;
				//$value="<pre>".print_r($this->mand);
				if (isset($this->mand) ){
					 foreach ($this->mand as $key => $value) {
				 				if ($this->mand[$key]['aantal']>0){
				 					 if ($ii==0) {
									 		echo "<div id='box'>";
											echo "<div id='title'>Winkelmand</strong></div>";	
											echo "<table><tr>";										
											echo "<td><button id='Mandleegmaken'>Winkelmand leegmaken</button></td>";
											echo "<td><button id='Mandbestellen'>Winkelmand bestellen</button></td>";
											echo "<td></td></tr>";
											echo "<tr><th>Omschrijving</th><th>Aantal</th><th></th><th>Prijs</th></tr>";
								   }
									 echo "<tr><td>".$this->mand[$key]['titel']. "</td><td>".$this->mand[$key]['aantal']. "</td><td><button class='min' id='".$this->mand[$key]['id']. "'>Verwijder uit Winkelmand</button></td>". "</td>" . "<td>". $this->mand[$key]['prijs'] . "�</td></tr>";
									 $totaal += $this->mand[$key]['aantal']*$this->mand[$key]['prijs'];
									 $ii++;
							  }	
						}
				}
				if ($ii>0) {
					 echo "<tr><td></td><td></td><td>Totaal te betalen</td><td>". $totaal. "</td></tr></table>";				 	 
					 echo "</div>";					 
				}
				else {
						 echo "<div id='box'><div id='title'>Winkelmand is leeg</div></div>";
				}
				
        //return $value;
    }

    /**
     * mand leegmaken
     */
    public function mandLeegmaken() {
				unset($this->mand);
    }

}

?>
