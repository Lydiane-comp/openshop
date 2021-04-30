<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AjoutProduit extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $produit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produit)
    {
        $this->produit = $produit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('un nouveau produit sur openShop')->markdown('emails.produits.ajout-produit');
    }
}
