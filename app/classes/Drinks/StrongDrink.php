<?php

namespace App\Drinks;

class StrongDrink extends Drink {

    public function drink() {
        return $this->setAmount($this->getAmount() - 50);
    }

    public function getImage(): ?string {
        if (parent::getImage() !== null) {
            return parent::getImage();
        } else {
            return 'http://glassgoshop.com/image/cache/stikliniai-buteliai/500ml-clear-glass-bottle-Guitar-800x800.jpg';
        }
    }

}
