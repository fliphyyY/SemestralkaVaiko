<?php
/**
 * Created by PhpStorm.
 * User: fliphyyy
 * Date: 23.12.2018
 * Time: 21:13
 */

class zoznamObrazkov
{

    public $pole;


    public function __construct()
    {
        $this->pole = array();
        $this->pole[0] = '<img src="akcne/1.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[1] = '<img src="akcne/2.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[2] = '<img src="akcne/3.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[3] = '<img src="akcne/4.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[4] = '<img src="akcne/5.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[5] = '<img src="akcne/6.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[6] = '<img src="akcne/7.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[7] = '<img src="akcne/8.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[8] = '<img src="akcne/9.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[9] = '<img src="akcne/10.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[10] = '<img src="akcne/11.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[11] = '<img src="dobrodruzne/1.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[12] = '<img src="dobrodruzne/2.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[13] = '<img src="dobrodruzne/3.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[14] = '<img src="dobrodruzne/4.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[15] = '<img src="dobrodruzne/5.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[16] = '<img src="dobrodruzne/6.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[17] = '<img src="dobrodruzne/7.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[18] = '<img src="dobrodruzne/8.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[19] = '<img src="dobrodruzne/9.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[20] = '<img src="dobrodruzne/10.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[21] = '<img src="romanticke/1.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[22] = '<img src="romanticke/2.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[23] = '<img src="romanticke/3.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[24] = '<img src="romanticke/4.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[25] = '<img src="romanticke/5.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[26] = '<img src="romanticke/6.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[27] = '<img src="romanticke/7.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[28] = '<img src="romanticke/8.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[29] = '<img src="romanticke/9.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[30] = '<img src="romanticke/10.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[31] = '<img src="scifi/1.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[32] = '<img src="scifi/2.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[33] = '<img src="scifi/3.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[34] = '<img src="scifi/4.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[35] = '<img src="scifi/5.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[36] = '<img src="scifi/6.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[37] = '<img src="scifi/7.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[38] = '<img src="scifi/8.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[39] = '<img src="scifi/9.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[40] = '<img src="scifi/10.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[41] = '<img src="top/1.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[42] = '<img src="top/2.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[43] = '<img src="top/3.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[44] = '<img src="top/4.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[45] = '<img src="top/5.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[46] = '<img src="top/6.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[47] = '<img src="top/7.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[48] = '<img src="top/8.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[49] = '<img src="top/9.jpg" class="obrazokFilmu" alt="obrazok">';
        $this->pole[50] = '<img src="top/10.jpg" class="obrazokFilmu" alt="obrazok">';
    }

    public function dajObrazok($index)
    {
        return $this->pole[$index];
    }

    public function getSize() {
        return sizeof($this->pole);
    }

}