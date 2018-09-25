<?php

namespace controllers;

class EmailController {

    public function index(){

        view('email.index');
    }

    public function send(){

        $title = $_POST['title'];
        $to = $_POST['to'];
        $content = $_POST['content'];

        $data = explode('@',$to);

        $to = [$data[0],$to];

        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.126.com', 25))
                    ->setUsername('supinsheng@126.com')
                    ->setPassword('supinsheng123')
        ;

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Wonderful Subject'))
                    ->setSubject($title) //  标题
                    ->setFrom(['supinsheng@126.com' => 'Su'])
                    ->setTo([$to[1], $to[1] => $to[0]])
                    ->setBody($content)
        ;

        // Send the message
        $result = $mailer->send($message);
    }
}