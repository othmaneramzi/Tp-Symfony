<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LuckyController
{
    /**
         * @Route("/lucky_number", name="app_lucky_number")
         */



    public function number(Request $request): Response{
        $number = random_int(0,100);
        $user = [
            'name' => 'Othmane Ramzi',
            'place' => 'Lens',
        ];

        dump($user);
        $name = $request->query->get('name');
        return new Response("<html><body><p>Lucky Number: $number</p><p>Name : $name</p></body></html>");



    }



}