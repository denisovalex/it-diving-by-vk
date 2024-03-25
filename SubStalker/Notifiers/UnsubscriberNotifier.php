<?php

namespace SubStalker\Notifiers;

use VK\Client\VKApiClient;

use SubStalker\Entities\Subscriber;

class UnsubscriberNotifier extends ANotifier
{
  public function __construct(VKApiClient $client, int $unsubscriber_id)
  {
    parent::__construct($client, $unsubscriber_id);
  }

  public function notify(string $form_url)
  {
    $user_response = $this->client->getUser($this->reciever_id);
    if (!$user_response) {
      echo "error loading user {$this->reciever_id}\n";
      return;
    }
    $user = new Subscriber(
      $this->reciever_id,
      $user_response['first_name'] . ' ' . $user_response['last_name'],
      (int) $user_response['sex']
    );

    $text = "Здравствуйте, " . $user->getName() . ". " .
      "Нам жаль, что Вы отписались от нашего сообщества. " .
      "Чтобы мы могли стать лучше, просим вас ответить на несколько вопросов в форме: {$form_url}\n\n" .
      "Было приятно видеть Вас в числе наших подписчиков!";

    $this->client->sendMessage($text, $this->reciever_id);
  }
}