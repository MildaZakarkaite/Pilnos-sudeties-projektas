<?php

namespace App\Drinks;

class LightDrink extends Drink {

    public function drink() {
        $this->setAmount($this->getAmount() - 100);
    }

    public function getImage(): ?string {
        if (parent::getImage() !== null) {
            return parent::getImage();
        } else {
            return 'https://d37kg2ecsrm74.cloudfront.net/web/ikea4/images/331/0133156_PE288434_S4.jpg';
        }
    }

}
