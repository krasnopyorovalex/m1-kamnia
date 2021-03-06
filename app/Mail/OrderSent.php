<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class OrderSent
 * @package App\Mail
 */
class OrderSent extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * OrderServiceSent constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return OrderSent
     */
    public function build(): OrderSent
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Форма: Заказать товар')
            ->view('emails.order', [
                'data' => $this->data
            ]);
    }
}
