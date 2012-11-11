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
    public function verwijderenUitMand($items) {
        foreach ($this->mand as $key => $value) {
            if ($this->mand[$key]['id'] == $items['id']) {
                $this->mand[$key]['aantal'] -= $items['aantal'];
								if ($this->mand[$key]['aantal'] < 0) {
									 $this->mand[$key]['aantal']=0;
								}
                return;// stop met code uit te voeren, we verwachten maar één element en die hebben we gehad!
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
											echo "<p><strong>Winkelmand</th></strong>";
											echo "<hr>";
								   }
									 echo "<p>".$this->mand[$key]['aantal']. " x " . $this->mand[$key]['titel']."</p>";
									 $totaal += $this->mand[$key]['aantal']*$this->mand[$key]['prijs'];
									 $ii++;
							  }	
						}
				}
				if ($ii>0) {
					 echo "<p><strong>Totaal = ".$totaal." EUR</strong></p>";
					 echo "</div>";
				}
				else {
						 echo "Winkelmand is leeg";
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
