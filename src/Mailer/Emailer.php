<?php

namespace App\Mailer;

use Psr\Log\LoggerInterface;

class Emailer {

  /**
   * @var string
   */
  private $mySweetParam;

  /**
   * @var \Psr\Log\LoggerInterface
   */
  private $logger;

  public function create() : \Swift_Mailer {

  }

  public function __construct(string $mySweetParam, LoggerInterface $logger, Emailer $mailer) {
    $this->mySweetParam = $mySweetParam;
    $this->logger = $logger;

    $logger->alert('Boom');
    $logger->debug($mySweetParam);

    dump($mySweetParam);
  }


}